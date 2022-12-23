<?php
//Include file koneksi ke database
include "koneksi.php";
$nrm = $_GET['NRM'];

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
  $sql= "UPDATE pasien_baru SET Tanggal_Daftar='$tglDaftar', NIK='$nik', Nama_Lengkap='$nama', Tempat_Lahir='$tempatLahir', Tanggal_Lahir='$tanggalLahir', Jenis_Kelamin='$gender', Nama_KK='$kepalaKeluarga', Alamat='$alamat', No_HP='$phone', Agama='$agama', Pendidikan='$pendidikan', Golongan_Darah='$golonganDarah', Pekerjaan='$pekerjaan', Status_Nikah='$statusNikah', Cara_Pembayaran='$paymentOpt', Orang_yang_dapat_dihubungi='$dihubungi' WHERE NRM ='$nrm'";


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