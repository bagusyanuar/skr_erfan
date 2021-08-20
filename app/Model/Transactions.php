<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    //

    public function cart(){
        return $this->hasMany(Cart::class);
    }

//    public function user()
//    {
//        return $this->hasOneThrough(User::class, Cart::class, 'user_id', 'id');
//    }

}
