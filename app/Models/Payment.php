<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
   protected $fillable = [
        'booking_id', 'method', 'status', 'totalPrice', 'paymentDate'
    ];

    public function booking(){
        return $this->belongsTo('App\Models\Booking');
    }
}
