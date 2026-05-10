<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    protected $fillable = [
        'name', 'price',
    ];

    public function booking(){
        return $this->belongsToMany('App\Models\Booking');
    }
}
