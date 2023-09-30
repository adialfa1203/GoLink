<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use AshAllenDesign\ShortURL\Events\ShortURLVisited;
use App\Models\Link;

class IncrementClickCount
{
    public function __construct()
    {
        //
    }

    public function handle(ShortURLVisited $event)
    {
        // Dapatkan objek Link berdasarkan short code.
        $shortCode = $event->shortCode;
        $link = Link::where('short_code', $shortCode)->first();

        if ($link) {
            // Increment click count.
            $link->click_count++;
            $link->save();
        }
    }
}

