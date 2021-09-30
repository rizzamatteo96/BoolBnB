<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // Join table apartments
    public function apartments(){
        return $this->belongsToMany('App\Apartment');
    }
}
