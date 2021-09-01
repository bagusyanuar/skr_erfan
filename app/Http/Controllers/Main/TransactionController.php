<?php


namespace App\Http\Controllers\Main;


use App\Helper\CustomController;
use App\Model\Cart;
use App\Model\Payment;
use App\Model\Products;
use App\Model\Transactions;
use App\Model\Vendors;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class TransactionController extends CustomController
{

    /**
     * TransactionController constructor.
     */
    public function __construct()
    {
        parent::__construct();
//        $this->middleware('auth');
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

    public function paymentPage($id)
    {
        $trans = Transactions::findOrFail($id);
        $vendors = Vendors::all();
        return view('shop.payment')->with(['trans' => $trans, 'vendors' => $vendors]);
    }


    public function transactionDetailPage($id)
    {
        $transaction = Transactions::with('cart')->where('id', '=', $id)->firstOrFail();
        return view('shop.historyDetail')->with(['transaction' => $transaction]);
    }
    public function paymentHistory()
    {
        $id = auth()->id();
        $trans = Transactions::wherehas('cart.user', function (Builder $query) use ($id) {
            $query->where('id', '=', $id);
        })->get();
//        return $trans->toArray();
        return view('shop.history')->with(['trans' => $trans]);
    }

    public function pay(Request $request)
    {
        $imageName = $this->generateImageName('image');
        $data = [
            'transactions_id' => $this->postField('id'),
            'vendor_id' => $this->postField('vendor'),
            'payment_date' => Carbon::now('Asia/Bangkok'),
            'description' => '',
            'status' => '0',
            'user_id' => auth()->id()
        ];
        if ($request->hasFile('image')) {
            $data = Arr::add($data, 'url', $imageName);
            $this->uploadImage('image', $imageName, 'bukti');
        }
        $this->insert(Payment::class, $data);
        return redirect('/');
    }

    public function listOrder()
    {
        $payment = Payment::with(['transaction.cart.product', 'vendor', 'user.profiles'])->where('status', '=', '0')->get();
//        return $payment->toArray();
        return view('admin.transaction.index')->with(['payment' => $payment]);
    }

    public function orderDetail($id)
    {
        $payment = Payment::with(['user.profiles', 'vendor', 'transaction.cart.product'])->where('id', '=', $id)->firstOrFail();
//        return $payment->toArray();
        return view('admin.transaction.detail')->with(['payment' => $payment]);
    }

    public function confirm()
    {
        $data = [
          'status' => $this->postField('status'),
          'description' => $this->postField('description')
        ];

        $payment = $this->update(Payment::class, $data);
        $transaction = Transactions::find($payment['transactions_id']);
        $transaction->status = $this->postField('status');
        $cart = $transaction->cart;
        if ($this->postField('status') === '1' || $this->postField('status') === 1) {
            foreach ($cart as $v) {
                $currentQty = $v->product->qty;
                $newQty = $currentQty - $v->qty;
                $v->product->qty = $newQty;
                $v->push();
            }
        }
        $transaction->save();
        return redirect('/admin/transaction');
    }

    public function cetakBukti($id)
    {
        $transaction = Transactions::with('cart')->where('id', '=', $id)->firstOrFail();
//        $total = $transaction->sum(function ($v) {
//            return $v->amount + $v->ongkir - $v->discount;
//        });
        return $this->convertToPdf('cetak.nota', ['transaksi' => $transaction]);
    }

    public function bestSeller(){
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
        return $cart->toArray();
    }
}
