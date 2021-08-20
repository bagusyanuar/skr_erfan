@extends('layouts')

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="" style="background-color: #7FAD39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>FAQ</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>FAQ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="featured spad">
            <div class="product__details__tab__desc">
                <h6 class="f24 f-bold mb-2">FAQ</h6>
                @foreach($faq as $v)
                    <div class="blog__item card pl-3 pr-3">
                        <div class="blog__item__text">
                            <div class="d-flex">
                            </div>
                            <h5><a href="#">{{ $v->question }}</a></h5>
                            <p>{{ $v->answer }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection
