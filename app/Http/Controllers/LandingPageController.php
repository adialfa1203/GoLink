<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\ShortUrl;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class LandingPageController extends Controller
{
    public function landingPage(){
        $user = Auth::user();
        $currentMonth = Carbon::now()->month;
        $data = Footer::first();
        $url = ShortUrl::whereNotNull('default_short_url')->count();
        $micrositeuuid = ShortUrl::whereNotNull('microsite_uuid')->count();
            $totalVisits = ShortURLVisit::query()
            ->whereRelation('shortURL', 'microsite_uuid', null)
            ->count();
        return view('Landingpage.Home',compact('data','url','micrositeuuid','totalVisits',));
    }
    public function shortLink(){
        $data = Footer::first();
        return view('Landingpage.Shortlink', compact('data'));
    }
    public function micrositePage(){
        $data = Footer::first();
        return view('Landingpage.Microsite', compact('data'));
    }
    public function subscribePage(){
        $data = Footer::first();
        return view('Landingpage.Subscribe', compact('data'));
    }
    public function privacyPage(){
        $data = Footer::first();
        return view('HelpSupport.Privacy', compact('data'));
    }

}
