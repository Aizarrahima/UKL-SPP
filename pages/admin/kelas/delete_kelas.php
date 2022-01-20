<?php 
    if($_GET['id_kelas']) {
        include "../../../conn.php";
        $qry_delete = mysqli_query($conn, "delete from kelas where id_kelas = '".$_GET['id_kelas']."'")  or die(mysqli_error($conn));

        if($qry_delete) {
            echo "<script>alert('Sukses hapus data'); location.href='kelas.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data'); location.href='kelas.php';</script>";
        }
    }
?>