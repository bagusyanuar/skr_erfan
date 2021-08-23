@extends('cetak.index')

@section('content')
    <div class="text-center f-bold report-title">Bukti Pembelian</div>
    <hr>

    <div class="row">
        <div class="col-xs-5">
            <div>No. Transaksi : {{ $transaksi->no_transaksi }}</div>
            <div>Status :
                @switch($transaksi->status)
                    @case('0')
                    Menunggu
                    @break
                    @case('1')
                    Di Terima
                    @break
                    @case('2')
                    Di Tolak
                    @break
                    @default
                    Menunggu
                    @break
                @endswitch
            </div>
            <div>Tujuan :
                {{ $transaksi->tujuan }}
            </div>
        </div>
        <div class="col-xs-6">
            <div>Nama Pemesan : {{ $transaksi->cart[0]->user->profiles->name }}</div>
            <div>No. Hp : {{ $transaksi->cart[0]->user->profiles->phone }}</div>
            <div>Alamat : {{ $transaksi->cart[0]->user->profiles->address }}</div>
        </div>
    </div>
    <table id="my-table" class="table display">
        <thead>
        <tr>
            <th>#</th>
            <th>Nama Barang</th>
            <th width="20%">Harga</th>
            <th>Qty</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaksi->cart as $v)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $v->product->name }}</td>
                <td class="text-right">{{ $v->price }}</td>
                <td class="text-right">{{ $v->qty }}</td>
                <td class="text-right">{{ $v->qty * $v->price }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <hr>
    <div class="text-right" style="font-weight: bold">
        Sub Total : Rp.{{ number_format($transaksi->amount, 0, ',', '.') }}
    </div>
    <div class="text-right" style="font-weight: bold">
        Diskon : (Rp.{{ number_format($transaksi->discount, 0, ',', '.') }})
    </div><div class="text-right" style="font-weight: bold">
        Ongkir : Rp.{{ number_format($transaksi->ongkir, 0, ',', '.') }}
    </div>
    <div class="text-right" style="font-weight: bold">
        Total : Rp.{{ number_format($transaksi->amount - $transaksi->discount + $transaksi->ongkir, 0, ',', '.') }}
    </div>
@endsection
