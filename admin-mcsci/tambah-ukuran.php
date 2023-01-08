<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "koneksi.php";

if(isset($_POST['insert'])){

    $idUkuran     = $_POST['idUkuran'];
    $ukuran       = $_POST['ukuran'];

    $query = "INSERT INTO `tb_ukuran`( `idUkuran`, `ukuran`) VALUES ('$idUkuran','$ukuran')";
    $result = mysqli_query($koneksi, $query);

    //cek dulu jika ada gambar produk jalankan coding ini
    if($result) {
    echo '<script>alert("Data Success Disimpan"); window.location="?page=ukuran";</script>';
    }else{
    echo '<script>alert("Data Gagal Disimpan"); window.location="?page=ukuran";</script>';
    }
}
?>