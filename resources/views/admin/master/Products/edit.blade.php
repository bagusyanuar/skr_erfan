@extends('admin.layouts')

@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-cube mr-2"></i>Products</div>
        <div class="my-text-semi-dark f14">Form Edit Products</div>
    </div>
@endsection
@section('breadcrumb')
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/products">Products</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Merubah Data!',
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
                    <form action="/admin/products/patch" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <div class="form-group">
                            <label for="category">Categories</label>
                            <select class="custom-select" name="category" id="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id ==  $products->category_id ? 'selected="selected"' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input value="{{ old('name', $products->name) }}" type="text" class="form-control" id="name" name="name"
                                   aria-describedby="emailHelp" placeholder="Product Name" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input value="{{ old('price', $products->price) }}" type="number" class="form-control" id="price" name="price"
                                   aria-describedby="emailHelp" placeholder="Product Price" required>
                        </div>
                        <div class="form-group">
                            <label for="qty">Qty</label>
                            <input value="{{ old('qty', $products->qty) }}" type="number" class="form-control" id="qty" name="qty"
                                   aria-describedby="emailHelp" placeholder="Product Stock" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea rows="3" class="form-control" id="description" name="description"
                                      aria-describedby="emailHelp"
                                      placeholder="Product Description">{{ old('description',$products->description) }}</textarea>
                        </div>
                        @if($products->images !== '')
                            <div class="text-center">
                                <div class="text-center">Available Image</div>
                                <img src="{{ asset('images/uploads') }}/{{ $products->images }}" alt="" width="100">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="images">Change Image</label>
                            <input type="file" class="form-control-file" id="images" name="images">
                        </div>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="text-right">
                            <button class="btn my-button my-rounded pl-3 pr-3"><i class="fa fa-send-o mr-2"></i>Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
