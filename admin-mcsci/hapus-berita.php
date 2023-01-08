<?php
	include "koneksi.php";
	$kode = $_GET['idBerita'];
	$modal = mysqli_query($koneksi,"Delete FROM tb_berita WHERE idBerita='$kode'");

if($modal){	
	echo "<script>alert('Berhasil Menghapus Data!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=berita'>";
}else{
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=berita'>";
	echo "<script>alert('Gagal Menghapus Data!');</script>";
}
?>