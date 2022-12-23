<?php
//Include file koneksi ke database
include "koneksi.php";


$nrm = $_GET['NRM'];
$delete_query= "DELETE FROM pasien_baru WHERE NRM ='$nrm'";
$delete = mysqli_query($koneksi,$delete_query);




if ($delete) {
	header('Location: dashboard.php');
	exit;
  }
else {
	echo "Gagal hapus data anggota";
	exit;}


?>