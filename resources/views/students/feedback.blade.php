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
    .btn{
        width: 60px;
        height: 40px;
        background: #13039e;
        color: #fff;
        font-size: 15px;
    }
    .btn:hover{
        color: #000;
    }

    .btn:focus{
        outline: none;
    }
    .btns{
        width: 100px;
        height: 40px;
        background: #325f03;
        border: 2px solid #325f03;
        margin-top: 13px;
        color: #fff;
        font-size: 15px;
        border-bottom-right-radius: 5px;
        border-bottom-right-radius: 5px;
        transition: 0.2s ease;
        cursor: pointer;
    }
    .btns:hover{
        color: #000;
    }
    .btn:focus{
        outline: none;
    }
    .content{
        width: 1200px;
        height: auto;
        margin-top: 30px;
        color: rgb(0, 0, 0);
        position: relative;
    }
    .content h1{
        font-family: 'Times New Roman';
        font-size: 50px;
        padding-left: 20px;
        margin-top: 9%;
        letter-spacing: 2px;
    }
    .form{
        width: 400px;
        height: 430px;
        background: linear-gradient(to top, rgba(255, 255, 255, 0.8)50%,rgba(255, 255, 255, 0.8)50%);
        position: absolute;
        top: -20px;
        left: 500px;
        transform: translate(0%,-5%);
        border-radius: 10px;
        padding: 25px;
        padding-top: 30px;
        padding-left: 80px;
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
        height: 35px;
        background: transparent;
        border-bottom: 1px solid #325f03;
        border-top: none;
        border-right: none;
        border-left: none;
        color: #fff;
        font-size: 15px;
        letter-spacing: 2px;
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
    a {
        color: #ffffff;
        text-align: center;
        text-decoration: none;
    }
    a:hover {
        color: #ffffff;
        text-align: center;
        text-decoration: none;
    }
    @media screen and (max-width:800px){
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .form{
            width: 400px;
            height: 430px;
            background: linear-gradient(to top, rgba(255, 255, 255, 0.8)50%,rgba(255, 255, 255, 0.8)50%);
            position: absolute;
            top: -20px;
            left: 50px;
            transform: translate(0%,-5%);
            border-radius: 10px;
            padding: 25px;
            padding-top: 30px;
            padding-left: 80px;
        }
    }
</style>
<div class="main">
    <div class="navbar">
    </div>
    <div class="content">
        <div class="form">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="display: flex;justify-content: space-between;">
                            <h2>Ticket Feedback</h2>
                            <button type="button" class="btn btn-primary" ><a style="color:#ffffff;" href="/homes">Back</a></button>
                        </div>
                        <div class="card-body">
                            <form action="{{route('Feedback.create') }}" enctype="multipart/form-data" method="GET">
                                @csrf
                                <div class="form-group row" style="margin-top: 25px;">
                                    <label>Type your Ticket Number:</label>
                                    <div class="col-md-6">
                                        <input type="text" class="" name="ticket_no" value="">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btns">
                                            Submit
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
