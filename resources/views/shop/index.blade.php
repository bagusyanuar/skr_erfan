@extends('shop.layout')

@section('content')
    <div class="row">
        @includeWhen($isHome, 'shop.sidemenu', ['categories' => $categories])
        <div class="{{ $isHome === true ? 'span9' : 'span12' }}">
            <div class="well well-small">
                <h3>Our Products </h3>
                <div class="row-fluid">
                    <ul class="thumbnails">
                        @foreach($products as $product)
                            <li class="span4">
                                <div class="thumbnail">
                                    <a href="product_details.html" class="overlay"></a>
                                    <a class="zoomTool"  href="/products/{{$product->id}}" title="add to cart"><span
                                            class="icon-search"></span> QUICK VIEW</a>
                                    <a href="/products/{{$product->id}}"><img src="{{ asset('/images/uploads/'.$product->images) }}" alt=""
                                                                              style="height: 180px"></a>
                                    <div class="caption cntr">
                                        <p>{{ $product->name }}</p>
                                        <p><strong> Rp. {{ number_format($product->price, 0, ',', '.') }}</strong></p>
                                        <h4><a data-id="{{ $product->id }}" data-price="{{ $product->price }}" data-name="{{ $product->name }}" class="shopBtn btn-cart" href="#" title="add to cart"> Add to cart </a></h4>
                                        <br class="clr">
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).ready(function () {

            $('.btn-cart').on('click', function (e) {
                e.preventDefault();
                let id = this.dataset.id;
                let price = this.dataset.price;
                let qty = 1;
                let data = {
                    '_token': "{{ csrf_token() }}",
                    id: id,
                    price: price,
                    qty: qty
                }
                addToCart(data);
            })
        })
    </script>
    @endsection
