<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // Join table apartment
    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }
}
