<section class="single-product">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="?page=shop">Shop</a></li>
					<li class="active">Single Product</li>
				</ol>
			</div>
			<div class="col-md-6">
				<!--<ol class="product-pagination text-right">
					<li><a href="blog-left-sidebar.html"><i class="tf-ion-ios-arrow-left"></i> Next </a></li>
					<li><a href="blog-left-sidebar.html">Preview <i class="tf-ion-ios-arrow-right"></i></a></li>
				</ol>-->
			</div>
		</div>
		<?php
			include "koneksi.php";
			$kode = $_GET['id'];
			$modal = mysqli_query($koneksi,"SELECT a.*, b.jenis FROM tb_barang a LEFT JOIN tb_jenis b ON a.idJenis=b.idJenis WHERE a.idBarang='$kode'");
			while($rows = mysqli_fetch_array($modal)){
		?>
		<div class="row mt-20">
			<div class="col-md-5">
				<div class="single-product-slider">
					<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
						<div class='carousel-outer'>
							<!-- me art lab slider -->
							<div class='carousel-inner '>
								<div class='item active'>
									<img src='../admin-mcsci/dist/img/<?php echo $rows['fotoBarang']; ?>' alt='' data-zoom-image="admin-mcsci/dist/img/<?php echo $rows['fotoBarang']; ?>" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<form method='POST' action='?page=add-cart'>
			<?php

			$email2 = $_SESSION['email'];
			$query2 = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$email2'");
			$data2 = mysqli_fetch_array($query2);

			$permittedd_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    function generate($inputt, $strengthh = 16) {
                        $inputt_length = strlen($inputt);
                        $randomm_string = '';
                        for($i = 0; $i < $strengthh; $i++) {
                            $randomm_character = $inputt[mt_rand(0, $inputt_length - 1)];
                            $randomm_string .= $randomm_character;
                        }
                        return $randomm_string;
      
                    }
			?>
			<div class="col-md-7">
				<div class="single-product-details">
					<h2><?php echo $rows['namaBarang']; ?></h2>
					<input type="hidden" name="kodePembelian" class="form-control" value="<?php echo generate($permittedd_chars, 8); ?> " readonly> 
					<input type="hidden" name="idBarang" value="<?php echo $rows['idBarang']; ?>">
					<input type="hidden" name="idMember" value="<?php echo $data2['idMember']; ?>">
					<p class="product-price"><?php echo "Rp."." ". number_format($rows['hargaBarang']); ?></p>
					<p class="product-description mt-20">
						<?php echo $rows['deskripsiBarang']; ?>
					</p>
					<div class="product-quantity">
											<span>Quantity:</span>
											<div class="product-quantity-slider">
												<input id="product-quantity" type="text" value="0" name="product-quantity">
											</div>
										</div>
					<div class="product-category">
						<span>Categories:</span>
						<ul>
							<li><a href="#"><?php echo $rows['jenis']; ?></a></li>
						</ul>
					</div>
					<button type="submit" name="insert" class="btn btn-main mt-20">Add To Cart</button>
				</div>
			</div>
			</form>
		</div>
		<div class="row">
			<div class="col-xs-12">
				<div class="tabCommon mt-20">
					<ul class="nav nav-tabs">
						<li class="active"><a data-toggle="tab" href="#details" aria-expanded="true">Details</a></li>
					</ul>
					<div class="tab-content patternbg">
						<div id="details" class="tab-pane fade active in">
							<h4>Product Description</h4>
							<p><?php echo $rows['deskripsiBarang']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
			}
		?>
	</div>
</section>
<section class="products related-products section">
	<div class="container">
		<div class="row">
			<div class="title text-center">
				<h2>Related Products</h2>
			</div>
		</div>
		<div class="row">
			<?php
				include "koneksi.php";
				$query2 = mysqli_query($koneksi,"SELECT * FROM tb_barang");
				while($rows2 = mysqli_fetch_array($query2)){
			?>
			<div class="col-md-3">
				<div class="product-item">
					<div class="product-thumb">
						<img class="img-responsive" src="../admin-mcsci/dist/img/<?php echo $rows2['fotoBarang']; ?>" alt="product-img" />
						<div class="preview-meta">
							<ul>
								<li>
									<span  data-toggle="modal" data-target="#product-modal<?php echo $rows2['idBarang'];?>">
										<i class="tf-ion-ios-search-strong"></i>
									</span>
								</li>
							</ul>
                      	</div>
					</div>
					<div class="product-content">
						<h4><a href="?page=product&id=<?php echo $rows2['idBarang'];?>"><?php echo $rows2['namaBarang']; ?></a></h4>
						<p class="price"><?php echo "Rp."." ". number_format($rows2['hargaBarang']); ?></p>
					</div>
				</div>
			</div>

			<!-- Modal -->
			<div class="modal product-modal fade" id="product-modal<?php echo $rows2['idBarang'];?>">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i class="tf-ion-close"></i>
				</button>
				<div class="modal-dialog " role="document">
					<div class="modal-content">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-8 col-sm-6 col-xs-12">
									<div class="modal-image">
										<img class="img-responsive" src="../admin-mcsci/dist/img/<?php echo $rows2['fotoBarang']; ?>" alt="product-img" />
									</div>
								</div>
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="product-short-details">
										<h2 class="product-title"><?php echo $rows2['namaBarang']; ?></h2>
										<p class="product-price"><?php echo "Rp."." ". number_format($rows2['hargaBarang']); ?></p>
										<p><?php echo $rows2['deskripsiBarang']; ?></p>
										<a href="?page=product&id=<?php echo $rows2['idBarang'];?>" class="btn btn-transparent">View Product Details</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.modal -->
		<?php
				}
			?>
		</div>
	</div>
</section>