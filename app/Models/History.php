<?php

namespace App\Models;

// app/Models/History.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = [
        'user_id',
        'title',
        'destination_url',
        'default_short_url',
        'activated_at',
        'deactivated_at',
    ];

    public static function addToHistory($data)
    {
        self::create($data);
    }
}