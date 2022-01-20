<?php 
    if($_POST) {
        $id_spp = $_POST['id_spp'];
        $angkatan = $_POST['angkatan'];
        $tahun = $_POST['tahun'];
        $nominal = $_POST['nominal'];

        if(empty($angkatan)) {
            echo "<script>alert('angkatan tidak boleh kosong'); location.href='edit_spp.php';</script>";
        } else if(empty($tahun)) {
            echo "<script>alert('tahun tidak boleh kosong'); location.href='edit_spp.php';</script>";
        } else if(empty($nominal)) {
            echo "<script>alert('nominal tidak boleh kosong'); location.href='edit_spp.php';</script>";;
        } else {
            include "../../../conn.php";
            $update = mysqli_query($conn, "update spp set angkatan='".$angkatan."', tahun ='".$tahun."', nominal ='".$nominal."' where id_spp ='".$id_spp."'") or die(mysqli_error($conn));

            if($update) {
                echo "<script>alert('sukses mengubah spp'); location.href='spp.php';</script>";
            } else {
                echo "<script>alert('gagal mengubah spp'); location.href='edit_spp.php';</script>";
            }
        }
    }
?>