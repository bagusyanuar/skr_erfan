@extends('layouts')

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="" style="background-color: #7FAD39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>PEMBAYARAN</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Pembayaran</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Bukti Pembayaran</h4>
                <form action="/pay" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $trans->id }}">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Upload Bukti<span>*</span></p>
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="checkout__input">
                                        <p>Transver Via Bank<span>*</span></p>
                                        <select id="vendor" name="vendor" class="w-100">
                                            @foreach($vendors as $vendor)
                                                <option value="{{ $vendor->id }}">{{ $vendor->name  }}
                                                    ({{ $vendor->number }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <button type="submit" class="site-btn">SUBMIT</button>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Pembayaran Anda</h4>
                                <div class="checkout__order__subtotal">Subtotal
                                    <span>{{ number_format($trans->amount, 0, ',', '.') }}</span></div>
                                <div class="checkout__order__subtotal">Diskon
                                    <span>{{ number_format($trans->discount, 0, ',', '.') }}</span></div>
                                <div class="checkout__order__subtotal">Ongkir
                                    <span>{{ number_format($trans->ongkir, 0, ',', '.') }}</span></div>
                                <div class="checkout__order__total">Total
                                    <span>{{ number_format($trans->amount - $trans->discount + $trans->ongkir, 0, ',', '.')}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
