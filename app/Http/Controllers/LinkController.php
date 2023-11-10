<?php

namespace App\Http\Controllers;

use App\Helpers\DateHelper;
use App\Models\History;
use App\Models\HistoryVisits;
use App\Models\ShortUrl;
use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;

class LinkController extends Controller
{

    public function showLink($shortCode)
    {
        $user = auth()->user();
        $user_id = $user->id;

        $this->deleteDeactive();

        $urlshort = ShortUrl::withCount('visits')
            ->where('user_id', $user_id)
            ->whereNull('microsite_uuid')
            ->orderBy('created_at', 'desc')
            ->paginate(10, ['*'], 'page_urlshort');

        $history = History::where('user_id', $user_id)->paginate(10, ['*'], 'page-history');
        $result = [
            'labels' => DateHelper::getAllMonths(5),
            'series' => [],
        ];
        $startDate = DateHelper::getSomeMonthsAgoFromNow(5)->format('Y-m-d H:i:s');
        $endDate = DateHelper::getCurrentTimestamp('Y-m-d H:i:s');

        $template = [0, 0, 0, 0, 0];

        foreach ($urlshort as $i => $data) {
            $parse = Carbon::parse($data->created_at);
            $date = $parse->shortMonthName . ' ' . $parse->year;
            $index = array_search($date, array_values($result['labels']));
            $visits = $template;
            $visits[4] = (int) $data->visits_count;
            $result['series'][$i] = $visits;
        }

        return view('User.link', compact('user', 'urlshort', 'shortCode', 'result', 'history'));
    }

    public function deleteDeactive()
    {
        $now = Carbon::now();

        $shortURL = ShortUrl::where('deactivated_at', '<=', $now)->get();
        $shortUrlVisits = ShortURLVisit::with('ShortUrl')
        ->whereHas('ShortUrl', function ($query) use ($now) {
            $query->where('deactivated_at', '<=', $now);
        })
        ->get();

        foreach ($shortURL as $entry) {
            History::create([
                'user_id' => $entry->user_id,
                'title' => $entry->title,
                'destination_url' => $entry->destination_url,
                'default_short_url' => $entry->default_short_url,
                'activated_at' => $entry->activated_at,
                'deactivated_at' => $entry->deactivated_at,
            ]);

            $entry->delete();
        }

        foreach ($shortUrlVisits as $entry) {
            HistoryVisits::create([
                'user_id' => $entry->ShortUrl->user_id,
                'short_url_id' => $entry->short_url_id,
                'ip_address' => $entry->ip_address,
                'operating_system' => $entry->operating_system,
                'operating_system_version' => $entry->operating_system_version,
                'browser' => $entry->browser,
                'browser_version' => $entry->browser_version,
                'visited_at' => $entry->visited_at,
            ]);

            $entry->delete();
        }

        return response()->json(['message' => 'Tautan yang telah berakhir telah dihapus dan ditambahkan ke dalam riwayat.']);
    }

    public function updateDeactivated(HttpRequest $request, $keyTime)
    {
        $updateUrl = ShortUrl::where('url_key', $keyTime);

        if (!$updateUrl->exists()) {
            return response()->json(['error' => 'Short link not found'], 404);
        }

        $updateUrl->update([
            'deactivated_at' => $request->newTime,
        ]);
        return response()->json(['message' => 'Deactivation status updated successfully']);
    }

    public function updateDestination(HttpRequest $request, $keyUrl)
    {
        $updateUrl = ShortUrl::where('url_key', $keyUrl);

        if (!$updateUrl->exists()) {
            return response()->json(['error' => 'Short link not found'], 404);
        }

        $updateUrl->update([
            'destination_url' => $request->newDestination,
        ]);
        return response()->json(['message' => 'Destination url status updated successfully']);
    }

    public function LinkUsersChart(Request $request)
    {
        $urlKey = $request->id;

        $shortURL = ShortURL::where('url_key', $urlKey)->first();

        if (!$shortURL) {

            return response()->json(['message' => 'Link not found'], 404);
        }

        $startDate = Carbon::now()->subDays(7);

        $totalVisits = ShortURLVisit::query()
            ->where('short_url_id', $shortURL->id)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as totalVisits')
            ->where('created_at', '>=', $startDate)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json(compact('startDate', 'urlKey', 'totalVisits'));
    }
}
