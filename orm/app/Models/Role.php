<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function privent()
    {
        return $this->hasOne(User::class); 
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
