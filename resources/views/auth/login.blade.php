@extends('auth.layouts')
@section('content')
    <style>

    </style>
    @if(\Illuminate\Support\Facades\Session::has('failed'))
        <div class="flash-message">
            <div class="card">
                <div class="card-body text-center">
                    <div class="danger">Oops</div>
                    <img class="img-fluid" src="{{ asset('images/failed.png') }}" alt="" width="50">
                    <div class="text-center">{{ \Illuminate\Support\Facades\Session::get('failed') }}</div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-lg-8 col-sm-12 panel-full-height my-bg-primary my-text-light">
            <div class="w-100">
                <div style="font-size: 30px; font-weight: bold;">Selamat Datang Di Web E - Commerce</div>
                <div style="margin-bottom: 50px;">Tempat Penjualan Barang Secara Online Paling Lengkap</div>
                <div class="text-center">
                    <img src="{{ asset('images/background 2.png') }}" height="350" alt=""/>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 panel-full-height justify-content-center">
            <div class="w-75">
                <form method="post" action="/post-login">
                    @csrf
                    <div class="text-center form-title mb-3 my-text-dark">MASUK</div>
                    <div class="text-center f14 mt-0 mb-4 my-text-dark">Belum Punya Akun? <a style="font-weight: bold" class="my-link" href="/register">Daftar Sekarang</a></div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input value="{{ old('username') }}" type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="Username" required>
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input value="{{ old('password') }}" type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="Password" required>
                    </div>
                    <div class="text-right">
                        <button class="btn my-button w-100 pt-lg-3 pb-lg-3 my-rounded" type="submit">MASUK</button>
                    </div>
                    <div class="text-center mt-2">
                        <a href="/" class="my-link" style="font-size: 12px">Kembali Ke Halaman Utama</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

