<?php 
    if($_GET['nisn']) {
        include "../../../conn.php";
        $qry_delete = mysqli_query($conn, "delete from siswa where nisn = '".$_GET['nisn']."'") or die(mysqli_error($conn));

        if($qry_delete) {
            echo "<script>alert('Sukses hapus data'); location.href='siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus data'); location.href='siswa.php';</script>";
        }
    }
?>