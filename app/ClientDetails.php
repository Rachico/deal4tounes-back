<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientDetails extends UuidModel
{
    protected $fillable = [
            'date_of_birth',
            'address' ,
            'points',
            'phone',
            'city',
            'zip_code',

    ];


    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
