<?php

namespace App\Http\Controllers\Auth;

use App\Helper\CustomController;
use App\Model\UserProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends CustomController
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->model = User::class;
        $this->validationRules = [
            'username' => 'required|string|min:6|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|same:password-confirm',
        ];
        $this->validationMessage = [
            'min' => 'Field Minimal :min Karakter',
            'username.unique' => 'Username Sudah Terpakai',
            'email.unique' => 'Email Sudah Terpakai',
            'password.same' => 'Password Tidak Cocok'
        ];
    }

    //SHOW LOGIN PAGE
    public function pageLogin()
    {
        return view('shop.login');
    }
    public function pageLoginAdmin()
    {
        return view('login.login');
    }

    //SHOW REGISTER PAGE
    public function pageRegister()
    {
        return view('shop.register');
    }

    //REGISTER NEW MEMBER
    public function register(Request $request)
    {
        $user_data = [
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => 'member'
        ];

        /** @var User $users */
        $users = $this->insert(User::class, $user_data);
        $user_profiles_data = [
            'user_id' => $users->id,
            'name' => $request['name'],
            'date_of_birth' => $request['dob'],
            'address' => $request['address'],
            'phone' => $request['phone'],
        ];
        $this->insert(UserProfile::class, $user_profiles_data);
        Auth::loginUsingId($users->id);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];
        if ($this->isAuth($credentials)) {
            $roles = Auth::user()->roles;
            if ($roles !== 'member') {
                return redirect('/admin');
            }
            return redirect('/');
        }
        return redirect()->back()->withInput()->with('failed', 'Periksa Kembali Username dan Password Anda');
    }

    public function loginAdmin(Request $request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];
        if ($this->isAuth($credentials)) {
                return redirect('/admin');
        }
        return redirect()->back()->withInput()->with('failed', 'Periksa Kembali Username dan Password Anda');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
