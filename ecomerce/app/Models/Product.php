<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $guarded = [];
 

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function productImage(){
        return $this ->hasMany(ProductImage::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}