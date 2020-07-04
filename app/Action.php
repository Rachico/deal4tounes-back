<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    //
    protected $fillable = [
        'title',
       
        'body',

        'address',
         
        'User_id',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->belongsTo(User::class);
    }
    public function getId()
    {
      return $this->id;
    }

}
