<?php

include "koneksi.php";

if(isset($_POST['simpan'])){
	
	$idBarang		= $_POST['idBarang'];
	$stokBarang		= $_POST['stok'];

	$query = "UPDATE `tb_barang` SET `stok`=$stokBarang WHERE idBarang='$idBarang'";  	
	$sql = mysqli_query($koneksi, $query) or die(mysqli_error()); 
		// Eksekusi/ Jalankan query dari variabel $query  

	if ($sql){
		echo "<script> alert('Data Berhasil Di Update'); window.location = 'index.php?page=stok' </script>";
	}else {
		echo "<script> alert('Data Gagal Di Update'); window.location = index.php?page=stok' </script>";
	}
}

?>