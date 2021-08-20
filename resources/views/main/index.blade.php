@extends('layouts')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('fail'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Menyimpan Data!',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <span>Pilihan Kategori</span>
                        </div>
                        <ul>
                            @foreach($categories as $category)
                                <li><a href="/products?category={{ $category->id }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=6285879757698"><h5>
                                        +6285879757698</h5></a>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="{{ asset('/images/sliders') }}/{{ $sliders[0]->url }}"
                                         alt="First slide">
                                </div>
                            @foreach($sliders as $slider)
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="{{ asset('/images/sliders') }}/{{ $slider->url }}"
                                         alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produk Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg"
                                 data-setbg="{{ asset('/images/uploads') }}/{{ $product->images }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="/products/{{ $product->id }}"><i class="fa fa-shopping-cart"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="/products/{{ $product->id }}">{{ $product->name }}</a></h6>
                                <h5>Rp. {{ number_format($product->price, 0, ',', '.') }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('/bootstrap/js/bootstrap.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.carousel').carousel({
                interval: 2000
            })
        });
    </script>
@endsection
