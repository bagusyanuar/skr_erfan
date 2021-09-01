<?php

namespace App\Http\Controllers\Master;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Promo;
use App\Model\UserProfile;
use Illuminate\Http\Request;

class UsersControllers extends CustomController
{
    //

    /**
     * UsersControllers constructor.
     */
    public function __construct()
    {
    }

    public function index(){
        $members = UserProfile::with(['user'])->get();
        $promo = Promo::where('active', '=', 1)->get();
        return view('admin.master.Member.index')->with(['members' => $members, 'promo' => $promo]);
    }



}
