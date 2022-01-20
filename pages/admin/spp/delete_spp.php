<?php 
    if($_GET['id_spp']) {
        include "../../../conn.php";
        $qry_delete = mysqli_query($conn, "delete from spp where id_spp = '".$_GET['id_spp']."'")  or die(mysqli_error($conn));

        if($qry_delete) {
            echo "<script>alert('Sukses hapus data'); location.href='spp.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data'); location.href='spp.php';</script>";
        }
    }
?>