@extends('admin.layouts')

@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-tags mr-2"></i>Payment</div>
    </div>

@endsection
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Payment</li>
    </ol>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="mr-auto p-2 f20 f-bold">List Incoming Payment</div>
            </div>
            <div class="dropdown-divider mt-4"></div>
            @if(count($payment) > 0)
                <table id="my-table" class="table display">
                    <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="80%">No. Transaksi</th>
                        <th width="80%">Total Belanja</th>
                        <th width="80%">Tujuan</th>
                        <th width="80%">Bank</th>
                        <th width="80%">Pemesan</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payment as $v)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $v->transaction->no_transaksi }}</td>
                            <td>{{ $v->transaction->amount - $v->transaction->discount + $v->transaction->ongkir }}</td>
                            <td>{{ $v->transaction->tujuan }}</td>
                            <td>{{ $v->vendor->name }}</td>
                            <td>{{ $v->user->profiles->name }}</td>
                            <td class="text-center">
                                <a data-id="{{ $v->id }}" href="/admin/transaction/detail/{{$v->id}}">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div class="d-flex align-items-center justify-content-center h-50">
                    <div class="pt-lg-5">
                        <img class="img-fluid" src="{{ asset('images/nodata.png') }}" width="400" alt="">
                        <div class="text-center" style="font-size: 30px; font-weight: bold">No Incoming Payments</div>
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
                    let res = await $.post('/admin/categories/destroy/'+id, data);
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
            $('#my-table').DataTable();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
