<?php 
    if($_POST){
        include "../conn.php";
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql_petugas = mysqli_query($conn, "select * from petugas where username = '".$username."' and password = '".md5($password)."'");
        $sql_siswa = mysqli_query($conn, "select * from siswa where username = '".$username."' and password = '".md5($password)."'");

        if(empty($username)) {
            echo "<script>alert('Username tidak boleh kosong'); location.href='../pages/sign-in.php';</script>";
        } else if(empty($password)) {
            echo "<script>alert('Password tidak boleh kosong'); location.href='../pages/sign-in.php';</script>";
        } else {
            if(mysqli_num_rows($sql_petugas) > 0) {
                $dt_login = mysqli_fetch_assoc($sql_petugas);
                if($dt_login['level'] == "admin") {
                    session_start();
                    $_SESSION['username'] = $dt_login['username'];
                    $_SESSION['password'] = $dt_login['password'];
                    $_SESSION['id_petugas'] = $dt_login['id_petugas'];
                    $_SESSION['status_login'] = true;
                    $_SESSION['level'] = "admin";
                    echo "<script>alert('Success login as Admin'); location.href='admin/dashboard-admin.php';</script>";
                } else if($dt_login['level'] == "petugas") {
                    session_start();
                    $_SESSION['username'] = $dt_login['username'];
                    $_SESSION['password'] = $dt_login['password'];
                    $_SESSION['id_petugas'] = $dt_login['id_petugas'];
                    $_SESSION['status_login'] = true;
                    $_SESSION['level'] = "petugas";
                    echo "<script>alert('Success login as Petugas'); location.href='petugas/dashboard-petugas.php';</script>";
                }
            } else if(mysqli_num_rows($sql_siswa) > 0) {
                $dt_login = mysqli_fetch_assoc($sql_siswa);
                session_start();
                $_SESSION['username'] = $dt_login['username'];
                $_SESSION['password'] = $dt_login['password'];
                $_SESSION['status_login'] = true;
                echo "<script>alert('Succes login as Siswa'); location.href='siswa/dashboard-siswa.php';</script>";
            } else {
                echo "<script>alert('Username dan Password tidak benar'); location.href='../pages/sign-in.php';</script>";
            }
        }
    }
?>