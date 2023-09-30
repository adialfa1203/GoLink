<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicrositePages extends Model
{
    use HasFactory;
    public function MicrositePages()
    {
        return $this->hasMany(ShortUrl::class, 'microsite_uuid', 'id');
    }
}
