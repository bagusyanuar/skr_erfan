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
    <h3>Hubungi Kami</h3>
    <div class="content" id="content">
        <div class="row">
            <div class="span8">
                <p>Kami siap melayani order dalam waktu 24 jam seminggu di nomor : 089673266623</p>
                <p>atau bisa mengunjungi toko kami di alamat :</p>
                <p>Jl. Jalan Raya no 47. Kabupaten Sukoharjo</p>
            </div>
            <div class="span4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1317076743358!2d110.8466151143239!3d-7.560615576758977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a170e2911d811%3A0xd502530cd1f7312!2sAlmamater%20Coffee%20%26%20Eatery!5e0!3m2!1sen!2sid!4v1629385827114!5m2!1sen!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection
