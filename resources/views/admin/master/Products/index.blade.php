@extends('admin.layouts')

@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-cube mr-2"></i>Products</div>
        <div class="my-text-semi-dark f14">All Available Products</div>
    </div>

@endsection
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="mr-auto p-2 f20 f-bold">List Products</div>
                <a href="/admin/products/add" class="btn my-button my-rounded pl-3 pr-3">
                    <i class="fa fa-plus mr-3"></i>New
                </a>
            </div>
            <div class="dropdown-divider mt-4"></div>
            @if(count($products) > 0)
                <table id="my-table" class="table display">
                    <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="15%">Category Name</th>
                        <th width="30%">Product Name</th>
                        <th width="15%">Price (Rp.)</th>
                        <th width="15%">Qty</th>
                        <th width="30%">Description</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->qty }}</td>
                            <td>{{ $product->description }}</td>
                            <td class="text-center">
                                <a data-id="{{ $product->id }}" href="/admin/products/edit/{{$product->id}}"><i
                                        class="fa fa-edit"></i></a>
                                <a data-id="{{ $product->id }}" href="#" onclick="destroy('{{ $product->id }}')"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="d-flex align-items-center justify-content-center h-50">
                    <div class="pt-lg-5">
                        <img class="img-fluid" src="{{ asset('images/nodata.png') }}" width="400" alt="">
                        <div class="text-center" style="font-size: 30px; font-weight: bold">You Have No Data</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        function destroy(id) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(async (result) => {
                if (result.value) {
                    let data = {
                        '_token': '{{ csrf_token() }}'
                    };
                    let res = await $.post('/admin/products/destroy/'+id, data);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    window.location.reload()
                }
            })
        }
        $(document).ready(function () {
            $('#my-table').DataTable({
                "scrollX": true
            });
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
