@extends('layouts')

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="" style="background-color: #7FAD39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>KERANJANG BELANJA</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Keranjang Belanja</span>
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
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $v)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{ asset('/images/uploads') }}/{{ $v->product->images }}" alt="">
                                        <h5>{{ $v->product->name }}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{ number_format($v->product->price, '0', ',','.') }}
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        {{ $v->qty }}
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{ number_format(($v->price * $v->qty), '0', ',','.') }}
                                    </td>
                                    <td class="shoping__cart__item__close" data-id="{{ $v->id }}">
                                        <span class="icon_close" onclick="deleteCart('{{ $v->id }}')"></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    @if($isBirthDay)
                        <div>Selamat Ulang Tahun Kamu Mendapat Diskon Sebesar Rp. {{ $discountBirthDay }}</div>
                    @else
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input id="txt-voucher" type="text" placeholder="Masukan Kode Voucher">
                                    <button id="btn-voucher" type="submit" class="site-btn">APPLY VOUCHER</button>
                                </form>
                            </div>
                            <div><span id="stat-voucher"></span></div>
                        </div>
                    @endif
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Total Belanja</h5>
                        <form method="POST" action="/checkout">
                            @csrf
                            <ul>
                                <li>Subtotal <span>Rp. {{ $subtotal }}</span></li>

                                @if($isBirthDay)
                                    <li>Diskon <span id="diskon">Rp. {{ $discountBirthDay }}</span></li>
                                    <li>Total <span id="total">Rp. {{ $sub - $discountBirthDay }}</span></li>
                                @else
                                    <li>Diskon <span id="diskon">Rp. 0</span></li>
                                    <li>Total <span id="total">Rp. {{ $subtotal }}</span></li>
                                @endif
                                <li>
                                    <div>
                                        <div>Kota</div>
                                        <div class="d-flex">
                                            <div class="text-left">
                                                <select id="kota">
                                                    @foreach($kota as $v)
                                                        <option
                                                            value="{{ $v['city_id'] }}">{{ $v['city_name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="flex-grow-1"><span id="v-ongkir">Rp. 0</span></div>
                                        </div>
                                    </div>
                                </li>

                            </ul>

                            <div class="text-right">
                                @if($isBirthDay)
                                    <input type="hidden" value="{{ $discountBirthDay }}" id="disc" name="disc">
                                    <input type="hidden" value="{{ $sub - $discountBirthDay }}" id="tot"
                                           name="tot">
                                    <input type="hidden" value="0" id="ongkir" name="ongkir">
                                    <input type="hidden" value="" id="tujuan" name="tujuan">

                                @else
                                    <input type="hidden" value="0" id="disc" name="disc">
                                    <input type="hidden" value="0" id="ongkir" name="ongkir">
                                    <input type="hidden" value="{{ $sub }}" id="tot" name="tot">
                                    <input type="hidden" value="" id="tujuan" name="tujuan">
                                @endif
                                <button class="site-btn">CEK OUT</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('/adminlte/plugins/select2/select2.js') }}"></script>
    <script src="{{ asset('/adminlte/plugins/select2/select2.full.js') }}"></script>
    <script>
        let voucher = 0, total = 0;

        async function deleteCart(id) {
            try {
                let data = {
                    '_token': "{{ csrf_token() }}",
                };
                let response = await $.post('/ajax/delete-cart/' + id, data);
                console.log(response)
            } catch (e) {
                console.log(e)
            }
        }

        function hitungDiskon(a, p, m) {
            let amount = a;
            let minimal = m;
            let subtotal = '{{ $sub }}';
            if (minimal <= subtotal) {
                if (p) {
                    amount = (a * subtotal) / 100;
                }
                let total = subtotal - amount;
                $('#diskon').html('Rp. ' + amount);
                $('#disc').val(amount)
                $('#total').html('Rp. ' + total);
            }
        }

        async function ongkir() {
            let tujuan = $('#kota').val();
            let tujuanText = $('#kota:selected').text();
            let res = await $.get('/ongkir/' + tujuan);
            let total = res['payload']['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
            $('#v-ongkir').html('Rp. ' + total);
            $('#ongkir').val(total);
            $('#tujuan').val(tujuanText);
        }

        $(document).ready(function () {
            $('#kota').select2({
                id: 'kotaselect'
            });
            ongkir()
            $('#btn-voucher').on('click', async function (e) {
                e.preventDefault();
                let code = $('#txt-voucher').val();
                let res = await $.get('/ajax/voucher?code=' + code);
                if (res['status'] === 200 && res['payload'] !== null) {
                    let amount = res['payload']['amount'];
                    let percent = res['payload']['percent'];
                    let minimal = res['payload']['minimal'];
                    $('#stat-voucher').html('Voucher Tersedia dengan minimal pembelian Rp. ' + minimal)
                    hitungDiskon(amount, percent, minimal);
                } else {
                    $('#stat-voucher').html('Voucher Tidak Tersedia')
                }
            });
            $('#kota').on('change', function () {
                ongkir()
            })
        });
    </script>
@endsection
@section('css')
    <link href="{{ asset('/adminlte/plugins/select2/select2.css') }}" rel="stylesheet">
    <style>
        .nice-select {
            display: none !important;
        }
    </style>
@endsection
