@extends('shop.layout')

@section('content')
    <style>
        .flexBox {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .f-amount {
            font-weight: bold;
        }
    </style>
    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href="/">Beranda</a> <span class="divider">/</span></li>
                <li><a href="/transaction">Daftar Belanja</a> <span class="divider">/</span></li>
                <li class="active">Detail Belanja</li>
            </ul>
            <div class="well well-small">
                <h1>Detail Belanja</h1>
                <hr class="soften"/>
            </div>
            <div class="row">
                <div class="span4">
                    <div class="well well-small">
                        <div class="flexBox">
                            <p class="f-amount">No. Transaksi : </p>
                            <p class="f-amount">{{ $transaction->no_transaksi }}</p>
                        </div>
                        <div class="flexBox">
                            <p class="f-amount">Status : </p>
                            <p class="f-amount">
                                @switch($transaction->status)
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
                            </p>
                        </div>
                        <div class="flexBox">
                            <p class="f-amount">Tujuan : </p>
                            <p class="f-amount">{{ $transaction->tujuan }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th>Produk</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($transaction->cart as $item)
                    <tr>
                        <td><img width="100" src="{{ asset('/images/uploads/'.$item->product->images) }}" alt=""></td>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp{{ number_format($item->price, '0', ',', '.') }}</td>
                        <td>
                            <input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons"
                                   size="16" type="text" value="{{ $item->qty }}" disabled>
                        </td>
                        <td>Rp{{ number_format(($item->price* $item->qty), '0', ',', '.') }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <br/>
            <div class="row">
                <div class="span7">
                </div>
                <div class="span5">
                    <div class="well well-small">
                        <div class="flexBox">
                            <p class="f-amount">Sub Total : </p>
                            <p class="f-amount">Rp.{{ number_format($transaction->amount, 0, ',', '.') }}</p>
                        </div>
                        <div class="flexBox">
                            <p class="f-amount">Diskon : </p>
                            <p class="f-amount">(Rp.{{ number_format($transaction->discount, 0, ',', '.') }})</p>
                        </div>
                        <div class="flexBox">
                            <p class="f-amount">Ongkir :</p>
                            <p class="f-amount">Rp.{{ number_format($transaction->ongkir, 0, ',', '.') }}</p>
                        </div>
                        <div class="flexBox">
                            <p class="f-amount">Total : </p>
                            <p class="f-amount">Rp.{{ number_format($transaction->amount - $transaction->discount + $transaction->ongkir, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <a href="/cetak-bukti/{{$transaction->id}}" target="_blank" id="btn-checkout" class="shopBtn btn-large pull-right">Cetak Bukti</a>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $(document).ready(function () {

        });
    </script>
@endsection
