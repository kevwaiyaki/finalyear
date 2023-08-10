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
                <a href="{{ route('Admin.index') }}" >
                    <span class="material-icons">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="{{ route('Admin.create') }}" >
                    <span class="material-icons">inventory</span>
                    <h3>Manage Tickets</h3>
                </a>
                <a href="#" class="active">
                    <span class="material-icons">receipt_long</span>
                    <h3>Report</h3>
                </a>
                <a href="{{ route('Reply.index') }}">
                    <span class="material-icons">insights</span>
                    <h3>Analysis</h3>
                </a>

                <a href="http://">
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
        <main>
            <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#325f03;margin-top: 10px; padding-left:30px; ">
                <div class="container-fluid" style="background-color:#325f03;margin-top: 15px; display: flex;justify-content: space-between;">
                    <div class="d-flex align-items-center">
                        <h2 style="color: #fff;padding-left: 80px;">Complain Reports Analysis</h2>
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
            {{-- <div class="insights">
                <div class="table">
                    <div class="table_header">
                        <div class="table_section">
                            <H2>Starting Date</H2>
                            <input type="date">
                            {{-- <?php
                                //$db = mysqli_connect('localhost', 'root', '', 'egait');
                                //if (!$db) {
                                //    echo "connection failed";
                                //}
                                //$query = mysqli_query($db, "select * from students where created_at='2022-09-02'") or die( mysqli_error($db));
                                //while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <?php //cho htmlentities($row['message']); ?>
                            <p class="card-text"><?php //echo htmlentities($row['message']); ?></p>
                            <?php //} ?> --}}
                        {{-- </div>
                    </div>
                </div>
            </div> --}}
            <div class="insights">
                <div class="table">
                    <div class="table_header">
                        <div class="card mt-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <form action="" method="GET">
                                            <div class="input-group mb-3">
                                                <select class="option" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>">
                                                    <?php $result = mysqli_query($db,"SELECT category FROM category ");
                                                        while($rows = mysqli_fetch_array($result))
                                                        {
                                                        echo "<option >" .$rows['category'] . "</option>";
                                                        }
                                                    ?>
                                                </select>
                                                <button type="submit" class="btn btn-primary" style="background-color: blue;">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table_section">
                        <div class="card mt-4">
                            <div class="card-body">
                                <table class="table table-bordered" id="tblCustomers">
                                    <thead>
                                        <tr>
                                            <th colspan="3">Cooperative University Complain Management Report</th>
                                            <th id="date"> </th>
                                        </tr>
                                        <tr>
                                            <th>ticket_no</th>
                                            <th>updated_at</th>
                                            <th>category </th>
                                            <th>subject</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $con = mysqli_connect("localhost","root","","egait");
                                            if(isset($_GET['search']))
                                            {
                                                $filtervalues = $_GET['search'];
                                                
                                                $query = "SELECT * FROM students WHERE CONCAT(ticket_no,updated_at,category,subject) LIKE '%$filtervalues%' ";
                                                $query_run = mysqli_query($con, $query);
                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $items)
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td><?= $items['ticket_no']; ?></td>
                                                            <td><?= $items['updated_at']; ?></td>
                                                            <td><?= $items['category']; ?></td>
                                                            <td><?= $items['subject']; ?></td>

                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                        <tr>
                                                            <td colspan="4">No Queries or Complain Found</td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pagination">
                        <input type="button" id="btnExport" value="Export" onclick="Export()" />
                    </div>
                </div>
            </div>
        </main><!--main-->
        <div class="right">
            <div class="top">
            </div>
        </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
        <script type="text/javascript">
        n =  new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        document.getElementById("date").innerHTML ="Date: "+ m + "/" + d + "/" + y;
            function Export() {
                html2canvas(document.getElementById('tblCustomers'), {
                    onrendered: function (canvas) {
                        var data = canvas.toDataURL();
                        var docDefinition = {
                            content: [{
                                image: data,
                                width: 500
                            }]
                        };
                        pdfMake.createPdf(docDefinition).download("Table.pdf");
                    }
                });
            }
        </script>
        <script src="{{url('/js/index.js')}}"></script>
        <script src="https://code.highCharts.com/highcharts.js"></script>
</body>
</html>
