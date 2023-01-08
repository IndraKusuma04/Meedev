<?php
	include "koneksi.php";
	$kode = $_GET['idBarang'];
	$modal = mysqli_query($koneksi,"Delete FROM tb_barang WHERE idBarang='$kode'");

if($modal){	
	echo "<script>alert('Berhasil Menghapus Data!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=barang'>";
}else{
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=barang'>";
	echo "<script>alert('Gagal Menghapus Data!');</script>";
}
?>