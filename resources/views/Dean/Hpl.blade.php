<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'egait');
	if (!$db) {
		echo "connection failed";
	}
     $query = mysqli_query($db, "select * from reply where id='".$_GET['id']."'") or die( mysqli_error($db));
     while ($row = mysqli_fetch_array($query)) {
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

  <!-- Template Main CSS File -->
  <link href="{{url('Css/style3.css')}}" rel="stylesheet">


</head>
<style type="text/css">
  @import url('https://fonts.googleapis.com/css?family=Roboto');

      * {
          margin: 0;
          padding: 0;
      }
      .content{
          width:600px;
          background-color: #325f03;
          margin-top: 30px;
          margin-left: 100px;
      }
      .pagination{
          width: 100%;
          border-radius: 10px 10px 0px 0px;
          padding: 10px 20px;
          background: #325f03;
      }
      .divide{
          display: flex;
          justify-content: space-between;
      }
      .open-button {
          background-color: #555;
          color: white;
          padding: 16px 20px;
          border: none;
          cursor: pointer;
          opacity: 0.8;
          position: fixed;
          width: 280px;
      }
      .form-container {
          max-width: 300px;
          padding: 10px;
          background-color: white;
      }
      .form-container textarea {
          width: 80%;
          padding: 15px;
          margin: 5px 0 22px 0;
          border: none;
          background: #f1f1f1;
          resize: none;
          min-height: 200px;
      }
      .form-container textarea:focus {
          background-color: #ddd;
          outline: none;
      }
      .form-container .btn {
          background-color: #4CAF50;
          color: white;
          padding: 16px 20px;
          border: none;
          cursor: pointer;
          width: 100%;
          margin-bottom:10px;
          opacity: 0.8;
      }
      .form-container .cancel {
          background-color: red;
      }
      .form-container .btn:hover, .open-button:hover {
          opacity: 1;
      }
      #footer{
          background-color: #325f03;
          margin-top: 3%;
          display: flex;
          flex-direction: row;
          justify-content: space-between;
          padding: 20px;
          border-radius: 20px;
      }
      li{
          color: #ffffff;
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
      @media screen and (max-width:800px){
          .content{
              width:450px;
              background-color: #325f03;
              margin-top: 30px;
              margin-left: 10px;
          }
          .company{
              position: relative;
              line-height: 40px;
              width: 380px;
              border-radius: 6px;
              padding: 0 22px;
              font-size: 16px;
              color: #555;
          }
          nav{
              width: 80%;
          }
          #footer{
              background-color: #325f03;
              display: flex;
              flex-direction: column;
              justify-content: space-between;
              padding: 20px;
          }
          .divide{
              display: flex;
              flex-direction: column;
              justify-content: space-between;
          }
      }
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ Url('./images/comp3.jpg') }}" height="75" alt="">

      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="d-flex align-items-center">
        <?php
         $db = mysqli_connect('localhost', 'root', '', 'egait');
            if (!$db) {
                echo "connection failed";
            }
            // if (Session::has('email')) {
                // $em=Session::get('email');
                // echo $em;
                // $sql="SELECT * from deanu WHERE email='$em'";
                // if( $quer=mysqli_query($db,$sql)or die( mysqli_error($db))){
                //     while ($row = mysqli_fetch_array($quer)) {
                // ?>
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
        <a class="nav-link " href="{{ route('Reply.create') }}">
            <i class="bi bi-box-arrow-right"></i>
          <span>Back</span>
        </a>

      </li>




    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active"><a href="{{ route('Reply.create') }}">Home</a></li>
          <li class="breadcrumb-item active">Reply</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->

          <div class="row">
            <div class="divide">
              <div class="content">
                  <div class="card mt-4" style="padding:10px;">
                      <h4>Cod's name: <?= $row['cod']; ?></h4>
                      <h5 style="">Query from student:<p class="card-text"><textarea class="company" name="feed_back"><?= $row['message']; ?></textarea></p></h5>
                      <p>Recognition: <?= $row['reg']; ?></p>
                      <?php
                          $querys = mysqli_query($db, "select * from images where student_id='".$_GET['id']."'") or die( mysqli_error($db));
                          $num1 = mysqli_num_rows($querys);
                          if ($num1 === 0) { ?>
                              <h4>No images available</h4>
                          <?php }else{
                              while($data=mysqli_fetch_assoc($querys)){
                                  ?>
                                  <form action="/downloadfile" method="get" style="display: flex;">
                                      <input type="hidden" name="file" value="<?php echo htmlentities($data['image']); ?>">
                                      <p>Images :</p>
                                      <button type="submit" name="submit">view</button>
                                  </form>
                                  <?Php
                              }
                          ?>
                      <?php } ?>
                      <h5>Reply To the student</h5>
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
                      <form action="{{ route('Feedback.store') }}" enctype="multipart/form-data" method="POST">
                          @csrf
                          <input type="hidden" name="cod" value="Dean"><?php //echo htmlentities($row['cod']); ?>
                          <input type="hidden" name="ticket_no" value="<?php echo htmlentities($row['ticket_no']); ?>">
                          <input type="hidden" name="school" value="<?php echo htmlentities($row['school']); ?>">
                          <input type="hidden" name="reg" value="<?php echo htmlentities($row['reg']); ?>">
                          <input type="hidden" name="category" value="<?php echo htmlentities($row['category']); ?>">
                          <input type="hidden" name="subject" value="<?php echo htmlentities($row['subject']); ?>">
                          <input type="hidden" name="status" value="Completed">
                          <p class="card-text"><textarea class="company" name="feed_back" placeholder="Type in the Reply..."></textarea></p>
                          <button type="submit" style="background-color: blue;color:#ffffff;width:100%;">Send to Student</button>
                          <br>
                      </form>
                      <br>
                      <button  style="background-color: green;color:#ffffff;" onclick="openForm()">Talk to the COD</button>
                      <br>
                      <button  style="background-color: rgb(209, 255, 2);color:#000000;" onclick="openForms()">Push the anyone</button>
                  </div>
              </div>
              <div class="chat">
                  <div class="chat-popup" id="myForm" style="display: none;">
                      <form action="{{ route('send.email') }}" method="POST" class="form-container">
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
                          <h4>Email the Cod</h4>
                          <input type="hidden" name="name" value="Dean"><?php //echo htmlentities($row['cod']); ?>
                          <input type="hidden" name="email"  value="<?php echo htmlentities($row['codemail']); ?>">
                          <input type="hidden"  name="subject"  value="<?php echo htmlentities($row['subject']); ?>">
                          <label for="msg"><b>Message</b></label>
                          <textarea placeholder="Type message.." name="message" required></textarea>
                          <input type="hidden" name="email"  value="<?php echo htmlentities($row['email']); ?>">
                          <button type="submit" class="btn">Send</button>
                          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                      </form>
                  </div>
              </div>
              <div class="chats">
                  <div class="chat-popup" id="myForms" style="display: none;">
                      <form action="{{ route('send.email') }}" method="POST" class="form-container">
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
                          <h4>Email Any person</h4>
                          <input type="hidden" name="name" value="Dean">
                          <input type="email" name="emails"  placeholder="Enter the email" value=""><br>
                          <input type="hidden"  name="subject"  value="<?php echo htmlentities($row['subject']); ?>">
                          <label for="msg"><b>Message</b></label>
                          <textarea placeholder="Type message.." name="message" required></textarea>
                          <input type="hidden" name="email"  value="<?php echo htmlentities($row['email']); ?>">
                          <button type="submit" class="btn">Send</button>
                          <button type="button" class="btn cancel" onclick="closeForms()">Close</button>
                      </form>
                  </div>
              </div>
          </div>

          </div>
        </div><!-- End Left side columns -->



      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

  </footer><!-- End Footer -->
  <?php
    }
  ?>
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
  <script type="text/javascript">
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }
    function openForms() {
        document.getElementById("myForms").style.display = "block";
    }
    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
    function closeForms() {
        document.getElementById("myForms").style.display = "none";
    }
</script>

</body>

</html>
