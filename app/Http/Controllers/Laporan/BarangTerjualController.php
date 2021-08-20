<?php

namespace App\Http\Controllers\Laporan;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Payment;
use App\Model\Transactions;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BarangTerjualController extends CustomController
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        return view('laporan.barang.index');
    }

    public function laporanBarang()
    {
        $tgl1 = $this->field('tgl1') ?? Carbon::now();
        $tgl2 = $this->field('tgl2') ?? Carbon::now();
        $cart = Cart::with(['transaction', 'product'])->whereHas('transaction', function (Builder $query){
            $query->where('status', '=', '1');
        })->whereBetween('created_at', [$tgl1, $tgl2])->get();
        return $this->basicDataTables($cart);
    }

    public function cetak()
    {
        $tgl1 = $this->field('tgl1') ?? Carbon::now();
        $tgl2 = $this->field('tgl2') ?? Carbon::now();
        $cart = Cart::with(['transaction', 'product'])->whereHas('transaction', function (Builder $query){
            $query->where('status', '=', '1');
        })->whereBetween('created_at', [$tgl1, $tgl2])->get();
        return $this->convertToPdf('cetak.barang', ['cart' => $cart, 'tgl1' => $tgl1, 'tgl2' => $tgl2]);
    }
}
