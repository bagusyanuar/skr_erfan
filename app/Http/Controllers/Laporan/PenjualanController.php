<?php

namespace App\Http\Controllers\Laporan;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PenjualanController extends CustomController
{
    //
    /**
     * PenjualanController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        return view('laporan.penjualan.index');
    }

    public function laporanPenjualan()
    {
        $tgl1 = $this->field('tgl1') ?? Carbon::now();
        $tgl2 = $this->field('tgl2') ?? Carbon::now();
        $filter = $this->field('filter') ?? '';
        $transaction = Transactions::with(['cart.user'])->where(function ($query) use ($filter) {
            $query->where('no_transaksi', 'LIKE', '%' . $filter . '%')->orWhereHas('cart.user', function ($query) use ($filter) {
                $query->where('username', 'LIKE', '%' . $filter . '%');
            });
        })->whereBetween('created_at', [$tgl1, $tgl2])->get();
//        return $transaction->toArray();
        return $this->basicDataTables($transaction);
    }

    public function cetak()
    {
        $tgl1 = $this->field('tgl1') ?? Carbon::now();
        $tgl2 = $this->field('tgl2') ?? Carbon::now();
        $filter = $this->field('filter') ?? '';
        $transaction = Transactions::with(['cart.user'])->where(function ($query) use ($filter) {
            $query->where('no_transaksi', 'LIKE', '%' . $filter . '%')->orWhereHas('cart.user', function ($query) use ($filter) {
                $query->where('username', 'LIKE', '%' . $filter . '%');
            });
        })->whereBetween('created_at', [$tgl1, $tgl2])->get();
        $total = $transaction->sum(function ($v) {
            return $v->amount + $v->ongkir - $v->discount;
        });
        return $this->convertToPdf('cetak.penjualan', ['transaction' => $transaction, 'tgl1' => $tgl1, 'tgl2' => $tgl2, 'total' => $total]);
    }
}
