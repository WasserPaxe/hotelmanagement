<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'image','name', 'number', 'floor', 'description', 'categorie_id', 'status','price', 'bed', 'meal', 'phone'
    ];

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie');
    }

    public function booking(){
        return $this->hasMany('App\Models\Booking');
    }
}
