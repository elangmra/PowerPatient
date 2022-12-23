<?php 

include './koneksi.php';
$result = mysqli_query($koneksi, "SELECT * FROM pasien_baru ");
$is_active = 1;

include './templates/header.php';
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
                <h2 class="nav-title">Overview</h2>
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
                <h2 class="content-title">Statistik</h2>
                <h5 class="content-desc mb-4">Data Pasien</h5>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <div class="statistics-card">

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex flex-column justify-content-between align-items-start">
                            <h5 class="content-desc">Total Pasien</h5>

                            <h3 class="statistics-value"><?php echo $total_pasien; ?> </h3>
                        </div>

                        <a class="btn-statistics" href="./form.php">
                            <img src="./assets/img/global/times.svg" alt="">
                        </a>
                    </div>

                    <div class="statistics-list">
                        <img class="statistics-image" src="./assets/img/home/history/photo-4.png" alt="">
                        <img class="statistics-image" src="./assets/img/home/history/photo-3.png" alt="">
                        <img class="statistics-image" src="./assets/img/home/history/photo.png" alt="">
                        <img class="statistics-image" src="./assets/img/home/history/photo-1.png" alt="">
                        <img class="statistics-image" src="./assets/img/home/history/photo-2.png" alt="">
                    </div>

                </div>
            </div>


        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h2 class="content-title">Tabel</h2>
                <h5 class="content-desc mb-4">Data Pasien</h5>
        <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>NRM</th>
                <th>Tanggal Daftar</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Nama KK</th>
                <th>Alamat</th>
                <th>Action</th>
             
          
            </tr>
        </thead>
        <tbody>
            <?php 
            while($row = mysqli_fetch_array($result)){
                echo "
                    <tr>
                    <td>".$row['NRM']." </td>
                    <td>".$row['Tanggal_Daftar']." </td>
                    <td>".$row['Nama_Lengkap']." </td>
                    <td>".$row['Jenis_Kelamin']." </td>
                    <td>".$row['Tanggal_Lahir']." </td>
                    <td>".$row['Nama_KK']." </td>
                    <td>".$row['Alamat']." </td>
                    <td><a href='deleteForm.php?&NRM=".$row['NRM']."'><img src='./assets/img/icons8-trash-24.svg'></a><a href='update.php?&NRM=".$row['NRM']."'><img src='./assets/img/icons8-edit.svg'></a>  </td>
               
            </tr>";
            }
            
            ?>
           
           
        </tbody>
   
    </table>
            </div>

            
        </div>

    </div>
</div>
</div>
<?php 
include './templates/footer.php';
?>