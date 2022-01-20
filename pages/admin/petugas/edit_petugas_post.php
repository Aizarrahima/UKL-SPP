<?php 
    if($_POST) {
        $id_petugas = $_POST['id_petugas'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama_petugas = $_POST['nama_petugas'];
        $level = $_POST['level'];

        if(empty($username)) {
            echo "<script>alert('username tidak boleh kosong'); location.href='edit_petugas.php';</script>";
        } else if(empty($password)) {
            echo "<script>alert('password tidak boleh kosong'); location.href='edit_petugas.php';</script>";
        } else if(empty($nama_petugas)) {
            echo "<script>alert('nama petugas tidak boleh kosong'); location.href='edit_petugas.php';</script>";
        } else if(empty($level)) {
            echo "<script>alert('harap pilih salah satu akses yang diinginkan'); location.href='edit_petugas.php';</script>";
        } else {
            include "../../../conn.php";
            $update = mysqli_query($conn, "update petugas set username='".$username."', password='".md5($password)."', nama_petugas='".$nama_petugas."', level='".$level."' where id_petugas='".$id_petugas."'") or die(mysqli_error($conn));

            if($update) {
                echo "<script>alert('sukses mengubah petugas'); location.href='petugas.php';</script>";
            } else {
                echo "<script>alert('gagal mengubah petugas'); location.href='edit_petugas.php';</script>";
            }
        }
    }
?>