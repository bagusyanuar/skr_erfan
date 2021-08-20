<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public function transaction()
    {
        return $this->belongsTo(Transactions::class, 'transactions_id', 'id');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendors::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
