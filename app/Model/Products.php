<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'product_id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
