<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    // Join table apartment
    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }
}
