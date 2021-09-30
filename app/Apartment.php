<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{

    // Join table users
    public function user(){
        return $this->belongsTo('App\User');
    }

    // Join table services
    public function services(){
        return $this->belongsToMany('App\Service');
    }

    // Join table messages
    public function messages(){
        return $this->hasMany('App\Message');
    }

    // Join table statistics
    public function statistics(){
        return $this->hasMany('App\Statistic');
    }
    
}
