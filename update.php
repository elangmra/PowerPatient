<!doctype html>
<html lang="en">
<?php 

include './koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM pasien_baru ");
$is_active = 1;
$nrm = $_GET['NRM'];

$get_pasien = mysqli_query($koneksi, "SELECT * FROM pasien_baru WHERE NRM ='$nrm'");
$pasien = mysqli_fetch_array($get_pasien);
//menghubungkan dengan koneksi
$total_pasien = mysqli_num_rows($result);


?>
<head>
  <?php 
  session_start();
  $is_active = 2;
 


  ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"/>
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>   
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>   
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>   
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>   
    <link rel="stylesheet" href="./css/index.css">

    <title>Formulir Pendaftaran Pasien Baru</title>
</head>

<body>
  
    <div class="screen-cover d-none d-xl-none"></div>
    <div class="row">
        <div class="col-12 col-lg-3 col-navbar d-none d-xl-block">
    <?php 

        include './koneksi.php';
        $result = mysqli_query($koneksi, "SELECT * FROM pasien_baru ");

        include './templates/sidebar.php';

        $get_admin = mysqli_query($koneksi, "SELECT * FROM users");
        $admin = mysqli_fetch_array($get_admin);
        //menghubungkan dengan koneksi
        $total_pasien = mysqli_num_rows($result);

    ?>
        
        
        </div>


<div class="col-12 col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <img src="./assets/img/global/burger.svg" class="mb-2" alt="">
                </button>
                <h2 class="nav-title">Pendaftaran</h2>
            </div>
            <button class="btn-notif d-block d-md-none"><img src="./assets/img/global/bell.svg" alt=""></button>
        </div>

        <div class="d-flex justify-content-between align-items-center nav-input-container">
            <div>
                <p class="mb-0 text-end" style="width:250px;"> Hello, <?= $admin['nama']; ?></p>
            </div>

            <button class="btn-notif d-none d-md-block"><img src="./assets/img/global/user.svg" alt=""></button>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-12">
                <h2 class="content-title">Update Form Pendaftaran</h2>
                <h5 class="content-desc mb-4">Update Data Pasien</h5>
            </div>

             <div class="col-12">
                <div class="statistics-card">
                    <?php
                    echo "
                    <form action='updateController.php?&NRM=".$pasien['NRM']."' method='post' >
                    ";
                    ?>
                    <?php    

                    echo "
                    <table rules='none'>
                            
                            <tr>
                                <td width='50px' height='50px'>Tanggal Daftar</td>
                                <td>:</td>
                                <td><input type='datetime-local' name='tanggaldaftar' class='form-control' value='".$pasien['Tanggal_Daftar']."'></td>
                            </tr>
                            <tr>
                                <td width='300px' height='50px'>NIK</td>
                                <td>:</td>
                                <td><input type='text' name='nik' class='form-control' value='".$pasien['NIK']."'/></td>
                            </tr>
                            <tr>
                                <td width='300px' height='50px'>Nama Lengkap</td>
                                <td>:</td>
                                <td><input type='text' name='namaLengkap' class='form-control'value='".$pasien['Nama_Lengkap']."'/></td>
                            </tr>
                            <tr>
                                <td width='300px' height='50px'>Tempat Lahir</td>
                                <td>:</td>
                                <td><input type='text'name='tempatLahir' class='form-control' value='".$pasien['Tempat_Lahir']."' /></td>
                            </tr>
                            <tr>
                                <td width='300px' height='50px'>Tanggal Lahir</td>
                                <td>:</td>
                                <td><input type='date' name='tanggalLahir' class='form-control' value='".$pasien['Tanggal_Lahir']."' /></td>
                            </tr>
                            <tr>
                                <td width='300px' height='50px'>Jenis Kelamin</td>
                                <td>:</td>
                                <td><select name='gender' value='".$pasien['Jenis_Kelamin']."'\>
                          
                                <option value='Pria'>Pria</option>
                                <option value='Wanita'>Wanita</option>
                                </select></td>
                            </tr>
                                <td width='300px' height='50px'>Nama KK</td>
                                <td>:</td>
                                <td><input type='text' name='kepalaKeluarga' class='form-control' value='".$pasien['Nama_KK']."'/></td>
                            </tr>
                            </tr>
                                <td width='300px' height='50px'>Alamat</td>
                                <td>:</td>
                                <td><input type='text' name='alamat' class='form-control' value='".$pasien['Alamat']."' /></td>
                            </tr>
                            </tr>
                                <td width='300px' height='50px'>No. HP</td>
                                <td>:</td>
                                <td> <input type='tel' class='nohp' value='".$pasien['No_HP']."' name='phone' />
                            </tr>
                            </tr>
                                <td width='300px' height='50px'>Agama</td>
                                <td>:</td>
                                <td><select name='agama' value='".$pasien['Agama']."'>
                           
                                <option value='Islam'>Islam</option>
                                <option value='Kristen'>Kristen</option>
                                <option value='Hindu'>Hindu</option>
                                <option value='Budha'>Budha</option>
                                <option value='Protestan'>Protestan</option>
                                <option value='Konguchu'>Konguchu</option>
                                </select></td>
                            </tr>
                            </tr>
                                <td width='300px' height='50px'>Pendidikan</td>
                                <td>:</td>
                                <td> <select name='pendidikan' value='".$pasien['Pendidikan']."'>
                            <!--  <option value='>Silakan Pilih!</option> -->
                                <option value='SD/MI/Sederajat'>SD/MI/Sederajat</option>
                                <option value='SMP/Mts/Sederajat'>SMP/Mts/Sederajat</option>
                                <option value='SMA/SMK/MA/Sederajat'>SMA/SMK/MA/Sederajat</option>
                                <option value='D1/D2/D3'>D1/D2/D3</option>
                                <option value='S1/S2/S3'>S1/S2/S3</option>
                                </select></td>
                            </tr>
                            </tr>
                                <td width='300px' height='50px'>Golongan Darah</td>
                                <td>:</td>
                                <td><select name='golonganDarah' value='".$pasien['Golongan_Darah']."'>
                            <!--  <option value=''>Silakan Pilih!</option> -->
                                <option value='A'>A</option>
                                <option value='AB'>AB</option>
                                <option value='B'>B</option>
                                <option value='O'>O</option>
                                </select></td>
                            </tr>
                            </tr>
                                <td width='300px' height='50px'>Pekerjaan</td>
                                <td>:</td>
                                <td> <input type='text' name='pekerjaan' class='form-control' value='".$pasien['Pekerjaan']."' /></td>
                            </tr>
                            </tr>
                                <td width='300px' height='50px'>Status Nikah</td>
                                <td>:</td>
                                <td>   <select name='statusNikah' value='".$pasien['Status_Nikah']."'>
                            <!--  <option value=''>Silakan Pilih!</option> -->
                                <option value='Belum Menikah'>Belum Menikah</option>
                                <option value='Menikah'>Menikah</option>
                                <option value='Janda/Duda'>Janda/Duda</option>
                                </select></td>
                            </tr>
                            </tr>
                                <td width='300px' height='50px'>Cara Pembayaran</td>
                                <td>:</td>
                                <td><select name='paymentOpt' value='".$pasien['Cara_Pembayaran']."'>
                            <!--  <option value=''>Silakan Pilih!</option> -->
                                <option value='UMUM'>UMUM</option>
                                <option value='ASURANSI'>ASURANSI</option>
                                <option value='JKN'>JKN</option>
                                </select></td>
                            </tr>
                            </tr>
                                <td width='300px''height='50px'>Orang yang dapar dihubungi</td>
                                <td>:</td>
                                <td> <input type='textarea'name='dihubungi' value='".$pasien['Orang_yang_dapat_dihubungi']."'></td>
                            </tr>
                            <td width='300px' height='50px'> <input type='submit'name='submit' class='btn btn-primary' value='Submit'></input></td>
                          ";
                            ?>
                            </table>

                    </form>
                   

                </div>
            </div>

    
        </div>



    </div>
</div>
</div>
<?php 
include './templates/footer.php';
?>
