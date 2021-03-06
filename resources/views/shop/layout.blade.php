<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sistem Informasi Rahma Jaya Rotan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="{{asset('/shop-cart/assets/css/bootstrap.css')}}" rel="stylesheet"/>

    <!-- Customize styles -->
    <link href="{{asset('/shop-cart/style.css')}}" rel="stylesheet"/>
    <!-- font awesome styles -->
    <link href="{{asset('/shop-cart/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
<!--[if IE 7]>
    <link href="{{asset('/shop-cart/css/font-awesome-ie7.min.css')}}" rel="stylesheet">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('/shop-cart/assets/ico/favicon.ico')}}">
    <link rel="stylesheet" href="{{ asset('/sweetalert/sweetalert2.css') }}">
    <script src="{{ asset('/sweetalert/sweetalert2.js') }}"></script>
    <style>
        .overlay {
            position: fixed;
            z-index: 9999;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            visibility: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
        }

        .show {
            visibility: visible;
        }
    </style>
</head>
<body>
<div class="overlay">
    Sedang Memproses Data...
</div>
<!--
	Upper Header Section
-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <div class="pull-left">
                    @auth()
                        <a href="/"><span>Selamat Datang, {{ auth()->user()->username }}</span></a>
                    @endauth
                </div>
                <a href="/"> <span class="icon-home"></span> Beranda</a>
                @auth()
                    <a href="/logout"><span class="icon-off"></span> Logout</a>
                @endauth
                @guest()
                    <a href="/login"><span class="icon-lock"></span> Masuk</a>
                    <a href="/register"><span class="icon-edit"></span> Daftar</a>
                @endguest
                {{--                <a href="contact.html"><span class="icon-envelope"></span> Contact us</a>--}}
                {{--                <a href="cart.html"><span class="icon-shopping-cart"></span> 2 Item(s) - <span class="badge badge-warning"> $448.42</span></a>--}}
            </div>
        </div>
    </div>
</div>

<!--
Lower Header Section
-->
<div class="container">
    <div id="gototop"></div>
    <header id="header">
        <div class="row">
            <div class="span8">
                <div style="display: flex">
                    <a href="/" style="margin-right: 20px">
                        <img  style="height: 60px" src="{{asset('/images/logo_rjr.png')}}" height="30"
                              alt="bootstrap sexy shop">
                    </a>
                    <h2>Rahma Jaya Rotan</h2>
                </div>
            </div>
{{--            <div class="span4">--}}
{{--                --}}
{{--            </div>--}}
            <div class="span4 alignR">
                <p><br> <strong> Bantuan (24/7) : <a target="_blank" href="https://api.whatsapp.com/send?phone=62895422630233">+62895422630233</a> </strong><br><br></p>
                @auth
                    <span class="btn btn-mini" id="cart-item"><span >[ 0 ]</span> <span class="icon-shopping-cart"></span></span>
                    <span class="btn btn-mini" id="btn-history"><span class="icon-archive"></span></span>
                @endauth
                {{--                <span class="btn btn-warning btn-mini">$</span>--}}
                {{--                <span class="btn btn-mini">&pound;</span>--}}
                {{--                <span class="btn btn-mini">&euro;</span>--}}
            </div>
        </div>
    </header>

    <!--
    Navigation Bar Section
    -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="{{ \Illuminate\Support\Facades\Request::path() === '/' ? 'active' : '' }}"><a href="/">Beranda </a></li>
                        <li class="{{ \Illuminate\Support\Facades\Request::path() === 'products' ? 'active' : '' }}"><a href="/products">Produk Kami</a></li>
                        <li class="{{ \Illuminate\Support\Facades\Request::path() === 'faq' ? 'active' : '' }}"><a href="/faq">FAQ</a></li>
                        <li class="{{ \Illuminate\Support\Facades\Request::path() === 'about' ? 'active' : '' }}"><a href="/about">Tentang Kami</a></li>
                        <li class="{{ \Illuminate\Support\Facades\Request::path() === 'contact' ? 'active' : '' }}"><a href="/contact">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--
    Body Section
    -->
@yield('content')

<!--
    Clients
    -->
    <section class="our_client">
        <hr class="soften"/>
        <h4 class="title cntr"><span class="text">Manufactures</span></h4>
        <hr class="soften"/>
        <div class="row">
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/1.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/2.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/3.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/4.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/5.png"></a>
            </div>
            <div class="span2">
                <a href="#"><img alt="" src="assets/img/6.png"></a>
            </div>
        </div>
    </section>

    <!--
    Footer
    -->
{{--    <footer class="footer">--}}
{{--        <div class="row-fluid">--}}
{{--            <div class="span2">--}}
{{--                <h5>Your Account</h5>--}}
{{--                <a href="#">YOUR ACCOUNT</a><br>--}}
{{--                <a href="#">PERSONAL INFORMATION</a><br>--}}
{{--                <a href="#">ADDRESSES</a><br>--}}
{{--                <a href="#">DISCOUNT</a><br>--}}
{{--                <a href="#">ORDER HISTORY</a><br>--}}
{{--            </div>--}}
{{--            <div class="span2">--}}
{{--                <h5>Iinformation</h5>--}}
{{--                <a href="contact.html">CONTACT</a><br>--}}
{{--                <a href="#">SITEMAP</a><br>--}}
{{--                <a href="#">LEGAL NOTICE</a><br>--}}
{{--                <a href="#">TERMS AND CONDITIONS</a><br>--}}
{{--                <a href="#">ABOUT US</a><br>--}}
{{--            </div>--}}
{{--            <div class="span2">--}}
{{--                <h5>Our Offer</h5>--}}
{{--                <a href="#">NEW PRODUCTS</a> <br>--}}
{{--                <a href="#">TOP SELLERS</a><br>--}}
{{--                <a href="#">SPECIALS</a><br>--}}
{{--                <a href="#">MANUFACTURERS</a><br>--}}
{{--                <a href="#">SUPPLIERS</a> <br/>--}}
{{--            </div>--}}
{{--            <div class="span6">--}}
{{--                <h5>The standard chunk of Lorem</h5>--}}
{{--                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for--}}
{{--                those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et--}}
{{--                Malorum" by Cicero are also reproduced in their exact original form,--}}
{{--                accompanied by English versions from the 1914 translation by H. Rackham.--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
</div><!-- /container -->

<div class="copyright">
    <div class="container">
{{--        <p class="pull-right">--}}
{{--            <a href="#"><img src="assets/img/maestro.png" alt="payment"></a>--}}
{{--            <a href="#"><img src="assets/img/mc.png" alt="payment"></a>--}}
{{--            <a href="#"><img src="assets/img/pp.png" alt="payment"></a>--}}
{{--            <a href="#"><img src="assets/img/visa.png" alt="payment"></a>--}}
{{--            <a href="#"><img src="assets/img/disc.png" alt="payment"></a>--}}
{{--        </p>--}}
        <span>Copyright &copy; 2021<br> Online shop template</span>
    </div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('/shop-cart/assets/js/jquery.js')}}"></script>
<script src="{{asset('/shop-cart/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/shop-cart/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('/shop-cart/assets/js/jquery.scrollTo-1.4.3.1-min.js')}}"></script>
<script src="{{asset('/shop-cart/assets/js/shop.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/Utility.js') }}"></script>
@auth()
    <script>
        $(document).ready(function () {
            getCartCount();
            $('#cart-item').on('click', function () {
                window.location.href = '/cart';
            })
            $('#btn-history').on('click', function () {
                window.location.href = '/transaction';
            })
        })
    </script>
@endauth
@yield('js')
</body>
</html>
