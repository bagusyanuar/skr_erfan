@extends('layouts')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('failed'))
        <script>
            Swal.fire({
                title: 'Gagal!',
                text: 'Periksa Username dan Password!',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
    <section class="breadcrumb-section set-bg" data-setbg="" style="background-color: #7FAD39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>MASUK</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Masuk</span>
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
                <h6><span class="icon_tag_alt"></span> Belum Punya Akun? <a href="/register">Daftar</a>
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4 class="text-center">Form Masuk</h4>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <form method="post" action="/post-login">
                        @csrf
                        <div class="checkout__input">
                            <p>Username<span>*</span></p>
                            <input type="text" name="username">
                        </div>
                        <div class="checkout__input">
                            <p>Password<span></span></p>
                            <input type="password" name="password">
                        </div>
                        <div class="text-right">
                            <button class="site-btn">MASUK</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </section>

@endsection
