<?php 
include('../config.php');
if($_SESSION['status'] != "login" ){
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
}elseif($_GET['id_job'] == "" ){
    header("location:../login.php");
}

$id_job = $_GET['id_job'];

$status = $_GET['status'];

if ($status == 'closed' ){
    // echo $status;
    $update = mysqli_query($sql, "UPDATE tb_job set status = 'active' where id_job = '$id_job'");
    $pesan = "Berhasil Di Aktifkan";
}elseif($status == 'active'){
    // echo "Masuk";
    $update = mysqli_query($sql, "UPDATE tb_job set status = 'closed' where id_job = '$id_job'");
    $pesan = "Berhasil Di Nonaktifkan";
}

if($update) {
    echo '<div class="alert alert-success">Update Berhasil , '.$pesan.'</div>';
    header('refresh:1; url=myprojects.php');
} else {
    echo '<div class="alert alert-danger">Ups, Pendaftaran Gagal ..</div>';
    // header('refresh:2;');
}
?>