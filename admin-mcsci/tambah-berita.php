<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "koneksi.php";

if(isset($_POST['insert'])){

  $idBerita         = $_POST['idBerita'];
  $tglBerita        = $_POST['tglBerita'];
  $kategoriBerita   = $_POST['kategoriBerita'];
  $namaBerita       = $_POST['namaBerita'];
  $deskripsiBerita  = $_POST['deskripsiBerita'];

  $avatar           = $_FILES['foto']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
if($avatar != "") {
  $ekstensi_diperbolehkan = array('png','jpg','PNG','JPG'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $avatar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['foto']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $xfoto = $angka_acak.'-'.$avatar; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
            move_uploaded_file($file_tmp, 'dist/img/'.$xfoto); //memindah file gambar ke folder gambar

            $query = "INSERT INTO `tb_berita`(`idBerita`, `tglBerita`, `kategoriBerita`, `namaBerita`, `deskripsiBerita`, `foto`) VALUES ('$idBerita','$tglBerita','$kategoriBerita','$namaBerita','$deskripsiBerita','$xfoto')";
            $result = mysqli_query($koneksi, $query);
            echo '<script>alert("Data Success Disimpan"); window.location="?page=berita";</script>';
        } else {     
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='?page=berita';</script>";
        }
  }
}
?>