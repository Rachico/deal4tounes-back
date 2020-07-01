<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        
       
        'text',
        
      'action_id', 
        'User_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function action(){
        return $this->belongsTo(Action::class);
    }
}
