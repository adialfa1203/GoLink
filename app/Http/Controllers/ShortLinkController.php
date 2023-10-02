<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Social;
use App\Models\ShortUrl;
use App\Models\Microsite;
use Yoeunes\Toastr\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use AshAllenDesign\ShortURL\Classes\Builder;

class ShortLinkController extends Controller
{
    public function shortLink(Request $request, Toastr $toastr)
    {
        $user = auth()->user();
        if ($request->has('deactivated_at')) {
            $deactivatedAt = $request->deactivated_at;

            if (!is_null($deactivatedAt)) {
                $deactivatedAt = Carbon::parse($deactivatedAt);

                if ($deactivatedAt->isBefore(now())) {
                    return response()->json(['message' => 'Tanggal dan waktu harus lebih besar dari sekarang.', 'status' => 'gagal']);
                }
            }
        }
        $validator = Validator::make($request->all(), [
            'default_short_url.*' => 'required|string|url|regex:/^(https?:\/\/)?[^\s\/$.?#].[^\s]*$/i',
            'deactivated_at' => [
                'nullable',
                'date',
                'after_or_equal:today', 
            ],
        ], [
            'default_short_url.*.required' => 'Kolom ini wajib diisi.',
            'default_short_url.*.string' => 'Kolom ini harus berupa teks.',
            'default_short_url.*.url' => 'URL tidak valid.',
            'default_short_url.*.regex' => 'Format URL tidak valid.',
            'deactivated_at.after_or_equal' => 'Tanggal dan waktu harus lebih besar dari atau sama dengan hari ini.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $errorMessages = [];

            foreach ($errors->all() as $message) {
                $errorMessages[] = $message;
            }

            return response()->json(['message' => implode('<br>', $errorMessages), 'status' => 'gagal']);
        }

        if ($user->subscribe == 'yes') {
        } else {
            $shortLinkTotal = $user->shortUrls()->count();
            $historyTotal = $user->history()->count();
            if ($shortLinkTotal + $historyTotal >= 100) {
                return response()->json(['message' => 'Anda telah mencapai batasan pembuatan tautan baru. Untuk dapat membuat lebih banyak tautan baru, pertimbangkan untuk meningkatkan akun Anda ke versi premium. Dengan berlangganan, Anda akan mendapatkan akses ke fitur-fitur tambahan dan batasan yang lebih tinggi. ', 'status' => 422]);
            }
        }
        $builder = new \AshAllenDesign\ShortURL\Classes\Builder();
        $shortURLObject = $builder
            ->destinationUrl($request->destination_url)
            ->when(
                $request->date('activation'),
                function (Builder $builder) use ($request): Builder {
                    return $builder
                        ->activateAt(now())
                        ->deactivateAt(Carbon::parse($request->deactivated_at));
                },
            )
            ->make();

        $find = ShortUrl::query()->where('url_key', $shortURLObject->url_key)->first();

        $find->update([
            'user_id' => auth()->id(),
            'default_short_url' => $shortURLObject->default_short_url,
            'password' => Hash::make($request->password),
            'archive' => 'no',
            'deleted_add' => $request->deleted_add,
            'click_count' => $request->click_count,
            'qr_code' => $request->qr_code,
            'title' => $request->title,
            'deactivated_at' => $request->deactivated_at
        ]);

        return response()->json($find);
    }

    public function accessShortLink(Request $request, $shortCode)
    {
        // Anda mungkin perlu menyesuaikan ini dengan metode yang digunakan oleh pustaka tautan pendek yang Anda gunakan.
        // Contoh permintaan HTTP ke tautan pendek yang telah Anda buat.
        $response = Http::get($shortCode);

        // Ambil parameter dari permintaan yang masuk.
        $parameterValue = $request->query('parameter_name'); // Ganti 'parameter_name' dengan nama parameter yang sesuai.

        // Lakukan apa pun yang diperlukan dengan $parameterValue atau $response.
        // Misalnya, tampilkan tautan asli dan parameter di view.
        return view('shortlink', [
            'originalLink' => $response->body(),
            'parameterValue' => $parameterValue,
        ]);
    }
    public function updateShortLink(Request $request, $shortCode)
    {
        $updateUrl = ShortUrl::where('url_key', $shortCode);

        if (!$updateUrl->exists()) {
            return response()->json(['error' => 'Short link not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'newUrlKey' => 'required|unique:short_urls,url_key'
        ],[
            'newUrlKey.required' => 'Kolom harus diisi',
            'newUrlKey.unique' => 'Nama sudah digunakan'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }
        $validator = Validator::make($request->all(), [
            'newUrlKey' => 'unique:Takedown,url_key'
        ],[
            'newUrlKey.unique' => 'Nama sudah digunakan'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }

        $newUrlKey = $request->newUrlKey;

        // dd($updateUrl->user->is_banned);
        // dd($request);
        // return response()->json(['output' => $newUrlKey]);

        // Memperbarui URL key dan default short URL
        $updateUrl->update([
            'url_key' => $newUrlKey,
            'default_short_url' => "http://127.0.0.1:8000/go.link/" . $newUrlKey,
            'custom_name' => 'yes',
        ]);

        return response()->json(['message' => 'URL key updated successfully']);
    }

    public function micrositeLink($micrositeLink)
    {
        $accessMicrosite = Microsite::with('component')->where('link_microsite', $micrositeLink)->first();
        if($accessMicrosite->user->is_banned) abort(404);
        $social = Social::where('microsite_uuid', $accessMicrosite->id)->with('button')->get();
        $short_url = ShortUrl::where('microsite_uuid', $micrositeLink)->first();

        return view('Microsite.MicrositeLink', compact('accessMicrosite', 'social', 'short_url'));
    }

}
