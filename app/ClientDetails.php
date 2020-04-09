<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetails extends UuidModel
{
    protected $fillable = [
            'date_of_Birth' ,
            'address' ,
            'motorized',
            'points',
            'phone',

    ];


    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
