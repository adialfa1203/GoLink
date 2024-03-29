<?php

namespace App\Http\Controllers;

use App\Models\Microsite;
use App\Models\ShortUrl;
use App\Models\Social;
use AshAllenDesign\ShortURL\Classes\Builder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Yoeunes\Toastr\Toastr;

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

        if ($user->subscribe == 'silver') {
            $shortLinks = $user->shortUrls()
                ->whereNull('microsite_uuid')
                ->whereMonth('created_at', now())
                ->count();
            $history = $user->history()
                ->whereMonth('created_at', now())
                ->count();

            if ($shortLinks + $history >= 25) {
                return response()->json(['message' => 'Anda telah mencapai batasan pembuatan tautan baru. Untuk dapat membuat lebih banyak tautan baru, pertimbangkan untuk meningkatkan akun Anda ke versi premium. Dengan berlangganan, Anda akan mendapatkan akses ke fitur-fitur tambahan dan batasan yang lebih tinggi.', 'status' => 422]);
            }
        } elseif ($user->subscribe == 'gold') {
            $shortLinks = $user->shortUrls()
                ->whereNull('microsite_uuid')
                ->whereMonth('created_at',  now())
                ->count();
            $history = $user->history()
                ->whereMonth('created_at',  now())
                ->count();

            if ($shortLinks + $history >= 35) {
                return response()->json(['message' => 'Anda telah mencapai batasan pembuatan tautan baru. Untuk dapat membuat lebih banyak tautan baru, pertimbangkan untuk meningkatkan akun Anda ke versi premium. Dengan berlangganan, Anda akan mendapatkan akses ke fitur-fitur tambahan dan batasan yang lebih tinggi.', 'status' => 422]);
            }
        } elseif ($user->subscribe == 'platinum') {
        } else {

            $shortLinks = $user->shortUrls()
                ->whereNull('microsite_uuid')
                ->whereMonth('created_at',  now())
                ->count();

            $history = $user->history()
                ->whereMonth('created_at',  now())
                ->count();

            if ($shortLinks + $history >= 15) {
                return response()->json(['message' => 'Anda telah mencapai batasan pembuatan tautan baru. Untuk dapat membuat lebih banyak tautan baru, pertimbangkan untuk meningkatkan akun Anda ke versi premium. Dengan berlangganan, Anda akan mendapatkan akses ke fitur-fitur tambahan dan batasan yang lebih tinggi.', 'status' => 422]);
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
            'archive' => 'no',
            'deleted_add' => $request->deleted_add,
            'click_count' => $request->click_count,
            'qr_code' => $request->qr_code,
            'title' => $request->title,
            'deactivated_at' => $request->deactivated_at,
        ]);

        return response()->json($find);
    }


    public function updatePassword(Request $request, $id)
    {
        // Validasi data yang diterima dari permintaan AJAX
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6',
        ]);

        // Cari URL pendek dengan 'url_key' yang diberikan
        $shortUrl = ShortUrl::find($id);

        if (!$shortUrl) {
            return response()->json(['error' => 'Tautan tidak ditemukan.'], 404);
        }

        // Perbarui kata sandi tautan pendek
        $shortUrl->password = bcrypt($request->input('password'));
        $shortUrl->save();
        // dd($shortUrl);
        return response()->json(['success' => 'Kata sandi berhasil diperbarui']);
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
            'newUrlKey' => 'required|unique:short_urls,url_key',
        ], [
            'newUrlKey.required' => 'Kolom harus diisi',
            'newUrlKey.unique' => 'Nama sudah digunakan',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }

        $newUrlKey = str_replace(' ', '-', $request->newUrlKey);
        $newUrlKey = strtolower($newUrlKey);

        $updateUrl->update([
            'url_key' => $newUrlKey,
            'default_short_url' => env('APP_URL') . "/" . $newUrlKey,
            'custom_name' => 'yes',
        ]);

        return response()->json([
            'message' => 'URL key updated successfully',
            'success' => true
        ]);
    }
    public function updateIdShortUrl(Request $request, $shortCode)
    {
        $updateUrl = ShortUrl::where('id', $shortCode);

        if (!$updateUrl->exists()) {
            return response()->json(['error' => 'Short link not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'newUrlKey' => 'required|unique:short_urls,url_key',
        ], [
            'newUrlKey.required' => 'Kolom harus diisi',
            'newUrlKey.unique' => 'Nama sudah digunakan',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 404);
        }

        $newUrlKey = str_replace(' ', '-', $request->newUrlKey);
        $newUrlKey = strtolower($newUrlKey);
        $updateUrl->update([
            'url_key' => $newUrlKey,
            'default_short_url' => env('APP_URL') . "/" . $newUrlKey,
            'custom_name' => 'yes',
        ]);

        return response()->json(['message' => 'URL key updated successfully']);
    }

    public function micrositeLink($micrositeLink)
    {
        try {
            $accessMicrosite = Microsite::with(['component' => function ($query) {
                $query->withTrashed();
            }])
                ->where('link_microsite', $micrositeLink)
                ->firstOrFail();
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404);
        }

        $social = Social::where('microsite_uuid', $accessMicrosite->id)
            ->with('button')
            ->orderBy('order')
            ->get();
        $short_url = ShortUrl::where('microsite_uuid', $micrositeLink)->first();

        return view('Microsite.MicrositeLink', compact('accessMicrosite', 'social', 'short_url'));
    }
}
