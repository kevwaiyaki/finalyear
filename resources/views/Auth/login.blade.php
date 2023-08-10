@extends('layouts.app')

@section('content')
<style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
    .main{
        width: 100%;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(34, 6, 27, 0.73)),url({{url('images/dek.jpg')}});
        background-attachment: fixed;
        background-size: cover;
        background-size: cover;
        height: 100vh;
    }
    .navbar{
        width: 1200px;
        height: 75px;
        margin: auto;
    }
    .icon{
        width: 200px;
        float: left;
        height: 70px;
    }
    .logo{
        color: #fbff00;
        font-size: 35px;
        font-family: Arial;
        padding-left: 20px;
        float: left;
        padding-top: 10px;
        margin-top: 5px
    }

    .menu{
        width: 400px;
        float: left;
        height: 70px;
    }
    ul{
        float: left;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    ul li{
        list-style: none;
        margin-left: 62px;
        margin-top: 27px;
        font-size: 14px;
    }
    ul li a{
        text-decoration: none;
        color: #fff;
        font-family: Arial;
        font-weight: bold;
        transition: 0.4s ease-in-out;
    }
    ul li a:hover{
        color: #fbff00;
    }
    .search{
        width: 330px;
        float: left;
        margin-left: 270px;
    }
    .btn{
        width: 100px;
        height: 40px;
        background: #fbff00;
        border: 2px solid #fbff00;
        margin-top: 13px;
        color: #000;
        font-size: 15px;
        border-bottom-right-radius: 5px;
        border-bottom-right-radius: 5px;
        transition: 0.2s ease;
        cursor: pointer;
    }
    .btn:hover{
        color: #fff;
    }
    .btn:focus{
        outline: none;
    }
    .srch:focus{
        outline: none;
    }
    .content{
        width: 1200px;
        height: auto;
        margin: auto;
        color: #fff;
        position: relative;
    }
    .content .par{
        padding-left: 20px;
        padding-bottom: 25px;
        font-family: Arial;
        letter-spacing: 1.2px;
        line-height: 30px;
    }
    .content h1{
        font-family: 'Times New Roman';
        font-size: 50px;
        padding-left: 20px;
        margin-top: 9%;
        letter-spacing: 2px;
    }
    .content .cn{
        width: 160px;
        height: 40px;
        background: #fbff00;
        border: none;
        margin-bottom: 10px;
        margin-left: 20px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        transition: .4s ease;
    }
    .content .cn a{
        text-decoration: none;
        color: #000;
        transition: .3s ease;
    }
    .cn:hover{
        background-color: #fff;
    }
    .content span{
        color: #fbff00;
        font-size: 65px
    }
    .form{
        width: 250px;
        height: 430px;
        background: linear-gradient(to top, rgba(0,0,0,0.8)50%,rgba(0,0,0,0.8)50%);
        position: absolute;
        top: -20px;
        left: 870px;
        transform: translate(0%,-5%);
        border-radius: 10px;
        padding: 25px;
    }
    .form h2{
        width: 220px;
        font-family: sans-serif;
        text-align: center;
        color: #325f03;
        font-size: 22px;
        background-color: #fff;
        border-radius: 10px;
        margin: 2px;
        padding: 8px;
    }
    .form input:not(#remember){
        width: 240px;
        height: 15px;
        background: transparent;
        border-bottom: 1px solid #325f03;
        border-top: none;
        border-right: none;
        border-left: none;
        color: #fff;
        font-size: 15px;
        letter-spacing: 1px;
        margin-top: 30px;
        font-family: sans-serif;
    }
    .form input:focus{
        outline: none;
    }
    ::placeholder{
        color: #fff;
        font-family: Arial;
    }
    .btnn{
        width: 240px;
        height: 40px;
        background: #325f03;
        border: none;
        margin-top: 30px;
        font-size: 18px;
        border-radius: 10px;
        cursor: pointer;
        color: #fff;
        transition: 0.4s ease;
    }
    .btnn:hover{
        background: #fff;
        color: #325f03;
    }
    .btnn a{
        text-decoration: none;
        color: #000;
        font-weight: bold;
    }
    .form .link{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 17px;
        padding-top: 20px;
        text-align: center;
    }
    .form .link a{
        text-decoration: none;
        color: #325f03;
    }
    .liw{
        padding-top: 15px;
        padding-bottom: 10px;
        text-align: center;
    }
</style>
<div class="main">
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">COD's </h2>
        </div>
    </div>
    <div class="content">
        <h1>Cooperative university<br><span>Help Desk</span> <br>Admin panel</h1>
        <p class="par">This is the Cooperative university Help Desk Where the views of Students are hard and answered <br>This is where Chairman of Department is required to login
            <br> and attend to the issues brought forth by students of there respective department</p>
            <button class="cn"><a href="/">Home Page</a></button>
        <div class="form">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h2>{{ __('Login') }}</h2></div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                    <br>
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <em style="color: white; font-size: 10px;">{{ $message }}</em>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <br>
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <em style="color: white; font-size: 10px;">{{ $message }}</em>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div id="check">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
