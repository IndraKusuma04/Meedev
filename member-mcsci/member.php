<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Member Area</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">my account</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="user-dashboard page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="list-inline dashboard-menu text-center">
					<li><a class="active" href="?page=member">Dashboard</a></li>
					<li><a href="?page=order">Orders</a></li>
					<li><a href="?page=profil">Profile Details</a></li>
				</ul>
				<div class="dashboard-wrapper user-dashboard">
					<?php
						include "koneksi.php";
						$data = $_SESSION['email'];
						$query = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$data'");
						$rows = mysqli_fetch_array($query);
					?>
					<div class="media">
						<div class="pull-left">
							<img class="media-object user-img" src="../admin-mcsci/dist/img/<?php echo $rows['foto']; ?>" alt="Image">
						</div>
						<div class="media-body">
							<h2 class="media-heading">Welcome <?php echo $rows['namaMember']; ?></h2>
							<p>Level <?php echo $rows['kategoriMember']; ?> </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>