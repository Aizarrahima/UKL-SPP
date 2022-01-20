<?php 
    if($_POST) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_petugas = $_POST['nama_petugas'];
        $level = $_POST['level'];

        if(empty($username)) {
            echo "<script>alert('username tidak boleh kosong'); location.href='add_petugas.php';</script>";
        } else if(empty($password)) {
            echo "<script>alert('password tidak boleh kosong'); location.href='add_petugas.php';</script>";
        } else if(empty($nama_petugas)) {
            echo "<script>alert('nama petugas tidak boleh kosong'); location.href='add_petugas.php';</script>";
        } else if(empty($level)) {
            echo "<script>alert('harap pilih salah satu akses yang diinginkan'); location.href='add_petugas.php';</script>";
        } else {
            include "../../../conn.php";
            $insert = mysqli_query($conn, "insert into petugas (username, password, nama_petugas, level) value ('".$username."', '".md5($password)."', '".$nama_petugas."', '".$level."')") or die(mysqli_error($conn));

            if($insert) {
                echo "<script>alert('sukses menambahkan petugas'); location.href='petugas.php';</script>";
            } else {
                echo "<script>alert('gagal menambahkan petugas'); location.href='add_petugas.php';</script>";
            }
        }
    }
?>