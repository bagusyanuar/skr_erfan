@extends('admin.layouts')

@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-cube mr-2"></i>Vouchers</div>
        <div class="my-text-semi-dark f14">All Available Vouchers / Promos</div>
    </div>
@endsection
@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
        <li class="breadcrumb-item active">Vouchers</li>
    </ol>
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="mr-auto p-2 f20 f-bold">List Vouchers</div>
                <a href="/admin/vouchers/add" class="btn my-button my-rounded pl-3 pr-3">
                    <i class="fa fa-plus mr-3"></i>New
                </a>
            </div>
            <div class="dropdown-divider mt-4"></div>
            @if(count($vouchers) > 0)
                <table id="my-table" class="table display">
                    <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="15%">Voucher Code</th>
                        <th width="30%">Voucher Name</th>
                        <th width="15%">Type</th>
                        <th width="15%">Amount</th>
                        <th width="15%">Minimal</th>
                        <th width="15%">Status</th>
                        <th width="10%" class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($vouchers as $voucher)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $voucher->code }}</td>
                            <td>{{ $voucher->name }}</td>
                            <td>{{ $voucher->type }}</td>
                            <td>{{ $voucher->percent == true ? $voucher->amount.' %' :  $voucher->amount }}</td>
                            <td>{{ $voucher->minimal }}</td>
                            <td>{{ $voucher->active == true ?  'Active' : 'Inactive'}}</td>
                            <td class="text-center">
                                <a data-id="{{ $voucher->id }}" href="/admin/vouchers/edit/{{$voucher->id}}"><i
                                        class="fa fa-edit"></i></a>
                                <a data-id="{{ $voucher->id }}" href="#"><i class="fa fa-trash-o"></i></a>
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
