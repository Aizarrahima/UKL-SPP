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
            echo "<script>alert('nisn tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else if(empty($nis)) {
            echo "<script>alert('nis tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else if(empty($nama)) {
            echo "<script>alert('nama tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else if(empty($id_kelas)) {
            echo "<script>alert('pilih salah satu kelas'); location.href='add_siswa.php';</script>";
        } else if(empty($alamat)) {
            echo "<script>alert('alamat tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else if(empty($no_tlp)) {
            echo "<script>alert('nomor HP tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else if(empty($username)) {
            echo "<script>alert('username tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else if(empty($password)) {
            echo "<script>('password tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else {
            include "../../../conn.php";
            $insert = mysqli_query($conn, "insert into siswa (nisn, nis, nama, id_kelas, alamat, no_tlp, username, password) value ('".$nisn."','".$nis."', '".$nama."', '".$id_kelas."', '".$alamat."', '".$no_tlp."', '".$username."', '".md5($password)."')") or die(mysqli_error($conn));

            if($insert) {
                echo "<script>alert('sukses menambahkan siswa'); location.href='siswa.php';</script>";
            } else {
                echo "<script>alert('gagal menambahkan siswa'); location.href='add_siswa.php';</script>";
            }
        }
    }
?>