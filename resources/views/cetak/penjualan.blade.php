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
    <div class="text-center f-bold report-title">Laporan Penjualan</div>
    <div class="text-center">Dari Tanggal {{ $tgl1 }} sampai dengan {{ $tgl2 }}</div>

    <hr>
    <table id="my-table" class="table display">
        <thead>
        <tr>
            <th>#</th>
            <th>No. Transaksi</th>
            <th width="20%">Username</th>
            <th>Belanja</th>
            <th>Discount</th>
            <th>Ongkir</th>
            <th>Total</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaction as $v)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $v->no_transaksi }}</td>
                <td>{{ $v->cart[0]->user->username }}</td>
                <td class="text-right">{{ $v->amount }}</td>
                <td class="text-right">{{ $v->discount }}</td>
                <td class="text-right">{{ $v->ongkir }}</td>
                <td class="text-right">{{ $v->amount - $v->discount +  $v->ongkir}}</td>
                @php
                    $status = 'menunggu';
                @endphp
                @switch($v->status)
                    @case('0')
                    @php
                        $status = 'Menunggu';
                    @endphp
                    @break
                    @case('1')
                    @php
                        $status = 'Di Terima';
                    @endphp
                    @break@case('2')
                    @php
                        $status = 'Di Tolak';
                    @endphp
                    @break
                    @default
                    @break
                @endswitch
                <td>{{ $status }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <hr>
    <div class="text-right" style="font-weight: bold">
        Total Penjualan : {{ $total }}
    </div>
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
