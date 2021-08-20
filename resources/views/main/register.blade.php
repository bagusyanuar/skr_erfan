@extends('layouts')

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="" style="background-color: #7FAD39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>PENDAFTARAN</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Pendaftarn</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Sudah Punya Akun? <a href="/login">Login</a>
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4 class="text-center">Form Pendaftaran</h4>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <form method="post" action="/post-register">
                        @csrf
                        <div class="checkout__input">
                            <p>Username<span>*</span></p>
                            <input type="text" name="username">
                        </div>
                        <div class="checkout__input">
                            <p>Email<span>*</span></p>
                            <input type="email" name="email">
                        </div>
                        <div class="checkout__input">
                            <p>Nama Lengkap<span></span></p>
                            <input type="text" name="name">
                        </div>
                        <div class="checkout__input">
                            <p>Tanggal Lahir<span></span></p>
                            <input type="date" name="dob">
                        </div>
                        <div class="checkout__input">
                            <p>No. Hp<span></span></p>
                            <input type="number" name="phone">
                        </div>
                        <div class="checkout__input">
                            <p>Alamat<span></span></p>
                            <textarea name="address" class="w-100"></textarea>
                        </div>
                        <div class="checkout__input">
                            <p>Password<span></span></p>
                            <input type="password" name="password">
                        </div>
                        <div class="checkout__input">
                            <p>Konfirmasi Password<span></span></p>
                            <input type="password" name="password-confirm">
                        </div>
                        <div class="text-right">
                            <button class="site-btn">DAFTAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>
@endsection
