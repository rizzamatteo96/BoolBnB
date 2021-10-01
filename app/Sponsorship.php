<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    // add table connection
    protected $table = 'sponsorships';

    // define fillable data in DB
    protected $fillable = [
        'type',
        'price',
        'duration'
    ];

    // Join table apartments
    public function apartments(){
        return $this->belongsToMany('App\Apartment');
    }
}
