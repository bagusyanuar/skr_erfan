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
    <div class="text-center f-bold report-title">Laporan Barang Terjual</div>
    <div class="text-center">Dari Tanggal {{ $tgl1 }} sampai dengan {{ $tgl2 }}</div>

    <hr>
    <table id="my-table" class="table display">
        <thead>
        <tr>
            <th width="10%">#</th>
            <th width="20%">Nama Barang</th>
            <th width="20%">Qty</th>
            <th width="20%">Harga</th>
            <th width="20%">No. Transaksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cart as $v)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $v->product->name }}</td>
                <td>{{ $v->qty }}</td>
                <td>{{ $v->price }}</td>
                <td>{{ $v->transaction->no_transaksi }}</td>
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
