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

    protected $keyType = 'string';
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        });
    }
    public function button():BelongsTo
    {
        return $this->belongsTo(Button::class, 'buttons_uuid', 'id');
    }

}
