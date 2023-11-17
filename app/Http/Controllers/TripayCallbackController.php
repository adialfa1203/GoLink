<?php

namespace App\Http\Controllers;

use App\Models\Subscribe;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class TripayCallbackController extends Controller
{

    public function handle(Request $request)
    {
        $callbackSignature = $request->server('HTTP_X_CALLBACK_SIGNATURE');
        $json = $request->getContent();
        $signature = hash_hmac('sha256', $json, env('TRIPAY_PRIVATE_KEY'));

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
                    'message' => 'Tidak ada tagihan ditemukan atau sudah dibayar: ' . $tripayReference,
                ]);
            }

            switch ($status) {
                case 'PAID':
                    // Update status transaksi
                    $transaction->update(['status' => 'PAID']);
        
                    // Dapatkan langganan terkait
                    $subscription = Subscribe::where('user_id', $transaction->user_id)
                        ->where('tipe', $transaction->tipe)
                        ->first();
        
                    if ($subscription) {
                        // Perbarui data pengguna berdasarkan jenis langganan
                        $user = User::find($transaction->user_id);
                        // Mengasumsikan Anda memiliki metode seperti updateSubscriptionStatus di model User Anda
                        $user->updateSubscriptionStatus($subscription->tipe, 'PAID');
                    } else {
                        return Response::json([
                            'success' => false,
                            'message' => 'Tidak ada langganan ditemukan untuk pengguna',
                        ]);
                    }
        
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
                        'message' => 'Status pembayaran tidak dikenali',
                    ]);
            }

            return Response::json(['success' => true]);
        }
    }
}
