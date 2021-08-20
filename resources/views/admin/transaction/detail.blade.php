@extends('admin.layouts')
@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-tags mr-2"></i>Categories</div>
        <div class="my-text-semi-dark f14">Categories For All Products</div>
    </div>
@endsection
@section('breadcrumb')
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/categories">Categories</a></li>
            <li class="breadcrumb-item active">New</li>
        </ol>
    </div>
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Menyimpan Data!',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-12">
            <div class="card my-card">
                <div class="card-header">
                    <div class="card-title">Detail Order</div>
                </div>
                <div class="card-body">
                    <div>
                        <span class="f-bold">
                        No. Transaksi :
                        </span>
                        {{ $payment->transaction->no_transaksi }}
                    </div>
                    <div>
                        <span class="f-bold">
                        Nama Pemesan :
                        </span> {{ $payment->user->profiles->name}}
                    </div>
                    <div>
                        <span class="f-bold">
                        Email :
                        </span>  {{ $payment->user->email }}
                    </div>
                    <div>
                        <span class="f-bold">
                        No. Hp :
                        </span> {{ $payment->user->profiles->phone }}
                    </div>
                    <div>
                        <span class="f-bold">
                        Alamat :
                        </span> {{ $payment->user->profiles->address }}
                    </div>
                    <div>
                        <span class="f-bold">
                        Pembayaran Via :
                        </span>  {{ $payment->vendor->name }}
                    </div>

                    <div>
                        <span class="f-bold">
                        Tujuan Pengiriman :
                        </span> {{ $payment->transaction->tujuan }}
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="text-center">
                        <div class="f-bold">Bukti Pembayaran</div>
                        <img class="text-center" src="{{ asset('/images/bukti') }}/{{ $payment->url }}" height="200" alt="">
                    </div>
                    <div class="dropdown-divider"></div>
                    <h6 class="f-bold">Data Pesanan</h6>
                    <div>
                        <table id="my-table" class="table display">
                            <thead>
                            <tr>
                                <th width="10%">#</th>
                                <th width="80%">Nama Barang</th>
                                <th width="80%">Qty</th>
                                <th width="80%">Harga</th>
                                <th width="80%">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payment->transaction->cart as $v)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $v->product->name }}</td>
                                    <td>{{ $v->qty }}</td>
                                    <td>{{ $v->price }}</td>
                                    <td>{{ $v->price * $v->qty }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="dropdown-divider"></div>
                    <div class="row">
                        <div class="col-9 text-right"><span class="f-bold">SubTotal : </span></div>
                        <div class="col-3 text-right"><span class="f-bold text-right">Rp. {{ number_format($payment->transaction->amount, 0, ',' ,'.') }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-9 text-right"><span class="f-bold">Discount : </span></div>
                        <div class="col-3 text-right"><span class="f-bold text-right">Rp. {{ number_format($payment->transaction->discount, 0, ',' ,'.') }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-9 text-right"><span class="f-bold">Ongkir : </span></div>
                        <div class="col-3 text-right"><span class="f-bold text-right">Rp. {{ number_format( $payment->transaction->ongkir, 0, ',' ,'.') }}</span></div>
                    </div>
                    <div class="row">
                        <div class="col-9 text-right"><span class="f-bold">Total : </span></div>
                        <div class="col-3 text-right"><span class="f-bold text-right">Rp. {{ number_format( $payment->transaction->amount - $payment->transaction->discount + $payment->transaction->ongkir, 0, ',' ,'.') }}</span></div>
                    </div>
                </div>
            </div>
            <div class="card my-card">
                <div class="card-header">
                    <div class="card-title">Konfirmasi Pesanan</div>
                </div>
                <div class="card-body">
                    <form action="/admin/transaction/confirm" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $payment->id }}">
                        <x-lazy.input.select id="status" name="status" label="Status">
                            <option value="1">Terima</option>
                            <option value="2">Tolak</option>
                        </x-lazy.input.select>
                        <x-lazy.input.area id="description" name="description" label="Alasan"></x-lazy.input.area>
                        <div class="text-right">
                            <button class="btn my-button my-rounded pl-3 pr-3"><i class="fa fa-send-o mr-2"></i>Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#my-table').DataTable();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection

