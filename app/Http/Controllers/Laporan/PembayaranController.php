<?php

namespace App\Http\Controllers\Laporan;

use App\Helper\CustomController;
use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\Transactions;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranController extends CustomController
{
    //
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        return view('laporan.pembayaran.index');
    }

    public function laporanPembayaran()
    {
        $tgl1 = $this->field('tgl1') ?? Carbon::now();
        $tgl2 = $this->field('tgl2') ?? Carbon::now();
        $payment = Payment::with(['transaction', 'vendor', 'user.profiles'])->whereBetween('created_at', [$tgl1, $tgl2])->get();
        return $this->basicDataTables($payment);
    }

    public function cetak()
    {
        $tgl1 = $this->field('tgl1') ?? Carbon::now();
        $tgl2 = $this->field('tgl2') ?? Carbon::now();
        $payment = Payment::with(['transaction', 'vendor', 'user.profiles'])->whereBetween('created_at', [$tgl1, $tgl2])->get();
        return $this->convertToPdf('cetak.pembayaran', ['payment' => $payment, 'tgl1' => $tgl1, 'tgl2' => $tgl2]);
    }
}
