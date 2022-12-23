<!doctype html>
<html lang="en">

<head>
  <?php 
  session_start();
  $is_active = 3;
 


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

    <title>Settings Admin</title>
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
                <h2 class="nav-title">Setting</h2>
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
                <h2 class="content-title">Setting Admin</h2>
                <h5 class="content-desc mb-4">Change Admin Data</h5>
            </div>

             <div class="col-12">
                <div class="statistics-card">
                    <form action="updateForm.php" method="post" >
                        <table rules="none">
                            <tr>
                                <td width="50px" height="50px">Nama</td>
                                <td>:</td>
                                <td ><input type="text" name="name" class="form-control" value="<?= $admin['nama'] ?>"></td>
                            </tr>
                    
                
                            <td width="300px" height="50px"> <input type="submit" name="submit" class="btn btn-primary" value="Submit"></input></td>
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
