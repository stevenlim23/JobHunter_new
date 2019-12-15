<?php
include 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($sql,"select * from tb_user where username = '$username' and password ='$password' ");
$cek = mysqli_num_rows($login);

	if($cek > 0 ){
		$data = mysqli_fetch_assoc($login);
		session_start();
		$_SESSION['username'] = $username;	
		$_SESSION['status'] = "login";
		$_SESSION['role'] = $data['role'];
		$_SESSION['id_user'] = $data['id_user'];
		$id_user = $data['id_user'];
		if ($data['role'] == "jobplacer"){
			$joinsql = mysqli_query($sql,"SELECT b.id_placer from tb_user a join tb_placer b on a.id_user = b.id_user where a.id_user= '$id_user' ");
			$datajoin = mysqli_fetch_assoc($joinsql);
			$_SESSION['id_placer'] = $datajoin['id_placer'];
			// echo $_SESSION['id_placer'];
			// die();
		}
		elseif($data['role'] == "jobhunter"){
			$joinsql = mysqli_query($sql,"SELECT b.id_hunter from tb_user a join tb_hunter b on a.id_user = b.id_user where a.id_user= '$id_user' ");
			$datajoin = mysqli_fetch_assoc($joinsql);
			$_SESSION['id_hunter'] = $datajoin['id_hunter'];
		};
		
		if($data['role'] == "admin"){
			header("location:admin");
		}elseif($data['role'] == "jobplacer"){
			header("location:jobplacer/placing.php");
		}elseif($data['role'] == "jobhunter"){
			header("location:jobsearch/browse.php");
		}
	}else{
		header("location:failedlogin.php");
	}
?>