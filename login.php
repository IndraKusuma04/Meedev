<?php 
  session_start();
  error_reporting(0);
  if($_SESSION['level']=="Admin"){
    header("location:admin-mcsci/index.php");
  }elseif($_SESSION['level']== "Member"){
    header("location:member-mcsci/index.php");
  }
?>
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
  include "koneksi.php";
    if(isset($_POST['login'])){

      // menangkap data yang dikirim dari form
      $email    = $_POST['email'];
      $password   = $_POST['password'];

      // menyeleksi data admin dengan username dan password yang sesuai
      $data = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email = '$email' and password = '$password'");

      // menghitung jumlah data yang ditemukan
      $cek = mysqli_num_rows($data);

      if($cek > 0){
                        
        $row = mysqli_fetch_assoc($data);
                        
        if($row['level'] == "Admin"){
          $_SESSION['email'] = $email;
          $_SESSION['level'] = "Admin";
          echo '<meta http-equiv="refresh" content="0; url=admin-mcsci/index.php">';      
        }elseif($row['level'] == "Member"){
          $_SESSION['email'] = $email;
          $_SESSION['level'] = "Member";
          echo '<meta http-equiv="refresh" content="0; url=member-mcsci/index.php">';
        }else{
          echo '<div class="alert alert-danger"> Login gagal username atau password salah !.</div>';
          echo "<meta http-equiv='refresh' content='0; url=login.php'>";
        } 
      }else{
        echo '<div class="alert alert-danger"> login Gagal Tidak ditemukan Username ! </div>';
      }
    }
?> 

<section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <a class="logo" href="index.php">
            <img src="admin-mcsci/dist/img/Logo-Header.png" alt="">
          </a>
          <h2 class="text-center">Welcome Back</h2>
          <form class="text-left clearfix" action="#" method="post" >
            <div class="form-group">
              <input type="email" name="email" class="form-control"  placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="text-center">
              <button type="submit" name="login" class="btn btn-main text-center" >Login</button>
            </div>
          </form>
          <p class="mt-20">New in this site ?<a href="signin.php"> Create New Account</a></p>
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