@extends('shop.layout')

@section('content')

    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">/</span></li>
                <li class="active">Login</li>
            </ul>
            <h3 style="text-align: center">Login</h3>
            <hr class="soft"/>
            @if(\Illuminate\Support\Facades\Session::has('failed'))
                <div class="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oops</strong> Periksa Kembali Username dan Password anda
                </div>
            @endif
            <div class="row" style="display: flex; justify-content: center">
                <div class="span4">
                    <div class="well">
                        <h5>Login</h5>
                        <form action="/post-login" method="POST">
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Username</label>
                                <div class="controls">
                                    <input class="span3"  type="text" placeholder="Username" name="username">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" class="span3" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="defaultBtn">Masuk</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
