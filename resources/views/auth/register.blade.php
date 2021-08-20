@extends('auth.layouts')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-sm-12 panel-full-height" style="background-color: #105CA7;">
            <div class="w-100">
                <div style="font-size: 30px; font-weight: bold;">Selamat Datang Di Web E - Commerce</div>
                <div style="margin-bottom: 50px;">Tempat Penjualan Barang Secara Online Paling Lengkap</div>
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('images/background 2.png') }}" height="350" alt=""/>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 panel-full-height justify-content-center">
            <div class="w-75">
                <form method="post" action="/post-register">
                    @csrf
                    <div class="text-center form-title mb-3">MEMBER REGISTER</div>
                    <div class="text-center f14 mt-0 mb-4">Sudah Punya Akun? <a href="/login">Login Sekarang</a></div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                        </div>
                        <input value="{{ old('username') }}" type="text"
                               class="form-control @error('username') is-invalid @enderror" id="username"
                               name="username" aria-describedby="emailHelp" placeholder="Username" required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                                                {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        </div>
                        <input value="{{ old('email') }}" type="email"
                               class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                               aria-describedby="emailHelp" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                                {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-male"></i></span>
                        </div>
                        <input value="{{ old('name') }}" type="text"
                               class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name" aria-describedby="nameHelp" placeholder="Nama Lengkap">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                                {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input value="{{ old('dob') }}" type="date"
                               class="form-control @error('dob') is-invalid @enderror" id="dob"
                               name="dob" aria-describedby="dobHelp">
                        @error('dob')
                        <span class="invalid-feedback" role="alert">
                                                {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-mobile-phone"></i></span>
                        </div>
                        <input value="{{ old('phone') }}" type="number"
                               class="form-control @error('phone') is-invalid @enderror" id="phone"
                               name="phone" aria-describedby="dobHelp">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                                {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-address-book"></i></span>
                        </div>
                        <textarea
                               class="form-control @error('address') is-invalid @enderror" id="address"
                                  name="address" aria-describedby="addressHelp">{{ old('address') }}</textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                                {{$message}}
                        </span>
                        @enderror
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                               name="password" aria-describedby="emailHelp" placeholder="Password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        </div>
                        <input value="{{ old('password-confirm') }}" type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password-confirm" name="password-confirm" aria-describedby="emailHelp"
                               placeholder="Konfirmasi Password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                                {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="text-right">
                        <button class="btn main-button w-100" type="submit">DAFTAR</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
