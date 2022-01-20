<?php 
    if($_POST) {
        $nama_kelas = $_POST['nama_kelas'];
        $jurusan = $_POST['jurusan'];
        $angkatan = $_POST['angkatan'];

        if(empty($nama_kelas)) {
            echo "<script>alert('nama kelas tidak boleh kosong'); location.href='add_kelas.php';</script>";
        } else if(empty($jurusan)) {
            echo "<script>alert('jurusan tidak boleh kosong'); location.href='add_kelas.php';</script>";
        } else if(empty($angkatan)) {
            echo "<script>alert('angkatan tidak boleh kosong'); location.href='add_kelas.php';</script>";
        } else {
            include "../../../conn.php";
            $insert = mysqli_query($conn, "insert into kelas (nama_kelas, jurusan, angkatan) value ('".$nama_kelas."','".$jurusan."', '".$angkatan."')") or die(mysqli_error($conn));

            if($insert) {
                echo "<script>alert('sukses menambahkan kelas'); location.href='kelas.php';</script>";
            } else {
                echo "<script>alert('gagal menambahkan kelas'); location.href='add_kelas.php';</script>";
            }
        }
    }
?>