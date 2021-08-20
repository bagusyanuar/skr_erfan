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
                <div class="mr-auto p-2 f20 f-bold">Laporan Penjualan</div>
                <a href="#" onclick="reload()" class="btn my-button my-rounded pl-3 pr-3">
                    <i class="fa fa-search mr-3"></i>Cari
                </a>
            </div>
            <div class="dropdown-divider"></div>
            <h5 class="f-bold mb-0">Filter Tanggal</h5>
            <div class="d-flex align-items-center">
                <x-lazy.input.text id="tgl1" name="tgl1" type="date"></x-lazy.input.text>
                <span class="mr-1 ml-1"> Sampai Dengan </span>
                <x-lazy.input.text id="tgl2" name="tgl2" type="date"></x-lazy.input.text>
            </div>
            <div class="w-100">
                <x-lazy.input.text id="filter" name="filter" type="text"
                                   label="No. Transaksi / Username"></x-lazy.input.text>
            </div>
            <table id="my-table" class="table display">
                <thead>
                <tr>
                    <th width="10%">#</th>
                    <th width="20%">No. Transaksi</th>
                    <th width="20%">Username</th>
                    <th width="20%">Belanja</th>
                    <th width="20%">Discount</th>
                    <th width="20%">Ongkir</th>
                    <th width="20%">Total</th>
                    <th width="20%">Status</th>
                </tr>
                </thead>
            </table>
            <div class="dropdown-divider"></div>
            <div class="text-right">
                <a href="#" onclick="cetak()" class="btn my-button my-rounded pl-3 pr-3">
                    <i class="fa fa-print mr-3"></i>Cetak
                </a>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        let table;

        function cetak() {
            event.preventDefault();
            let tgl1 = $('#tgl1').val();
            let tgl2 = $('#tgl2').val();
            let filter = $('#filter').val();
            window.open('/admin/report/selling/print?tgl1=' + tgl1 + '&tgl2=' + tgl2 + '&filter=' + filter, '_blank');
        }

        function reload() {
            event.preventDefault();
            table.ajax.reload();
        }

        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            table = $('#my-table').DataTable({
                "scrollX": true,
                processing: true,
                ajax: {
                    type: 'GET',
                    url: '/admin/report/selling/list',
                    'data': function (d) {
                        return $.extend(
                            {},
                            d,
                            {
                                'tgl1': $('#tgl1').val(),
                                'tgl2': $('#tgl2').val(),
                                'filter': $('#filter').val(),
                            }
                        );
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable: false, orderable: false},
                    {data: 'no_transaksi'},
                    {
                        data: 'cart', render: function (data) {
                            return data[0]['user']['username'];
                        }
                    },
                    {data: 'amount'},
                    {data: 'discount'},
                    {data: 'ongkir'},
                    {
                        data: null, render: function (data, type, row, meta) {
                            return data['amount'] - data['discount'] + data['ongkir'];
                        }
                    },
                    {
                        data: 'status', render: function (data) {
                            let stat = 'Menunggu';
                            switch (data) {
                                case '0':
                                    stat = 'Menunggu';
                                    break;
                                case '1':
                                    stat = 'Di Terima';
                                    break;
                                case '2':
                                    stat = 'Di Tolak';
                                    break;
                                default:
                                    break
                            }
                            return stat;
                        }
                    }
                ],

            });
        });

    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
