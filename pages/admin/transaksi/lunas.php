<?php 
if($_GET['id_pembayaran']) {
    include "../../../conn.php";
    $bayar = $_GET['id_pembayaran'];
    $date   = new DateTime(); //this returns the current date time
    $dateString = $date->format('Y-m-d');
    // echo $dateString;
    $update = mysqli_query($conn, "UPDATE pembayaran SET tgl_bayar = '".$dateString."' WHERE id_pembayaran = '".$bayar."'");
    
    if($update) {
        echo "<script>alert('sukses membayar'); location.href='transaksi.php';</script>";
    } else {
        echo "<script>alert('gagal membayar'); location.href='transaksi.php';</script>";
    }
}
?>