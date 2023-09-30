<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Button;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Social extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function button():BelongsTo
    {
        return $this->belongsTo(Button::class, 'buttons_uuid', 'id');
    }

}
