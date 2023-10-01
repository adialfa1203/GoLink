<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Models\User;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;

class LinkAdminController extends Controller
{
    public function linkAdmin()
    {
        $data = User::where('is_banned', 0)->role('user')->get();
        //Menghitung total user
        $totalUser = User::where('email', '!=', 'admin@gmail.com')
                    ->where('is_banned', '!=', '1')
                    ->count();
        //Menghitung total url
        $totalUrl = ShortUrl::where('archive', '!=', 'yes')->count();
        //Menghitung total pengunjung
        $totalVisits = ShortURLVisit::query()->count();

        $totalMicrosite = ShortUrl::whereNotNull('microsite_uuid')->count();

        //Menampilkan data user di dalam tabel
        // $users = User::where('email', '!=', 'admin@gmail.com')->get();
        // //Menampilkan total url untuk setiap user
        // $count = [];
        // foreach ($users as $user) {
        //     $count[$user->id] = ShortUrl::where('user_id', $user->id)->count();
        //
        $users = User::where('email', '!=', 'admin@gmail.com')
                ->where('is_banned', '!=', '1')
                ->paginate(10);
        $d=$users;
        foreach ($users as $user) {
            $userData[$user->id] = [
                'total_links' => ShortUrl::where('user_id', $user->id)->whereNull('microsite_uuid')->count(),
                'total_microsites' => ShortUrl::where('user_id', $user->id)->whereNotNull('microsite_uuid')->count(),
                'popular_links' => ShortUrl::where('user_id', $user->id)
                    ->withCount('visits')
                    ->orderBy('visits_count', 'desc')
                    ->first(),
                'popular_microsites' => ShortUrl::where('user_id', $user->id)
                    ->whereNotNull('microsite_uuid')
                    ->withCount('visits')
                    ->orderBy('visits_count', 'desc')
                    ->first(),
            ];
        }
        return view('Admin.Link', compact('d','totalUser', 'totalUrl', 'totalVisits', 'users', 'totalMicrosite', 'userData'));
    }
}
