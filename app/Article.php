<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  
    protected $fillable = [
        'title',
        'subheader',
        'Typography',
        'TypographyParagraph',
        'moreIcon',
        'User_id',
    ];



    public function user(){
        return $this->belongsTo(User::class);
    }
    public function likes(){
        return $this->belongsTo(User::class);
    }
}
