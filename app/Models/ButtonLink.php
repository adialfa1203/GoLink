<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ButtonLink extends Model
{
    use HasFactory;

    protected $fillable = ['microsite_uuid', 'button_id', 'button_link'];
    public function button()
{
    return $this->belongsTo(Button::class, 'buttons_uuid', 'id');
}

}
