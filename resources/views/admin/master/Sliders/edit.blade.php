@extends('admin.layouts')
@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-cube mr-2"></i>Sliders</div>
        <div class="my-text-semi-dark f14">All Sliders</div>
    </div>
@endsection
@section('breadcrumb')
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/sliders">Sliders</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="toast-auto-close my-toast-success d-flex align-items-center">
            <i class="fa fa-check f24 my-text-light mr-2"></i>
            <div class="my-text-light f14">Success!</div>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12">
            <div class="card my-card">
                <div class="card-header">
                    <div class="card-title">Form Sliders</div>
                </div>
                <div class="card-body">
                    <x-lazy.form.form-file action="/admin/sliders/patch" type="edit" id="{{ $sliders->id }}">
                        @if($sliders->url !== '')
                            <div class="text-center">
                                <div class="text-center">Available Image</div>
                                <img src="{{ asset('images/sliders') }}/{{ $sliders->url }}" alt="" width="100">
                            </div>
                        @endif
                        <x-lazy.input.file id="images" name="images" label="Sliders Image"/>
                        <x-lazy.input.select id="active" name="active" label="Sliders Status">
                            <option value=0 {{ $sliders->active == false ? 'selected="selected"' : '' }}>Inactive</option>
                            <option value=1 {{ $sliders->active == true ? 'selected="selected"' : '' }}>Active</option>
                        </x-lazy.input.select>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="text-right">
                            <button class="btn my-button my-rounded pl-3 pr-3"><i class="fa fa-send-o mr-2"></i>Save
                            </button>
                        </div>
                    </x-lazy.form.form-file>
                </div>
            </div>
        </div>
    </div>

@endsection

