<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\History;
use App\Models\HistoryVisits;
use App\Models\ShortUrl;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class LandingPageController extends Controller
{
    public function landingPage()
    {
        $tripay = new TripayController();
        $channels = $tripay->getPaymentChannels();

        $user = Auth::user();
        $currentMonth = Carbon::now()->month;
        $data = Footer::first();
        $countUrl = ShortUrl::whereNotNull('default_short_url')->count();
        $countHistory = History::count();
        $url = $countUrl + $countHistory;
        $micrositeuuid = ShortUrl::whereNotNull('microsite_uuid')->count();
        $countVisits = ShortURLVisit::query()
            ->whereRelation('shortURL', 'microsite_uuid', null)
            ->count();
        $countHistoryVisits = HistoryVisits::count();
        $totalVisits = $countUrl + $countHistory;
        // dd($channels);
        return view('Landingpage.Home', compact('tripay', 'channels', 'data', 'url', 'micrositeuuid', 'totalVisits',));
    }
    public function shortLink()
    {
        $data = Footer::first();
        return view('Landingpage.Shortlink', compact('data'));
    }
    public function micrositePage()
    {
        $data = Footer::first();
        return view('Landingpage.Microsite', compact('data'));
    }
    public function subscribePage()
    {
        $data = Footer::first();
        return view('Landingpage.Subscribe', compact('data'));
    }
    public function privacyPage()
    {
        $data = Footer::first();
        return view('HelpSupport.Privacy', compact('data'));
    }
}
