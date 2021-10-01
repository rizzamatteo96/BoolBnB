<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    // add table connection
    protected $table = 'statistics';

    // define fillable data in DB
    protected $fillable = [
        'apartment_id',
        'clicked_at',
        'visitor'
    ];

    // Join table apartment
    public function apartment(){
        return $this->belongsTo('App\Apartment');
    }
}
