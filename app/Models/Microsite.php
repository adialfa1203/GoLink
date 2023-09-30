<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Microsite extends Model
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

    public function social(): HasMany
    {
        return $this->hasMany(Social::class);
    }

    public function component(): BelongsTo
    {
        return $this->belongsTo(Components::class, 'components_uuid', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function shortUrl()
    {
        return $this->hasMany(ShortUrl::class, 'microsite_uuid', 'id');
    }
    public function oneShortUrl(): HasOne
    {
        return $this->hasOne(ShortUrl::class, 'microsite_uuid', 'id');
    }
}
