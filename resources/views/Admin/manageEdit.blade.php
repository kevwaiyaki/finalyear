<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>COMPLAIN MANANGEMENT SYSTSEM</title>
    <?php
        session_start();
        $db = mysqli_connect('localhost', 'root', '', 'egait');
        if (!$db) {
            echo "connection failed";
        }
        $query = mysqli_query($db, "select * from students where id='".$_GET['id']."'") or die( mysqli_error($db));
        while ($row = mysqli_fetch_array($query)) {
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body{
            width: 100%;
            background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(34, 6, 27, 0.73)),url({{url('images/dek.jpg')}});
            background-attachment: fixed;
            background-size: cover;
            background-size: cover;
            height: 100%;
        }
        .company{
            position: relative;
            line-height: 40px;
            width: 480px;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;
        }
        .option{
            position: relative;
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
        .cons{
            display: flex;
            flex-wrap: wrap;
            margin-left: 5px;
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
        .row{
            width: 80%;
            margin-left: 80px;
            display: flex;
            flex-wrap: wrap;
        }
        form{
            display: flex;
            justify-content: space-between
        }
        @media screen and (max-width:800px){
        #footer{
            background-color: #325f03;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }
        form{
            display: block;
            justify-content: space-between
        }
        .company{
            width: 380px;
            margin-left: 0;
        }
        .option{
            position: relative;
            line-height: 40px;
            width: 422px;
            height:40px ;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;
            outline: none;
            overflow: hidden;
            margin-bottom: 30px;

        }
    }
    </style>
</head>
<body>
    <div class="cat">
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#325f03;margin-top: 10px;margin-left:10px; width:98%;align-center:center;">
            <div class="container-fluid" style="background-color:#325f03;margin-top: 15px; ">
                <button
                    class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: flex;justify-content: space-between">
                    <div class="img">
                        <a class=" " href="#">
                            <img src="{{ Url('./images/comp3.jpg') }}" height="75" alt="Dedan Kimathi Logo" loading="lazy"/>
                        </a>
                    </div>
                </div>
                <h1 style="margin-right: 30px">{{ $name=Auth::user()->name }}</h1>
                <div class="d-flex align-items-center">
                    <a  class="btn btn-success" href="{{ route('Admin.create') }}">Back</a>
                </div>
            </div>
        </nav>
        <div class="row" >
            <div class="card">
                <h2 class="card-header"><?php echo htmlentities($row['subject']); ?></h2>
                <div class="card-body" style="display: flex; justify-content: space-around;" >
                <div class="card" style="width: 20rem; border-radius: 20px 20px 0px 0px;">
                    <img src="{{ Url('./images/comp3.jpg') }}" alt="Dedan Kimathi Logo" style="border-radius: 20px 20px 0px 0px;"/>
                    <div class="card-body">
                        <h5 class="card-title">Recognition:</h5>
                        <p class="card-text"><?php $sta=$row['reg'];
                            if ($sta != null) {
                                echo htmlentities($row['reg']);
                            } else{ ?>
                                Anonymous
                            <?php } ?>
                        </p>
                    </div>
                </div>
                <div class="card" style="width: 20rem; border-radius: 20px 20px 0px 0px;">
                    <img src="{{ Url('./images/comp3.jpg') }}" alt="Dedan Kimathi Logo" style="border-radius: 20px 20px 0px 0px;"/>
                    <div class="card-body">
                        <h5 class="card-title">Message:</h5>
                        <p class="card-text"><?php echo htmlentities($row['message']); ?></p>
                    </div>
                </div>
                <div class="card" style="width: 20rem; border-radius: 20px 20px 0px 0px;">
                    <img src="{{ Url('./images/comp3.jpg') }}" alt="Dedan Kimathi Logo" style="border-radius: 20px 20px 0px 0px;"/>
                    <div class="card-body">
                        <h5 class="card-title">File:</h5>
                        <p class="card-text">
                            <div class="cons">
                                <?php
                                    $querys = mysqli_query($db, "select * from images where student_id='".$_GET['id']."'") or die( mysqli_error($db));
                                    $num1 = mysqli_num_rows($querys);
                                    if ($num1 === 0) { ?>
                                        <h4>No images available</h4>
                                    <?php }else{
                                        while($data=mysqli_fetch_assoc($querys)){
                                            ?>
                                            <form action="/downloadfile" method="get">
                                                <input type="hidden" name="file" value="<?php echo htmlentities($data['image']); ?>">
                                                <button type="submit" name="submit">view</button>
                                            </form>
                                            <?Php
                                        }
                                    ?>
                                <?php } ?>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Guidance to use the Cooperative university Help Desk
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                    <p>Type in the message in the specified area and send it as feedback or push to the suitable person to reply it.</p>
                    <footer class="blockquote-footer">Simple as clicking <cite title="Source Title">one two</cite></footer>
                </blockquote>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-header">
                Reply Zone
            </div>
            <div class="card-body">
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
                <form action="{{ route('Feedback.store') }}" enctype="multipart/form-data" method="POST"  style="">
                    @csrf
                    <input type="hidden" name="cod" value="{{ $name=Auth::user()->name }}">
                    <input type="hidden" name="ticket_no" value="<?php echo htmlentities($row['ticket_no']); ?>">
                    <input type="hidden" name="school" value="<?php echo htmlentities($row['school']); ?>">
                    <input type="hidden" name="reg" value="<?php echo htmlentities($row['reg']); ?>">
                    <input type="hidden" name="category" value="<?php echo htmlentities($row['category']); ?>">
                    <input type="hidden" name="subject" value="<?php echo htmlentities($row['subject']); ?>">
                    <input type="hidden" name="status" value="Completed">
                    <p class="card-text"><textarea class="company" name="feed_back" placeholder="Type the response to the message...."></textarea></p>
                    <select name="state">
                        <option value="solved">Solved</option>
                        <option value="unsolved">Unsolved</option>
                      </select>
                    <div class="se" style="">
                        <button type="submit" class="btn btn-primary">Send Feedback</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-muted">
                <div class="card">
                    <div class="card-header">
                        Push to Deans portal
                    </div>
                    <div class="card-body">
                        <form action="{{ route('Reply.store') }}" enctype="multipart/form-data" method="POST"  style="">
                            @csrf
                                    <input type="hidden" name="cod" value="{{ $name=Auth::user()->name }}">
                                    <input type="hidden" name="codemail" value="{{ $name=Auth::user()->email }}">
                                    <p class="card-text"></p>
                                    <input type="hidden" name="ticket_no" value="<?php echo htmlentities($row['ticket_no']); ?>">
                                    <input type="hidden" name="school" value="<?php echo htmlentities($row['school']); ?>">
                                    <input type="hidden" name="reg" value="<?php echo htmlentities($row['reg']); ?>">
                                    <input type="hidden" name="category" value="<?php echo htmlentities($row['category']); ?>">
                                    <input type="hidden" name="subject" value="<?php echo htmlentities($row['subject']); ?>">
                                    <input type="hidden" name="message" value="<?php echo htmlentities($row['message']); ?>">
                                <div class="sp" style="margin-right: 435px; ">
                                <input type="hidden" name="status" value="Processing">
                                <select class="option" name="email">
                                        <?php $result = mysqli_query($db,"SELECT email,name,school FROM deanu ");
                                            while($rows = mysqli_fetch_array($result))
                                            {
                                            echo "<option value='" . $rows['email'] . "'>" .$rows['school'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Push to ones website</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <div class="card">
                        <div class="card-header">
                            Push to Deans Email
                        </div>
                        <div class="card-body">
                            <form action="{{ route('send.email') }}" method="POST">
                                @csrf
                                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                                    <input type="hidden" name="email"  value="{{Auth::user()->email }}">
                                    <input type="hidden"  name="subject"  value="<?php echo htmlentities($row['subject']); ?>">
                                    <input type="hidden" name="message" value="<?php echo htmlentities($row['message']); ?>">
                                    <input type="hidden" name="ticket_no" value="<?php echo htmlentities($row['ticket_no']); ?>">
                                    <input type="hidden" name="status" value="Processing">
                                    <div class="sp" style="width: 50px;">
                                        <select class="option" name="emails">
                                            <?php $result = mysqli_query($db,"SELECT email,name FROM deanu ");
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                echo "<option value='" . $row['email'] . "'>" .$row['name'] . "</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary" >Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
        <?php  } ?>
        <footer id="footer">
            <div class="contact">
                <h2 style="color: yellow;">CONTACTS</h2>
                <ul>
                    <li>P.O Box 24814-00502,</li>
                    <li>Karen, Nairobi.</li>
                </ul>
            </div>
            <div class="links">
                <h2 style="color: yellow;">QUICK lINKS</h2>
                <ol>
                    <li>Customer Feedback From on E-services</li>
                    <li>Library Website</li>
                    <li>E-libary</li>
                    <li>E-MarketPlace</li>
                </ol>
            </div>
            <div class="resources">
                <h2 style="color: yellow;">RESOURCES</h2>
                <ol>
                    <li>Student Portal</li>
                    <li>ICT Helpdesk</li>
                    <li>Library Catalogue</li>
                    <li>Institutional Repository</li>
                </ol>
            </div>
            <div class="letters">
                <h2 style="color: yellow;">NEWSLETTERS</h2>
                <ol>
                    <li>Coming soon!!!</li>
                </ol>
            </div>
        </footer>
    </div>
</body>
</html>
