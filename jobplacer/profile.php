<?php 
include('../config.php');
session_start();

if($_SESSION['status'] != "login"){
    header("location:../login.php");
    if($_SESSION['role'] == "admin"){
			header("location:admin");
		}elseif($_SESSION['role'] == "jobplacer"){
			header("location:jobplacer/placing.php");
		}elseif($_SESSION['role'] == "jobhunter"){
			header("location:jobsearch/browse.php");
		}
}elseif($_SESSION['role'] != "jobplacer" ){
    header("location:../login.php");
}

$id_placer = $_SESSION['id_placer'];
$query = mysqli_query($sql, "SELECT * from tb_placer a 
join tb_user b on a.id_user = b.id_user 
where a.id_placer = '$id_placer' ");
$data = mysqli_fetch_assoc($query);

$username = $data['username'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>JobHunter | Profile</title>
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
  <link href="../assets/css/style3.css" rel="stylesheet">

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
          <li><a href="placing.php" class="btn ">Post a Project</a></li>
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
  
  <main id="main">

    <div class="main container">
        <div class="row">

  <!--==========================
    Personal Information
  ============================-->
          <div class="personal col-md-4 col-xs-12">
            
            <img class="w-100 rounded border" src="user_images/<?= $data['logo']?>" />
              
            <div class="info">
              <div class="basic">
                <h4>Basic Information</h4>

                <div class="left">
                  <h6>Company Profile</h6>
                  <h6>Industry Type</h6>
                  <h6>Company Email</h6>
                  <h6>Company Phone</h6>
                  <h6>Address</h6>
                  <h6>Location</h6>
                </div>

                <div class="right">
                  <h6><?= $data['profile'] ?></h6>
                  <h6><?= $data['industry'] ?></h6>
                  <h6><?= $data['email'] ?></h6>
                  <h6><?= $data['phone'] ?></h6>
                  <h6><?= $data['address'] ?></h6>
                  <h6><?= $data['location'] ?></h6>
                </div>
              </div>

              <div class="btn">
                  <!-- <a href="" class="pass"><i class="fa fa-key"></i> Change Password</a> -->
                  <a href="../logout.php" class="logout"><i class="fa fa-sign-out"></i> Log Out</a>
                </div>
            </div>
          
          </div>

  <!--==========================
    CV
  ============================-->
            <div class="cv col-md-8">

                <div class="name ">
                  <a href="">Edit</a>
                  <h2><?= $data['name'] ?></h2>
                  <h6>@ <?= $data['username'] ?></h6>
                </div>
                
                <p class="lead "><?= $data['profile']; ?></p>
                
                <div class="ratings ">
                  <h6>RATINGS</h6>
                  <div class="d-flex align-items-center">
                      <h1><strong>4.85</strong></h1>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star checked"></span>
                      <span class="fa fa-star-half-full checked"></span>
                  </div>
                  <div class="stats container " >
                    <p>4.85 average based on 254 reviews.</p>
                    <hr style="border:3px solid #f1f1f1">
                    <div class="row">
                          
                      <div class="side">
                        <div>5 star</div>
                      </div>
                          
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-5"></div>     
                        </div>
                      </div>
                          
                      <div class="side right">
                        <div>233</div>
                      </div>
                          
                      <div class="side">
                        <div>4 star</div>
                      </div>
                          
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-4"></div>
                        </div>
                      </div>
                          
                      <div class="side right">
                        <div>12</div>
                      </div>
                          
                      <div class="side">
                        <div>3 star</div>
                      </div>
                          
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-3"></div>
                        </div>
                      </div>
                          
                      <div class="side right">
                        <div>4</div>
                      </div>
                          
                      <div class="side">
                        <div>2 star</div>
                      </div>
                        
                      <div class="middle">
                        <div class="bar-container">
                          <div class="bar-2"></div>
                        </div>
                      </div>
                          
                      <div class="side right">
                        <div>2</div>
                      </div>
                          
                      <div class="side">
                        <div>1 star</div>
                      </div>
                          
                      <div class="middle">
                        <div class="bar-container">                            
                          <div class="bar-1"></div>
                        </div>
                      </div>
                          
                      <div class="side right">
                        <div>3</div>
                      </div>
                        
                    </div>
                  </div>                 
                </div>

                <!-- <div>
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Skills</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Work Experience</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Certification</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="box">
                        <div class="chart" data-percent="95" data-scale-color="#ffb400"><h6>HTML <br> 95%</h6></div>
                      </div>

                      <div class="box">
                        <div class="chart" data-percent="90" data-scale-color="#ffb400"><h6>English <br> 90%</h6></div>
                      </div>

                      <div class="box">
                        <div class="chart" data-percent="95" data-scale-color="#ffb400"><h6>CSS <br> 95%</h6></div>
                      </div>

                      <div class="box">
                        <div class="chart" data-percent="85" data-scale-color="#ffb400"><h6>Python <br> 85%</h6></div>
                      </div>

                      <div class="box">
                        <div class="chart" data-percent="80" data-scale-color="#ffb400"><h6>JavaScript <br> 80%</h6></div>
                      </div>

                      <div class="box">
                        <div class="chart" data-percent="65" data-scale-color="#ffb400"><h6>C# <br> 65%</h6></div>
                      </div>

                      <div class="box">
                        <div class="chart" data-percent="74" data-scale-color="#ffb400"><h6>C++ <br> 74%</h6></div>
                      </div>

                      <div class="box">
                        <div class="chart" data-percent="70" data-scale-color="#ffb400"><h6>PHP <br> 70%</h6>
                        </div>
                      </div>
                    </div>
                    
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="experience">
                        <div class="optionsDiv">
                          Filter by Year 
                          <select id="selectField">
                              <option value="All" selected>All</option>
                              <option value="2019">2019</option>
                              <option value="2018">2018</option>
                              <option value="2017">2017</option>
                              <option value="2016">2016</option>
                              <option value="2015">2015</option>

                          </select>
                     
                      </div>
                        <table id="myTable">
                            <tr id="HeadRow">
                                <td>Jobs</td>
                                <td>Employer</td>
                                <td>Type</td>
                                <td>Year</td>
                            </tr>

                            <tr year="2015">
                                <td>Web Design</td>
                                <td>PT.Maju Motor</td>
                                <td>Project</td>
                                <td>2015</td>
                            </tr>

                            <tr year="2017">
                                <td>Graphic Design</td>
                                <td>Quark Spark Technologies</td>
                                <td>Project</td>
                                <td>2017</td>
                            </tr>

                            <tr year="2019">
                                <td>Front End Development</td>
                                <td>Kuadran Incorporation</td>
                                <td>Project</td>
                                <td>2019</td>
                            </tr>

                            <tr year="2019">
                                <td>Project Supervisor</td>
                                <td>PT.Innoark Servis Internasional</td>
                                <td>Project</td>
                                <td>2019</td>
                            </tr>

                            <tr year="2016">
                                <td>Web Design</td>
                                <td>PT.Mundur Motor</td>
                                <td>Project</td>
                                <td>2016</td>
                            </tr>

                            <tr year="2018">
                                <td>Coding Tournament</td>
                                <td>Microsoft</td>
                                <td>Contest</td>
                                <td>2018</td>
                            </tr>

                            <tr year="2015">
                                <td>Web Design</td>
                                <td>PT.Samping Motor</td>
                                <td>Project</td>
                                <td>2016</td>
                            </tr>

                            <tr year="2018">
                                <td>Front End Development</td>
                                <td>PT.Belakang Motor</td>
                                <td>Project</td>
                                <td>2018</td>
                            </tr>

                            <tr year="2017">
                                <td>Best Youtube VFX Video Tournament</td>
                                <td>Youtube</td>
                                <td>Contest</td>
                                <td>2017</td>
                            </tr>

                            <tr year="2019">
                                <td>Start Up Expo</td>
                                <td>Google</td>
                                <td>Contest</td>
                                <td>2019</td>
                            </tr>

                            <tr year="2018">
                                <td>Web Development</td>
                                <td>PT.Maju Motor</td>
                                <td>Project</td>
                                <td>2018</td>
                            </tr>

                            <tr year="2017">
                                <td>Map Design </td>
                                <td>Moonton</td>
                                <td>Project</td>
                                <td>2017</td>
                            </tr>

                            <tr year="2016">
                                <td>Web Design</td>
                                <td>Traveloka</td>
                                <td>Project</td>
                                <td>2016</td>
                            </tr>

                            <tr year="2016">
                                <td>Game Maker Tournament</td>
                                <td>Rock Band Studio</td>
                                <td>Contest</td>
                                <td>2016</td>
                            </tr>

                            <tr year="2015">
                                <td>Graphic Design</td>
                                <td>Grand Incorporation</td>
                                <td>Project</td>
                                <td>2015</td>
                            </tr>

                            <tr year="2019">
                                <td>App Design</td>
                                <td>Facebook</td>
                                <td>Project</td>
                                <td>2019</td>
                            </tr>

                            <tr year="2017">
                                <td>System Analyst</td>
                                <td>Analytical Lab</td>
                                <td>Project</td>
                                <td>2017</td>
                            </tr>

                            <tr year="2019">
                                <td>System Development</td>
                                <td>Sysdev</td>
                                <td>Project</td>
                                <td>2019</td>
                            </tr>

                            <tr year="2017">
                                <td>3D Graphic Design</td>
                                <td>Dragon Institution</td>
                                <td>Project</td>
                                <td>2017</td>
                            </tr>

                            <tr year="2018">
                                <td>System Analyst</td>
                                <td>Rabbit Incorporation</td>
                                <td>Project</td>
                                <td>2018</td>
                            </tr>

                            <tr year="2018">
                                <td>App Design</td>
                                <td>Turtle Institution</td>
                                <td>Project</td>
                                <td>2018</td>
                            </tr>

                            <tr year="2016">
                                <td>3D Graphic Design</td>
                                <td>PT.Sculpting</td>
                                <td>Project</td>
                                <td>2016</td>
                            </tr>

                            <tr year="2015">
                                <td>Web Design</td>
                                <td>Knight Academy</td>
                                <td>Project</td>
                                <td>2015</td>
                            </tr>

                            <tr year="2016">
                                <td>Draft Design</td>
                                <td>Mages Academy</td>
                                <td>Project</td>
                                <td>2016</td>
                            </tr>

                            <tr year="2015">
                                <td>Graphic Design</td>
                                <td>Healer Academy</td>
                                <td>Project</td>
                                <td>2015</td>
                            </tr>

                        </table>
                      </div>
                    </div>
                    
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                      
                      <div class="row no-gutters testimonials-wrap clearfix">
                        
                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>

                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>

                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>

                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>

                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>

                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>

                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>

                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>

                        <div class="cards col-lg-4 col-md-4 col-xs-6">
                          <div class="card ">
                            <img src="img/team/team-1.jpg" class="card-img-top">
                            <div class="card-body">
                              <h6 class="card-title">Mastered PHP</h6>
                              <p class="card-text">Certified by Zeal.inc</p>
                            </div>
                          </div>
                        </div>                        

                      </div>

                    </div>
                  
                  </div>
                </div> -->

            </div>
        </div>
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
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/filter.js"></script>
  <script src="../assets/js/piechart.js"></script>
  <script>
      $(function() {
          $('.chart').easyPieChart({
              
          });
      });
  </script>
    
</body>
</html>
