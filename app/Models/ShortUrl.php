<?php

namespace App\Models;

use AshAllenDesign\ShortURL\Models\ShortURLVisit;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShortUrl extends Model
{
    use HasFactory;

    protected $table = "short_urls";
    protected $fillable = ['destination_url','url_key','user_id','password','qr_code','deleted_add','default_short_url','activated_at','deactivated_at','click_count','archive','title','archived_at', 'custom_name'];
    public $timestamps = true;

    public function shortUrls()
    {
        return $this->hasMany(ShortUrl::class, 'microsite_uuid', 'id');
    }

    public function visits()
    {
        return $this->hasMany(ShortURLVisit::class, 'short_url_id');
    }

    public function TopBrowser()
    {
        return $this->hasMany(ShortURLVisit::class, 'browser');
    }

    public function TopDevice()
    {
        return $this->hasMany(ShortURLVisit::class, 'device_type');
    }

    public function TopReferer()
    {
        return $this->hasMany(ShortURLVisit::class, 'referer_url');
    }

    public function TopIpAdress()
    {
        return $this->hasMany(ShortURLVisit::class, 'ip_address');
    }

    public function countVisits()
    {
        return $this->hasMany(ShortURLVisit::class);
    }

    public function microsite(): BelongsTo
    {
        return $this->belongsTo(Microsite::class);
    }
    public function component(): BelongsTo
    {
        return $this->BelongsTo(Components::class, 'components_uuid', 'id')->withTrashed();
    }
}
