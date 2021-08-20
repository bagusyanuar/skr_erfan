@extends('shop.layout')

<style>
    .content {
        min-height: 400px;
    }

    .loader {
        width: 100%;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card-faq {
        padding: 20px 20px;
        background-color: white;
        border-radius: 10px;
    }
</style>
@section('content')
    <h3>Tentang Kami</h3>
    <div class="content" id="content">
        Rahma Jaya Rotan adalah industri mebel rotan yang berada di desa trangsan.
    </div>

@endsection

@section('js')
@endsection
