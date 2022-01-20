<?php 
    if($_GET['id_petugas']) {
        include "../../../conn.php";
        $qry_delete = mysqli_query($conn, "delete from petugas where id_petugas = '".$_GET['id_petugas']."'");

        if($qry_delete) {
            echo "<script>alert('Sukses hapus data'); location.href='petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data'); location.href='petugas.php';</script>";
        }
    }
?>