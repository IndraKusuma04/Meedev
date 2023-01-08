<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "koneksi.php";

if(isset($_POST['insert'])){

    $idJenis     = $_POST['idJenis'];
    $jenis       = $_POST['jenis'];

    $query = "INSERT INTO `tb_jenis`( `idJenis`, `jenis`) VALUES ('$idJenis','$jenis')";
    $result = mysqli_query($koneksi, $query);

    //cek dulu jika ada gambar produk jalankan coding ini
    if($result) {
    echo '<script>alert("Data Success Disimpan"); window.location="?page=jenis";</script>';
    }else{
    echo '<script>alert("Data Gagal Disimpan"); window.location="?page=error-jenis";</script>';
    }
}
?>