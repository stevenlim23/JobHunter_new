<?php
session_start();
include('../config.php');
$id_user = $_SESSION['id_user'];
$query = mysqli_query($sql,"SELECT * from tb_user where id_user = '$id_user'");
$data = mysqli_fetch_assoc($query);
$username = $data['username'];

if(isset($_POST['post'])) {
    $title = $_POST['title'];
    $jobdesc = $_POST['jobdesc'];
    $experience = $_POST['experience'];
    $salary = $_POST['salary']; 
    $location = $_POST['location'];
    $industry = $_POST['industry'];
    $profile = $_POST['profile'];
  $postdate = date('Y-m-d');
  $id_placer = $_SESSION['id_placer'];
  
    // $cekdata = mysqli_query($sql, "SELECT * FROM tb_user WHERE username='$username'");
    // $jumlah = mysqli_num_rows($cekdata);
  
        // if($jumlah > 0) {	
        //     echo '<div class="alert alert-danger">User ' . $username . ' telah terdaftar sebagai user Job Hunter</div>';
        // } else {
			// var_dump("INSERT INTO tb_job (`id_placer`, `title`, `jobdesc`, `experience`, `salary`,`location`,`industry`,`profile`,`postdate`,`status`) VALUES('$id_placer','$title','$jobdesc','$experience','$salary','$location','$industry','$profile','$postdate','active')");
			// die;
            $simpan = mysqli_query($sql, "INSERT INTO tb_job (`id_placer`, `title`, `jobdesc`, `experience`, `salary`,`location`,`industry`,`profile`,`postdate`,`status`) VALUES('$id_placer','$title','$jobdesc','$experience','$salary','$location','$industry','$profile','$postdate','active')");
            // $getid = mysqli_query($sql, "SELECT id_user FROM tb_user WHERE username='$username'");
            // $data = mysqli_fetch_assoc($getid);
            // $simpan2 = mysqli_query($sql, "INSERT INTO tb_placer (`id_user`,`location`,`industry`,`address`,`profile`,`logo`) VALUES('".$data['id_user']."','$location','$industry','$address','$profile','$pic')");
            
            if($simpan) {
                    // move_uploaded_file($tmp,$path);
                    echo '<div class="alert alert-success"></div>';
                    header('refresh:1; url=myprojects.php');
                } else {
					echo '<div class="alert alert-danger">Ups, Pendaftaran Gagal ..</div>';
					echo("Error description: " . $sql -> error);
                    // header('refresh:2;');
                }
        }

// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>JobHunter | Place a Jobs</title>
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

  <!-- Main Stylesheet File -->
  <link href="../assets/css/style6.css" rel="stylesheet">

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
        <a href="../index.html" class="scrollto"><img src="../assets/img/logo5.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav d-none d-lg-block">
        <ul class="float-left">
          <li><a href="../index.html"><i class="fa fa-home"></i>  Home</a></li>
          <li class="active"><a href="myprojects.php"><i class="fa fa-laptop"></i>  My Project</a></li>
          <!-- <li><a href="messages.html"><i class="fa fa-comment"></i>  Messages</a></li> -->
          <li><a href="../logout.php"><i class="fa fa-sign-out"></i>  Log Out</a></li>
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

  <main id="main">
    <div>
        <div class="heading">
        <h2>Tell us what you need done </h2>
        <h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. </h5>       
      </div> 
      
      <div class="body">
        <div class="filling container" align="center">
          <form action="" method="POST">
          <div class="row">
              <h3>Choose a name for your project</h3>
              <input  type="text" required placeholder="Project Title" id="inputplace" name="title">
          </div>
          
          <div class="row">
              <h4>Describe Your Project</h4>
              <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmotempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. </h6>
              <input type="text" required name="jobdesc" placeholder="Describe Your Project Here..." id="inputplace2">
          </div>
          
          <div class="row">
            <div>
              <h4>Minimun Experience</h4>
              <h6>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmotempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. </h6>
              <input type="number" required placeholder="Minimun Experience (Year)" id="inputplace" name="experience">
            </div>
          </div>

          <div class="row">
            <div>
              <h4>Place Your Price !</h4>
              <div>
                <!-- <select id="list" onchange="getSelectValue();"> -->
                  US $
                <!-- </select> -->
                <input  type="number" required name="salary" placeholder="Put your price" id="inputplace3">
              </div>
          </div>
          </div>
          
          <div class="row pt-2">
              <h4 >Project Location</h4>
              <input name="location" required type="text" placeholder="Project Location" id="inputplace" >
          </div>

          <div class="row">
            <h4>Your Industry</h4>
            <input type="text" required name="industry" placeholder="Your Industry Type (ex. Technology)" id="inputplace">
          </div>

          <div class="row">
            <h4>Your prospective workers Profile</h4>
            <input type="text" required name="profile" placeholder="Your prospective workers Profile (ex. Knowledge in ASP.net)" id="inputplace">
          </div>
          
          
          <div class="btn-wrap" align="right">
            <input type="submit" required name="post" class="btn" value="Post a Project">
          </div>
          
          
          </div>
        </div>
      </div>
      </form>
    </div>
    
    
    
  </main>

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
  <script src="../assets/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/autofill.js"></script>
  <script src="../assets/js/tags.js"></script>
  <script>
    $(function() {
        $("#skills").tags({
          requireData : true,
          unique: true,
        }).autofill({
          data: ["javascript","jquery","mysql","PHP","HTML","CSS","C#","C++","Python","Photoshop"]
        });
      });
    function getSelectValue() 
    {
      var selectedValue = document.getElementById("list").value;
      console.log(selectedValue);
    }
  </script> 

</body>
</html>
