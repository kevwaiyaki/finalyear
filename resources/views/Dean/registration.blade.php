@extends('Dean.layout')

@section('content')
<style>
    body {font-family: Arial, Helvetica, sans-serif;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(34, 6, 27, 0.73)),url({{url('images/dek.jpg')}});
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repet;
        background-position: center center;
        height: 100%;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    .option{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    button {
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }
    .cancelbtn {
      width: auto;
      padding: 10px 18px;
      background-color: green;
    }
    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
      position: relative;
    }
    img.avatar {
      width: 20%;
      border-radius: 50%;
    }
    .container {
      padding: 16px;
    }
    span.psw {
      float: right;
      padding-top: 16px;
    }
    .modal-content {
      background-color: #fefefe;
      margin: 5% auto 15% auto;
      border: 1px solid #888;
      width: 80%;
    }
    .animate {
      -webkit-animation: animatezoom 0.6s;
      animation: animatezoom 0.6s
    }
    @-webkit-keyframes animatezoom {
      from {-webkit-transform: scale(0)}
      to {-webkit-transform: scale(1)}
    }
    @keyframes animatezoom {
      from {transform: scale(0)}
      to {transform: scale(1)}
    }
    @media screen and (max-width: 300px) {
      span.psw {
         display: block;
         float: none;
      }
      .cancelbtn {
         width: 100%;
      }
    }
</style>
<div class="col-sm-8">
    <div class="modal-content animate">
        <div class="container">
                @if(Session::get('register_status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{Session::get('register_status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
            <div class="search">
                <?php
                    session_start();
                    $db = mysqli_connect('localhost', 'root', '', 'egait');
                    if (!$db) {
                        echo "connection failed";
                    }
                    $school='';
                    if(isset($_GET['submit'])){
                        $school = htmlspecialchars($_GET['school']);
                        $slq = "INSERT into cod(school) values ('$school')";
                        $result = mysqli_query($db,$slq);
                        if($result){
                            echo "done";
                        }
                    }
                ?>
                <form action="" method="GET">
                    <input class="srch" type="text" name="school" placeholder="Add new school">
                    <button type="submit" name="submit" class="btn">create</button></a>
                </form>
            </div>
            <div class="imgcontainer">
                <img src="{{url('/images/food16.jpg')}}" alt="Avatar" class="avatar">
            </div>
            <form action="registerUser" method="post" return="false">
                @csrf
                <div class="form-group">
                    <label>school</label>
                    <select class="option" name="school" value="{{ old('school') }}" placeholder="Enter The school" required>
                        <?php $result = mysqli_query($db,"SELECT school FROM cod ");
                            while($row = mysqli_fetch_array($result))
                            {
                            echo "<option value='" . $row['school'] . "'>" .$row['school'] . "</option>";
                            }
                        ?>
                    </select>
                </div>
                @error('school')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label>Name
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" required>
                </div>
                @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
                <div class="form-group">
                    <label>Email
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
                </div>
                @error('email')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label>Password
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Password" required>
                </div>
                @error('password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group">
                    <label>Confirm Password
                    <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control" placeholder="Confirm Password" required>
                </div>
                @error('confirm_password')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
<script>
    if(typeof window.history.pushState=='function'){
        window.history.pushState({},"Hide",'<?php echo url('Dean') ?>')
    }
</script>
@endsection
