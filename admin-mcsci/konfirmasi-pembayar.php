<?php
	include "koneksi.php";
	$kode = $_GET['idTransaksi'];
	$modal = mysqli_query($koneksi,"UPDATE tb_transaksi SET status='Success' WHERE idTransaksi='$kode'");

if($modal){	
	echo "<script>alert('Berhasil Mengkonfirmasi Pembayaran!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=data-transaksi'>";
}else{
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=data-transaksi'>";
	echo "<script>alert('Gagal Mengkonfirmasi Pembayaran!');</script>";
}
?>