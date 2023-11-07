<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryVisits extends Model
{
    use HasFactory;

    protected $table = 'history_visits';
    
    protected $fillable = [
        'short_url_id',
        'user_id',
        'ip_address',
        'operating_system',
        'operating_system_version',
        'browser',
        'browser_version',
        'visited_at',
    ];
}
