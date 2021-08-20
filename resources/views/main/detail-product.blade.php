@extends('layouts')

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="" style="background-color: #7FAD39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $products->category->name }}</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <a href="/products?categories={{ $products->category->id }}">{{ $products->category->name }}</a>
                            <span>{{ $products->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                 src="{{ asset('/images/uploads') }}/{{ $products->images }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{ $products->name }}</h3>
                        <div class="product__details__rating">
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">Rp. {{ number_format($products->price, '0', ',', '.') }}</div>
                        <p>{{ $products->description }}</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" name="qty" id="qty">
                                </div>
                            </div>
                        </div>
                        <button id="btn-cart" class="site-btn">TAMBAH KERANJANG</button>
                        <ul>
                            <li><b>Tersedia</b> <span>{{ $products->qty }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                   aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                   aria-selected="false">Reviews <span>({{ count($reviews) }})</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Deskripsi Produk</h6>
                                    <p>{{ $products->description }}</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Reviews Produk</h6>
                                    @foreach($reviews as $review)
                                        <div class="blog__item">
                                            <div class="blog__item__text">
                                                <ul>
                                                    <li><i class="fa fa-calendar-o"></i> {{ $review->created_at }}</li>
                                                </ul>
                                                <div class="d-flex">
                                                </div>
                                                <h5><a href="#">{{ $review->user->profiles->name }}</a></h5>
                                                <p>{{ $review->review }}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
{{--    <div class="my-card p-4 mb-2">--}}
{{--        <div class="row">--}}
{{--            <div class="col-lg-5 col-md-5 col-sm-12">--}}
{{--                <img src="{{ asset('images/uploads') }}/{{ $products->images }}" alt="" width="100%">--}}
{{--            </div>--}}
{{--            <div class="col-lg-7 col-md-7 col-sm-12">--}}
{{--                <p class="f14 f-bold my-text-semi-dark mb-0">{{ $products->category->name }}</p>--}}
{{--                <p class="f24 f-bold">{{ $products->name }}</p>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <div class="d-flex mb-1">--}}
{{--                    <div class="f18 my-text-semi-dark mr-2">Price :</div>--}}
{{--                    <div class="f18 f-bold my-text-primary">Rp. {{ number_format($products->price, 0, ',', '.')  }},--}}
{{--                        00--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="d-flex align-items-center mb-1">--}}
{{--                    <div class="f18 my-text-semi-dark mr-2">Available Stock :</div>--}}
{{--                    <div class="f18 f-bold my-text-primary">{{ $products->qty }} pcs</div>--}}
{{--                </div>--}}
{{--                <div class="d-flex mb-1">--}}
{{--                    <div class="f18 my-text-semi-dark mr-2 align-middle">Qty :</div>--}}
{{--                    <div class="form-group d-flex mb-0">--}}
{{--                        <input type="number" id="qty" class="form-control-sm" value="0" style="width: 40% !important;">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="dropdown-divider"></div>--}}
{{--                <div class="d-flex mt-3">--}}
{{--                    <a class="btn my-outlined-button mr-2" href="#" id="btn-cart">--}}
{{--                        <i class="fa fa-cart-plus mr-1"></i>--}}
{{--                        Add To Cart--}}
{{--                    </a>--}}
{{--                    <a class="btn my-button" href="#">--}}
{{--                        <i class="fa fa-shopping-bag mr-1"></i>--}}
{{--                        Buy Now--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="dropdown-divider"></div>--}}
{{--        <div class="f20 f-bold my-text-dark">--}}
{{--            Product Description--}}
{{--        </div>--}}
{{--        <div class="text-justify my-text-semi-dark">{{ $products->description }}</div>--}}
{{--        <div class="dropdown-divider"></div>--}}
{{--        <div class="f20 f-bold my-text-dark">--}}
{{--            Product Reviews--}}
{{--        </div>--}}
{{--        <div class="dropdown-divider"></div>--}}
{{--        @foreach($reviews as $review)--}}
{{--            <div class="card  mb-2">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="f18 f-bold my-text-dark">{{ $review->user->profiles->name }}</div>--}}
{{--                    <div class="f14 my-text-semi-dark">{{ $review->review }}</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
@endsection

@section('js')
    <script>
        async function saveToCart() {
            let backdrop = lazyProcess('.lazy-backdrop');
            console.log(backdrop)
            let data = {
                '_token': "{{ csrf_token() }}",
                id: '{{ $products->id }}',
                price: '{{ $products->price }}',
                qty: $('#qty').val()
            };
            backdrop.showLoading();
            try {
                await $.post('/ajax/saveToCart', data);
                backdrop.alert('success', 'Success Add To Cart!');
            }catch (e) {
                backdrop.alert('error', e.statusText, 2000)
            }
        }

        $(document).ready(function () {

            $('#btn-cart').on('click', function (e) {
                // e.preventDefault();
                saveToCart();
                // alert('asu');
            });
        });
    </script>
@endsection
