<?php

include "koneksi.php";

if(isset($_POST['simpan'])){
	
	$idBarang			= $_POST['idBarang'];
	$namaBarang			= $_POST['namaBarang'];
	$jenisBarang 		= $_POST['jenisBarang'];
	$ukuranBarang		= $_POST['ukuranBarang'];
	$hargaBarang		= $_POST['hargaBarang'];
	$stok				= $_POST['stok'];
	$deskripsiBarang	= $_POST['deskripsiBarang'];

	if(isset($_POST['ubahFoto'])){
		
		$foto	= $_FILES['foto']['name'];
		$tmp	= $_FILES['foto']['tmp_name'];
		
		$rand 	= rand(0,5);
		$xfoto	= $rand.$foto; 
		$path 	= "dist/img/".$xfoto;
		
		if(move_uploaded_file($tmp, $path)){
			
			$query 	= "SELECT * FROM tb_barang WHERE idBarang = '$idBarang'";
			$sql	= mysqli_query($koneksi, $query);
			$rows	= mysqli_fetch_array($sql);
			
			if(is_file("dist/img/".$rows['foto']))
				unlink("dist/img/".$rows['foto']);
			
			$query	= "UPDATE `tb_barang` SET `namaBarang`='$namaBarang',`idJenis`='$jenisBarang',`idUkuran`='$ukuranBarang',`hargaBarang`='$hargaBarang',`stok`=$stok,`deskripsiBarang`='$deskripsiBarang',`fotoBarang`='$xfoto' WHERE idBarang = '$idBarang'";
			$sql	= mysqli_query($koneksi, $query) or die(mysqli_error());
			
			if($sql){
				echo "<script>alert('Data Berhasil Di Update'); window.location ='index.php?page=barang' </script>";
			}else{
				echo "<script>alert('Data Gagal Di Update'); window.location = 'index.php?page=barang'</script>";
			}
		}else{
			echo "<script>alert('Foto Gagal Di Update'); window.location = 'index.php?page=barang'</script>";
		}
	}else{
		
		$query	= "UPDATE `tb_barang` SET `namaBarang`='$namaBarang',`idJenis`='$jenisBarang',`idUkuran`='$ukuranBarang',`hargaBarang`='$hargaBarang',`deskripsiBarang`='$deskripsiBarang',`stok`=$stok WHERE idBarang = '$idBarang'";
		$sql	= mysqli_query($koneksi, $query) or die(mysqli_error());
		
		if($sql){
			echo "<script>alert('Data Berhasil Di Update'); window.location ='index.php?page=barang'</script>";
		}else{
			echo "<script>alert('Data Gagal Di Update'); window.location = 'index.php?page=barang'</script>";
		}
	}
}
?>