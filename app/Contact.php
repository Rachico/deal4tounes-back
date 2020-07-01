<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends UuidModel
{
    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
    ];

}
