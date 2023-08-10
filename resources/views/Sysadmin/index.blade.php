<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'egait');
	if (!$db) {
		echo "connection failed";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMPLAIN MANANGEMENT SYSTSEM</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ Url('/Css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        .cancelbtn {
        width: auto;
        padding: 10px 18px;
        background-color: #f44336;
        }
        .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        position: relative;
        }
        img.avatar {
        width: 100%;
        border-radius: 20px;
        }
        .container {
        padding: 16px;
        }
        .container2 {
        padding: 16px;
        display: flex;
        justify-content: space-between;
        }
        span.psw {
        float: right;
        padding-top: 16px;
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
        .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto;
        border: 1px solid #888;
        width: 60%;
        }
        .close {
        position: absolute;
        right: 25px;
        top: 0;
        color: #000;
        font-size: 35px;
        font-weight: bold;
        }
        .close:hover,
        .close:focus {
        color: red;
        cursor: pointer;
        }
        .animate {
        -webkit-animation: animatezoom 0.6s;
        animation: animatezoom 0.6s
        }
        .submit{
            background-color: rgb(9, 13, 247);
        }
        @media screen and (max-width:800px){
            .table{
                width: 50%;
            }
            table{
                width: 50%;
                table-layout:auto;
                min-width: 800px;
                border-collapse:  inherit;
            }
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
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <img src="{{ Url('./images/comp3.jpg') }}" alt="">
                <div class="close" id="close-btn">
                    <span class="material-icons">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="#Archive" >
                    <span class="material-icons">inventory</span>
                    <h3>Archive</h3>
                </a>
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        <span class="material-icons">logout</span>
                        <h3>Log-out</h3>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </a>
            </div>
        </aside>
        <main >
            <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#325f03;margin-top: 10px; padding-left:30px; ">
                <div class="container-fluid" style="background-color:#325f03;margin-top: 15px; display: flex;justify-content: space-between;">
                    <div class="d-flex align-items-center">
                        <h1 style="color: #fff;">Manage System Users</h1>
                    </div>
                    <div class="right">
                        <div class="top">
                            <button id="menu-btn">
                                <span class="material-icons">menu</span>
                            </button>
                            <div class="theme-toggler">
                                <span class="material-icons active">light_mode</span>
                                <span class="material-icons">dark_mode</span>
                            </div>
                            <li class="nav-item dropdown">
                                <a class="nav-link">
                                    <i class="fas fa-bell dropdown-toggle" data-toggle="notification-menu"></i>
                                    <span class="navbar-badge">15</span>
                                </a>
                                <ul id="notification-menu" class="dropdown-menu notification-menu">
                                    <div class="dropdown-menu-header">
                                        <span>
                                            Notifications
                                        </span>
                                    </div>
                                    <div class="dropdown-menu-content overlay-scrollbar scrollbar-hover">
                                        <li class="dropdown-menu-item">
                                            <a href="#" class="dropdown-menu-link">
                                                <div>
                                                    <i class="fas fa-gift"></i>
                                                </div>
                                                <span>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                    <br>
                                                    <span>
                                                        15/07/2020
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="dropdown-menu-item">
                                            <a href="#" class="dropdown-menu-link">
                                                <div>
                                                    <i class="fas fa-tasks"></i>
                                                </div>
                                                <span>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                    <br>
                                                    <span>
                                                        15/07/2020
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="dropdown-menu-item">
                                            <a href="#" class="dropdown-menu-link">
                                                <div>
                                                    <i class="fas fa-gift"></i>
                                                </div>
                                                <span>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                    <br>
                                                    <span>
                                                        15/07/2020
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                        <li class="dropdown-menu-item">
                                            <a href="#" class="dropdown-menu-link">
                                                <div>
                                                    <i class="fas fa-tasks"></i>
                                                </div>
                                                <span>
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                                                    <br>
                                                    <span>
                                                        15/07/2020
                                                    </span>
                                                </span>
                                            </a>
                                        </li>
                                    </div>
                                    <div class="dropdown-menu-footer">
                                        <span>
                                            View all notifications
                                        </span>
                                    </div>
                                </ul>
                            </li>
                            <div class="profile">
                                <div class="info">
                                    <p><div class="card-header">
                                    <h2></h2></div></p>
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="insights">
                <div class="table">
                    @if(Session::get('register_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('register_status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    @endif
                    <div class="pull-left">
                        <h2>Manage COD Users</h2>
                    </div>
                <div class="table_header">
                    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto; background-color: rgb(147, 221, 103)">Add a New COD</button>
                    <div id="id01" class="modal">
                        <form class="modal-content animate" action="sysUser" method="post" return="false"">
                            @csrf
                            <div class="imgcontainer">
                                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

                                    </div>
                                <div class="container">
                                    <div class="imgcontainer">
                                        <img src="{{url('/images/food16.jpg')}}" alt="Avatar" class="avatar">
                                    </div>
                                        @csrf
                                        <div class="form-group">
                                            <label>Department</label>
                                            <input type="text" name="school" value="{{ old('school') }}" placeholder="Enter The department" required class="form-control">
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
                                <div class="container2" style="background-color:#f1f1f1">
                                    <button type="submit" class="submit">Create</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table_section">
                    <table >
                        <tr>
                            <th>S.No</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th width="280px">Action</th>
                        </tr>
                        <tbody>
                        <?php
                            $con = mysqli_connect("localhost","root","","egait");
                            if (isset($_GET['del'])) {
                                $id = $_GET['del'];
                                $r=mysqli_query($con, "SELECT * FROM users WHERE id=$id");
                                if (mysqli_num_rows($r) > 0) {
                                while($fetch = mysqli_fetch_array($r)){
                                        mysqli_query($con, "INSERT INTO report VALUES('', '$fetch[school]', '$fetch[name]', '$fetch[email]', '$fetch[password]', '$fetch[created_at]', '$fetch[updated_at]')") or die(mysqli_error($con));
                                        mysqli_query($con, "DELETE FROM users WHERE id=$id") or die(mysqli_error($con));

                                }

                                // output data of each row
                                    // while($row = mysqli_fetch_assoc($r)) {
                                    //     $i=$row["id"];
                                    //     $s=$row["school"];
                                    //     $n=$row["name"];
                                    //     $e=$row["email"];
                                    //     $p=$row["password"];
                                    //     echo "id: " . $s. " - Name: " . $n. " " . $e. "" . $p. "<br>";
                                    //     $sql_query  =  "insert table2 select * from table1";
                                    //     $w=mysqli_query($db,"INSERT INTO report (id,school, name, email, password) VALUES ($i,$s, $n, $e, $p)" );
                                    //     if (!$w) {
                                    //         echo "not stored";
                                    //     }

                                    // }
                                } else {
                                 echo "0 results";
                                }

                                // mysqli_query($con, "DELETE FROM users WHERE id=$id");
                                // $_SESSION['message'] = "user number deleted!";
                            }
                                $query="SELECT * from users";
                                $query_run = mysqli_query($con, $query);
                                $i=1;
                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $items)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $items['school']; ?></td>
                                            <td><?= $items['name']; ?></td>
                                            <td><?= $items['email']; ?></td>
                                            <td><a href="?del=<?php echo $items['id']; ?>" class="del_btn"><i class="fa fa-archive" aria-hidden="true"></i></a></td>

                                        </tr>
                                        <?php
                                    }}
                                else
                                { ?>
                                <td></td>
                                    <td colspan="4">No Users yet</td>
                                        </tr>
                                        <?php
                                }

                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="pagination">
                </div>
            </div>
            </div>
            <div class="insights">
                <div class="table">
                    <div class="card-body">
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
                    </div>
                    <div class="pull-left">
                        <h2>Manage DEAN Users</h2>
                    </div>
                    <div class="table_header">
                        <button onclick="document.getElementById('id02').style.display='block'" style="width:auto; background-color: rgb(147, 221, 103)">Add a New Dean</button>
                        <div id="id02" class="modal">
                            <form class="modal-content animate" action="registerUser" method="post" return="false"">
                                @csrf
                                <div class="imgcontainer">
                                    <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
                                </div>
                                <div class="container">
                                    <div class="imgcontainer">
                                        <img src="{{url('/images/food16.jpg')}}" alt="Avatar" class="avatar">
                                    </div>
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
                                    <div class="container2" style="background-color:#f1f1f1">
                                        <button type="submit" class="submit">Create</button>
                                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table_section">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Department</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conn = mysqli_connect("localhost","root","","egait");
                                $con = mysqli_connect("localhost","root","","egait");
                                if (isset($_GET['del2'])) {
                                    $id = $_GET['del2'];

                                    $rs=mysqli_query($con, "SELECT * FROM deanu WHERE id=$id");

                                    if (mysqli_num_rows($rs) > 0) {
                                    while($fetch = mysqli_fetch_array($rs)){
                                            mysqli_query($conn, "INSERT INTO Archive VALUES('', '$fetch[school]', '$fetch[name]', '$fetch[email]', '$fetch[password]', '$fetch[created_at]', '$fetch[updated_at]')") or die(mysqli_error($conn));
                                            mysqli_query($con, "DELETE FROM deanu WHERE id=$id") or die(mysqli_error($con));
                                            $_SESSION['message'] = "user number deleted!";
                                        }
                                    }}
                                    $querys="SELECT * from deanu";
                                    $query_runs = mysqli_query($con, $querys);
                                    $i=1;
                                    if(mysqli_num_rows($query_runs) > 0)
                                    {
                                        foreach($query_runs as $item)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $item['school']; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td><?= $item['email']; ?></td>
                                                <td><a href="?del2=<?php echo $item['id']; ?>" class="del_btn"><i class="fa fa-archive" aria-hidden="true"></i></a></td>

                                            </tr>
                                            <?php
                                        }}
                                    else
                                    { ?>
                                    <td></td>
                                        <td colspan="4">No Users yet</td>
                                            </tr>
                                            <?php
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                    </div>
                </div>
            </div>
            <div id="Archive" class="pagination">
                <div class="pull-left">
                    <h1 style="color: #fff;">Archived</h1>
                </div>
            </div>
            <div class="insights">
                <div class="table">
                    <h2>Archived COD</h2>
                    <div class="card-body">
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
                    </div>
                    <div class="table_header">

                    </div>
                    <div class="table_section">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Department</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $con = mysqli_connect("localhost","root","","egait");
                                if (isset($_GET['del3'])) {
                                    $id = $_GET['del3'];

                                    mysqli_query($con, "DELETE FROM report WHERE id=$id");
                                    $_SESSION['message'] = "user number deleted!";
                                }
                                if (isset($_GET['del5'])) {
                                    $id = $_GET['del5'];
                                    $rs=mysqli_query($con, "SELECT * FROM report WHERE id=$id");

                                    if (mysqli_num_rows($rs) > 0) {
                                    while($fetch = mysqli_fetch_array($rs)){
                                            mysqli_query($con, "INSERT INTO users VALUES('', '$fetch[school]', '$fetch[name]', '$fetch[email]','', '$fetch[password]','', '$fetch[created_at]', '$fetch[updated_at]')") or die(mysqli_error($con));
                                            mysqli_query($con, "DELETE FROM report WHERE id=$id") or die(mysqli_error($con));
                                            $_SESSION['message'] = "user number added!";
                                        }
                                    }
                                }
                                    $queryx="SELECT * from report";
                                    $query_runx = mysqli_query($con, $queryx);
                                    $i=1;
                                    if(mysqli_num_rows($query_runx) > 0)
                                    {
                                        foreach($query_runx as $items)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $items['school']; ?></td>
                                                <td><?= $items['name']; ?></td>
                                                <td><?= $items['email']; ?></td>
                                                <td><a href="?del5=<?php echo $items['id']; ?>" class="del_btn"><i class="fa fa-repeat" aria-hidden="true"></i></a>||
                                                    <a href="?del3=<?php echo $items['id']; ?>" class="del_btn"><i class="fa-solid fa-trash-can"></i></a></td>
                                            </tr>
                                            <?php
                                        }}
                                    else
                                    { ?>
                                    <td></td>
                                        <td colspan="4">No Users yet</td>
                                            </tr>
                                            <?php
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                    </div>
                </div>
            </div>
            <div class="insights">
                <div class="table">
                    <h2>Archived Dean</h2>
                    <div class="card-body">
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
                    </div>
                    <div class="table_header">

                    </div>
                    <div class="table_section">
                        <table>
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Department</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $conn = mysqli_connect("localhost","root","","egait");
                                if (isset($_GET['del4'])) {
                                    $id = $_GET['del4'];

                                    mysqli_query($conn, "DELETE FROM Archive WHERE id=$id");
                                    $_SESSION['message'] = "user number deleted!";
                                }
                                if (isset($_GET['del6'])) {
                                    $id = $_GET['del6'];
                                    $rs=mysqli_query($conn, "SELECT * FROM Archive WHERE id=$id");

                                    if (mysqli_num_rows($rs) > 0) {
                                    while($fetch = mysqli_fetch_array($rs)){
                                            mysqli_query($con, "INSERT INTO deanu VALUES('', '$fetch[school]', '$fetch[name]', '$fetch[email]', '$fetch[password]', '$fetch[created_at]', '$fetch[updated]')") or die(mysqli_error($conn));
                                            mysqli_query($conn, "DELETE FROM Archive WHERE id=$id") or die(mysqli_error($con));
                                            $_SESSION['message'] = "user number added!";
                                        }
                                    }
                                }
                                    $queryc="SELECT * from Archive";
                                    $query_runc = mysqli_query($conn, $queryc);
                                    $i=1;
                                    if(mysqli_num_rows($query_runc) > 0)
                                    {
                                        foreach($query_runc as $itemc)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $itemc['school']; ?></td>
                                                <td><?= $itemc['name']; ?></td>
                                                <td><?= $itemc['email']; ?></td>
                                                <td><a href="?del6=<?php echo $itemc['id']; ?>" class="del_btn"><i class="fa fa-repeat" aria-hidden="true"></i></a>||
                                                    <a href="?del4=<?php echo $itemc['id']; ?>" class="del_btn"><i class="fa-solid fa-trash-can"></i></a></td>

                                            </tr>
                                            <?php
                                        }}
                                    else
                                    { ?>
                                    <td></td>
                                        <td colspan="4">No Users yet</td>
                                            </tr>
                                            <?php
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="pagination">
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{url('/js/index.js')}}"></script>
    <script>
      var modal = document.getElementById('id01');
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        var modal2 = document.getElementById('id02');
        window.onclick = function(event) {
            if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }
    </script>
      

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

