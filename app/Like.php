<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'Article_id',
        'User_id',
        'Like',
    ];
 
 
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function article(){
        return $this->belongsTo(Article::class);
    }
}
