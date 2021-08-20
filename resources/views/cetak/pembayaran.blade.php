@extends('cetak.index')

@section('content')
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
@endsection
