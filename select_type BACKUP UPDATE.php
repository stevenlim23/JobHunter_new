<?php
session_start();
include('config.php');

if($_SESSION['status'] != 'login' || empty($_SESSION['status']) || empty($_SESSION['username']) || $_SESSION['role'] != 'none' ) {
    header('location:login.php');
}else{
    $id_user = $_SESSION['id_user'];
}


if(isset($_POST['jobplacer'])) {
    $role = 'jobplacer';
    $simpan = mysqli_query($sql, "UPDATE tb_user set role = '$role' where id_user = '$id_user'");
    // var_dump("UPDATE tb_user set role ='$role' where username ='$username'");
    // exit();
    if($simpan) {
            echo '<div class="alert alert-success">Pendaftaran Berhasil</div>';
            header('refresh:2; url=jobplacer.php');
        } else {
            echo '<div class="alert alert-danger">Ups, Pendaftaran Gagal ..</div>';
            // header('refresh:2;');
        }
}elseif(isset($_POST['jobhunter'])){
    $role = 'jobhunter';
    $simpan = mysqli_query($sql, "UPDATE tb_user set role = '$role' where id_user = '$id_user'");
    // var_dump("UPDATE tb_user set role ='$role' where username ='$username'");
    // exit();
    if($simpan) {
            echo '<div class="alert alert-success">Pendaftaran Berhasil</div>';
            header('refresh:2; url=jobsearch.php');
        } else {
            echo '<div class="alert alert-danger">Ups, Pendaftaran Gagal ..</div>';
            echo("Error description: " . $sql -> error);
            // header('refresh:2;');
        }
};

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Select Account Type | Job Hunter</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
  	<link href="assets/img/favicon.png" rel="icon">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt style="margin-bottom:90px">
					<img src="assets/login/images/img-01.svg" alt="IMG">
				</div>
                <form class="login100-form validate-form" action="" method="POST">
                    <span class="login100-form-title">
						Select Your Account Type
                    </span>
                    
                    <div class="container-login100-form-btn">
                        <input type="submit" name="jobplacer" class="login100-form-btn" value="Register As Job Placer">
                        </input>
                    </div>

                    <div class="container-login100-form-btn">
                        <input type="submit" name="jobhunter" class="login100-form-btn" value="Register As Job Hunter">
                        </input>
                    </div>

					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/login/js/main.js"></script>

</body>
</html>