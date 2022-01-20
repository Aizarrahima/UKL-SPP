<?php 
    if($_POST) {
        $id_kelas = $_POST['id_kelas'];
        $nama_kelas = $_POST['nama_kelas'];
        $jurusan = $_POST['jurusan'];
        $angkatan = $_POST['angkatan'];

        if(empty($nama_kelas)) {
            echo "<script>alert('nama kelas tidak boleh kosong'); location.href='edit_kelas.php';</script>";
        } else if(empty($jurusan)) {
            echo "<script>alert('jurusan tidak boleh kosong'); location.href='edit_kelas.php';</script>";
        } else if(empty($angkatan)) {
            echo "<script>alert('angkatan tidak boleh kosong'); location.href='edit_kelas.php';</script>";;
        } else {
            include "../../../conn.php";
            $update = mysqli_query($conn, "update kelas set nama_kelas='".$nama_kelas."', jurusan ='".$jurusan."', angkatan ='".$angkatan."' where id_kelas ='".$id_kelas."'") or die(mysqli_error($conn));

            if($update) {
                echo "<script>alert('sukses mengubah kelas'); location.href='kelas.php';</script>";
            } else {
                echo "<script>alert('gagal mengubah kelas'); location.href='edit_kelas.php';</script>";
            }
        }
    }
?>