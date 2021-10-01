<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // add table connection
    protected $table = 'apartments';

    // define fillable data in DB
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'n_rooms',
        'n_beds',
        'n_bathrooms',
        'n_square_meters',
        'image',
        'visibility',
        'daily_price',
        'city',
        'address',
        'house_num',
        'postal_code',
        'latitude',
        'longitude'
    ];

    // Join table users
    public function user(){
        return $this->belongsTo('App\User');
    }

    // Join table services
    public function services(){
        return $this->belongsToMany('App\Service');
    }
    
    // Join table sponsorships
    public function sponsorships(){
        return $this->belongsToMany('App\Sponsorship');
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
