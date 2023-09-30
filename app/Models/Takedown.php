<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Takedown extends Model
{
    use HasFactory;

    protected $table = 'takedown';

    protected $fillable = [
        'deactivated_at',
        'activated_at',
        'track_device_type',
        'track_referer_url',
        'track_browser_version',
        'track_browser',
        'track_operating_system_version',
        'track_operating_system',
        'track_ip_address',
        'redirect_status_code',
        'track_visits',
        'archive',
        'click_count',
        'single_use',
        'default_short_url',
        'deleted_add',
        'qr_code',
        'password',
        'title',
        'custom_name',
        'microsite_uuid',
        'user_id',
        'url_key',
        'destination_url'];
}
