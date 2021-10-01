<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // add table connection
    protected $table = 'services';

    // define fillable data in DB
    protected $fillable = [
        'name',
        'slug'
    ];

    // Join table apartments
    public function apartments(){
        return $this->belongsToMany('App\Apartment');
    }
}
