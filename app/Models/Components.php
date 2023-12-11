<?php

namespace App\Models;

use AshAllenDesign\ShortURL\Models\ShortURL;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Components extends Model
{
    use HasFactory;
    protected $fillable = [
        'component_name',
        'cover_img',
        'premium',
    ];

    protected $casts = [
        'premium' => 'boolean',
    ];

    protected $keyType = 'string';
    public $incrementing = false;
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = \Ramsey\Uuid\Uuid::uuid4()->toString();
        });
    }

    public function button()
    {
        return $this->belongsTo(Button::class);
    }
    public function microsite()
    {
        return $this->hasMany(Microsite::class);
    }
    public function urlshort()
    {
        return $this->hasMany(ShortURL::class);
    }
}
