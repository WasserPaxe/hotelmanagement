<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Space extends Model
{

    protected $fillable = [
        'name', 'conditions', 'capacity', 'conditions', '' 
    ];

    public function typespace(){
        return $this->belongsTo('App\Models\Typespace');
    }
}
