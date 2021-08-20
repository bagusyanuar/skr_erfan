@extends('layouts')

@section('content')
    <section class="breadcrumb-section set-bg" data-setbg="" style="background-color: #7FAD39">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>PRODUK TERSEDIA</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Produk</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="d-flex align-items-center mt-3">
            <select class="form-control w-25 mr-2" id="category" name="category">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ app('request')->get('category') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                @endforeach
            </select>
            <div style="flex-grow: 1" class="w-100 mr-2">
                <input id="search" type="text" class="form-control" aria-describedby="emailHelp"
                       placeholder="Search By Product Name">
            </div>
            <div>
                <button onclick="getProducts()" class="my-button btn" id="btn-search"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div class="dropdown-divider"></div>
        <section class="featured spad">
            <div class="row featured__filter" id="products-panel">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/images/uploads/sim-im3.jpg">
                            <img src="/images/uploads/sim-im3.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="/products"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="/products">a</a></h6>
                            <h5>a</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <div class="my-card p-4 mb-2">

    </div>
@endsection

@section('js')

    <script>
        async function getProducts(){

            let parameter = {
                category: $('#category').val() || '',
                search: $('#search').val() || ''
            };

            let data = await fetchData('/ajax/products', parameter);
            lazyElement('#products-panel').setProducts(data).createCard();
        }
        $(document).ready(function () {
            getProducts();
            $('#btn-search').on('click', function () {
                getProducts();
            });

            $('#category').on('change', function () {
                getProducts()
            })
        });
    </script>
@endsection
