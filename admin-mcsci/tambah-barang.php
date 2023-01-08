<?php
// memanggil file koneksi.php untuk melakukan koneksi database
include "koneksi.php";

if(isset($_POST['insert'])){

  $idBarang         = $_POST['idBarang'];
  $namaBarang       = $_POST['namaBarang'];
  $jenisBarang      = $_POST['jenisBarang'];
  $ukuranBarang     = $_POST['ukuranBarang'];
  $hargaBarang      = $_POST['hargaBarang'];
  $stok             = $_POST['stok'];
  $deskripsiBarang  = $_POST['deskripsiBarang'];

  $avatar           = $_FILES['fotoBarang']['name'];

//cek dulu jika ada gambar produk jalankan coding ini
if($avatar != "") {
  $ekstensi_diperbolehkan = array('png','jpg','PNG','JPG'); //ekstensi file gambar yang bisa diupload 
  $x = explode('.', $avatar); //memisahkan nama file dengan ekstensi yang diupload
  $ekstensi = strtolower(end($x));
  $file_tmp = $_FILES['fotoBarang']['tmp_name'];   
  $angka_acak     = rand(1,999);
  $xfoto = $angka_acak.'-'.$avatar; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
            move_uploaded_file($file_tmp, 'dist/img/'.$xfoto); //memindah file gambar ke folder gambar

            $query = "INSERT INTO `tb_barang`(`idBarang`, `namaBarang`, `idJenis`, `idUkuran`, `hargaBarang`, `stok`,`deskripsiBarang`,`fotoBarang`) VALUES ('$idBarang','$namaBarang','$jenisBarang','$ukuranBarang','$hargaBarang',$stok,'$deskripsiBarang','$xfoto')";
            $result = mysqli_query($koneksi, $query);
            echo '<script>alert("Data Success Disimpan"); window.location="?page=barang";</script>';
        } else {     
            //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
            echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='?page=barang';</script>";
        }
  }
}
?>