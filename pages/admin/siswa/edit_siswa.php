<!--
=========================================================
* Material Dashboard 2 - v3.0.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../../../assets/img/favicon.png">
  <title>
    Aplikasi Pembayaran SPP
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../../../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../../../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../../../assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.php">
              Pembayaran SPP
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.php">
                    <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/profile.php">
                    <i class="fa fa-user opacity-6 text-dark me-1"></i>
                    Profile
                  </a>
                </li>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../../../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <?php 
            include "../../../conn.php"; 
            $qry_get_siswa = mysqli_query($conn, "select * from siswa where nisn = '".$_GET['nisn']."'");
            $dt_siswa = mysqli_fetch_array($qry_get_siswa);
            ?>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Update Data Siswa</h4>
                  <p class="mb-0">Silahkan mengupdate data siswa</p>
                </div>
                <div class="card-body">
                  <form action="edit_siswa_post.php" method="post" enctype="multipart/form-data" role="form">
                      
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">NISN</label>
                      <input type="text" name="nisn" value="<?=$dt_siswa['nisn']?>" class="form-control" readonly>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">NIS</label>
                      <input type="text" name="nis" value="<?=$dt_siswa['nis']?>" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nama</label>
                      <input type="text" name="nama" value="<?=$dt_siswa['nama']?>" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label><select class="form-select" aria-label="Default select example" name="id_kelas">
                            <option selected>Pilih Salah Satu Nama Kelas</option>
                            <?php 
                            include "../../../conn.php";
                                $qry_kelas = mysqli_query($conn, "select * from kelas");
                                while($dt_kelas = mysqli_fetch_array($qry_kelas)) {
                                    echo '<option value="'.$dt_kelas['id_kelas'].'">'.$dt_kelas['nama_kelas'].'</option>';
                                }
                            ?>
                        </select></label>
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Alamat</label>
                      <input type="text" name="alamat" value="<?=$dt_siswa['alamat']?>" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Nomor HP</label>
                      <input type="text" name="no_tlp" value="<?=$dt_siswa['no_tlp']?>" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Username</label>
                      <input type="text" name="username" value="<?=$dt_siswa['username']?>" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" value="<?=$dt_siswa['password']?>" class="form-control">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Update</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!--   Core JS Files   -->
  <script src="../../../assets/js/core/popper.min.js"></script>
  <script src="../../../assets/js/core/bootstrap.min.js"></script>
  <script src="../../../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../../../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../../../assets/js/material-dashboard.min.js?v=3.0.0"></script>
</body>

</html>