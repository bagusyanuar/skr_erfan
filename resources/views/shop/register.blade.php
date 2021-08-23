@extends('shop.layout')

@section('content')

    <div class="row">
        <div class="span12">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider">/</span></li>
                <li class="active">Register</li>
            </ul>
            <h3 style="text-align: center">Register</h3>
            <hr class="soft"/>
            @if(\Illuminate\Support\Facades\Session::has('failed'))
                <div class="alert">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Oops</strong> Periksa Kembali Data Anda
                </div>
            @endif
            <div class="row" style="display: flex; justify-content: center">
                <div class="span4">
                    <div class="well">
                        <h5>Register</h5>
                        <form action="/post-register" method="POST">
                            @csrf
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Username</label>
                                <div class="controls">
                                    <input class="span3"  type="text" placeholder="Username" name="username">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Email</label>
                                <div class="controls">
                                    <input class="span3"  type="email" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" class="span3" placeholder="Password" name="password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Nama Lengkap</label>
                                <div class="controls">
                                    <input class="span3"  type="text" placeholder="Nama Lengkap" name="name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Tanggal Lahir</label>
                                <div class="controls">
                                    <input class="span3"  type="date" placeholder="Tanggal Lahir" name="dob">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Alamat</label>
                                <div class="controls">
                                    <textarea class="span3"  type="date" placeholder="Alamat" name="address"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">No. Hp</label>
                                <div class="controls">
                                    <input class="span3"  type="number" placeholder="No Hp" name="phone">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" class="defaultBtn">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
