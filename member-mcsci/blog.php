<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Blog</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">blog</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-wrapper">
	<div class="container">
		<div class="row">
      		<div class="col-md-4">
				<aside class="sidebar">

	<!-- Widget Latest Posts -->
	<div class="widget widget-latest-post">
		<h4 class="widget-title">Latest Posts</h4>
			<?php
				include "koneksi.php";
                $query2 = mysqli_query($koneksi,"SELECT a.*, b.jenis FROM tb_berita a LEFT JOIN tb_jenis b on a.kategoriBerita=b.idJenis ORDER BY a.tglBerita DESC LIMIT 0, 5");
				while($rows2 = mysqli_fetch_array($query2)){
			?>
		<div class="media">
			<a class="pull-left" href="?page=blogsingle&id=<?php echo $rows2['idBerita']; ?>">
				<img class="media-object" src="../admin-mcsci/dist/img/<?php echo $rows2['foto']; ?>" alt="Image">
			</a>
			<div class="media-body">
				<h4 class="media-heading"><a href="?page=blogsingle&id=<?php echo $rows2['idBerita']; ?>"><?php echo $rows2['namaBerita']; ?></a></h4>
				<p>
					<?php
						$kalimat2=$rows2['deskripsiBerita'];
						$jumlahkarakter2=50;
						$cetak2 = substr($kalimat2, 0, $jumlahkarakter2);
						echo $cetak2.'...';
					?>
				</p>
			</div>
		</div>
			<?php
				}
			?>
		<!--<div class="media">
			<a class="pull-left" href="#!">
				<img class="media-object" src="images/blog/post-thumb-2.jpg" alt="Image">
			</a>
			<div class="media-body">
				<h4 class="media-heading"><a href="#!">Welcome to Themefisher Family</a></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, officia.</p>
			</div>
		</div>
		<div class="media">
			<a class="pull-left" href="#!">
				<img class="media-object" src="images/blog/post-thumb-3.jpg" alt="Image">
			</a>
			<div class="media-body">
				<h4 class="media-heading"><a href="#!">Warm welcome from swift</a></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, officia.</p>
			</div>
		</div>
		<div class="media">
			<a class="pull-left" href="#!">
				<img class="media-object" src="images/blog/post-thumb.jpg" alt="Image">
			</a>
			<div class="media-body">
				<h4 class="media-heading"><a href="#!">Introducing Swift for Mac</a></h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, officia.</p>
			</div>
		</div>-->
	</div>
	<!-- End Latest Posts -->

</aside>
      		</div>
			<div class="col-md-8">
				<?php
					include "koneksi.php";
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT a.*, b.jenis FROM tb_berita a LEFT JOIN tb_jenis b on a.kategoriBerita=b.idJenis ORDER BY a.tglBerita DESC");
					while($rows = mysqli_fetch_array($query)){
				?>
        		<div class="post">
					<div class="post-media post-thumb">
						<a href="?page=blogsingle&id=<?php echo $rows['idBerita']; ?>">
							<img src="../admin-mcsci/dist/img/<?php echo $rows['foto']; ?>" alt="">
						</a>
					</div>
					<h2 class="post-title"><a href="?page=blogsingle&id=<?php echo $rows['idBerita']; ?>"><?php echo $rows['namaBerita']; ?></a></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-ios-calendar"></i> <?php echo $rows['tglBerita']; ?>
							</li>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY ADMIN
							</li>
							<li>
								<a href="#!"><i class="tf-ion-ios-pricetags"></i> <?php echo $rows['jenis']; ?></a>
							</li>
						</ul>
					</div>
					<div class="post-content">
						<p>
						<?php
							$kalimat=$rows['deskripsiBerita'];
							$jumlahkarakter=120;
							$cetak = substr($kalimat, 0, $jumlahkarakter);
							echo $cetak.'...';
						?>
						</p>
						<a href="?page=blogsingle&id=<?php echo $rows['idBerita']; ?>" class="btn btn-main">Continue Reading</a>
					</div>

				</div>
				<?php
					}
				?>
				<!--<div class="post">
					<div class="post-media post-thumb">
						<a href="blog-single.html">
							<img src="images/blog/blog-post-2.jpg" alt="">
						</a>
					</div>
					<h2 class="post-title"><a href="blog-single.html">Two Ways To Wear Straight Shoes</a></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-ios-calendar"></i> 20, MAR 2017
							</li>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY ADMIN
							</li>
							<li>
								<a href="#!"><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href="#!"> TRAVEL</a>, <a href="#!">FASHION</a>
							</li>
							<li>
								<a href="#!"><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a>
							</li>
						</ul>
					</div>
					<div class="post-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit vitae placeat ad architecto nostrum asperiores vel aperiam, veniam eum nulla. Maxime cum magnam, adipisci architecto quibusdam cumque veniam fugiat quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio vitae ab doloremque accusamus sit, eos dolorum officiis a perspiciatis aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, facere</p>
						<a href="blog-single.html" class="btn btn-main">Continue Reading</a>
					</div>
				</div>
				<div class="post">
					<div class="post-media post-thumb">
						<a href="blog-single.html">
							<img src="images/blog/blog-post-3.jpg" alt="">
						</a>
					</div>
					<h2 class="post-title"><a href="blog-single.html">Making A Denim Statement</a></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-ios-calendar"></i> 20, MAR 2017
							</li>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY ADMIN
							</li>
							<li>
								<a href="#!"><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href="#!"> TRAVEL</a>, <a href="#!">FASHION</a>
							</li>
							<li>
								<a href="#!"><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a>
							</li>
						</ul>
					</div>
					<div class="post-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit vitae placeat ad architecto nostrum asperiores vel aperiam, veniam eum nulla. Maxime cum magnam, adipisci architecto quibusdam cumque veniam fugiat quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio vitae ab doloremque accusamus sit, eos dolorum officiis a perspiciatis aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, facere</p>
						<a href="blog-single.html" class="btn btn-main">Continue Reading</a>
					</div>
				</div>

				<div class="post">
					<h2 class="post-title"><a href="blog-single.html">Standard Text Post</a></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-ios-calendar"></i> 20, MAR 2017
							</li>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY ADMIN
							</li>
							<li>
								<a href="#!"><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href="#!"> TRAVEL</a>, <a href="#!">FASHION</a>
							</li>
							<li>
								<a href="#!"><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a>
							</li>
						</ul>
					</div>
					<div class="post-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit vitae placeat ad architecto nostrum asperiores vel aperiam, veniam eum nulla. Maxime cum magnam, adipisci architecto quibusdam cumque veniam fugiat quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio vitae ab doloremque accusamus sit, eos dolorum officiis a perspiciatis aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, facere</p>
						<a href="blog-single.html" class="btn btn-main">Continue Reading</a>
					</div>
				</div>
				<div class="post">
					<div class="post-media post-media-audio">
						<iframe src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/115637399&amp;color=ff5500&amp;auto_play=false&amp;show_artwork=true" class="DRAGDIS_iframe"></iframe>
					</div>
					<h2 class="post-title"><a href="blog-single.html">Standard Audio Post</a></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-ios-calendar"></i> 20, MAR 2017
							</li>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY ADMIN
							</li>
							<li>
								<a href="#!"><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href="#!"> TRAVEL</a>, <a href="#!">FASHION</a>
							</li>
							<li>
								<a href="#!"><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a>
							</li>
						</ul>
					</div>
					<div class="post-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit vitae placeat ad architecto nostrum asperiores vel aperiam, veniam eum nulla. Maxime cum magnam, adipisci architecto quibusdam cumque veniam fugiat quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio vitae ab doloremque accusamus sit, eos dolorum officiis a perspiciatis aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, facere</p>
						<a href="blog-single.html" class="btn btn-main">Continue Reading</a>
					</div>
				</div>
				<div class="post">
					<div class="post-media post-media-audio">
						<iframe height="400" src="https://www.youtube.com/embed/Ljik3zsGNF4"  allowfullscreen></iframe>
					</div>
					<h2 class="post-title"><a href="blog-single.html">Standard Video Post</a></h2>
					<div class="post-meta">
						<ul>
							<li>
								<i class="tf-ion-ios-calendar"></i> 20, MAR 2017
							</li>
							<li>
								<i class="tf-ion-android-person"></i> POSTED BY ADMIN
							</li>
							<li>
								<a href="#!"><i class="tf-ion-ios-pricetags"></i> LIFESTYLE</a>,<a href="#!"> TRAVEL</a>, <a href="#!">FASHION</a>
							</li>
							<li>
								<a href="#!"><i class="tf-ion-chatbubbles"></i> 4 COMMENTS</a>
							</li>
						</ul>
					</div>
					<div class="post-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit vitae placeat ad architecto nostrum asperiores vel aperiam, veniam eum nulla. Maxime cum magnam, adipisci architecto quibusdam cumque veniam fugiat quae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio vitae ab doloremque accusamus sit, eos dolorum officiis a perspiciatis aliquid. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, facere</p>
						<a href="blog-single.html" class="btn btn-main">Continue Reading</a>
					</div>
				</div>-->
      		</div>
		</div>
	</div>
</div>