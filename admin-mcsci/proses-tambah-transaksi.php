<?php

include "koneksi.php";

if(isset($_POST['simpan'])){
	
	$idTransaksi	= $_POST['idTransaksi'];
	$idMember		= $_POST['idMember'];
	$idInvoice		= $_POST['idInvoice'];

	$query = "UPDATE `tb_transaksi` SET `idTransaksi`='$idTransaksi', `idMember`='$idMember', `noInvoice`='$idInvoice' WHERE `status`='Pending'";  	
	$sql = mysqli_query($koneksi, $query) or die(mysqli_error()); 
		// Eksekusi/ Jalankan query dari variabel $query  

	if ($sql){
        mysqli_query($koneksi,"UPDATE `tb_transaksi` SET `status`='Menunggu Pembayaran' WHERE `status`='Pending'"); 
		echo "<script> alert('Data Berhasil Di Update'); window.location = 'index.php?page=data-transaksi' </script>";
	}else {
		echo "<script> alert('Data Gagal Di Update'); window.location = index.php?page=data-transaksi' </script>";
	}
}

?>