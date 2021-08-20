<?php

namespace App\Http\Controllers\Master;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
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
        return view('admin.master.Users.index');
    }

}
