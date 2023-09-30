<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $table = "links";
    protected $fillable = ['original_url', 'short_code', 'creation_date', 'expiration_date', 'click_count', 'user_id', 'qr_code', 'active', 'password', 'deleted_add'];
    
}
