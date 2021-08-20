@extends('cetak.index')

@section('content')
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
@endsection
