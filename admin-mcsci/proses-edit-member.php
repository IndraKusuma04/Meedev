<?php

include "koneksi.php";

if(isset($_POST['simpan'])){
	
	$idMember			= $_POST['idmember'];
	$identitasMmber		= $_POST['identitasMember'];
	$nama 				= $_POST['nama'];
	$jkMember			= $_POST['jkMember'];
	$email				= $_POST['email'];
	$telp				= $_POST['telp'];
	$alamat				= $_POST['alamat'];
	$username			= $_POST['username'];
	$password			= $_POST['password'];
	$tglPembuatan		= $_POST['tglPembuatan'];
	$tglUpdate		 	= $_POST['tglUpdate'];

	if(isset($_POST['ubahFoto'])){
		
		$foto	= $_FILES['foto']['name'];
		$tmp	= $_FILES['foto']['tmp_name'];
		
		$rand 	= rand(0,5);
		$xfoto	= $rand.$foto; 
		$path 	= "dist/img/".$xfoto;
		
		if(move_uploaded_file($tmp, $path)){
			
			$query 	= "SELECT * FROM tb_user WHERE idMember = '$idMember'";
			$sql	= mysqli_query($koneksi, $query);
			$rows	= mysqli_fetch_array($sql);
			
			if(is_file("dist/img/".$rows['foto']))
				unlink("dist/img/".$rows['foto']);
			
			$query	= "UPDATE `tb_user` SET `identitasMember`='$identitasMmber',`namaMember`='$nama',`jkMember`='$jkMember',`email`='$email',`telp`='$telp',`alamat`='$alamat',`username`='$username',`password`='$password',`tanggalUpdate`='$tglUpdate',`foto`='$xfoto' WHERE idMember = '$idMember'";
			$sql	= mysqli_query($koneksi, $query) or die(mysqli_error());
			
			if($sql){
				echo "<script>alert('Data Berhasil Di Update'); window.location ='index.php?page=users' </script>";
			}else{
				echo "<script>alert('Data Gagal Di Update'); window.location = 'index.php?page=users'</script>";
			}
		}else{
			echo "<script>alert('Foto Gagal Di Update'); window.location = 'index.php?page=users'</script>";
		}
	}else{
		
		$query	= "UPDATE `tb_user` SET `identitasMember`='$identitasMmber',`namaMember`='$nama',`jkMember`='$jkMember',`email`='$email',`telp`='$telp',`alamat`='$alamat',`username`='$username',`password`='$password',`tanggalUpdate`='$tglUpdate' WHERE idMember = '$idMember'";
		$sql	= mysqli_query($koneksi, $query) or die(mysqli_error());
		
		if($sql){
			echo "<script>alert('Data Berhasil Di Update'); window.location ='index.php?page=users'</script>";
		}else{
			echo "<script>alert('Data Gagal Di Update'); window.location = 'index.php?page=users'</script>";
		}
	}
}
?>