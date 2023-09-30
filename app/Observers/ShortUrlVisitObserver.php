<?php

namespace App\Observers;

use AshAllenDesign\ShortURL\Models\ShortURLVisit;

class ShortUrlVisitObserver
{
    /**
     * Handle the ShortURLVisit "created" event.
     */
    public function creating(ShortURLVisit $shortURLVisit): void
    {
        $shortURLVisit->user_id = auth()->id();
    }

}
