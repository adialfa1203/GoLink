<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'subscribe_id', 'reference', 'expired', 'amount', 'fee_amount', 'payment_method', 'status'];
    public function subscribe()
    {
        return $this->belongsTo(Subscribe::class, 'subscribe_id');
    }
}
