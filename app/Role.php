<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends UuidModel
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
