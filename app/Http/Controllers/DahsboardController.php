<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Footer;
use App\Models\History;
use App\Models\ShortUrl;
use App\Models\Subscribe;
use App\Models\User;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DahsboardController extends Controller
{
    public function getChartData()
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

    public function dashboardUser()
    {
        $user = Auth::user();
        $subscribe = Subscribe::all();
        $currentMonth = Carbon::now()->month;

        if ($user) {
            $subscribe = $user->subscribe;

            switch ($subscribe) {
                case 'free':
                    $urlStatus = '15';
                    $micrositeStatus = '3';
                    break;
                case 'silver':
                    $urlStatus = '25';
                    $micrositeStatus = '5';
                    break;
                case 'gold':
                    $urlStatus = '35';
                    $micrositeStatus = '10';
                    break;
                case 'platinum':
                    $urlStatus = 'Unlimited';
                    $micrositeStatus = 'Unlimited';
                    break;
                default:
                    $urlStatus = 'Status tidak valid';
                    $micrositeStatus = 'Status tidak valid';
                    break;
            }

            $userId = $user->id;
            $currentMonth = now()->startOfMonth();

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
                    $subscriptionStartDate = Carbon::createFromFormat('Y-m-d', $user->subscription_start_date);
                    $resetDate = $subscriptionStartDate->addYear();
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

            $countMicrosite = ShortURL::where('user_id', $userId)
                ->whereNotNull('microsite_uuid')
                ->whereDate('created_at', '<=', $resetDate)
                ->count();

            $countNameChanged = ShortURL::where('user_id', $userId)
                ->where('custom_name', 'yes')
                ->whereNull('microsite_uuid')
                ->count();

            $qr = ShortURL::where('user_id', $user->id)->sum('qr_code');
            return view('User.DashboardUser', compact('urlStatus', 'micrositeStatus', 'countURL', 'totalVisits', 'countNameChanged', 'totalVisitsMicrosite', 'qr', 'countMicrosite', 'user', 'resetDate','formatedDateSubscription'));
        }

        return redirect()->back()->with('error', 'User tidak valid.');
    }


    public function HelpSupport()
    {
        $komentar = Comment::orderBy('created_at', 'desc')
            ->with('user')
            ->get();
        $data = Footer::first();
        // $user = User::all();
        $users = Auth::user();
        $userId = User::all();
        // dd($komentar);
        return view('HelpSupport.HelpSupport', compact('komentar', 'users', 'userId', 'data'));
    }
    public function Start()
    {
        $data = Footer::first();
        return view('HelpSupport.Start', compact('data'));
    }
    public function Announcement()
    {
        $data = Footer::first();
        return view('HelpSupport.Announcement', compact('data'));
    }
    public function Account()
    {
        $data = Footer::first();
        return view('HelpSupport.Account', compact('data'));
    }
    public function BillingSubscriptions()
    {
        $data = Footer::first();
        return view('HelpSupport.BillingSubscriptions', compact('data'));
    }
    public function PlatformMicrosite()
    {
        $data = Footer::first();
        return view('HelpSupport.PlatformMicrosite', compact('data'));
    }
    public function ShortLink()
    {
        $data = Footer::first();
        return view('HelpSupport.ShortLink', compact('data'));
    }
    public function home()
    {
        $data = Footer::first();
        $komentar = Comment::orderBy('created_at', 'desc')->get();
        $url = ShortUrl::whereNotNull('default_short_url')->count();
        $micrositeuuid = ShortUrl::whereNotNull('microsite_uuid')->count();
        // $user = User::all();
        $users = Auth::user();
        $userId = User::all();
        dd($url);
        return view('Landingpage.Home', compact('komentar', 'users', 'userId', 'data', 'url', 'micrositeuuid'));
    }
}