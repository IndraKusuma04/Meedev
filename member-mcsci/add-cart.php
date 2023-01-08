<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "koneksi.php";

if(isset($_POST['insert'])){

    $idBarang     = $_POST['idBarang'];
    $qty	      = $_POST['product-quantity'];
    $idMember     = $_POST['idMember'];
	$kodePembelian  = $_POST['kodePembelian'];

    $date = date("m/d/Y");
    $query1   = mysqli_query($koneksi,"SELECT * FROM tb_barang WHERE idBarang='$idBarang'");
    $result1 = mysqli_fetch_array($query1);
    
    $hargaBarang = $result1['hargaBarang'];
    $total = $qty * $hargaBarang;

    $query = "INSERT INTO `tb_transaksi`( `idBarang`,`idMember`, `qty`,`tglTransaksi`, kodePembelian, `total`) VALUES ('$idBarang','$idMember',$qty,'$date', '$kodePembelian', '$total')";
    $result = mysqli_query($koneksi, $query);

    //cek dulu jika ada gambar produk jalankan coding ini
    if($result) {
      mysqli_query($koneksi,"UPDATE tb_barang SET stok=stok-$qty WHERE idBarang='$idBarang'");
      echo '<script>alert("Data Success Disimpan"); window.location="?page=cart";</script>';
    }else{
    echo '<script>alert("Data Gagal Disimpan"); window.location="?page=cart";</script>';
    }
}
?>