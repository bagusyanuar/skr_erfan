<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
