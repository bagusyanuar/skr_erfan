@extends('shop.layout')

@section('content')
    <style>
        .content {
            min-height: 400px;
        }

        .loader {
            width: 100%;
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse">
                    <div style="width: 100%; display: flex; justify-content: space-between">
                        <form action="#" class="navbar-search form-inline pull-left w-100" style="width: 100%">
                            <input type="text" placeholder="Search" id="search" class="search-query span2"
                                   style="width: 60%">
                            <div class="input-append">
                                <button id="btn-search" class="btn" type="button"><span class="icon-search"></span>
                                </button>
                            </div>
                            <select id="category" name="category">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $v)
                                    <option value="{{ $v->id }}" {{ $selected == $v->id ? 'selected' : '' }}>{{ $v->name  }}
                                    </option>
                                @endforeach
                            </select>
                        </form>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <h3>Produk Kami</h3>
    <div class="content" id="content">
        <div class="loader">
            <h3>Sedang Memuat Data...</h3>
        </div>
    </div>

@endsection

@section('js')


    <script>
        function card(data) {
            return '<li class="span3">\n' +
                '                <div class="thumbnail">\n' +
                '                    <a href="product_details.html" class="overlay"></a>\n' +
                '                    <a class="zoomTool" href="/products/' + data['id'] + '" title="add to cart"><span class="icon-search"></span>\n' +
                '                        QUICK VIEW</a>\n' +
                '                    <a href="/products/' + data['id'] + '"><img src="/images/uploads/' + data['images'] + '" alt="" style="height: 180px"></a>\n' +
                '                    <div class="caption cntr">\n' +
                '                        <p>' + data['name'] + '</p>\n' +
                '                        <p><strong>Rp' + formatUang(data['price']) + '</strong></p>\n' +
                '                        <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>\n' +
                '                        <br class="clr">\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </li>';
        }

        function cardContainer() {
            return '<ul class="thumbnails" id="card-container"></ul>'
        }

        async function getProducts() {
            let parameter = {
                category: $('#category').val() || '',
                search: $('#search').val() || ''
            };
            $('#content').empty();
            $('#content').append(
                '<div class="loader">' +
                '<h3>Sedang Memuat Data...</h3>' +
                '</div>'
            );

            try {
                let response = await $.get('/ajax/products', parameter);
                $('#content').empty();

                if (response['status'] === 200) {
                    let payload = response['payload'];
                    if(payload.length > 0) {
                        $('#content').append(cardContainer());
                        $.each(payload, function (k, v) {
                            $('#card-container').append(card(v));
                        })
                    }else{
                        $('#content').append(
                            '<div class="loader">' +
                            '<h3>Maaf Produk Yang Anda Cari Tidak Tersedia...</h3>' +
                            '</div>'
                        );
                    }
                } else {
                    $('#content').append(
                        '<div class="loader">' +
                        '<h3>Gagal Memuat Data...</h3>' +
                        '</div>'
                    );
                }
            } catch (e) {
                $('#content').append(
                    '<div class="loader">' +
                    '<h3>Gagal Memuat Data...</h3>' +
                    '</div>'
                );
            }
            console.log(response);
        }

        $(document).ready(function () {
            getProducts();
            $('#btn-search').on('click', function () {
                getProducts();
            });

            $('#category').on('change', function () {
                getProducts()
            })
        })
    </script>
@endsection
