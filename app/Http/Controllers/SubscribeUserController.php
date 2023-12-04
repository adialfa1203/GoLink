<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subscribe;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\CallbackService;
use App\Services\DetailTransactionService;
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
        $userId = auth()->user()->id;
        $transaction = Transaction::where('user_id', $userId)->get();
        $data = Transaction::where('user_id', $userId)->paginate(10);
        // dd($transaction);
        return view('User.SubscribeUser', compact('data'));
    }


    public function subscribeProductUser()
    {
        $subscribe = Subscribe::orderBy('created_at', 'asc')->get();

        return view('User.SubscribeProductUser', compact('subscribe'));
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
            'amount' => $data->amount,
            'fee_amount' => $data->total_fee,
            'payment_method' => $method
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
        $transaction = Transaction::where('reference', $reference)
            ->with('subscribe')->first();
        $tripay = new TripayController();
        $foto1 = $tripay->getPaymentChannels();
        $expired = Carbon::parse($detailTransaction->data->expired_time)->isoFormat('DD MMMM Y') + (24 * 60 * 60);
        return view('Subscribe.TransactionShow', compact('detailTransaction', 'transaction', 'foto1', 'expired'));
    }
    public function deleteTransaction($reference)
    {
        $transaction = Transaction::where('reference', $reference)->first();
        // dd($transaction);
        if ($transaction) {
            $transaction->delete();
            return redirect()->route('subscribe.user')->with('success', 'Transaksi berhasil dibatalkan.');
        } else {
            return redirect()->route('subscribe.user')->with('error', 'Transaksi tidak ditemukan.');
        }
    }
}
