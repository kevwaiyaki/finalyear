<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Complain Management System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    </head>
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
          padding: 60px;
        }
        span.psw {
          float: right;
          padding-top: 16px;
        }
        .modal-content {
          background-color: #fefefe;
          margin: 2% auto 2% auto;
          border: 1px solid #888;
          width: 80%;
          margin-left: 80px;
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
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light" style="background:#325f03;">
            <a class="navbar-brand" href="/" style="color:white;">Cooperative university of Kenya</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-item nav-link active" href="{{route('Sysadmin.index')}}" style="color:white;">Back</a>

                </div>
            </div>
        </nav>
    </header>
    <div class="col-sm-8" >
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

                <div class="imgcontainer">
                    <img src="{{url('/images/food16.jpg')}}" alt="Avatar" class="avatar">
                </div>
                <form action="sysUser" method="post" return="false">
                    @csrf
                    <div class="form-group">
                        <label>school</label>
                        <input type="text" name="school" value="{{ old('school') }}" placeholder="Enter The school" required class="form-control">
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
</body>
</html>
