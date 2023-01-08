<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>MCSCI PURWOKERTO</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Construction Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Constra HTML Template v1.0">
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/logo.ico" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <link rel="stylesheet" href="plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body id="body">

 <?php
 
    // https://www.malasngoding.com
    // menghubungkan dengan koneksi database
    include 'koneksi.php';
    
    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(idMember) as kodeTerbesar FROM tb_user WHERE level = 'Member'");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
    
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBarang, 6, 3);
    
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
    
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "M-";
    $kodeBarang = $huruf . sprintf("%05s", $urutan);

    $tglPembuatan = date("Y-m-d");
    $tglUpdate = date("Y-m-d");
    
  ?>

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.php">
            <img src="admin-mcsci/dist/img/Logo-Header.png" alt="">
          </a>
          <h2 class="text-center">Create Your Account</h2>
          <form class="text-left clearfix" action="tambah-member.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <input type="hidden" name="idmember" class="form-control" id="exampleInputEmail1" value="<?php echo $kodeBarang;?>" readonly>
			  <input type="text" name="identitasMember" class="form-control" id="exampleInputPassword1" placeholder="Nomor Identitas" required>
            </div>
			<div class="form-group">
			  <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama Lengkap" required>
            </div>
			<div class="form-group">
              <select class="form-control select2bs4" name="jkMember" style="width: 100%;">
                  <option value="Laki-Laki" selected="selected">Laki-Laki</option>
                  <option value="Perempuan"> Perempuan</option>
                </select>
            </div>
			<div class="form-group">
              <input type="text" name="telp" class="form-control" value="" id="exampleInputPassword1" placeholder="No Telepon" required>
            </div>
			<div class="form-group">
              <textarea class="form-control" name="alamat" rows="4" placeholder="Alamat" required></textarea>
            </div>
            <div class="form-group">
              <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Email" required>
            </div>
            <div class="form-group">
              <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Username" required>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password" required>
			  <input type="hidden" name="tglPembuatan" class="form-control" value="<?php echo $tglPembuatan; ?>" id="exampleInputPassword1" readonly>
			  <input type="hidden" name="tglUpdate" class="form-control" id="exampleInputPassword1" value="<?php echo $tglUpdate; ?>" placeholder="Masukan Password" readonly>
            </div>
            <div class="form-group">
              <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="foto" class="custom-file-input" id="exampleInputFile" required>
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                <p> * File Harus Format JPG/PNG</p>
            </div>
            <div class="text-center">
              <button type="submit" class="btn btn-main text-center">Sign In</button>
            </div>
          </form>
          <p class="mt-20">Already hava an account ?<a href="login.php"> Login</a></p>
          <!--<p><a href="forget-password.html"> Forgot your password?</a></p>-->
		  <p><a href="index.php"> Back to Home</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="plugins/slick/slick.min.js"></script>
    <script src="plugins/slick/slick-animation.min.js"></script>

    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="js/script.js"></script>
    


  </body>
  </html>