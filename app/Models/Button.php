<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Button extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_button',
        'icon',
        'color_hex',
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

    public function socials() :HasMany
    {
        return $this->hasMany(Social::class,'buttons_uuid', 'id');
    }
    public function buttonLinks(): HasMany
    {
        return $this->hasMany(ButtonLinks::class, 'buttons_uuid', 'id');
    }

}
