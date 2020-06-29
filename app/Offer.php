<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends UuidModel
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
        
    ];
    
}
