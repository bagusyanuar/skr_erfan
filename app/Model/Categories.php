<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //

    public function products()
    {
        return $this->hasMany(Products::class);
    }
}
