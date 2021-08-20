<?php

namespace App\Http\Controllers\Main;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Promo;
use App\Model\Transactions;
use App\Model\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class CartController extends CustomController
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rajaongkrir = $this->getCity();
        $kota = $rajaongkrir['rajaongkir']['results'];
        $dayNow = Carbon::now()->format('d');
        $monthNow = Carbon::now()->format('m');
        $user = UserProfile::where('user_id', '=', auth()->id())->first();

        $birthday = explode('-', $user->date_of_birth);
        $dayUser = $birthday[2];
        $monthUser = $birthday[1];
        $isBirthday = false;


        $id = auth()->id();
        $cart = Cart::with('product')->where('transactions_id', '=', null)->where('user_id', '=', auth()->id())->get();
        $subTotal = $cart->sum(function ($v) {
            return ($v->price * $v->qty);
        });
        $discountBirthDay = 0;
        if ($dayNow === $dayUser && $monthNow === $monthUser) {
            $isBirthday = true;
            $promo = Promo::where('type', '=', 'birthday')->where('active', '=', 1)->first();
            if ($promo->percent) {
                $discountBirthDay = ($promo->amount * $subTotal) / 100;
            } else {
                $discountBirthDay = $promo->amount;
            }
        }
        return view('shop.cart')->with(['cart' => $cart, 'subtotal' => number_format($subTotal, '0', ',', '.'),
            'sub' => $subTotal,
            'isBirthDay' => $isBirthday,
            'discountBirthDay' => $discountBirthDay,
            'kota' => $kota
        ]);
    }

    public function addToCart(Request $request)
    {
        try {
            $data = [
                'user_id' => auth()->id(),
                'product_id' => $this->postField('id'),
                'qty' => $this->postField('qty'),
                'price' => $this->postField('price'),
            ];
            $this->insert(Cart::class, $data);
            return $this->jsonResponse('Success Save', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse($e->getMessage(), 500);
        }
    }
    public function countCart()
    {
        $cart = Cart::with('product')->where('transactions_id', '=', null)->where('user_id', '=', auth()->id())->get();
        return count($cart);
    }

    public function sumCart()
    {
        $cart = Cart::with('product')->where('transactions_id', '=', null)->where('user_id', '=', auth()->id())->get();
        return number_format($cart->sum('price'), '0', ',', '.');
    }

    public function deleteCart($id)
    {
        try {
            Cart::destroy($id);
            return $this->jsonResponse('Success Delete', 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('failed ' . $e->getMessage(), 500);
        }
    }

    public function checkOut()
    {
        $data = [
            'date' => Carbon::now('Asia/Bangkok'),
            'confirmed' => true,
            'status' => '0',
            'discount' => $this->postField('disc'),
            'amount' => $this->postField('tot'),
            'ongkir' => $this->postField('ongkir'),
            'tujuan' => $this->postField('tujuan'),
            'no_transaksi' => 'TR-' . \date('YmdHis'),
        ];
        $transactions = $this->insert(Transactions::class, $data);
        Cart::where('transactions_id', '=', null)->where('user_id', '=', auth()->id())->update(['transactions_id' => $transactions->id]);
        return redirect('/payment/' . $transactions->id);
    }

    public function ongkir($tujuan)
    {
        try {
            $res = $this->getOnkgir($tujuan);
            return $this->jsonResponse($res, 200);
        } catch (\Exception $e) {
            return $this->jsonResponse('failed ' . $e->getMessage(), 500);
        }
    }
}
