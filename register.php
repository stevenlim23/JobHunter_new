<?php
include('config.php');
if(isset($_POST['register'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password']; //ENCRYPT NANTI MD5
    $password2 = $_POST['password2'];
    $phone = $_POST['phone'];
  
  
    $cekdata = mysqli_query($sql, "SELECT * FROM tb_user WHERE username='$username'");
    $jumlah = mysqli_num_rows($cekdata);
  
        if($jumlah > 0) {	
            echo '<div class="alert alert-danger">User ' . $username . ' telah terdaftar sebagai user Job Hunter</div>';
        } else {
			// var_dump("INSERT INTO tb_user (`username`, `password`, `name`, `email`, `phone`,`role`,`status`) VALUES('$username','$password','$name','$email','$phone','none','closed')");
			// die;
            $simpan = mysqli_query($sql, "INSERT INTO tb_user (`username`, `password`, `name`, `email`, `phone`,`role`,`status`) VALUES('$username','$password','$name','$email','$phone','none','closed')");
			if($simpan) {
                    echo '<div class="alert alert-success">Pendaftaran Berhasil</div>';
                    header('refresh:2; url=login.php');
                } else {
                    echo '<div class="alert alert-danger">Ups, Pendaftaran Gagal ..</div>';
                    // header('refresh:2;');
                }
        }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register | Job Hunter</title>
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
<!-- Font Awsome -->
	<script src="https://kit.fontawesome.com/ce4543ea3a.js" crossorigin="anonymous"></script>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 pt-5">
				<div class="login100-pic js-tilt" data-tilt style="margin-top:130px">
					<img src="assets/login/images/img-01.svg" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="" method="post">
					<span class="login100-form-title">
						Register
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="name" placeholder="Full Name">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-address-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                            <i class="fas fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password2" placeholder="Confirm Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Phone is required">
						<input class="input100" type="number" name="phone" placeholder="Phone">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-phone" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<input type="submit" class="login100-form-btn" name="register" value="Register">
						</input>
					</div>

					<div class="text-center p-t-120">
						<a class="txt2" href="login.php">
							Login To Your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
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