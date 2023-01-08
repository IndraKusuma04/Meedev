<?php
	include "koneksi.php";
	$kode = $_GET['idMember'];
	$modal = mysqli_query($koneksi,"Delete FROM tb_user WHERE idMember='$kode'");

if($modal){	
	echo "<script>alert('Berhasil Menghapus Data!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=users'>";
}else{
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=users'>";
	echo "<script>alert('Gagal Menghapus Data!');</script>";
}
?>