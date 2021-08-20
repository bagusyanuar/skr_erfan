@extends('shop.layout')

@section('content')
    <style>
        .f-amount {
            font-weight: bold;
        }
    </style>
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href="/">Beranda</a> <span class="divider">/</span></li>
                <li class="active">Daftar Belanja</li>
            </ul>
            <div class="well well-small">
                <h1>Daftar Belanja</h1>
                <hr class="soften"/>
            </div>
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th>No. Transaksi</th>
                    <th>Tanggal</th>
                    <th>Total Belanja</th>
                    <th>Tujuan Pengiriman</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trans as $item)
                    <tr>
                        <td>{{ $item->no_transaksi }}</td>
                        <td>{{ $item->date }}</td>
                        <td>Rp{{ number_format(($item->amount  - $item->discount + $item->ongkir), '0', ',', '.') }}</td>
                        <td>{{ $item->tujuan }}</td>
                        <td>
                            @switch($item->status)
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
                        </td>
                        <td>
                            <a href="/transaction/{{$item->id}}" class="shopBtn btn-large">Detail</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $(document).ready(function () {
        });
    </script>
@endsection
