<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Typespace extends Model
{
    protected $fillable = [
        'name',
    ];

    public function space(){
        return $this->hasMany('App\Models\Space');
    }
}
