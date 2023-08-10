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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COMPLAIN MANANGEMENT SYSTSEM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- Vendor CSS Files -->
  <link href="{{url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{url('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{url('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{url('vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{url('vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{url('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{url('vendor/simple-datatables/style.css')}}" rel="stylesheet">


  <link href="{{url('Css/style3.css')}}" rel="stylesheet">

</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ Url('./images/comp3.jpg') }}" height="75" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <div class="d-flex align-items-center">
        <?php
         $db = mysqli_connect('localhost', 'root', '', 'egait');
            if (!$db) {
                echo "connection failed";
            }
           // echo Session::get('deanu');

                ?>
    </div>
    <span class="card-title">School Dean's Portal</span>


  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>

      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/admins">
            <i class="bi bi-box-arrow-right"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </aside><!-- End Sidebar-->
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->

          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Tickets <span>| Total number of tickets</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                            $rt = mysqli_query($db, "SELECT * FROM students ");
                            $num1 = mysqli_num_rows($rt); {
                        ?>
                        <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                        <?php } ?>
                </h6>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">


                <div class="card-body">
                  <h5 class="card-title">Unsolved <span>| Total number of tickets unsolved</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-body-text"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                            $rt = mysqli_query($db, "SELECT * FROM students WHERE status='Received'");
                            $num1 = mysqli_num_rows($rt); { ?>
                            <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                        <?php } ?>
                      </h6>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title">Solved <span>| Total number of tickets solved</span></h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-clipboard2-data"></i>
                    </div>
                    <div class="ps-3">
                      <h6>
                        <?php
                        $rt = mysqli_query($db, "SELECT * FROM students WHERE status='Completed'");
                        $num1 = mysqli_num_rows($rt); {
                    ?>
                        <b class="label orange pull-right"><?php echo htmlentities($num1); ?></b>
                    <?php } ?>
                      </h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
                <div class="card-body">
                  <h5 class="card-title">Recent <span>| Tickets</span></h5>
                  <div class="table_section">
                    <div class="card mt-4">
                        <div class="card-body">
                            <table class="table" style="height: 100%;">
                                <thead style="background-color: #325f03;">
                                    <tr>
                                        <th>ticket_no</th>
                                        <th>COD's Name</th>
                                        <th>school </th>
                                        <th>subject</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody style="height: 100%;">
                                    <?php
                                        $con = mysqli_connect("localhost","root","","egait");
                                        if (Session::get('deanu')) {
                                        $em=Session::get('deanu');
                                        //echo $em;
                                        $sql="SELECT * from deanu WHERE email='$em'";
                                        if( $quer=mysqli_query($db,$sql)or die( mysqli_error($db))){
                                            while ($row = mysqli_fetch_array($quer)) {
                                            $scho=$row['email'];
                                            //echo $scho;
                                            $query="SELECT * from reply WHERE email='$scho' AND status='Processing'";
                                            $query_run = mysqli_query($con, $query);
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $items)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?= $items['ticket_no']; ?></td>
                                                        <td><?= $items['cod']; ?></td>
                                                        <td><?= $items['school']; ?></td>
                                                        <td><?= $items['subject']; ?></td>
                                                        <td>
                                                            <?php
                                                            $f=$items['id'];
                                                                $query = mysqli_query($db, "select * from reply where id=$f");
                                                                if ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                            <button><a href="{{route('Reply.show',?id=<?php echo $row['id']; ?>) }}"> <i class="fa-solid fa-pen-to-square"></i></a></button>
                                                            <?php  } ?>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }}
                                            else
                                            { ?>
                                            <td></td>
                                                <td colspan="4">No Tickets Pushed in your portal</td>
                                                  </tr>
                                                  <?php
                                         }
                                        }}
                                        }  else {
                                            echo "not yet";
                                        }
                                        ?>
                                </tbody>
                            </table>
                            <div class="pagination">
                            </div>
                        </div>
                    </div>
                </div>

                </div>

              </div>
            </div><!-- End Recent Sales -->

            <div id="piechart" style="width: 900px; height: 500px;"></div>
          </div>
        </div><!-- End Left side columns -->



      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{url('vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{url('vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{url('vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{url('vendor/quill/quill.min.js')}}"></script>
  <script src="{{url('vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{url('vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{url('vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{url('Js/main3.js')}}"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        <?php
        $fire=mysqli_query($db, "SELECT category, COUNT(message) As num  FROM students GROUP BY category");
        while ($re=mysqli_fetch_assoc($fire)) {
            echo "['".$re['category']."',".$re['num']."],";
        }
        ?>
      ]);

      var options = {
        title: 'Category against number of Tickets'
      };

      var chart = new google.visualization.PieChart(document.getElementById('piechart'));

      chart.draw(data, options);
    }
  </script>
      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

</body>

</html>
