<?php 
    session_start();
    unset($_SESSION["id_petugas"]);
    unset($_SESSION["username"]);
    unset($_SESSION["level"]);
    unset($_SESSION["nama_petugas"]);
    unset($_SESSION["status_login"]);
    header("Location: ../index.php")
?>