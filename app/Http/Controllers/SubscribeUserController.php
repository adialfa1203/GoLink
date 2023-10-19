<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subscribe;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Services\CallbackService;
use App\Services\DetailTransactionService;
use Illuminate\Http\Response;
use League\CommonMark\Reference\Reference;

class SubscribeUserController extends Controller
{
    protected $privateKey = 'CK3tY-WMaEe-U2niV-eDYKP-5hZTB';

    private DetailTransactionService $service;
    private CallbackService $callbackService;
    public function __construct(DetailTransactionService $service, CallbackService $callbackService)
    {
        $this->service = $service;
        $this->callbackService = $callbackService;
    }


    public function subscribeUser()
    {
        $data = Subscribe::paginate(5);
        return view('User.SubscribeUser', compact('data'));
    }

    public function subscribeProductUser()
    {
        $subscribe = Subscribe::orderBy('created_at', 'asc')->get();

        $tripay = new TripayController();

        $channels = $tripay->getPaymentChannels();

        return view('User.SubscribeProductUser', compact('subscribe', 'channels'));
    }

    public function subscribeNow($id)
    {
        $subscribe = Subscribe::findOrFail($id);

        $tripay = new TripayController();
        $channels = $tripay->getPaymentChannels();

        $tax = $subscribe->price * 0.11;
        $totalPrice = $subscribe->price + $tax;

        return view('Subscribe.CheckoutProduct', compact('subscribe', 'channels', 'tripay', 'tax', 'totalPrice'));
    }


    public function payment(Request $request)
    {
        $subscribe = Subscribe::findOrFail($request->subscribe_id);

        $method = $request->method;

        $tripay = new TripayController();

        $transaction = $tripay->requestTransaction($method, $subscribe);
        $data = json_decode($transaction);
        $data = $data->data;
        Transaction::query()->create([
            'user_id' => auth()->user()->id,
            'subscribe_id' => $subscribe->id,
            'reference' => $data->reference,
            'expired' => Carbon::parse($data->expired_time)->format('Y-m-d'),
            'amout' => $data->amount,
            'fee_amout' => $data->total_fee,
            'payment_method' => $data->payment_method,
        ]);

        $transaction = json_decode($transaction);

        return redirect()->route('transaction.show', parameters: [
            'reference' => $transaction->data->reference,
        ]);
    }
    public function detail($reference)
    {
        $detailTransaction = $this->service->detail($reference);
        $detailTransaction = json_decode($detailTransaction);
        // $transaction = Transaction::Findorfail($reference)
        return view('Subscribe.TransactionShow', compact('detailTransaction'));
    }


    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, $this->privateKey);

        if ($signature !== (string) $callbackSignature) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid signature',
            ]);
        }

        if ('payment_status' !== (string) $request->server('HTTP_X_CALLBACK_EVENT')) {
            return Response::json([
                'success' => false,
                'message' => 'Unrecognized callback event, no action was taken',
            ]);
        }

        $data = json_decode($json);

        if (JSON_ERROR_NONE !== json_last_error()) {
            return Response::json([
                'success' => false,
                'message' => 'Invalid data sent by tripay',
            ]);
        }

        $tripayReference = $data->reference;
        $status = strtoupper((string) $data->status);

        if ($data->is_closed_payment === 1) {
            $transaction = Transaction::where('reference', $tripayReference)
                ->where('status', '=', 'UNPAID')
                ->first();

            if (!$transaction) {
                return Response::json([
                    'success' => false,
                    'message' => 'No invoice found or already paid: ' . $tripayReference,
                ]);
            }

            switch ($status) {
                case 'PAID':
                    $transaction->update(['status' => 'PAID']);
                    break;

                case 'EXPIRED':
                    $transaction->update(['status' => 'EXPIRED']);
                    break;

                case 'FAILED':
                    $transaction->update(['status' => 'FAILED']);
                    break;

                default:
                    return Response::json([
                        'success' => false,
                        'message' => 'Unrecognized payment status',
                    ]);
            }

            return Response::json(['success' => true]);
        }
    }
}
