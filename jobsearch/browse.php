<?php
session_start();
include '../config.php';
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
  <title>JobHunter | Browse Jobs</title>
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
  <link href="../assets/css/style4.css" rel="stylesheet">

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
        <a href="browse.php" class="scrollto"><img src="../assets/img/logo5.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav d-none d-lg-block">
        <ul class="float-left">
          <li><a href="browse.php"><i class="fa fa-home"></i>  Home</a></li>
          <li class="active"><a href="myprojects.php"><i class="fa fa-laptop"></i>  My Project</a></li>
          <!-- <li><a href="messages.html"><i class="fa fa-comment"></i>  Messages</a></li> -->
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
                  <h6><strong><?= $username;?></strong></h6>
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

    <!--==========================
      Main
    ============================-->

  <section id="main" class="clearfix">
    <div class="container">

      <div class="filter shadow">
        <div>
          <h5><a href="" title=""><i class="fa fa-file"></i>  Projects</a></h5>
          <h5><a href="" title=""><i class="fa fa-trophy"></i>  Contests</a></h5>

          <div class="check">
            <h6>Project Type</h6>
            <label class="check-box ">Fixed Projects
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
            <label class="check-box ">Hourly Projects
              <input type="checkbox" checked="checked">
              <span class="checkmark"></span>
            </label>
            <hr width="90%">
          </div>

          <div class="skills">
            <h6>Skills</h6>
            <input type="text" id="skills" value=""/>
            <div>
              <a href="#about" class="btn">Clear Skills</a>
            </div>
            <hr width="90%">
          </div>

          <div class="pay">
            <h6>Fixed Projects</h6>
            <h6>Hourly Projects</h6>
            <hr width="90%">
          </div>

          <div class="place">
            <h6>Specific Location</h6>
            <input type="text" id="location" value=""/>
            <div>
              <a href="#about" class="btn">Clear Location</a>
            </div>
             <hr width="90%">
          </div>

          <div class="skills">
            <h6>Languages</h6>
            <input type="text" id="languages" value=""/>
            <div>
              <a href="#about" class="btn">Clear Languages</a>
            </div>
          </div>

        </div>
      </div>

      <div class="search shadow">
        <div class="container">
          
          <div class="row">

            <div class="search-btn col-lg-6 col-md-6" align="left">
              <a href="#" class="search-btn"><i class="fa fa-search"></i><input class="search-txt" type="text" placeholder="Search for projects"></a>
            </div>

            <div class="sort col-lg-6 col-md-6" align="right">
              Sort by
              <select id="list" onchange="getSelectValue();">
                <option value="latest">Latest</option>
                <option value="alphabet">Alphabet</option>
              </select>
            </div>
          </div>

          <hr>
      
            <?php
            $datajob = mysqli_query($sql,"SELECT *
            from tb_job
            where status = 'active' ");
            while($row = mysqli_fetch_array($datajob))
            {
                echo "
                <div class= 'row'>

                <div class='col-lg-2 col-md-2'>
                  <img src='../assets/img/browse/desktop.png' width='50px' height='50px' >
                </div>
    
                    <div class='col-lg-7 col-md-2'>
                        <h3>".$row['title']."</h3>
                        <p>".$row['jobdesc']."</p>
                        <p> Minimun Experience".$row['experience']." Years</p>
                        <p> Location in ".$row['location']."</p>
                        <p> Worker must ".$row['profile']."</p>
                        <p> Posted On".$row['postdate']."</p>
                        <a href='applyjob.php?id_job=".$row['id_job']."class='btn-danger'>Apply For The Job</button></a>
                    </div>
                ";

            echo "<div class='col-lg-3 col-md-2'>
              <h4> $".$row['salary']."</h4>
              <h4>USD</h4>
            </div>
        </div>
        <hr>
            ";
            }
        ?>

        </div>

        <div class="page">
          
          <div class="page-btn ">
            <a href="" class="btn" >First</a>
            <a href="" class="btn" >Previous</a>
            <a href="" title=""></a>
            <a href="" class="btn" >Next</a>
            <a href="" class="btn">Last</a>
          </div>

        </div>

      </div>

    </div>
  </section><!-- #intro -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <img src="img/footer/logo7.png"><br>
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

      $(function() {
        $("#location").tags({
          requireData : true,
          unique: true,
        }).autofill({
          data: ["Indonesia","Batam","Singapore","Malaysia","Kuala Lumpur","USA","Russia","Korea","Japan","Australia"]
        });
      });

      $(function() {
        $("#languages").tags({
          requireData : true,
          unique: true,
        }).autofill({
          data: ["Indonesian","English","British"]
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
