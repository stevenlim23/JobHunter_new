<?php 
$server = 'localhost';
$username = 'root';
$password = '';
$db_name = "db_jobhunter_new";
$sql = mysqli_connect($server,$username,$password);
mysqli_select_db($sql,$db_name);
?>