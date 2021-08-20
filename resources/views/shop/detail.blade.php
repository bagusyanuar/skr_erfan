@extends('shop.layout')

@section('content')
    <div class="row">
        @includeWhen($isHome, 'shop.sidemenu', ['categories' => $categories])
        <div class="span9">
            <ul class="breadcrumb">
                <li><a href="/">Beranda</a> <span class="divider">/</span></li>
                <li><a href="/products">Product</a> <span class="divider">/</span></li>
                <li class="active">{{ $products->name }}</li>
            </ul>
            <div class="well well-small">
                <div class="row-fluid">
                    <div class="span5">
                        <div id="myCarousel" class="carousel slide cntr">
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href="#"> <img src="{{ asset('/images/uploads/'.$products->images) }}" alt="" style="height: 300px"></a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="span7">
                        <h3>{{ $products->name }}</h3>
                        <hr class="soft"/>

                        <form class="form-horizontal qtyFrm">
                            <input type="hidden" id="pid" value="{{ $products->id }}">
                            <input type="hidden" id="price" value="{{ $products->price }}">
                            <div class="control-group">
                                <label
                                    class="control-label"><span>Rp. {{ number_format($products->price, 0, ',', '.') }}</span></label>
                                <div class="controls">
                                    <input type="number" id="qty" class="span6" placeholder="Qty." value="0">
                                </div>
                            </div>
                            <h4>{{ $products->qty }} items in stock</h4>
                            <p>{{ $products->description }}
                            <p>
                                <a href="#" id="btn-cart" class="shopBtn"><span class=" icon-shopping-cart"></span> Add
                                    to
                                    cart
                                </a>
                        </form>
                    </div>
                </div>
                <hr class="softn clr"/>


                <ul id="productDetail" class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Product Review</a></li>
                </ul>
                <div id="myTabContent" class="tab-content tabWrapper">
                    <div class="tab-pane fade active in" id="home">
                        @foreach($products->reviews as $review)
                            <div class="row-fluid">
                                <div class="span12">
                                    <h5>{{ $review->user->username }}</h5>
                                    <p>
                                        {{ $review->review }}
                                    </p>
                                </div>
                            </div>
                            <hr class="soft">
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>

        $(document).ready(function () {
            $('#btn-cart').on('click', function (e) {
                e.preventDefault();
                let id = $('#pid').val();
                let qty = $('#qty').val();
                let price = $('#price').val();
                let data = {
                    '_token': "{{ csrf_token() }}",
                    id: id,
                    price: price,
                    qty: qty
                };
                addToCart(data);
            })


        })
    </script>
@endsection
