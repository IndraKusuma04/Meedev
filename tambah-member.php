<?php
	include "koneksi.php";

	$idmember   		= $_POST['idmember'];
	$identitasMember 	= $_POST['identitasMember'];
	$jkMember			= $_POST['jkMember'];
	$nama       		= $_POST['nama'];
	$telp				= $_POST['telp'];
	$alamat				= $_POST['alamat'];
	$email	   	 		= $_POST['email'];
	$username			= $_POST['username'];
	$password   		= $_POST['password'];
	$tglPembuatan 		= $_POST['tglPembuatan'];
	$tglUpdate			= $_POST['tglUpdate'];
	$foto       		= $_FILES['foto']['name'];
	$tmp        		= $_FILES['foto']['tmp_name'];
	
	// Rename nama fotonya dengan menambahkan tanggal dan jam upload
	$fotobaru = date('dmYHis').$foto;
	// Set path folder tempat menyimpan fotonya
	$path = "admin-mcsci/dist/img/".$fotobaru;
	
	//cek username
	$cek = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE username = '$username'");
	$data = mysqli_fetch_array($cek);
	$ket = $data['username'];
	if($ket == $username){
		?>
			<script language="JavaScript">
				alert('Maaf, username sudah ada!');
				document.location='signin.php';
			</script>
		<?php
	}elseif(move_uploaded_file($tmp, $path)){	
	$modal=mysqli_query($koneksi,"INSERT INTO `tb_user`(`idMember`, `identitasMember`, `namaMember`,`email`, `telp`,`alamat`, `jkMember`, `username`, `password`,`tanggalPembuatan`,`tanggalUpdate`,`foto`) VALUES ('$idmember','$identitasMember','$nama','$email','$telp','$alamat','$jkMember','$username','$password','$tglPembuatan','$tglUpdate','$fotobaru')");
	if($modal){	
		echo '<script>alert("Data Success Disimpan"); window.location="login.php";</script>';
	}
}
	
?>