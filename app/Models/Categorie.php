<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function room(){
        return $this->hasMany('App\Models\Room');
    }
}
