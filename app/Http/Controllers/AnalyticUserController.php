<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\History;
use App\Models\ShortUrl;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;

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
        $user = Auth::user();
        $userId = Auth::user()->id;
        $currentMonth = now()->startOfMonth();

        $links = ShortUrl::withCount([
            'visits AS totalVisits' => function ($query) use ($userId) {
                $query->whereHas('shortURL', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
            },
        ])
            ->whereNull('microsite_uuid')
            ->where('user_id', $userId)
            ->orderBy('totalVisits', 'desc')
            ->take(3)
            ->get();
            
        $microsites = ShortUrl::withCount([
            'visits AS totalVisits' => function ($query) use ($userId) {
                $query->whereHas('shortUrl', function ($query) use ($userId) {
                    $query->where('user_id', $userId);
                });
            },
        ])
            ->whereNotNull('microsite_uuid')
            ->where('user_id', $userId)
            ->orderBy('totalVisits', 'desc')
            ->take(3)
            ->get();

        $TopBrowser = ShortUrlVisit::select('browser', DB::raw('count(*) as total'))
        ->groupBy('browser')
        ->whereRelation('shortUrl','user_id',$userId)
        ->orderByDesc('total')
        ->take(3)
        ->get();
        
        $TopDevice = ShortUrlVisit::select('device_type', DB::raw('count(*) as total'))
        ->groupBy('device_type')
        ->whereRelation('shortUrl','user_id',$userId)
        ->orderByDesc('total')
        ->take(3)
        ->get();

        $TopReferer = ShortUrlVisit::select('referer_url', DB::raw('count(*) as total'))
        ->groupBy('referer_url')
        ->whereRelation('shortUrl','user_id',$userId)
        ->orderByDesc('total')
        ->take(3)
        ->get();

        $TopIpAdress = ShortUrlVisit::select('ip_address', DB::raw('count(*) as total'))
        ->groupBy('ip_address')
        ->whereRelation('shortUrl','user_id',$userId)
        ->orderByDesc('total')
        ->take(3)
        ->get();

        if ($user) {
            $subscribe = $user->subscribe;

            if ($subscribe == 'free') {
                $urlStatus = '15';
                $micrositeStatus = '3';
            } elseif ($subscribe == 'silver') {
                $urlStatus = '25';
                $micrositeStatus = '5';
            } elseif ($subscribe == 'gold') {
                $urlStatus = '35';
                $micrositeStatus = '10';
            } elseif ($subscribe == 'platinum') {
                $urlStatus = '9999999';
                $micrositeStatus = '9999999';
            } else {
                $urlStatus = 'Status tidak valid';
                $micrositeStatus = 'Status tidak valid';
            }
        }

        if ($user) {
            $userId = $user->id;
            $subscriptionPeriod = $user->subscribe;

            switch ($subscriptionPeriod) {
                case 'silver':
                    $resetDate = Carbon::now()->addWeek()->startOfWeek();
                    break;
                case 'gold':
                    $subscriptionStartDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->subscription_start_date);
                    $resetDate = $subscriptionStartDate->addMonth()->format('d-m-Y');
                    $formatedDateSubscription = $subscriptionStartDate->format('d-M-Y');
                    break;
                case 'platinum':
                    $subscriptionStartDate = Carbon::createFromFormat('Y-m-d H:i:s', $user->subscription_start_date);
                    $resetDate = $subscriptionStartDate->addYear()->format('d-m-Y');;
                    $formatedDateSubscription = $subscriptionStartDate->format('d-M-Y');
                    break;
                case 'free':
                    $resetDate = Carbon::now()->addMonthNoOverflow()->startOfMonth();
                    $formatedDateSubscription = $resetDate->format('d-M-Y');
                    break;
                default:
                    $resetDate = 'tidak valid';
                    break;
            }

            $totalUrl = ShortURL::where('user_id', $userId)
                ->whereNull('microsite_uuid')
                ->whereDate('created_at', '<=', $resetDate)
                ->count();

            $countHistory = History::where('user_id', $userId)
                ->whereDate('created_at', '<=', $resetDate)
                ->count();
            $countURL = $totalUrl + $countHistory;
        }
        if ($user) {
            $userId = $user->id;
            $countMicrosite = ShortURL::where('user_id', $userId)
                ->whereNotNull('microsite_uuid')
                ->orderBy('created_at', 'asc')
                ->limit(3)
                ->whereDate('created_at', '<=', $resetDate)
                ->count();
        }

        $dataLink = SHortURL::all();

        $totalVisits = ShortURLVisit::whereHas('shortURL', function ($query) use ($userId, $currentMonth) {
            $query->where('user_id', $userId)
                ->where('microsite_uuid', null)
                ->where('archive', '!=', 'yes')
                ->whereDate('created_at', '>=', $currentMonth);
        })->count();

        $totalVisitsMicrosite = ShortURLVisit::whereHas('shortURL', function ($query) use ($userId, $currentMonth) {
            $query->where('user_id', $userId)
                ->where('microsite_uuid', '!=', null)
                ->whereDate('created_at', '>=', $currentMonth);
        })->count();

        $user = User::where('email', '!=', 'admin@gmail.com')->get();
        $count = [];
        foreach ($user as $user) {
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
        return view('User.AnalyticUser', compact('urlStatus', 'micrositeStatus', 'totalVisits', 'countURL', 'count', 'user', 'links', 'dataLink', 'countMicrosite', 'qr', 'microsites', 'totalVisitsMicrosite', 'TopBrowser', 'TopDevice', 'TopReferer', 'TopIpAdress'));
    }

    //data test
    // public function analyticUser()
    // {
    //     $user = Auth::user()->id;

    //     $links = ShortUrl::withCount([
    //         'visits AS totalVisits' => function ($query) use ($user) {
    //             $query->whereHas('shortURL', function ($query) use ($user) {
    //                 $query->where('user_id', $user);
    //             });
    //         }
    //     ])
    //     ->whereNull('microsite_uuid')
    //     ->where('user_id', $user)
    //     ->orderBy('totalVisits', 'desc')
    //     ->take(3)
    //     ->get();

    //     $microsites = ShortUrl::withCount([
    //         'visits AS totalVisits' => function ($query) use ($user) {
    //             $query->whereHas('shortUrl', function ($query) use ($user) {
    //                 $query->where('user_id', $user);
    //             });
    //         }
    //     ])
    //     ->whereNotNull('microsite_uuid')
    //     ->where('user_id', $user)
    //     ->orderBy('totalVisits', 'desc')
    //     ->take(3)
    //     ->get();

    //     $countURL = ShortURL::where('user_id', $user)
    //                         ->whereNull('microsite_uuid')
    //                         ->count();
    //     $countMicrosite = ShortUrl::where('user_id', $user)
    //                         ->whereNotNull('microsite_uuid')
    //                         ->count();

    //     $dataLink = SHortURL::all();

    //     $totalVisits = ShortURLVisit::query()
    //     ->whereHas('shortURL', function ($query) use ($user) {
    //         $query->where('user_id', $user)
    //             ->where('archive', '!=', 'yes')
    //             ->where(function ($query) {
    //                 $query->whereNull('microsite_uuid')
    //                     ->orWhere('microsite_uuid', '=', '');
    //             });
    //     })
    //     ->count();

    //     $totalVisitsMicrosite = ShortURLVisit::query()
    //     ->whereRelation('shortURL', 'user_id', '=', $user)
    //     ->whereRelation('shortURL', 'microsite_uuid', '!=', null)
    //     ->whereRelation('shortURL', 'archive', '!=', 'yes')
    //     ->count();

    //     $users = User::where('email', '!=', 'admin@gmail.com')->get();
    //     $count = [];
    //     foreach ($users as $user) {
    //         $count[$user->id] = ShortUrl::where('user_id', $user->id)->count();
    //     }
    //     arsort($count);
    //     $qr = ShortUrl::get()->sum('qr_code');
    //     return view('User.AnalyticUser', compact('totalVisits','countURL','count','users','links', 'dataLink', 'countMicrosite', 'qr', 'microsites', 'totalVisitsMicrosite'));
    // }

    public function quotaData()
    {
        $user = Auth::user()->id;

        $countURL = ShortUrl::where('user_id', $user)
            ->whereNull('microsite_uuid')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();
        $countMicrosite = ShortUrl::where('user_id', $user)
            ->whereNotNull('microsite_uuid')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        return response()->json([
            'countURL' => $countURL,
            'countMicrosite' => $countMicrosite,
        ]);
    }
}
