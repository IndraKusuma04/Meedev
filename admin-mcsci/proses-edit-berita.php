<?php

include "koneksi.php";

if(isset($_POST['simpan'])){
	
	$idBerita			= $_POST['idBerita'];
	$tglBerita			= $_POST['tglBerita'];
	$kategoriberita 	= $_POST['kategoriBerita'];
	$namaBerita			= $_POST['namaBerita'];
	$deskripsiBerita	= $_POST['deskripsiBerita'];

	if(isset($_POST['ubahFoto'])){
		
		$foto	= $_FILES['foto']['name'];
		$tmp	= $_FILES['foto']['tmp_name'];
		
		$rand 	= rand(0,5);
		$xfoto	= $rand.$foto; 
		$path 	= "dist/img/".$xfoto;
		
		if(move_uploaded_file($tmp, $path)){
			
			$query 	= "SELECT * FROM tb_berita WHERE idBerita = '$idBerita'";
			$sql	= mysqli_query($koneksi, $query);
			$rows	= mysqli_fetch_array($sql);
			
			if(is_file("dist/img/".$rows['foto']))
				unlink("dist/img/".$rows['foto']);
			
			$query	= "UPDATE `tb_berita` SET `tglBerita`='$tglBerita',`kategoriBerita`='$kategoriberita',`namaBerita`='$namaBerita',`deskripsiBerita`='$deskripsiBerita',`foto`='$xfoto' WHERE idBerita = '$idBerita'";
			$sql	= mysqli_query($koneksi, $query) or die(mysqli_error());
			
			if($sql){
				echo "<script>alert('Data Berhasil Di Update'); window.location ='index.php?page=berita' </script>";
			}else{
				echo "<script>alert('Data Gagal Di Update'); window.location = 'index.php?page=berita'</script>";
			}
		}else{
			echo "<script>alert('Foto Gagal Di Update'); window.location = 'index.php?page=berita'</script>";
		}
	}else{
		
		$query	= "UPDATE `tb_berita` SET `tglBerita`='$tglBerita',`kategoriBerita`='$kategoriberita',`namaBerita`='$namaBerita',`deskripsiBerita`='$deskripsiBerita' WHERE idBerita = '$idBerita'";
		$sql	= mysqli_query($koneksi, $query) or die(mysqli_error());
		
		if($sql){
			echo "<script>alert('Data Berhasil Di Update'); window.location ='index.php?page=berita'</script>";
		}else{
			echo "<script>alert('Data Gagal Di Update'); window.location = 'index.php?page=berita'</script>";
		}
	}
}
?>