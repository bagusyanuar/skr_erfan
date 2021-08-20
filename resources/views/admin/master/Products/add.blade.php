@extends('admin.layouts')
@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-cube mr-2"></i>Products</div>
        <div class="my-text-semi-dark f14">Form Input Products</div>
    </div>
@endsection
@section('breadcrumb')
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/products">Products</a></li>
            <li class="breadcrumb-item active">New</li>
        </ol>
    </div>
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Menyimpan Data!',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12">
            <div class="card my-card">
                <div class="card-header">
                    <div class="card-title">Form Products</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/admin/products/store" enctype="multipart/form-data">
                        @csrf
                        <x-lazy.input.select id="category" name="category" label="Product Category">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-lazy.input.select>
                        <x-lazy.input.text id="name" name="name" label="Product Name"/>
                        <x-lazy.input.text id="price" name="price" label="Product Price" type="number" value="0"/>
                        <x-lazy.input.text id="qty" name="qty" label="Initial Stock" type="number" value="0"/>
                        <x-lazy.input.area id="description" name="description" label="Product Description">

                        </x-lazy.input.area>
                        <x-lazy.input.file id="images" name="images" label="Product Image"/>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="text-right">
                            <button class="btn my-button my-rounded pl-3 pr-3"><i class="fa fa-send-o mr-2"></i>Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

