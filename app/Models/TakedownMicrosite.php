<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakedownMicrosite extends Model
{
    use HasFactory;

    protected $table = "takedown_microsites";
    protected $fillable = [
        'id_microsite',
        'components_uuid',
        'user_id',
        'name',
        'link_microsite',
        'image',
        'name_microsite',
        'description',
        'company_name',
        'company_address',
        'qr_code'
    ];
}
