<?php
$koneksi = mysqli_connect("localhost","root","","mcsci_db");

//Check Koneksi
if(mysqli_connect_errno()){
    echo '<script>alert("Koneksi Database Gagal : ".mysqli_connect_error())</script>';
}
?>