<?php
session_start();
include '../config.php';
$id_hunter = $_SESSION['id_hunter'];
$id_user = $_SESSION['id_user'];


if($_SESSION['status'] != "login" ){
  header("location:../login.php");
  if($_SESSION['role'] == "admin"){
    header("location:admin");
  }elseif($_SESSION['role'] == "jobplacer"){
    header("location:jobplacer/placing.php");
  }elseif($_SESSION['role'] == "jobhunter"){
    header("location:jobsearch/browse.php");
  }
}elseif($_SESSION['role'] != "jobhunter" ){
  header("location:../login.php");
}


$query = mysqli_query($sql,"SELECT username from tb_user where id_user = '$id_user'");
$data = mysqli_fetch_assoc($query);
$username = $data['username'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>JobHunter | My Projects</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Data Table -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
 

  <!-- Main Stylesheet File -->
  <link href="../assets/css/style5.css" rel="stylesheet">

</head>

<body>

  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
       <!--  <h1 class="text-light"><a href="#header"><span>NewBiz</span></a></h1> -->
        <a href="index.html" class="scrollto"><img src="../assets/img/logo5.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav d-none d-lg-block">
        <ul class="float-left">
          <li><a href="../index.html"><i class="fa fa-home"></i>  Home</a></li>
          <li class="active"><a href="myprojects.html"><i class="fa fa-laptop"></i>  My Project</a></li>
          <!-- <li><a href=messages.html><i class="fa fa-comment"></i>  Messages</a></li> -->
        </ul>
        <ul class="float-right">
          <li><a href="placing.html" class="btn ">Post a Project</a></li>
          <li>
            <a href="profile.php" class="profile ">
            <div class="container">
                
              <div class="row">
                  
                <div class="col-lg-3">
                  <img src="../assets/img/browse/desktop.png" width="30px" height="30px">   
                </div>
                  
                <div class="col-lg-4">
                  <h6><strong><?= $username; ?></strong></h6>
                </div>
                
              </div>
              
            </div>
            </a>
          </li>
        </ul>
      
      </nav><!-- .main-nav -->
  
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Main
  ============================-->
<div class="container-fluid" style="margin-top: 100px;">
  <div class="experience">      
    <h3>List Job Applied</h3>
        <table id="myTable">
        <thead>
          <tr id="HeadRow">
              <th>Title</th>
              <th>Job Desc</th>
              <th>Salary</th>
              <th>Location</th>
              <th>industry</th>
              <th>Company Name</th>
              <th>Date Applied</th> 
              <th>Status</th>
              <!-- <th>Option</th> -->
            </tr>
        </thead>
           
            <tbody>
        <?php
            $datajob = mysqli_query($sql,"SELECT a.id_apply,e.title,e.jobdesc,e.salary,e.location,e.industry,a.status,a.date_applied,a.status,d.name 
            from tb_application a
            inner join tb_placer b on a.id_placer = b.id_placer
            inner join tb_hunter c on a.id_hunter = c.id_hunter
            inner join tb_user d on b.id_user = d.id_user
            inner join tb_job e on a.id_job = e.id_job
            where a.id_hunter = '$id_hunter' ");
            while($row = mysqli_fetch_array($datajob))
            {
                echo "<tr>
                <td>".$row['title']."</td>
                <td>".$row['jobdesc']."</td>
                <td>$".$row['salary']."</td>
                <td>".$row['location']."</td>
                <td>".$row['industry']."</td>
                <td>".$row['name']."</td>
                <td>".$row['date_applied']."</td>
                <td>".$row['status']."</td>
            </tr>";
            }
            // <td><a href='deactivateproject.php?id_job=".$row['id_job']."&status=".$row['status']."' class='btn-danger'>Change Status</button></td>
        ?>
        </tbody>

        </table>
      </div>
</div>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="../assets/img/footer/logo7.png"><br>
            <a href=""><img src="../assets/img/footer/globe.png" width="50px" height="50px">Indonesia.ID</a><br>
            <a href=""><img src="../assets/img/footer/help.png" width="50px" height="50px">Help &amp; Support</a>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Workers</h4>
            <ul>
              <li><a href="#">Categories</a></li>
              <li><a href="#">Projects</a></li>
              <li><a href="#">Local Jobs</a></li>
              <li><a href="#">Offline Jobs</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>About</h4>
            <ul>
              <li><a href="#">About Us</a></li>
              <li><a href="#">How it Works</a></li>
              <li><a href="#">Security</a></li>
              <li><a href="#">Investor</a></li>
              <li><a href="#">Quotes</a></li>
            </ul>
          </div>

           <div class="col-lg-2 col-md-6 footer-links">
            <h4>Terms</h4>
            <ul>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="#">Copyright Policy</a></li>
              <li><a href="#">Code of Conduct</a></li>
              <li><a href="#">Fees and Charges</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Apps</h4>
            <a href="#"><img src="../assets/img/footer/app2.png" width="150px" height="auto"></a>
            <a href="#"><img src="../assets/img/footer/play.png" width="150px" height="auto"></a>
            <div class="social-links">
              <a href="#" class="facebook"><img src="../assets/img/footer/facebook.png" width="30px" height="30px"></a>
              <a href="#" class="twitter"><img src="../assets/img/footer/twitter.png" width="30px" height="30px"></a>
              <a href="#" class="google-plus"><img src="../assets/img/footer/youtube.png" width="30px" height="30px"></a>
              <a href="#" class="instagram"><img src="../assets/img/footer/instagram.png" width="30px" height="30px"></a>
              <!-- <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="end container">
      <hr width="90%">
      <div class="row">
          <div class="col-lg-3 col-md-6 ">
            <p><strong><span data-toggle="counter-up">38,262,942</span></strong> Registered Users</p>
          </div>
          <div class="col-lg-3 col-md-6 ">
            <p><strong><span data-toggle="counter-up">20,216,875</span></strong> Total Jobs Posted</p>
          </div>
          <div class="col-lg-6 col-md-6 wow fadeInRight">
            <p>Job Hunter &copy; is a registered Trademark of JobHunter Technology Pty Limited [ACN 142 182 784]</p>
          </div>       
      </div>
      <div class="copyright wow fadeInRight">
        <p>Copyright &copy; 2019 JobHunter Technology Pty Limited [ACN 142 182 784]</p>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="../assets/lib/jquery/jquery.min.js"></script>
  <script src="../assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/lib/easing/easing.min.js"></script>
  <script src="../assets/lib/mobile-nav/mobile-nav.js"></script>
  <script src="../assets/lib/wow/wow.min.js"></script>
  <script src="../assets/lib/waypoints/waypoints.min.js"></script>
  <script src="../assets/lib/counterup/counterup.min.js"></script>
  <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../assets/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../assets/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/filter.js"></script>
  <script src="../assets/js/piechart.js"></script>
<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

</script>
</body>
</html>
