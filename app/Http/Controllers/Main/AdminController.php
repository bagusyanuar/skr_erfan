<?php

namespace App\Http\Controllers\Main;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends CustomController
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $admins = Admin::with(['user'])->get();
        return view('admin.master.Users.index')->with(['admins' => $admins]);
    }

    public function addForm()
    {
        return view('admin.master.Users.add');
    }

    public function editForm($id)
    {
        $admins = Admin::with(['user'])->where('id', '=', $id)->firstOrFail();
        return view('admin.master.Users.edit')->with(['admin' => $admins]);
    }

    public function add()
    {
        $data = [
            'username' => $this->postField('username'),
            'password' => Hash::make($this->postField('password')),
            'roles' => 'admin'
        ];

        $user = $this->insert(User::class, $data);
        $profile = [
            'user_id' => $user->id,
            'nama' => $this->postField('nama'),
        ];
        $this->insert(Admin::class, $profile);
        return redirect()->back()->with(['success' => 'Success']);
    }

    public function patch()
    {
        $data = [
            'username' => $this->postField('username'),
        ];

        $user = User::find($this->postField('id'));
        $this->customUpdate($user, $data);
        $dataprofile = [
            'nama' => $this->postField('nama'),
        ];
        $profile = Admin::where('user_id', '=', $this->postField('id'))->firstOrFail();
        $this->customUpdate($profile, $dataprofile);
        return redirect()->back()->with(['success' => 'Success']);
    }

    public function destroy($id)
    {
        try {
            User::destroy($id);
            return $this->jsonResponse('success delete', 200);
        }catch (\Exception $e){
            return $this->jsonResponse('Failed delete', 500);
        }
    }

    public function dashboard()
    {
        $cart = DB::table('carts')
            ->select([
                'carts.id',
                'carts.product_id',
                'carts.transactions_id',
                'transactions.status',
                'carts.qty',
                'products.name',
                DB::raw('CAST(SUM(carts.qty) AS INTEGER) as total')
            ])
            ->join('transactions', 'carts.transactions_id', '=', 'transactions.id')
            ->join('products', 'carts.product_id', '=', 'products.id')
            ->where('transactions.status', '=', '1')
            ->groupBy('product_id')
            ->orderBy('total', 'DESC')
            ->get();
//        dd($cart->toArray());
        return view('admin.index')->with(['data' => $cart]);
    }
}
