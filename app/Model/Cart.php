<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transactions::class, 'transactions_id');
    }
}
