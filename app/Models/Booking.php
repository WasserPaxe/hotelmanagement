<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'status', 'checkin', 'checkout', 'description', 'customer_id', 'room_id'
    ];

    public function customer(){
        return $this->belongsTo('App\Models\Customer');
    }

    public function room(){
        return $this->belongsTo('App\Models\Room');
    }

    
    public function payments(){
        return $this->hasMany('App\Models\Booking');
    }
}
