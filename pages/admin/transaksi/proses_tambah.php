<?php

include "../../../conn.php"; 

    if($_POST) {
        $id_petugas = $_POST['id_petugas'];
        $nisn = $_POST['nisn'];
        $bulan_spp = $_POST['bulan_spp'];
        $tahun_spp = $_POST['tahun_spp'];
        $id_spp = $_POST['id_spp'];
        // $sisa = $_POST['jumlah'];
        // $nominal = $_POST['nominal'];

        if(empty($bulan_spp)) {
            echo "<script>alert('bulan spp tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else if(empty($tahun_spp)) {
            echo "<script>alert('tahun spp tidak boleh kosong'); location.href='add_siswa.php';</script>";
        } else {
            
            $insert = mysqli_query($conn, "insert into pembayaran (id_petugas, nisn, bulan_spp, tahun_spp, id_spp) value ('".$id_petugas."','".$nisn."', '".$bulan_spp."', '".$tahun_spp."', '".$id_spp."')") or die(mysqli_error($conn));

            if($insert) {
                echo "<script>alert('sukses menambahkan data'); location.href='transaksi.php';</script>";
            } else {
                echo "<script>alert('gagal menambahkan data'); location.href='add_transaksi.php';</script>";
            }
        }
    }
?>