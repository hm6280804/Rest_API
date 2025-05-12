<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function Products(){
        // return $this->hasOne(Order::class)->oldestOfMany();
        // return $this->hasMany(Order::class);
        return $this->hasManyThrough(Product::class, Order::class);
    }
}
