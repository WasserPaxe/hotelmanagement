<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'number', 'floor', 'description', 'categorie_id', 'status',
    ];

    protected $casts = [
    'conditions' => 'array',
];

    public function categorie(){
        return $this->belongsTo('App\Models\Categorie');
    }

    public function booking(){
        return $this->hasMany('App\Models\Booking');
    }
}
