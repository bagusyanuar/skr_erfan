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
                <li class="active">Pembayaran</li>
            </ul>
            <div class="well well-small">
                <h1>Pembayaran</h1>
                <hr class="soften"/>
            </div>
            <br/>
            <div class="row">
                <div class="span7">
                    <form id="form-payment" action="/pay" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $trans->id }}">
                        <div class="form-inline">
                            <label style="min-width:159px"> Upload Bukti : </label>
                            <input type="file" name="image" id="image">
                        </div>
                        <br/>
                        <div class="form-inline">
                            <label style="min-width:159px"> Pilih Bank : </label>
                            <select id="vendor" name="vendor">
                                @foreach($vendors as $vendor)
                                    <option value="{{ $vendor->id }}">{{ $vendor->name  }}
                                        ({{ $vendor->number }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="span5">
                    <div class="well well-small">
                        <div class="flexBox">
                            <p class="f-amount">Sub Total : </p>
                            <p class="f-amount">Rp.{{ number_format($trans->amount, 0, ',', '.') }}</p>
                        </div>
                        <div class="flexBox">
                            <p class="f-amount">Diskon : </p>
                            <p class="f-amount">(Rp.{{ number_format($trans->discount, 0, ',', '.') }})</p>
                        </div>
                        <div class="flexBox">
                            <p class="f-amount">Ongkir :</p>
                            <p class="f-amount">Rp.{{ number_format($trans->ongkir, 0, ',', '.') }}</p>
                        </div>
                        <div class="flexBox">
                            <p class="f-amount">Total : </p>
                            <p class="f-amount">Rp.{{ number_format($trans->amount - $trans->discount + $trans->ongkir, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <a href="#" id="btn-payment" class="shopBtn btn-large pull-right">Bayar <span
                    class="icon-arrow-right"></span></a>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $(document).ready(function () {
            $('#btn-payment').on('click', function (e) {
                e.preventDefault();
                $('#form-payment').submit();
            })
        });
    </script>
@endsection
