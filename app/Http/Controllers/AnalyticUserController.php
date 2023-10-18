<?php

namespace App\Http\Controllers;

use App\Models\ShortUrl;
use App\Models\User;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Auth;

class AnalyticUserController extends Controller
{
    public function AnalyticUsersChart()
    {
        $user = Auth::user()->id;
        $endDate = Carbon::now();
        $startDate = $endDate->copy()->startOfMonth();

        $dateRange = CarbonPeriod::create($startDate, '1 month', $endDate);

        $totalUrlData = [];
        $totalVisitsData = [];
        $totalVisitsMicrositeData = [];
        $countMicrositeData = [];

        foreach ($dateRange as $date) {
            $startDateOfMonth = $date->startOfMonth()->format('Y-m-d');
            $endDateOfMonth = $date->endOfMonth()->format('Y-m-d');

            $countURL = ShortUrl::where('user_id', $user)
                ->whereNull('microsite_uuid')
                ->whereBetween('created_at', [$startDateOfMonth, $endDateOfMonth])
                ->count();

            $countMicrosite = ShortUrl::where('user_id', $user)
                ->whereNotNull('microsite_uuid')
                ->whereBetween('created_at', [$startDateOfMonth, $endDateOfMonth])
                ->count();

            $totalVisits = ShortURLVisit::whereHas('shortUrl', function ($query) use ($user) {
                $query->where('user_id', $user)
                    ->whereNull('microsite_uuid')
                    ->where('archive', '!=', 'yes');
            })
                ->whereBetween('visited_at', [$startDateOfMonth, $endDateOfMonth])
                ->count();

            $totalVisitsMicrosite = ShortURLVisit::whereHas('shortUrl', function ($query) use ($user) {
                $query->where('user_id', $user)
                    ->whereNotNull('microsite_uuid');
            })
                ->whereBetween('visited_at', [$startDateOfMonth, $endDateOfMonth])
                ->count();

            $totalUrlData[] = ['date' => $startDateOfMonth, 'totalUrl' => $countURL];
            $totalVisitsData[] = ['date' => $startDateOfMonth, 'totalVisits' => $totalVisits];
            $totalVisitsMicrositeData[] = ['date' => $startDateOfMonth, 'totalVisitsMicrosite' => $totalVisitsMicrosite];
            $countMicrositeData[] = ['date' => $startDateOfMonth, 'countMicrosite' => $countMicrosite];
        }

        return response()->json([
            'startDate' => $startDate,
            'user' => $user,
            'totalUrlData' => $totalUrlData,
            'totalVisitsData' => $totalVisitsData,
            'totalVisitsMicrositeData' => $totalVisitsMicrositeData,
            'countMicrositeData' => $countMicrositeData,
        ]);
    }

    public function analyticUser()
    {
        $user = Auth::user()->id;
        $users = Auth::user();

        if ($users) {
            $subscribe = $users->subscribe;

            if ($subscribe->tipe == 'free') {
                $urlStatus = '15';
                $micrositeStatus = '3';
            } elseif ($subscribe->tipe == 'silver') {
                $urlStatus = '25';
                $micrositeStatus = '5';
            } elseif ($subscribe->tipe == 'gold') {
                $urlStatus = '35';
                $micrositeStatus = '10';
            } elseif ($subscribe->tipe == 'platinum') {
                $urlStatus = 'Unlimited';
                $micrositeStatus = 'Unlimited';
            } else {
                $urlStatus = 'Status tidak valid';
                $micrositeStatus = 'Status tidak valid';
            }
        }else {
            // Tangani jika $user tidak valid
            // Misalnya, arahkan pengguna kembali ke halaman login
        }
        $links = ShortUrl::withCount([
            'visits AS totalVisits' => function ($query) use ($user) {
                $query->whereHas('shortURL', function ($query) use ($user) {
                    $query->where('user_id', $user);
                });
            },
        ])
            ->whereNull('microsite_uuid')
            ->where('user_id', $user)
            ->orderBy('totalVisits', 'desc')
            ->take(3)
            ->get();

        $microsites = ShortUrl::withCount([
            'visits AS totalVisits' => function ($query) use ($user) {
                $query->whereHas('shortUrl', function ($query) use ($user) {
                    $query->where('user_id', $user);
                });
            },
        ])
            ->whereNotNull('microsite_uuid')
            ->where('user_id', $user)
            ->orderBy('totalVisits', 'desc')
            ->take(3)
            ->get();

        $countURL = ShortURL::where('user_id', $user)
            ->whereNull('microsite_uuid')
            ->count();
        $countMicrosite = ShortUrl::where('user_id', $user)
            ->whereNotNull('microsite_uuid')
            ->count();

        $dataLink = SHortURL::all();

        $totalVisits = ShortURLVisit::query()
            ->whereHas('shortURL', function ($query) use ($user) {
                $query->where('user_id', $user)
                    ->where('archive', '!=', 'yes')
                    ->where(function ($query) {
                        $query->whereNull('microsite_uuid')
                            ->orWhere('microsite_uuid', '=', '');
                    });
            })
            ->count();

        $totalVisitsMicrosite = ShortURLVisit::query()
            ->whereRelation('shortURL', 'user_id', '=', $user)
            ->whereRelation('shortURL', 'microsite_uuid', '!=', null)
            ->whereRelation('shortURL', 'archive', '!=', 'yes')
            ->count();

        $users = User::where('email', '!=', 'admin@gmail.com')->get();
        $count = [];
        foreach ($users as $user) {
            $count[$user->id] = ShortUrl::where('user_id', $user->id)->count();
        }
        // Mengurutkan data berdasarkan jumlah pengunjung
        arsort($count);
        $qr = ShortUrl::get()->sum('qr_code');

        // find by id
        // bentuk array / collection
        // $shortURL = \AshAllenDesign\ShortURL\Models\ShortURL::find();

        // hitung jumlah array / collection dari shortURL
        // $visits = count($shortURL->visits) ;

        // dd($totalVisits,$countURL);
        return view('User.AnalyticUser', compact('urlStatus', 'micrositeStatus', 'totalVisits', 'countURL', 'count', 'users', 'links', 'dataLink', 'countMicrosite', 'qr', 'microsites', 'totalVisitsMicrosite'));
    }

}
