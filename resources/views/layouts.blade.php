<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('/ogani/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/ogani/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/ogani/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/ogani/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/ogani/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/ogani/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/ogani/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/ogani/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/style/main.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/sweetalert/sweetalert2.css') }}">
    <script src="{{ asset('/sweetalert/sweetalert2.js') }}"></script>
    @yield('css')
</head>

<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>
<div class="lazy-backdrop"></div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{ asset('/ogani/img/logo.png') }}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span></span></a></li>
        </ul>
        <div class="header__cart__price">item: <span>$150.00</span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="img/language.png" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="./index.html">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                        <ul>
                            @auth()
                                <li><i class="fa fa-envelope"></i> {{ \Illuminate\Support\Facades\Auth::user()->email }}
                                </li>
                            @endauth
                            <li>Selamat Datang Di E-Commerce Enka Celluler</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        @guest()
                            <div class="header__top__right__social">
                                <a href="/login"><i class="fa fa-user" style="margin-right: 5px"></i> Masuk</a>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="/register"><i class="fa fa-edit"></i> Daftar</a>
                            </div>
                        @endguest
                        @auth()
                            <div class="header__top__right__language">
                                <div>Hai, {{ \Illuminate\Support\Facades\Auth::user()->username }}</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="/logout"><i class="fa fa-power-off" style="margin-right: 10px"></i>Keluar</a>
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="/"><img src="{{ asset('images/logo.jpg') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="/">Beranda</a></li>
                        <li><a href="/products">Produk Kami</a></li>
                        <li><a href="/faq">FAQ</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                @auth()
                    <div class="header__cart">
                        <ul>
                            <li><a href="/cart"><i class="fa fa-shopping-basket"></i> <span id="item-cart"></span></a></li>
                            <li><a href="/transaction"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                        <div class="header__cart__price">Total: <span id="sum-cart">Rp. 0</span></div>
                    </div>
                @endauth
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->

<!-- Hero Section End -->

@yield('content')

<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="/"><img src="{{ asset('images/logo.jpg') }}" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: Surakarta</li>
                        <li>Phone: +6285879757698</li>
                        <li>Email: enkacell@gmail.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                            All rights reserved | This template is made with <i class="fa fa-heart"
                                                                                aria-hidden="true"></i> by <a
                                href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{ asset('/ogani/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('/ogani/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/js/lazy.js') }}"></script>
<script src="{{ asset('/ogani/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('/ogani/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('/ogani/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('/ogani/js/mixitup.min.js') }}"></script>
<script src="{{ asset('/ogani/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/ogani/js/main.js') }}"></script>


<script>
    async function countCart() {
        let count = await $.get('/ajax/countCart');
        $('#item-cart').html(count);
    }

    async function sumCart() {
        let sum = await $.get('/ajax/sumCart');
        $('#sum-cart').html(sum);
    }

    $(document).ready(function () {
        let isAuth = '{{ \Illuminate\Support\Facades\Auth::user() }}'
        if (isAuth) {
            countCart();
            sumCart()
        }

    });
</script>
@yield('js')

</body>

</html>
