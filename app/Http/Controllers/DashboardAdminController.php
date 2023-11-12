<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Footer;
use App\Models\ShortUrl;
use App\Helpers\DateHelper;
use App\Models\History;
use App\Models\HistoryVisits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Illuminate\Support\Facades\Auth;

class DashboardAdminController extends Controller
{
    public function dashboardChart()
    {
        $startDate = DateHelper::getSomeMonthsAgoFromNow(5)->format('Y-m-d H:i:s');
        $endDate = DateHelper::getCurrentTimestamp('Y-m-d H:i:s');

        $totalUser = User::where('created_at', '>=', $startDate)
            ->where('email', '!=', 'admin@gmail.com')
            ->selectRaw('DATE(created_at) as date, COUNT(*) as totalUser')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $totalUrl = ShortUrl::where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as totalUrl')
            ->where('archive', '!=', 'yes')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $countHistory = History::count();
            

        $totalVisits = ShortURLVisit::where('created_at', '>=', $startDate)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as totalVisits')
            ->whereRelation('shortURL', 'archive', '!=', 'yes')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $historyVisits = HistoryVisits::count();

        $result = [
            'labels' => DateHelper::getAllMonths(5),
            'series' => [
                'totalUser' => [],
                'totalUrl' => [],
                'totalVisits' => []
            ]
        ];

        foreach ($result['labels'] as $label) {
            $result['series']['totalUser'][] = 0;
            $result['series']['totalUrl'][] = 0;
            $result['series']['totalVisits'][] = 0;
        }

        foreach ($totalUser as $dataUser) {
            $parse = Carbon::parse($dataUser->date);
            $date = $parse->shortMonthName . ' ' . $parse->year;
            $index = array_search($date, $result['labels']);
            $result['series']['totalUser'][$index] = (int)$dataUser->totalUser;
        }
        
        $countURL = 0;

        foreach ($totalUrl as $dataUrl) {
            $parse = Carbon::parse($dataUrl->date);
            $date = $parse->shortMonthName . ' ' . $parse->year;
            $index = array_search($date, $result['labels']);
            $result['series']['totalUrl'][$index] = (int)$dataUrl->totalUrl;
            $countURL += $dataUrl->totalUrl;
        }
        $countURL += $countHistory;

        $totalCountVisits = 0;
        

        foreach ($totalVisits as $dataVisits) {
            $parse = Carbon::parse($dataVisits->date);
            $date = $parse->shortMonthName . ' ' . $parse->year;
            $index = array_search($date, $result['labels']);
            $result['series']['totalVisits'][$index] = (int)$dataVisits->totalVisits;
            $totalCountVisits += $dataVisits->totalVisits;
        }
        $totalCountVisits += $historyVisits;

        return response()->json(compact('startDate', 'result'));
    }


    public function dashboardAdmin()
    {
        $totalUser = User::where('email', '!=', 'admin@gmail.com')
            ->where('is_banned', '!=', '1')
            ->count();
        $totalUrl = ShortUrl::where('archive', '!=', 'yes')->count();
        $countHistory = History::count();
        $countURL = $totalUrl + $countHistory;
        $totalVisits = ShortURLVisit::query()
            ->whereRelation('shortURL', 'archive', '!=', 'yes')
            ->count();
        $historyVisits = HistoryVisits::count();
        $totalCountVisits = $totalVisits + $historyVisits;
        $berlanggan = User::where('subscribe', '!=', 'free')->count();
        // dd($totalUser);
        return view('Admin.index', compact('berlanggan', 'totalUser', 'totalUrl', 'totalVisits', 'totalCountVisits', 'countURL'));
    }

    public function viewFooter()
    {
        $data = Footer::first();
        return view('Admin.Footer', compact('data'));
    }

    public function editFooter(Request $request)
    {
        $footer = Footer::first();
        $validator = Validator::make($request->all(), [
            'description' => 'nullable|string|max:225',
            'whatsapp' => [
                'nullable',
                'string',
                'regex:/^\+62[0-9]*$/',
                'min:13',
                'max:18',
            ],
            'instagram' => [
                'nullable',
                'string',
                'not_regex:/https?:\/\/(www\.)?instagram\.com/',
            ],
            'twitter' => [
                'nullable',
                'string',
                'not_regex:/https?:\/\/(www\.)?twitter\.com/',
            ],
        ], [
            'whatsapp.regex' => 'Format nomor WhatsApp tidak valid. Pastikan dimulai dengan +62 dan hanya mengandung angka.',
            'whatsapp.min' => 'Nomor WhatsApp tidak boleh kurang dari 13 karakter.',
            'whatsapp.max' => 'Nomor WhatsApp tidak boleh lebih dari 18 karakter.',
            'description.max' => 'Deskripsi tidak boleh lebih dari 225 karakter.',
            'instagram.not_regex' => 'Kolom Instagram wajib diisi dengan username dan tidak boleh berupa URL atau link.',
            'twitter.not_regex' => 'Kolom Twitter wajib diisi dengan username dan tidak boleh berupa URL atau link.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        // if ($request->hasFile('logo')) {
        //     $oldProfilePicture = $footer->logo;
        //     if ($oldProfilePicture) {
        //         $oldProfilePath = public_path('logos/' . $oldProfilePicture);
        //         if (file_exists($oldProfilePath)) {
        //             unlink($oldProfilePath);
        //         }
        //     }

        //     $oldProfilePicture = $request->file('logo')->move(public_path('logos'), $footer->id . '.jpg');
        //     $footer->logo = 'logos/' . $footer->id . '.jpg';
        // }

        $footer->description = $request->description;
        $footer->whatsapp = $request->whatsapp;
        $footer->instagram = $request->instagram;
        $footer->twitter = $request->twitter;
        $footer->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
}
