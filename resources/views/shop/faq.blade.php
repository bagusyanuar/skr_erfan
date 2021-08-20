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
    <h3>Frequently Ask Question (FAQ)</h3>
    <div class="content" id="content">
        @foreach($faq as $v)
            <div class="card-faq">
                <h5><a href="#">{{ $loop->index + 1 }}. {{ $v->question }}</a></h5>
                <p>{{ $v->answer }}</p>
            </div>
        @endforeach
    </div>

@endsection

@section('js')
@endsection
