
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
    <style>
        .company{
            position: relative;
            line-height: 40px;
            width: 350px;
            border: 2px solid black;
            border-radius: 6px;
            padding: 0 22px;
            font-size: 16px;
            color: #555;
        }
        .btns{
            background-color: #325f03;
        }
    </style>
</head>
<body>
    <div class="container">
        <aside>
            <div class="top">
                <div class="close" id="close-btn">
                    <span class="material-icons">close</span>
                </div>
            </div>
            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a class="dropdown-item" href="/homes">
                    <span class="material-icons">logout</span>
                    <h3>Log-out</h3>
                </a>
            </div>
        </aside>
        <main>
            <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#325f03;margin-top: 10px; ">
                <div class="container-fluid" style="background-color:#325f03;margin-top: 15px; ">
                    <h1 style="color: #fff;margin-left: 300px;">Dashboard</h1>
                    <div class="right" >
                        <div class="top">
                            <button id="menu-btn">
                                <span class="material-icons">menu</span>
                            </button>
                            <div class="theme-toggler" style="margin-left: 300px;">
                                <span class="material-icons active">light_mode</span>
                                <span class="material-icons">dark_mode</span>
                            </div>
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
            <?php
                $query = mysqli_query($db, "select * from students where ticket_no='".$_GET['ticket_no']."'") or die( mysqli_error($db));
                while ($row = mysqli_fetch_array($query)) {?>
            <div class="insights">
                <div class="sales">
                    <h1>Details of your Complain </h1>
                    <h3>Department: <?php echo htmlentities($row['school']); ?></h3>
                    <h3>Subject: <?php echo htmlentities($row['subject']); ?></h3>
                    <h3>Ticket No: <?php echo htmlentities($row['ticket_no']); ?></h3>
                </div>
                <div class="expenses">
                    <div class="progress"style="display: flex;">
                        <?php $stat=$row['status'];
                           if ($stat ==='Received') {?>
                              <div class="saless" >
                                 <h1>progress:</h1>
                                     <progress id="file" value="48" max="100" > 48% </progress>
                                     <h3>COD</h3>
                                     <h3>Processing :40%</h3>
                                 </div>
                            <?php }elseif ($stat ==='Processing') {?>

                                    <div class="saless" >
                                       <h1>progress:</h1>
                                           <progress id="file" value="48" max="100" > 48% </progress>
                                           <h3>DEAN</h3>
                                           <h3>Processing : 80%</h3>
                                       </div>
                                    <?php }else {
                                 $query = mysqli_query($db, "select * from feedback where ticket_no='".$_GET['ticket_no']."'") or die( mysqli_error($db));
                                 while ($row = mysqli_fetch_array($query)) {?>
                                 <?php $state=$row['state'];
                                 if ($state ==='solved') {?>
                             <h1>progress:</h1>
                                <div class="sales" >
                                    <svg>
                                        <circle cx="38" cy="38" r="36" ></circle>
                                    </svg>
                                    <progress id="file" value="100" max="100" > 100% </progress>
                                    <h3>Complete :100%</h3>
                                </div>
                                <?php }else {?>
                                    <h1>progress:</h1>
                                <div class="sales" >
                                    <svg>
                                        <circle cx="38" cy="38" r="36" ></circle>
                                    </svg>
                                    <progress id="file" value="98" max="98" > 98% </progress>
                                    <h3>Pending :98%</h3>
                                </div>

                            <?php }} }
                        ?>
                    </div>
                </div>
                <div class="income">
                    <span class="material-icons">stacked_line_chart</span>
                    <form action="" id="tic">
                        <li class="nav-item">
                            <h2>Ticket Feedback</h2>
                            <?php
                                 $query = mysqli_query($db, "select * from feedback where ticket_no='".$_GET['ticket_no']."'") or die( mysqli_error($db));
                                 while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <div class="aleart alert-success" style="display: flex; flex-direction: column;">
                                <h2 class="name">Message:</h2>
                                <?php echo htmlentities($row['feed_back']); ?>
                                <button type="button" class="btns btn-outline-info" onclick="myPrint('tic')">Print ticket feedback</button>
                            </div>
                        </li>
                    </form>
                </div>
                <div class="income">
                    <span class="material-icons">stacked_line_chart</span>
                    <form action="{{ route('students.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="aleart alert-success">
                            <h4>You not satisfied with the feedback of your complain</h4>
                            <h3>Clarify your complain</h3>
                            <input type="hidden" name="school" value="<?php echo htmlentities($row['school']); ?>">
                            <input type="hidden" name="category" value="<?php echo htmlentities($row['category']); ?>">
                            <input type="hidden" name="reg" value="<?php echo htmlentities($row['reg']); ?>">
                            <input type="hidden" name="subject" value="Returned <?php echo htmlentities($row['ticket_no']); ?> <?php //echo htmlentities($row['subject']); ?>">
                            <input type="hidden" name="status" value="Received">
                            <textarea class="company" name="message" placeholder="Type the clarification" ></textarea>
                            <button type="submit" class="btns btn-outline-info" >submit</button>
                        </div>
                    </form>
                </div>
                </div>
                    <?php  } } ?>
                </div>
            </div>
        </main>
    </div>
    <script src="{{url('/js/index.js')}}"></script>
    <script>
        function myPrint(tic) {
            var printdata = document.getElementById(tic);
            newwin = window.open("");
            newwin.document.write(printdata.outerHTML);
            newwin.print();
            newwin.close();
        }
    </script>
</body>
</html>
