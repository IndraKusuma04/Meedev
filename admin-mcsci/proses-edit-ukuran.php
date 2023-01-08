<?php

include "koneksi.php";

if(isset($_POST['simpan'])){
	
	$idUkuran		= $_POST['idUkuran'];
	$ukuran			= $_POST['ukuran'];

	$query = "UPDATE tb_ukuran SET 
			`ukuran` 	='$ukuran' WHERE idUkuran='$idUkuran'";  	
	$sql = mysqli_query($koneksi, $query) or die(mysqli_error()); 
		// Eksekusi/ Jalankan query dari variabel $query  

	if ($sql){
		echo "<script> alert('Data Berhasil Di Update'); window.location = 'index.php?page=ukuran' </script>";
	}else {
		echo "<script> alert('Data Gagal Di Update'); window.location = index.php?page=ukuran' </script>";
	}
}

?>