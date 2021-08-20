@extends('layouts')

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="" style="background-color: #7FAD39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>HISTORY BELANJA</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>History Belanja</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">No. Transaksi</th>
                                <th>Total Belanja</th>
                                <th>Ongkir</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trans as $v)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <h5>{{ $v->no_transaksi }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($v->amount - $v->discount, '0', ',','.') }}
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($v->ongkir, '0', ',','.') }}
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ number_format($v->amount - $v->discount + $v->ongkir, '0', ',','.') }}
                                    </td>
                                    <td class="shoping__cart__item__close" data-id="{{ $v->id }}">
                                        @switch($v->status)
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
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
