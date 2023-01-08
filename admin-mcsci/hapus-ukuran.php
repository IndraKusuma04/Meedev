<?php
	include "koneksi.php";
	$kode = $_GET['idUkuran'];
	$modal = mysqli_query($koneksi,"Delete FROM tb_ukuran WHERE idUkuran='$kode'");

if($modal){	
	echo "<script>alert('Berhasil Menghapus Data!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=ukuran'>";
}else{
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=ukuran'>";
	echo "<script>alert('Gagal Menghapus Data!');</script>";
}
?>