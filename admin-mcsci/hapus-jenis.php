<?php
	include "koneksi.php";
	$kode = $_GET['idJenis'];
	$modal = mysqli_query($koneksi,"Delete FROM tb_jenis WHERE idJenis='$kode'");

if($modal){	
	echo "<script>alert('Berhasil Menghapus Data!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
}else{
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=jenis'>";
	echo "<script>alert('Gagal Menghapus Data!');</script>";
}
?>