@extends('layouts.app')

@section('content')
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
                <a href="{{ route('Admin.create') }}">
                    <span class="material-icons">inventory</span>
                    <h3>Manage Tickets</h3>
                </a>
                <a href="{{ route('Report.index') }}">
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
            <nav class="navbar navbar-expand-lg navbar-light " style="background-color:#325f03;margin-top: 10px; ">
                <div class="container-fluid" style="background-color:#325f03;margin-top: 15px; display: flex;flex-direction: column;">
                <h1 style="color: #fff;">Complain Management System</h1>


                    <div class="right">
                        <div class="top">
                            <button id="menu-btn">
                                <span class="material-icons">menu</span>
                            </button>
                            <div class="theme-toggler">
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
            <div class="insights">
                <div class="sales">
                    <span class="material-icons">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total number of Tickets</h3>
                            <h1>Tickets</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <?php
                                    $rt = mysqli_query($db, "SELECT * FROM students ");
                                    $num1 = mysqli_num_rows($rt); {
                                ?>
                                <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="expenses">
                    <span class="material-icons">bar_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total Number of Tickts UnSolved</h3>
                            <h1>UnSolved</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <b class="label orange pull-right">
                                    <?php
                                        $rt = mysqli_query($db, "SELECT * FROM students WHERE status='Received'");
                                        $num1 = mysqli_num_rows($rt); { ?>
                                        <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                                    <?php } ?>
                                </b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="income">
                    <span class="material-icons">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total number of Tickets solved</h3>
                            <h1>Solved</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">
                                <?php
                                    $rt = mysqli_query($db, "SELECT * FROM students WHERE status='Completed'");
                                    $num1 = mysqli_num_rows($rt); {
                                ?>
                                    <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="income">
                    <span class="material-icons">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h3>Total number of Tickets solved by {{ $name=Auth::user()->name }}</h3>
                            <h1>Solved</h1>
                        </div>
                        <div class="progress">
                            <svg>
                                <circle cx="38" cy="38" r="36"></circle>
                            </svg>
                            <div class="number">

                                <?php
                                    $name=Auth::user()->school;
                                    $rt = mysqli_query($db, "SELECT * FROM students WHERE status='Completed'AND school='$name'");
                                    $num1 = mysqli_num_rows($rt); {
                                ?>
                                    <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

                    <div style="width: 400px">
                        <h3>Graph of categories against number of complains</h3>
                        <canvas id="myChart"></canvas>
                    </div>
                    <div style="width: 400px">
                        <h3>Graph of categories against number of complains</h3>
                        <canvas id="msChart"></canvas>
                    </div>
                    </div>
                    <?php
                    $query =mysqli_query($db, "SELECT created_at  FROM students");
                    $querys =mysqli_query($db, "SELECT category, COUNT(message) As num  FROM students GROUP BY category");
                    foreach ($query as $row) {
                        $months[]=$row['created_at'];

                    }
                    foreach ($querys as $rows) {
                        $mont[]=$rows['category'];
                        $mon[]=$rows['num'];
                    }

                    ?>
                    <script>
                    const date=<?php echo json_encode($mont);?>;
                    const data = {
                    labels: date,
                    datasets: [{
                        label: 'Graph',
                        data: <?php echo json_encode($mon);?>,
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                    };
                    const config = {
                    type: 'pie',
                    data: data,
                    options: {

                    },
                    };
                    const myChart2 = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                    function startDateFilter(dates){
                    const startDate= new Date(dates.value);
                    console.log(startDate.setHours(0,0,0,0));
                    myChart2.config.options.scales.x.min=startDate.setHours(0,0,0,0);
                    myChart2.update();
                    }
                    function endDateFilter(dates){
                    const endDate= new Date(dates.value);
                    console.log(endDate.setHours(0,0,0,0));
                    myChart2.config.options.scales.x.max=endDate.setHours(0,0,0,0);
                    myChart2.update();
                    }
                </script>
                <script>
                const dates=<?php echo json_encode($mont);?>;
                const datas = {
                labels: dates,
                datasets: [{
                    label: 'Graph',
                    data: <?php echo json_encode($mon);?>,
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                    'rgb(255, 99, 132)',
                    'rgb(255, 159, 64)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(54, 162, 235)',
                    'rgb(153, 102, 255)',
                    'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
                };
                const hoverValue={
                    id:'hoverValue',
                    afterDatasetsDraw(chart,args,pluginOptions){
                        const{ctx,data,options}=chart;
                        chart.getActiveElements().forEach((active)=>{

                            const value=data.datasets[active.datasetIndex].data[active.index];
                            const fontSize=options.hoverRadius;
                            ctx.save();

                            ctx.fillStyle=data.datasets[active.datasetIndex].borderColor[active.index];
                            ctx.textAlign='center';
                            ctx.font=`bold ${fontSize}px san-serif`;
                            ctx.fillText(value,active.element.x,active.element.y);
                            ctx.restore();
                        })
                    }
                }
                const configs = {
                type: 'line',
                data: datas,
                options: {
                    hoverRadius:30,
                    plugins:{
                        tooltip:{
                            enabled:false
                        }
                    }
                },
                plugins:[hoverValue]

                };
                const myChart = new Chart(
                    document.getElementById('msChart'),
                    configs
                );

            </script>
            </div>
        </main>
    </div>
    <script src="{{url('/js/index.js')}}"></script>
</body>
</html>
