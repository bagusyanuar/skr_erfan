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
                <li class="active">Keranjang</li>
            </ul>
            <div class="well well-small">
                <h1>Check Out <small class="pull-right"> {{count($cart)}} Items are in the cart </small></h1>
                <hr class="soften"/>
            </div>
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Unit price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $item)
                    <tr>
                        <td><img width="100" src="{{ asset('/images/uploads/'.$item->product->images) }}" alt="" style="height: 70px"></td>
                        <td>{{ $item->product->name }}</td>
                        <td>Rp{{ number_format($item->price, '0', ',', '.') }}</td>
                        <td>
                            <input class="span1" style="max-width:34px" placeholder="1" id="appendedInputButtons"
                                   size="16" type="text" value="{{ $item->qty }}" disabled>
                            <div class="input-append">
                                <button id="btn-delete" class="btn btn-mini btn-danger" type="button" data-id="{{$item->id}}"><span class="icon-remove"></span>
                                </button>
                            </div>
                        </td>
                        <td>Rp{{ number_format(($item->price* $item->qty), '0', ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="4" class="alignR">Sub Total:</td>
                    <td class="f-amount"> Rp{{ $subtotal }}</td>
                </tr>
                <tr>
                    <td colspan="4" class="alignR">
                        <div style="display: flex; justify-content: space-between; align-items: center">
                            <form class="form-inline">
                                <label style="min-width:159px"> Voucher </label>
                                <input type="text" class="input-medium" placeholder="CODE" id="txt-voucher">
                                <button type="submit" class="shopBtn" id="btn-voucher"> ADD</button>
                            </form>
                        </div>
                    </td>
                    <td> <span id="diskon" class="f-amount">(Rp0)</span></td>
                </tr>
                <tr>
                    <td colspan="4" class="alignR">
                        <div style="display: flex; justify-content: space-between; align-items: center">
                            <form class="form-inline">
                                <label style="min-width:159px"> Kota Pengiriman: </label>
                                <select id="kota">
                                    @foreach($kota as $c)
                                        <option value="{{ $c['city_id'] }}">{{ $c['city_name'] }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </td>
                    <td><span id="v-ongkir" class="f-amount">Rp0</span></td>
                </tr>
                <tr>
                    <td colspan="4" class="alignR">Total Belanja:</td>
                    <td><span id="total" class="f-amount">Rp0</span></td>
                </tr>
                </tbody>
            </table>
            <br/>
            <a href="#" id="btn-checkout" class="shopBtn btn-large pull-right">Check Out <span class="icon-arrow-right"></span></a>
        </div>
        <form method="POST" action="/checkout" id="form-checkout">
            @csrf
            @if($isBirthDay)
                <input type="hidden" value="{{ $discountBirthDay }}" id="disc" name="disc">
                <input type="hidden" value="{{ $sub }}" id="tot"
                       name="tot">
                <input type="hidden" value="0" id="ongkir" name="ongkir">
                <input type="hidden" value="" id="tujuan" name="tujuan">

            @else
                <input type="hidden" value="0" id="disc" name="disc">
                <input type="hidden" value="0" id="ongkir" name="ongkir">
                <input type="hidden" value="{{ $sub }}" id="tot" name="tot">
                <input type="hidden" value="" id="tujuan" name="tujuan">
            @endif
        </form>
    </div>
@endsection

@section('js')
    <script>
        async function deleteCart(id) {
            try {
                let data = {
                    '_token': "{{ csrf_token() }}",
                };
                $('.overlay').toggleClass('show');
                let response = await $.post('/ajax/delete-cart/' + id, data);
                if(response['status'] === 200) {
                    window.location.reload();
                }else{
                    alert('Gagal Dalam Menghapus Keranjang')
                }
            } catch (e) {
                alert('Gagal Dalam Menghapus Keranjang')
            }finally {
                $('.overlay').toggleClass('show');
            }
        }
        async function ongkir() {
            let tujuan = $('#kota').val();
            let tujuanText = $('#kota option:selected').text();
            let res = await $.get('/ongkir/' + tujuan);
            let value = res['payload']['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
            let disc = $('#disc').val();
            let amount = $('#tot').val();
            hitungTotal(amount, disc, value);
            $('#v-ongkir').html('Rp' + formatUang(value));
            $('#ongkir').val(value);
            $('#tujuan').val(tujuanText);
        }

        function hitungTotal(a, d, o) {
            let total = parseInt(a) - parseInt(d) + parseInt(o);
            $('#total').html('Rp' + formatUang(total));
        }
        function hitungDiskon(a, p, m) {
            let amount = a;
            let minimal = m;
            let subtotal = '{{ $sub }}';
            let ongkir = $('#ongkir').val();
            if (minimal <= subtotal) {
                if (p) {
                    amount = (a * subtotal) / 100;
                }
                let total = subtotal - amount;
                hitungTotal(total, amount, ongkir);
                $('#diskon').html('(Rp' + formatUang(amount)+')');
                $('#disc').val(amount)
            }
        }

        $(document).ready(function () {
            ongkir();
            $('#btn-voucher').on('click', async function (e) {
                e.preventDefault();
                let code = $('#txt-voucher').val();
                $('.overlay').toggleClass('show');
                try {
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
                }catch (e) {
                    alert('Gagal Mengambil Data Diskon');
                }finally {
                    $('.overlay').toggleClass('show');
                }

            });
            $('#kota').on('change', function () {
                ongkir()
            });
            $('#btn-checkout').on('click', function (e) {
                e.preventDefault();
                $('#form-checkout').submit();
            })

            $('#btn-delete').on('click', function () {
                let id = this.dataset.id;
                deleteCart(id)
            })
        });
    </script>
    @endsection
