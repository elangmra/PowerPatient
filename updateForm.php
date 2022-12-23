<?php
//Include file koneksi ke database
include "koneksi.php";


//admin
$admin_username = $_POST["name"];



//Update Data admin
  $update_admin= "UPDATE users SET nama='$admin_username'";
  $update_hasil=mysqli_query($koneksi,$update_admin);

  if ($update_hasil) {
	header('Location: dashboard.php');
	exit;
  }
else {
	echo "Gagal simpan data anggota";
	exit;}


?>