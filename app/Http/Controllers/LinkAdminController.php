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
        
        $totalUser = User::where('email', '!=', 'admin@gmail.com')
                        ->where('is_banned', '!=', '1')
                        ->count();
        
        $totalUrl = ShortUrl::where('archive', '!=', 'yes')->count();
        
        $totalVisits = ShortURLVisit::query()
                            ->whereRelation('shortURL', 'archive', '!=', 'yes')
                            ->count();

        $totalMicrosite = ShortUrl::whereNotNull('microsite_uuid')->count();

        $users = User::where('email', '!=', 'admin@gmail.com')
                    ->where('is_banned', '!=', '1')
                    ->paginate(10);
        
        $d = $users;

        foreach ($users as $user) {
            $userData[$user->id] = [
                'total_links' => ShortUrl::where('user_id', $user->id)->whereNull('microsite_uuid')->count(),
                'total_microsites' => ShortUrl::where('user_id', $user->id)->whereNotNull('microsite_uuid')->count(),
                'popular_links' => ShortUrl::where('user_id', $user->id)
                    ->withCount('visits')
                    ->orderByDesc('visits_count') // Mengurutkan berdasarkan jumlah tautan terbanyak
                    ->first(),
                'popular_microsites' => ShortUrl::where('user_id', $user->id)
                    ->whereNotNull('microsite_uuid')
                    ->withCount('visits')
                    ->orderByDesc('visits_count') // Mengurutkan berdasarkan jumlah tautan terbanyak
                    ->first(),
            ];
        }

        // Mengurutkan $users berdasarkan jumlah tautan terbanyak
        $users = $users->sortByDesc(function ($user) use ($userData) {
            return $userData[$user->id]['total_links'];
        });

        return view('Admin.Link', compact('d', 'totalUser', 'totalUrl', 'totalVisits', 'users', 'totalMicrosite', 'userData'));
    }

}
