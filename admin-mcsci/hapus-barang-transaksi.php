<?php
	include "koneksi.php";
	$kode = $_GET['kodePembelian'];
	$modal = mysqli_query($koneksi,"SELECT * FROM `tb_transaksi` WHERE kodePembelian='$kode'");
	$data = mysqli_fetch_array($modal);

	$idBarang 	= $data['idBarang'];
	$qty		= $data['qty'];

if($modal){	
	mysqli_query($koneksi,"UPDATE tb_barang SET stok=stok+$qty WHERE idBarang='$idBarang'");
	mysqli_query($koneksi,"DELETE FROM tb_transaksi WHERE kodePembelian='$kode'");
	echo "<script>alert('Berhasil Menghapus Data!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=transaksi'>";
}else{
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=transaksi'>";
	echo "<script>alert('Gagal Menghapus Data!');</script>";
}
?>