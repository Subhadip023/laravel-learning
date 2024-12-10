<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['name'];

    public function user(){
    return $this->belongsTo(related: User::class);
    }

}


