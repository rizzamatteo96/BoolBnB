<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment_Sponsorship extends Model
{
    // add table connection
    protected $table = 'apartment_sponsorship';

    // define fillable data in DB
    protected $fillable = [
        'apartment_id',
        'sponsorship_id',
        'start_date',
        'end_date'
    ];
}
