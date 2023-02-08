<?php 
session_start();

  // cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
  header("location:../index.php?pesan=gagal");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cozy Cone</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-orange accent-dark">
      <div class="container">
        <a href="" class="navbar-brand">
          <img src="../assets/dist/img/logomotel.png" alt="#" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">Cozy Cone</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="kamar.php" class="nav-link">Motel Type</a>
            </li>
            <li class="nav-item">
              <a href="fasilitas.php" class="nav-link">Motel Facility</a>
            </li>
            <li class="nav-item">
              <a href="galeri.php" class="nav-link">Gallery</a>
            </li>
            <li class="nav-item">
              <a href="users.php" class="nav-link">Users</a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <?php
        include '../koneksi.php';
        $no = 1;
        $data = mysqli_query($koneksi, "select * from kamar");
        $data1 = mysqli_query($koneksi, "select * from fasilitas_kamar");
        $data2 = mysqli_query($koneksi, "select * from galeri");
        $data3 = mysqli_query($koneksi, "select * from users");
        $jumlah_pesanan = mysqli_num_rows($data);
        $jumlah_pesanan1 = mysqli_num_rows($data1);
        $jumlah_pesanan2 = mysqli_num_rows($data2);
        $jumlah_pesanan3 = mysqli_num_rows($data3);
      ?>
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-body">
                <div class="row">

                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info bg-gradient-gray-dark">
                      <div class="inner">
                        <h3><?php echo $jumlah_pesanan; ?></h3>

                        <p>Motel Type</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-home"></i>
                      </div>
                      <a href="kamar.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info bg-gradient-gray-dark">
                      <div class="inner">
                      <h3><?php echo $jumlah_pesanan1; ?></h3>

                        <p>Motel Facility</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-list-alt"></i>
                      </div>
                      <a href="fasilitas.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info bg-gradient-gray-dark">
                      <div class="inner">
                      <h3><?php echo $jumlah_pesanan2; ?></h3>

                        <p>Gallery</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-image"></i>
                      </div>
                      <a href="galeri.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>

                  <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info bg-gradient-gray-dark">
                      <div class="inner">
                      <h3><?php echo $jumlah_pesanan3; ?></h3>

                        <p>Users</p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-user"></i>
                      </div>
                      <a href="users.php" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

      <!-- Main Footer -->
      <footer class="main-footer accent-orange">
        <!-- Default to the left -->
        <strong>&copy;Project UAS <a href="https://www.instagram.com/hilallh_">hilallh_</a></strong>
      </footer>
    </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="../assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/dist/js/adminlte.min.js"></script>
</body>
</html>