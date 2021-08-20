@extends('cetak.index')

@section('content')
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
@endsection
