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
    <title>Complain Management System</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ Url('/Css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

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
                <a href="{{ route('Report.index') }}">
                    <span class="material-icons">receipt_long</span>
                    <h3>Report</h3>
                </a>
                <a href="#"class="active">
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
                        <h2 style="color: #fff;padding-left: 0px;">Complain Reports Analysis</h2>
                    </div>
                    <div class="right">
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
                    <span class="material-icons">bar_chart</span>
                    <div class="middle">
                        <div style="width: 400px">
                        <h3>Graph of categories against number of complains</h3>
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                            <canvas id="myChartsx" style="width: 600px"></canvas>
                        </div>
                    </div>
                </div>
                <div class="expenses">
                    <span class="material-icons">bar_chart</span>
                    <div class="middle">
                        <div style="width: 400px">
                        <h3>Graph of Feedback completely solved</h3>
                        <canvas id="msCharta"></canvas>
                    </div>
                    </div>
                </div>
                <div class="income">
                    <span class="material-icons">stacked_line_chart</span>
                    <div class="middle">
                        <div style="width: 400px">
                            <h3>Graph of categories against number of complains..</h3>
                            <canvas id="myCharta"></canvas>
                        </div>
                    </div>
                </div>
                <div class="income">
                    <span class="material-icons">stacked_line_chart</span>
                    <h3>Graph of categories against number of attempted complains</h3>
                            <canvas id="myChartas"></canvas>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
                <?php
                    $con = new mysqli('localhost','root','','egait');

                    $queryz =mysqli_query($con, "SELECT category as category, month(created_at) as numbers FROM students");
                    $querysa =mysqli_query($con, "SELECT category, COUNT(message) As num  FROM students GROUP BY category");
                    $querysas =mysqli_query($con, "SELECT category, COUNT(message) As num  FROM students Where status='Completed' GROUP BY category");

                    foreach ($queryz as $row) {
                        $monthw[]=$row['category'];
                        $amount[]=$row['numbers'];
                    }
                    foreach ($querysas as $rowx) {
                        $monthws[]=$rowx['category'];
                        $amounts[]=$rowx['num'];
                    }
                    foreach ($querysa as $rows) {
                        $montq[]=$rows['category'];
                        $monq[]=$rows['num'];
                    }//https://www.youtube.com/results?search_query=chartjs
                ?>
                <script>
                    const labelsi = <?php echo json_encode($montq)?>;
                    const datasi = {
                    labels: labelsi,
                    datasets: [{
                        label: 'Number of Cataegories',
                        data: <?php echo json_encode($monq)?>,
                        fill: false,
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
                    const configqi = {
                    type: 'bar',
                    data: datasi,
                    options: {
                        plugins:{
                            tooltip:{
                                //increasing size of imgae
                                titleFont:{
                                    size:20
                                },
                                bodyFont:{
                                    size:20
                                }
                            }

                        }
                    }
                    };
                    const myChart = new Chart(
                        document.getElementById('myChartsx'),
                        configqi
                    );
                </script>
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
                        document.getElementById('myCharta'),
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
                <?php
                    $query =mysqli_query($db, "SELECT created_at  FROM students");

                    $querysaq =mysqli_query($db, "SELECT category,state, COUNT(feed_back) As num  FROM feedback  Where state='solved' GROUP BY category");

                    foreach ($querysaq as $rowq) {
                        $monthwq[]=$rowq['category'];
                        $amountq[]=$rowq['num'];
                    }

                ?>
                <script>
                const dateo=<?php echo json_encode($monthwq);?>;
                const dataso = {
                labels: dateo,
                datasets: [{
                    label: 'Graph',
                    data: <?php echo json_encode($amountq);?>,
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
                const configso = {
                type: 'pie',
                data: dataso,
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
                const myChart4 = new Chart(
                    document.getElementById('msCharta'),
                    configso
                );

            </script>
            <script>
                const dateos=<?php echo json_encode($monthws);?>;
                const datasos = {
                labels: dateos,
                datasets: [{
                    label: 'Graph',
                    data: <?php echo json_encode($amounts);?>,
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
                const hoverValues={
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
                const configsos = {
                type: 'doughnut',
                data: datasos,
                options: {
                    hoverRadius:30,
                    plugins:{
                        tooltip:{
                            enabled:false
                        }
                    }
                },
                plugins:[hoverValues]

                };
                const myChart4s = new Chart(
                    document.getElementById('myChartas'),
                    configsos
                );

            </script>
            </div>


        </main>
        <div class="right">
            <div class="top">
            </div>
        </div>
    </div>
    <script src="{{url('/js/orders.js')}}"></script>
    <script src="{{url('/js/index.js')}}"></script>
</body>
</html>
