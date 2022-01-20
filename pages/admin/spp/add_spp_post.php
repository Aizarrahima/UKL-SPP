<?php 
    if($_POST) {
        $angkatan = $_POST['angkatan'];
        $tahun = $_POST['tahun'];
        $nominal = $_POST['nominal'];

        if(empty($angkatan)) {
            echo "<script>alert('angkatan tidak boleh kosong'); location.href='add_spp.php';</script>";
        } else if(empty($tahun)) {
            echo "<script>alert('tahun tidak boleh kosong'); location.href='add_spp.php';</script>";
        } else if(empty($angkatan)) {
            echo "<script>alert('nominal tidak boleh kosong'); location.href='add_spp.php';</script>";
        } else {
            include "../../../conn.php";
            $insert = mysqli_query($conn, "insert into spp (angkatan, tahun, nominal) value ('".$angkatan."','".$tahun."', '".$nominal."')") or die(mysqli_error($conn));

            if($insert) {
                echo "<script>alert('sukses menambahkan spp'); location.href='spp.php';</script>";
            } else {
                echo "<script>alert('gagal menambahkan spp'); location.href='add_spp.php';</script>";
            }
        }
    }
?>