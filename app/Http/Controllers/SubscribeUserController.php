<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Subscribe;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Services\CallbackService;
use App\Services\DetailTransactionService;

class SubscribeUserController extends Controller
{
    protected $privateKey = 'CK3tY-WMaEe-U2niV-eDYKP-5hZTB';

    private DetailTransactionService $service;
    public function __construct(DetailTransactionService $service, CallbackService $callbackService)
    {
        $this->service = $service;
    }


    public function subscribeUser()
    {
        $userId = auth()->user()->id;
        $transactions = Transaction::where('user_id', $userId)
            ->where('status', 'UNPAID')
            ->get();

        foreach ($transactions as $transaction) {
            if ($transaction->expired <= now()) {
                $transaction->update([
                    'status' => 'EXPIRED'
                ]);
            }
        }

        $data = Transaction::where('user_id', $userId)->paginate(10);

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

        $timezone = 'Asia/Jakarta';
        $transaction = $tripay->requestTransaction($method, $subscribe);
        $data = json_decode($transaction);
        $data = $data->data;
        $expiryDateTime = Carbon::now($timezone)->addHours(24);

        $trans = Transaction::query()->create([
            'user_id' => auth()->user()->id,
            'subscribe_id' => $subscribe->id,
            'reference' => $data->reference,
            'expired' => $expiryDateTime->toDateTimeString(),
            'amount' => $data->amount,
            'fee_amount' => $data->total_fee,
            'payment_method' => $data->payment_method
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
        $expired = Carbon::parse($detailTransaction->data->expired_time)->format('d-M-Y H:i:s');
        $instructions = $detailTransaction->data->instructions;

        return view('Subscribe.TransactionShow', compact('detailTransaction', 'transaction', 'foto1', 'expired', 'instructions'));
    }

    public function deleteTransaction($reference)
    {
        $transaction = Transaction::where('reference', $reference)->first();
        if ($transaction) {
            $transaction->delete();
            return redirect()->route('subscribe.user')->with('success', 'Data Transaksi Berhasil Dihapus.');
        } else {
            return redirect()->route('subscribe.user')->with('error', 'Transaksi tidak ditemukan.');
        }
    }

    public function failedTransaction($reference)
    {
        $transaction = Transaction::where('reference', $reference)->first();

        if ($transaction) {
            $transaction->update(['status' => 'failed']);
            return redirect()->route('subscribe.user')->with('success', 'Transaksi berhasil dibatalkan.');
        } else {
            return redirect()->route('subscribe.user')->with('error', 'Transaksi tidak ditemukan.');
        }
    }
}
