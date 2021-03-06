@extends('admin.layouts')
@section('content-title')
    <div>
        <div class="f20 f-bold" style="letter-spacing: 1px;"><i class="fa fa-cube mr-2"></i>Vouchers</div>
        <div class="my-text-semi-dark f14">All Available Vouchers / Promos</div>
    </div>
@endsection
@section('breadcrumb')
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/vouchers">Vouchers</a></li>
            <li class="breadcrumb-item active">New</li>
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
                    <div class="card-title">Form Vouchers</div>
                </div>
                <div class="card-body">
                    <x-lazy.form.form-basic action="/admin/vouchers/patch" type="edit" id="{{ $vouchers->id }}">
                        <x-lazy.input.text id="code" name="code" label="Voucher Code" value="{{ old('code', $vouchers->code) }}"/>
                        <x-lazy.input.text id="name" name="name" label="Voucher Name" value="{{ old('code', $vouchers->name) }}"/>
                        <x-lazy.input.select id="type" name="type" label="Voucher Type">
                                <option value="public" {{ $vouchers->type == 'public' ? 'selected="selected"' : '' }}>Public</option>
                                <option value="birthday" {{ $vouchers->type == 'birthday' ? 'selected="selected"' : '' }}>Birthday</option>
                        </x-lazy.input.select>
                        <x-lazy.input.select id="percent" name="percent" label="Amount Type">
                            <option value=0 {{ $vouchers->percent == false ? 'selected="selected"' : '' }}>Nominal</option>
                            <option value=1 {{ $vouchers->percent == true ? 'selected="selected"' : '' }}>Percentage</option>
                        </x-lazy.input.select>
                        <x-lazy.input.text id="amount" name="amount" label="Amount" type="number" value="{{ old('amount', $vouchers->amount) }}"/>
                        <x-lazy.input.text id="minimal" name="minimal" label="Minimal" type="number" value="{{ old('minimal', $vouchers->minimal) }}"/>
                        <x-lazy.input.select id="active" name="active" label="Voucher Status">
                            <option value=0 {{ $vouchers->active == false ? 'selected="selected"' : '' }}>Inactive</option>
                            <option value=1 {{ $vouchers->active == true ? 'selected="selected"' : '' }}>Active</option>
                        </x-lazy.input.select>
                        <div class="dropdown-divider mt-3 mb-3"></div>
                        <div class="text-right">
                            <button class="btn my-button my-rounded pl-3 pr-3"><i class="fa fa-send-o mr-2"></i>Save
                            </button>
                        </div>
                    </x-lazy.form.form-basic>
                </div>
            </div>
        </div>
    </div>

@endsection

