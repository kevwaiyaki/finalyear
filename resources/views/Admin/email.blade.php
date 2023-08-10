<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPLAIN MANANGEMENT SYSTSEM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <h4>Contact Us</h4>
                <form action="{{ route('send.email') }}" method="POST">
                    @csrf
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error')}}
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success')}}
                        </div>
                    @endif
                    <div class="form-group">
                        <Label for="">Name</Label>
                        <input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{ old('name')}}">
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <Label for="">Email</Label>
                        <input type="text" class="form-control" name="email" placeholder="Enter your email" value="{{ old('email')}}">
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <Label for="">Subject</Label>
                        <input type="text" class="form-control" name="subject" placeholder="Enter your email" value="{{ old('subject')}}">
                        @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <Label for="">Message</Label>
                        <textarea name="message" class="form-control" cols="4" rows="4" value="{{ old('message')}}"></textarea>
                        @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button class="btn btn-primary" >Send</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
