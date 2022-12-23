<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form pendaftaran
$tglDaftar=$_POST["tanggaldaftar"];
$nik=$_POST["nik"];
$nama=$_POST["namaLengkap"];
$tempatLahir=$_POST["tempatLahir"];
$tanggalLahir=$_POST["tanggalLahir"];
$gender=$_POST["gender"];
$kepalaKeluarga=$_POST["kepalaKeluarga"];
$alamat=$_POST["alamat"];
$phone=$_POST["phone"];
$agama=$_POST["agama"];
$pendidikan=$_POST["pendidikan"];
$golonganDarah=$_POST["golonganDarah"];
$pekerjaan=$_POST["pekerjaan"];
$statusNikah=$_POST["statusNikah"];
$paymentOpt=$_POST["paymentOpt"];
$dihubungi=$_POST["dihubungi"];

//Query input menginput data kedalam tabel anggota
  $sql= "INSERT INTO pasien_baru (Tanggal_Daftar, NIK, Nama_Lengkap, Tempat_Lahir, Tanggal_Lahir, Jenis_Kelamin, Nama_KK, Alamat, No_HP, Agama, Pendidikan, Golongan_Darah, Pekerjaan, Status_Nikah, Cara_Pembayaran, Orang_yang_dapat_dihubungi) VALUES
		('$tglDaftar','$nik','$nama','$tempatLahir','$tanggalLahir','$gender','$kepalaKeluarga','$alamat','$phone','$agama','$pendidikan','$golonganDarah','$pekerjaan','$statusNikah','$paymentOpt','$dihubungi')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($koneksi,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	header('Location: dashboard.php');
	exit;
  }
else {
	echo "Gagal simpan data anggota";
	exit;
}  

?>