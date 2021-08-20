<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    //
    protected $fillable = [
        'user_id', 'name', 'date_of_birth', 'address', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
