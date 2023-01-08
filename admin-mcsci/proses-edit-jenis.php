<?php

include "koneksi.php";

if(isset($_POST['simpan'])){
	
	$idJenis				= $_POST['idJenis'];
	$jenis			= $_POST['jenis'];

	$query = "UPDATE tb_jenis SET 
			`jenis` 	='$jenis' WHERE idJenis='$idJenis'";  	
	$sql = mysqli_query($koneksi, $query) or die(mysqli_error()); 
		// Eksekusi/ Jalankan query dari variabel $query  

	if ($sql){
		echo "<script> alert('Data Berhasil Di Update'); window.location = 'index.php?page=jenis' </script>";
	}else {
		echo "<script> alert('Data Gagal Di Update'); window.location = index.php?page=jenis' </script>";
	}
}

?>