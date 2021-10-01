<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // add table connection
    protected $table = 'messages';

    // define fillable data in DB
    protected $fillable = [
        'apartment_id',
        'email',
        'description'
    ];

    // Join table apartment
    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }
}
