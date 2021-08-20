@extends('admin.layouts')

@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-tags mr-2"></i>FAQ</div>
        <div class="my-text-semi-dark f14">FAQ</div>
    </div>
@endsection
@section('breadcrumb')
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/faq">FAQ</a></li>
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
                    <div class="card-title">Form FAQ</div>
                </div>
                <div class="card-body">
                    <form action="/admin/faq/patch" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $faq->id }}">
                        <div class="form-group">
                            <input value="{{ old('question', $faq->question) }}" type="text" class="form-control" id="question" name="question" aria-describedby="emailHelp" placeholder="Question" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="answer" name="answer" aria-describedby="emailHelp" placeholder="Answer" required>{{ old('answer', $faq->answer) }}</textarea>
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
