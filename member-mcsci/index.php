<?php 
  session_start();
  // cek apakah yang mengakses halaman ini sudah login
  error_reporting(0);
  if($_SESSION['level']=="Admin"){
    header("location:admin-mcsci/index.php");
  }elseif($_SESSION['level']== ""){
    header("location:../index.php");
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
  
  <!-- theme meta -->
  <meta name="theme-name" content="aviato" />
  
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../images/logo.ico" />
  
  <!-- Themefisher Icon font -->
  <link rel="stylesheet" href="../plugins/themefisher-font/style.css">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
  
  <!-- Animate css -->
  <link rel="stylesheet" href="../plugins/animate/animate.css">
  <!-- Slick Carousel -->
  <link rel="stylesheet" href="../plugins/slick/slick.css">
  <link rel="stylesheet" href="../plugins/slick/slick-theme.css">
  
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="../css/style.css">

</head>

<body id="body">

<!-- Start Top Header Bar -->
<section class="top-header">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-xs-12 col-sm-4">
				<div class="contact-number">
					<i class="tf-ion-ios-telephone"></i>
					<span>+62 821-3793-3998</span>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Site Logo -->
				<div class="logo text-center">
					<a href="index.php">
						<!-- replace logo here -->
						<svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
							xmlns:xlink="http://www.w3.org/1999/xlink">
							<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
								font-family="AustinBold, Austin" font-weight="bold">
								<g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
									<text id="MCSCI">
										 <tspan x="108.94" y="325"><img class="media-object" src="../admin-mcsci/dist/img/Logo-Header.png" alt="image" /></tspan>
									</text>
								</g>
							</g>
						</svg>
					</a>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 col-sm-4">
				<!-- Cart -->
				<ul class="top-menu text-right list-inline">
					<li class="dropdown cart-nav dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-android-cart"></i>Cart</a>
						<div class="dropdown-menu cart-dropdown">
						<?php
							include "koneksi.php";
							$email = $_SESSION['email'];
							$query1 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email'");
							$data1 = mysqli_fetch_array($query1);
							$idMember = $data1['idMember'];



							$id = $_GET['id'];
							$query = mysqli_query($koneksi,"SELECT a.*, a.idTransaksi AS idTrans, b.fotoBarang, b.namaBarang, b.hargaBarang, c.idMember FROM tb_transaksi a LEFT JOIN tb_barang b ON a.idBarang=b.idBarang LEFT JOIN tb_user c ON a.idMember=c.idMember WHERE a.status='Pending' AND a.idMember='$idMember'");
							while($rows = mysqli_fetch_array($query)){
						?>
							<!-- Cart Item -->
							<div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="../admin-mcsci/dist/img/<?php echo $rows['fotoBarang']; ?>" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!"><?php echo $rows['namaBarang']; ?></a></h4>
									<div class="cart-price">
										<span><?php echo $rows['qty']; ?> x</span>
										<span><?php echo "Rp."." ". number_format($rows['hargaBarang']); ?></span>
									</div>
									<h5><strong><?php echo "Rp."." ". number_format($rows['total']); ?></strong></h5>
								</div>
								<a href="?page=cart-remove&id=<?php echo  $rows['idTrans']; ?>" class="remove"><i class="tf-ion-close"></i></a>
							</div><!-- / Cart Item -->
							<?php } ?>
							<!-- Cart Item -->
							<!--<div class="media">
								<a class="pull-left" href="#!">
									<img class="media-object" src="images/shop/cart/cart-2.jpg" alt="image" />
								</a>
								<div class="media-body">
									<h4 class="media-heading"><a href="#!">Ladies Bag</a></h4>
									<div class="cart-price">
										<span>1 x</span>
										<span>1250.00</span>
									</div>
									<h5><strong>$1200</strong></h5>
								</div>
								<a href="#!" class="remove"><i class="tf-ion-close"></i></a>
							</div><!-- / Cart Item -->
							<?php
								include "koneksi.php";
								$email2 = $_SESSION['email'];
								$query8 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email2'");
								$data8 = mysqli_fetch_array($query8);
								$idMember8 = $data8['idMember'];
								$query2 = mysqli_query($koneksi,"SELECT SUM(total) AS GrandTotal, status FROM tb_transaksi WHERE status='Pending' AND idMember='$idMember8'");
								$rows2 = mysqli_fetch_array($query2);
							?>
							<div class="cart-summary">
								<span>Total</span>
								<span class="total-price"><?php echo "Rp."." ". number_format($rows2['GrandTotal']); ?></span>
							</div>
							<ul class="text-center cart-buttons">
								<li><a href="?page=cart" class="btn btn-small">View Cart</a></li>
								<li>
									<?php
									if ($rows2['status'] == NULL){?>
										<a href="#" class="btn btn-small btn-solid-border" style="cursor: not-allowed; opacity: 0.5;" >Checkout</a>
									<?php
									}else {?>
										<a href="?page=checkout" class="btn btn-small btn-solid-border" >Checkout</a>
									<?php
									}
									?>
								</li>
							</ul>
						</div>

					</li><!-- / Cart -->

					<!-- Search -->
					<!--<li class="dropdown search dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"><i
								class="tf-ion-ios-search-strong"></i> Search</a>
						<ul class="dropdown-menu search-dropdown">
							<li>
								<form action="post"><input type="search" class="form-control" placeholder="Search..."></form>
							</li>
						</ul>
					</li><!-- / Search -->

					<!-- Languages -->
					<!--<li class="commonSelect">
						<select class="form-control">
							<option>EN</option>
							<option>DE</option>
							<option>FR</option>
							<option>ES</option>
						</select>
					</li><!-- / Languages -->

				</ul><!-- / .nav .navbar-nav .navbar-right -->
			</div>
		</div>
	</div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
	<nav class="navbar navigation">
		<div class="container">
			<div class="navbar-header">
				<h2 class="menu-title">Main Menu</h2>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
					aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

			</div><!-- / .navbar-header -->

			<!-- Navbar Links -->
			<div id="navbar" class="navbar-collapse collapse text-center">
				<ul class="nav navbar-nav">

					<!-- Home -->
					<li class="dropdown ">
						<a href="index.php">Home</a>
					</li><!-- / Home -->

					<!-- Shop -->
					<li class="dropdown ">
						<a href="?page=shop">Merchandise</a>
					</li><!-- / Shop -->

					<!-- Shop -->
					<li class="dropdown ">
						<a href="?page=about">Tentang Komunitas</a>
					</li><!-- / Shop -->
					
					<!-- Elements -->
					<!--<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Tentang Komunitas <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Basic -->
								<!--<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Pages</li>
										<li role="separator" class="divider"></li>
										<li><a href="shop.html">Shop</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="pricing.html">Pricing</a></li>
										<li><a href="confirmation.html">Confirmation</a></li>

									</ul>
								</div>

								<!-- Layout -->
								<!--<div class="col-lg-6 col-md-6 mb-sm-3">
									<ul>
										<li class="dropdown-header">Layout</li>
										<li role="separator" class="divider"></li>
										<li><a href="product-single.html">Product Details</a></li>
										<li><a href="shop-sidebar.html">Shop With Sidebar</a></li>

									</ul>
								</div>

							</div><!-- / .row -->
						<!--</div><!-- / .dropdown-menu -->
					<!--</li><!-- / Elements -->
					
					<!-- Shop -->
					<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">My Account <span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="?page=member">Member Area</a></li>
							<li><a href="logout.php">Log Out</a></li>
						</ul>
					</li><!-- / Blog -->

					<!-- Pages -->
					<!--<li class="dropdown full-width dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">My Account <span
								class="tf-ion-ios-arrow-down"></span></a>
						<div class="dropdown-menu">
							<div class="row">

								<!-- Introduction -->
								<!--<div class="col-sm-3 col-xs-12">
									<ul>
										<li class="dropdown-header">Introduction</li>
										<li role="separator" class="divider"></li>
										<li><a href="contact.html">Contact Us</a></li>
										<li><a href="about.html">About Us</a></li>
										<li><a href="404.html">404 Page</a></li>
										<li><a href="coming-soon.html">Coming Soon</a></li>
										<li><a href="faq.html">FAQ</a></li>
									</ul>
								</div>-->

								<!-- Contact -->
								<!--<div class="col-sm-3 col-xs-12">
									<ul>
										<li class="dropdown-header">Dashboard</li>
										<li role="separator" class="divider"></li>
										<li><a href="dashboard.html">User Interface</a></li>
										<li><a href="order.html">Orders</a></li>
										<li><a href="address.html">Address</a></li>
										<li><a href="profile-details.html">Profile Details</a></li>
									</ul>
								</div>-->
								
								<!-- Utility -->
								<!--<div class="col-sm-3 col-xs-12">
									<ul>
										<li class="dropdown-header">Utility</li>
										<li role="separator" class="divider"></li>
										<li><a href="login.php">Login Page</a></li>
										<li><a href="signin.php">Signin Page</a></li>
										<li><a href="forget-password.php">Forget Password</a></li>
									</ul>
								</div>-->

								<!-- Mega Menu -->
								<!--<div class="col-sm-3 col-xs-12">
									<a href="shop.html">
										<img class="img-responsive" src="images/shop/header-img.jpg" alt="menu image" />
									</a>
								</div>-->
							<!--</div><!-- / .row -->
						<!--</div><!-- / .dropdown-menu -->
					<!--</li><!-- / Pages -->


					<!-- Blog -->
					<li class="dropdown ">
						<a href="?page=blog">Blog</a>
					</li><!-- / Blog -->
					
					<!-- Contact -->
					<li class="dropdown ">
						<a href="?page=contact">Kontak Kami</a>
					</li><!-- / Contact -->
					
					<!-- Blog -->
					<!--<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Blog <span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
							<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
							<li><a href="blog-full-width.html">Blog Full Width</a></li>
							<li><a href="blog-grid.html">Blog 2 Columns</a></li>
							<li><a href="blog-single.html">Blog Single</a></li>
						</ul>
					</li><!-- / Blog -->

					<!-- Shop -->
					<!--<li class="dropdown dropdown-slide">
						<a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
							role="button" aria-haspopup="true" aria-expanded="false">Elements <span
								class="tf-ion-ios-arrow-down"></span></a>
						<ul class="dropdown-menu">
							<li><a href="typography.html">Typography</a></li>
							<li><a href="buttons.html">Buttons</a></li>
							<li><a href="alerts.html">Alerts</a></li>
						</ul>
					</li><!-- / Blog -->
				</ul><!-- / .nav .navbar-nav -->

			</div>
			<!--/.navbar-collapse -->
		</div><!-- / .container -->
	</nav>
</section>

<?php

    $page = (isset($_GET['page']))? $_GET['page'] : "main";
        switch ($page){
            
            case 'member'              	: include "member.php"             	 ; break;
			case 'order'              	: include "order.php"             	 ; break;
			case 'order-details'        : include "order-details.php"        ; break;
			case 'profil'              	: include "profil.php"             	 ; break;
			case 'edit'              	: include "edit-profil.php"          ; break;
			case 'product'            	: include "product-single.php"   	 ; break;
			case 'shop'					: include "shop.php"   				 ; break;
			case 'shop-search'			: include "shop-search.php"			 ; break;
			case 'blog'					: include "blog.php"   				 ; break;
			case 'blogsingle'			: include "blog-single.php"   		 ; break;
			case 'contact'				: include "contact.php"   			 ; break;
			case 'about'				: include "about-us.php"   			 ; break;
			case 'cart'					: include "cart.php"   				 ; break;
			case 'add-cart'				: include "add-cart.php"   			 ; break;
			case 'cart-proses'			: include "cart-proses.php"   		 ; break;
			case 'cart-remove'			: include "cart-delete-produk.php"   ; break;
			case 'checkout'				: include "checkout.php"  			 ; break;
			case 'checkout-proses'		: include "checkout-proses.php"  	 ; break;

            case 'main' : 
            default : include 'dashboard.php';
        }

    ?>


<!--
Start Call To Action
==================================== -->
<!--<section class="call-to-action bg-gray section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="title">
					<h2>SUBSCRIBE TO NEWSLETTER</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat, <br> facilis numquam impedit ut sequi. Minus facilis vitae excepturi sit laboriosam.</p>
				</div>
				<div class="col-lg-6 col-md-offset-3">
				    <div class="input-group subscription-form">
				      <input type="text" class="form-control" placeholder="Enter Your Email Address">
				      <span class="input-group-btn">
				        <button class="btn btn-main" type="button">Subscribe Now!</button>
				      </span>
				    </div><!-- /input-group -->
			  <!--</div><!-- /.col-lg-6 -->

			<!--</div>
		</div> 		<!-- End row -->
	<!--</div>   	<!-- End container -->
<!--</section>   <!-- End section -->

<!--<section class="section instagram-feed">
	<div class="container">
		<div class="row">
			<div class="title">
				<h2>View us on instagram</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="instagram-slider" id="instafeed" data-accessToken="IGQVJYeUk4YWNIY1h4OWZANeS1wRHZARdjJ5QmdueXN2RFR6NF9iYUtfcGp1NmpxZA3RTbnU1MXpDNVBHTzZAMOFlxcGlkVHBKdjhqSnUybERhNWdQSE5hVmtXT013MEhOQVJJRGJBRURn"></div>
			</div>
		</div>
	</div>
</section>-->


<footer class="footer section text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="social-media">
					<li>
						<a href="https://www.facebook.com/CityPurwokerto">
							<i class="tf-ion-social-facebook"></i>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/mcsci.purwokerto/">
							<i class="tf-ion-social-instagram"></i>
						</a>
					</li>
					<li>
						<a href="https://twitter.com/mcscipurwokerto">
							<i class="tf-ion-social-twitter"></i>
						</a>
					</li>
				</ul>
				<ul class="footer-menu text-uppercase">
					<li>
						<a href="?page=about">TENTANG KOMUNITAS</a>
					</li>
					<li>
						<a href="?page=shop">MERCHANDISE</a>
					</li>
					<li>
						<a href="?page=blog">BLOG</a>
					</li>
				</ul>
				<p class="copyright-text">Copyright &copy;2021-<?php echo date("Y");?></p>
			</div>
		</div>
	</div>
</footer>

    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="../plugins/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap Touchpin -->
    <script src="../plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Instagram Feed Js -->
    <script src="../plugins/instafeed/instafeed.min.js"></script>
    <!-- Video Lightbox Plugin -->
    <script src="../plugins/ekko-lightbox/dist/ekko-lightbox.min.js"></script>
    <!-- Count Down Js -->
    <script src="../plugins/syo-timer/build/jquery.syotimer.min.js"></script>

    <!-- slick Carousel -->
    <script src="../plugins/slick/slick.min.js"></script>
    <script src="../plugins/slick/slick-animation.min.js"></script>
	
    <!-- Google Mapl -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCC72vZw-6tGqFyRhhg5CkF2fqfILn2Tsw"></script>
    <script type="text/javascript" src="../plugins/google-map/gmap.js"></script>

    <!-- Main Js File -->
    <script src="../js/script.js"></script>
    


  </body>
  </html>
