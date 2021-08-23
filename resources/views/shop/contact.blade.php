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
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.926290564006!2d110.73911271432426!3d-7.5830024770194!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a152e607cf3bb%3A0x158d219ca8d986e0!2sRahma%20Jaya%20Rotan%20(Isbiyat)!5e0!3m2!1sen!2sid!4v1629696393873!5m2!1sen!2sid" width="400" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection
