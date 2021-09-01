@extends('admin.layouts')

@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-cube mr-2"></i>Member</div>
        <div class="my-text-semi-dark f14">Semua Data Member</div>
    </div>
@endsection
@section('breadcrumb')
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item active">Member</li>
        </ol>
    </div>
@endsection
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: 'Berhasil Mengirim Email!',
                icon: 'success',
                confirmButtonText: 'Ok'
            })
        </script>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <div class="mr-auto p-2 f20 f-bold">List Member</div>
{{--                <a href="/admin/admin/add" class="btn my-button my-rounded pl-3 pr-3">--}}
{{--                    <i class="fa fa-plus mr-3"></i>New--}}
{{--                </a>--}}
            </div>
            <div class="dropdown-divider mt-4"></div>
            @if(count($members) > 0)
                <table id="my-table" class="table display">
                    <thead>
                    <tr>
                        <th width="10%">#</th>
                        <th width="15%">Email</th>
                        <th width="15%">Nama Lengkap</th>
                        <th width="15%">No. Telp</th>
{{--                        <th width="10%" class="text-center">Action</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $member->user->email }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->phone }}</td>
{{--                            <td class="text-center">--}}
{{--                                <a class="email-user" data-email="{{ $member->user->email }}" href="#" id=""><i--}}
{{--                                        class="fa fa-envelope "></i></a>--}}
{{--                                --}}{{--                                <a data-id="{{ $admin->id }}" href="#" onclick="destroy('{{ $admin->user->id }}')"><i class="fa fa-trash-o"></i></a>--}}
{{--                            </td>--}}
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kirimi Member Ini Promo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-email" method="post" action="/admin/member/email-send">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email</label>
                            <input type="email" class="form-control" id="emailUser" name="email"
                                   aria-describedby="emailHelp" placeholder="Enter email" value="">
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Pesan</label>
                            <textarea class="form-control" id="isi" rows="3" name="isi"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button id="btn-email" type="button" class="btn btn-primary">Kirim Email</button>
                </div>
            </div>
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
                    let res = await $.post('/admin/admin/destroy/' + id, data);
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

            $('.email-user').on('click', function (e) {
                e.preventDefault();
                let email = this.dataset.email;
                $('#emailUser').val(email);
                $('#exampleModal').modal('show');
            })

            $('#btn-email').on('click', function (e) {
                $('#form-email').submit();
            })
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap4.min.css') }}">
@endsection
