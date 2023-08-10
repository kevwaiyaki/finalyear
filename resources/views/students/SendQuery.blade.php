@extends('students.layout')
@section('content')
<style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
    body{
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(34, 6, 27, 0.73)),url({{url('images/dek.jpg')}});
        background-attachment: fixed;
        background-size: cover;
        margin-top: 40px;
    }
    .regform{
        width: 800px;
        background-color: #325f03;
        margin: auto;
        padding: 10px 0px 10px 0px;
        text-align: center;
        border-radius: 15px 15px 0px 0px;
    }
    .main{
            border: 2px solid #1100ff;
            box-shadow: #1100ff;
            background-color: #fff;
        width: 800px;
        margin: auto;
    }
    form{
        padding: 10px;
    }
    .name{
        margin-left: 25px;
        margin-top: 30px;
        width: 125px;
        font-size: 18px;
        font-weight: 700;
    }
    .company{
        position: relative;
        left: 200px;
        top: -37px;
        line-height: 40px;
        width: 480px;
        border-radius: 6px;
        padding: 0 22px;
        font-size: 16px;
        color: #555;
    }
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
        }
        .container2 {
        padding: 16px;
        align-content: center;
        align-items: center;
        background-color: #555;
        display: flex;
        justify-content: space-between;
        }
    .option{
        position: relative;
        left: 200px;
        top: -37px;
        line-height: 40px;
        width: 532px;
        height:40px ;
        border-radius: 6px;
        padding: 0 22px;
        font-size: 16px;
        color: #555;
        outline: none;
        overflow: hidden;
    }
    .option option{
        font-size: 20px;
    }
    .back{
        display: flex;
        justify-content: space-around;
    }
    .tit{
        margin-top: 5px;
        color: #FFFFFF;
    }
    .start{
        background-color: #fff;
        justify-content: center;
    }
    #footer{
        background-color: #325f03;
        margin-top: 10%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 20px;
    }
    li{
        color: #ffffff;
    }
    @media screen and (max-width:800px){
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .regform{
            width: 480px;
            background-color: #325f03;
            margin: auto;
            color: #FFFFFF;
            padding: 10px 0px 10px 0px;
            text-align: center;
            border-radius: 15px 15px 15px 15px;
        }
        .sma{
            width: 50%;
        }
        .main{
            background-color: rgba(0, 0, 0, 0.5);
            width: 470px;
            margin: auto;
        }
        .name{
            margin-left: 25px;
            margin-top: 30px;
            width: 100px;
            color: white;
            font-size: 15px;
            font-weight: 500;
        }
        .company{
            position: relative;

            line-height: 40px;
            width: 200px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;
        }
        .option{
            position: relative;

            line-height: 40px;
            width: 200px;
            height:40px ;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;
            outline: none;
            overflow: hidden;
        }
        .sma{
            width: 50%;
        }
        #footer{
            background-color: #325f03;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }
    }
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid blue;
        border-right: 16px solid green;
        border-bottom: 16px solid red;
        border-left: 16px solid pink;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
        }
</style>
<div class="regform">
  <img src="{{url('/images/comp3.jpg')}}"
                  alt="Logo" class="sma">
  <div class="back">
      <h1 class="tit">
        <h1>{{$category->category}}</h1>
        </h1>
      <div class="pull-right">
        <a  class="btn btn-primary" href="{{ route('students.index') }}">Back</a>
      </div>
  </div>
</div>
<div class="main">
    <div class="start">
        <div class="card">
            <div class="card-header">
                <h1>Note</h1>
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p>Select your department of study...</p>
                <p>For Personal query input your registraton number ...</p>
                <footer class="blockquote-footer">faster and easier <cite title="Source Title">way to send your queries and complains with  better feedback</cite></footer>
                </blockquote>
            </div>
        </div>
    </div>
  <form action="{{ route('students.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2 class="name">Department :</h2>
        <?php
            session_start();
            $db = mysqli_connect('localhost', 'root', '', 'egait');
            if (!$db) {
                echo "connection failed";
            }
        ?>
        <select class="option" name="school">
            <?php $result = mysqli_query($db,"SELECT school FROM users ");
                while($row = mysqli_fetch_array($result))
                {
                echo "<option value='" . $row['school'] . "'>" .$row['school'] . "</option>";
                }
            ?>
        </select>
        <h2><label for="check">Would you wish to give out your identity check the checkbox :</label>
        <input type="checkbox" id="myCheck" onclick="myFunction()"></h2>
        <div class="r" id="text" style="display:none">
            <h2 class="name">Registration No:</h2>
        <input class="company" type="text" placeholder="Type your registration No" name="reg">
        </div>
      <h2><label for="check">Would you wish to get the ticket via SMS check the checkbox :</label>
        <input type="checkbox" id="myChec" onclick="myFunc()"></h2>
        <div class="r" id="tex" style="display:none">
            <h2 class="name">Email:</h2>
      <input class="company" type="text" placeholder="Type your email" name="phone">
        </div>
      <h2 class="name">Subject:</h2>
      <input class="company" type="text" placeholder="Type your subject" name="subject" required>
      <input type="hidden" name="category" value="{{$category->category}}">
      <h2 class="name">Message:</h2>
      <textarea class="company" name="message" placeholder="Type a message...." required></textarea>
      <input type="hidden" name="status" value="Received">
      <div class="form-group">
            <h2><label for="file" class="form-label mt-4">Click here to Upload any relevant evidence </label></h2>
            <input
                type="file"
                class="form-control"
                name="images[]"
                accept="image/*"
                multiple
            >
        </div>
      <button type="submit" onclick="document.getElementById('id01').style.display='block'" class="btn btn-primary">Submit</button>
  </form>
  <div id="id01" class="modal">
    <form class="modal-content animate" action="sysUser" method="post" return="false"">
        @csrf
        <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                </div>
            <div class="container">
                <div class="imgcontainer">
                </div>
                    @csrf

            <div class="container2" style="background-color:#f1f1f1"><div class="loader"></div>
             </div>
        </div>
    </form>
</div>
</div>
<script>
         var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    function myFunction() {
      var checkBox = document.getElementById("myCheck");
      var text = document.getElementById("text");
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
         text.style.display = "none";
      }
    }
    function myFunc() {
      var checkBox = document.getElementById("myChec");
      var text = document.getElementById("tex");
      if (checkBox.checked == true){
        text.style.display = "block";
      } else {
         text.style.display = "none";
      }
    }
    </script>
@endsection
