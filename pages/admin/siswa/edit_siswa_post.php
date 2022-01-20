<?php 
    if($_POST) {
        $nisn = $_POST['nisn'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $id_kelas = $_POST['id_kelas'];
        $alamat = $_POST['alamat'];
        $no_tlp = $_POST['no_tlp'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(empty($nisn)) {
            echo "<script>alert('nisn tidak boleh kosong'); location.href= 'edit_siswa.php';</script>";
        } else if(empty($nis)) {
            echo "<script>alert('nis tidak boleh kosong'); location.href= 'edit_siswa.php';</script>";
        } else if(empty($nama)) {
            echo "<script>alert('nama tidak boleh kosong'); location.href= 'edit_siswa.php';</script>";
        } else if(empty($id_kelas)) {
            echo "<script>alert('pilih salah satu nama kelas'); location.href= 'edit_siswa.php';</script>";
        } else if(empty($alamat)) {
            echo "<script>alert('alamat tidak boleh kosong'); location.href= 'edit_siswa.php';</script>";
        } else if(empty($no_tlp)) {
            echo "<script>alert('nomor hp tidak boleh kosong'); location.href= 'edit_siswa.php';</script>";
        } else if(empty($username)) {
            echo "<script>alert('username tidak boleh kosong'); location.href= 'edit_siswa.php';</script>";
        } else if(empty($password)) {
            echo "<script>alert('password tidak boleh kosong'); location.href= 'edit_siswa.php';</script>";
        } else {
            include "../../../conn.php";
            $update = mysqli_query($conn, "update siswa set nisn='".$nisn."', nis='".$nis."', nama='".$nama."', id_kelas='".$id_kelas."', alamat='".$alamat."', no_tlp='".$no_tlp."', username='".$username."', password='".md5($password)."' where nisn='".$nisn."'") or die(mysqli_error($conn));

            if($update) {
                echo "<script>alert('sukses mengubah siswa'); location.href='siswa.php';</script>";
            } else {
                echo "<script>alert('gagal mengubah siswa'); location.href='edit_siswa.php';</script>";
            }
        }
    }
?>