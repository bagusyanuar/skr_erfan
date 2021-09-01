@extends('cetak.index')

@section('content')
    <div class="row">
        <div class="col-xs-1">
            <img src="{{ public_path('/images/logo_rjr.png') }}" alt="Logo" height="75px" width="75px">
        </div>

        <div class="col-xs-10" style="width: 80%">
            <div class="text-center" style="font-size: 30px; font-weight: bold">
                Rahma Jaya Rotan
            </div>
            <div class="text-center" style="font-size: 16px; font-weight: bold">
                Kramat Rt 02 / Rw 07, Desa Trangsan, Kecamatan gatak, Kabupaten Sukoharjo, Provinsi Jawa Tengah, 575557
            </div>
        </div>
    </div>
    <hr>
    <div class="text-center f-bold report-title">Laporan Pembayaran</div>
    <div class="text-center">Dari Tanggal {{ $tgl1 }} sampai dengan {{ $tgl2 }}</div>

    <hr>
    <table id="my-table" class="table display">
        <thead>
        <tr>
            <th>#</th>
            <th>No. Transaksi</th>
            <th>Vendor</th>
            <th>Total</th>
            <th>Pemesan</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payment as $v)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $v->transaction->no_transaksi }}</td>
                <td>{{ $v->vendor->name }}</td>
                <td>{{ $v->transaction->amount - $v->transaction->discount + $v->transaction->ongkir }}</td>
                <td>{{ $v->user->profiles->name }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <br/>
    <div class="row" >
        <div class="col-xs-8"></div>
        <div class="col-xs-3 text-center">
            Pimpinan
        </div>
    </div>
    <div class="row" >
        <div class="col-xs-8"></div>
        <div class="col-xs-3 text-center">
            Rahma Jaya Rotan
        </div>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
    <div class="row" >
        <div class="col-xs-8"></div>
        <div class="col-xs-3 text-center">
            (Isbiyat)
        </div>
    </div>
@endsection
