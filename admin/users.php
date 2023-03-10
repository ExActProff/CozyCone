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
              <h1 class="m-0">Users</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">Add more users</button>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Access Level</th>
                      <th>Act</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include '../koneksi.php';
                    $no = 1;
                    $data = mysqli_query($koneksi, "select * from users");
                    while($d = mysqli_fetch_array($data)){
                      ?>
                      <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['username']; ?></td>
                        <td>
                          <?php if ($d['level'] == 1) { ?>
                            <span class="badge bg-success">Admin</span>
                          <?php } else { ?>
                            <span class="badge bg-primary">Resepsionis</span>
                          <?php } ?>

                        </td>
                        <td>
                          <a href="edit_users.php?id=<?php echo $d['id']; ?>" class="btn btn btn-warning">Edit</a>
                          <a href="hapus_users.php?id=<?php echo $d['id']; ?>" class="btn btn btn-danger">Delete</a>
                        </td>
                      </tr>
                      <?php
                    }
                    ?>
                  </tbody>
                </table>
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

  <div class="modal fade" id="tambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add users</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="tambah_users.php" method="POST">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="nama" placeholder="Name of Users">
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Level Users</label>
              <select name="level" class="form-control" required>
                <option value="">--- Choose Level ---</option>
                <option value="1">Admin</option>
                <option value="2">Resepsionis</option>                
              </select>
            </div>         
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</body>
</html>