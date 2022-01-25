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
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                
                    <?php 
                    include "../../../conn.php";
                    session_start();
                    if (isset($_GET['nisn']) && $_GET['nisn'] != '') {
                        $data = $conn->query("SELECT * FROM kelas join siswa WHERE nisn = '".$_GET['nisn']."'");
                        $dta = mysqli_fetch_assoc($data);

                        $pembayaran = $conn->query("SELECT * FROM pembayaran WHERE nisn = '".$_GET['nisn']."' ORDER BY tahun_spp DESC, bulan_spp DESC");
                        $dt_pembayaran = mysqli_fetch_assoc($pembayaran);
                        $bulan = 1;
                        $tahun = 2021;

                        if ($pembayaran->num_rows) {
                            if ($dt_pembayaran['bulan_spp'] < 12) {
                                $bulan = $dt_pembayaran['bulan_spp'] + 1;
                            } else if ($dt_pembayaran['bulan_spp'] >= 12) {
                                $tahun = $dt_pembayaran['tahun_spp'] + 1;
                            }
                        }
                        ?>
                        
                        <div class="card card-plain">
                            <div class="card-header">
                            <h4 class="font-weight-bolder">Transaksi</h4>
                            </div>
                            <div class="card-body mb-8">
                            <form action="proses_tambah.php" method="post" role="form">
                                <input type="hidden" name="nisn" value="<?= $_GET['nisn'] ?>">
                                <input type="hidden" name="id_petugas" value="<?=$_SESSION['id_petugas']?>">
                                <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Bulan</label>
                                <input type="text" name="bulan_spp" class="form-control" value="<?=$bulan?>">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Tahun</label>
                                <input type="text" name="tahun_spp" class="form-control" value="<?=$tahun?>">
                                </div>
                                <div class="input-group input-group-outline mb-3">
                                <label><select class="form-select" aria-label="Default select example" name="id_spp">
                                    <option selected>Pilih Salah Satu Nominal</option>
                                    <?php 
                                        $qry_spp = mysqli_query($conn, "select * from spp");
                                        while($dt_spp = mysqli_fetch_array($qry_spp)) {
                                            echo '<option value="'.$dt_spp['id_spp'].'">'.$dt_spp['nominal'].'</option>';
                                        }
                                    ?>
                                </select>
                              </label>
                              <div class="input-group input-group-outline mb-3">
                              </div>
                            <div class="text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Simpan</button>  
                          </div>
                        </form>

                        <?php 
                        }
                    ?>
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


