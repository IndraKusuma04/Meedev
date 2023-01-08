<?php
              // https://www.malasngoding.com
              // menghubungkan dengan koneksi database
              include 'koneksi.php';
              
              // mengambil data barang dengan kode paling besar
              $query = mysqli_query($koneksi, "SELECT max(idTransaksi) as kodeTerbesar FROM tb_transaksi");
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
              $huruf = "T-";
              $kodeBarang = $huruf . sprintf("%05s", $urutan);

              
              $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
              function generate_string($input, $strength = 16) {
                  $input_length = strlen($input);
                  $random_string = '';
                  for($i = 0; $i < $strength; $i++) {
                      $random_character = $input[mt_rand(0, $input_length - 1)];
                      $random_string .= $random_character;
                  }
                  return $random_string;

              }

              $date = date("m/d/Y");

            ?>
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>
<div class="page-wrapper">
   <div class="checkout shopping">
      <div class="container">
         <div class="row">
            <div class="col-md-8">
               <div class="block billing-details">
                  <h4 class="widget-title">Billing Details</h4>
				  <?php
					include "koneksi.php";
					$data = $_SESSION['email'];
					$query = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$data'");
					$rows = mysqli_fetch_array($query)
				  ?>
                  <form class="checkout-form">
                     <div class="form-group">
                        <label for="full_name">Full Name</label>
                        <input type="text" class="form-control" id="full_name" placeholder="" value="<?php echo $rows['namaMember']; ?>">
                     </div>
                     <div class="form-group">
                        <label for="user_address">Address</label>
                        <input type="text" class="form-control" id="user_address" placeholder="" value="<?php echo $rows['alamat']; ?>">
                     </div>
                     <!--<div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Zip Code</label>
                           <input type="text" class="form-control" id="user_post_code" name="zipcode" value="">
                        </div>
                        <div class="form-group" >
                           <label for="user_city">City</label>
                           <input type="text" class="form-control" id="user_city" name="city" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" id="user_country" placeholder="">
                     </div>-->
                  </form>
               </div>
			   <div class="block billing-details">
                  <h4 class="widget-title">Payment Method</h4>
				  <p>Bank Transfer</p>
				  <form class="checkout-form" action="?page=checkout-proses" method="POST">
                     <div class="form-group">
                        <input type="hidden" name="idInvoice" class="form-control" id="inputEmail3" value="<?php echo generate_string($permitted_chars, 20); ?>" placeholder="Nama Penyewa" readonly>
						<input type="hidden" name="idTransaksi" class="form-control" value="<?php echo $kodeBarang; ?>" placeholder="Harga Barang" readonly>
						<input type="hidden" name="idMember" class="form-control" value="<?php echo $rows['idMember']; ?>" placeholder="ID Member" readonly>
                     </div>
                     <div class="form-group">
						<label for="user_country">Rekening BRI</label>
                        <input type="text" class="form-control" id="user_address" value="5221 8430 2924 9031 a.n Samsudin" readonly>
                     </div>
                     <!--<div class="checkout-country-code clearfix">
                        <div class="form-group">
                           <label for="user_post_code">Zip Code</label>
                           <input type="text" class="form-control" id="user_post_code" name="zipcode" value="">
                        </div>
                        <div class="form-group" >
                           <label for="user_city">City</label>
                           <input type="text" class="form-control" id="user_city" name="city" value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="user_country">Country</label>
                        <input type="text" class="form-control" id="user_country" placeholder="">
                     </div>-->
					 <button type="submit" name="simpan" class="btn btn-main mt-20">Place Order</button>
                  </form>
               </div>
               <!--<div class="block billing-details">
                  <h4 class="widget-title">Payment Method</h4>
                  <p>Bank Transfer</p>
                           <form  class="checkout-form">
							  <div class="form-group">
                                 <input type="hidden" name="idInvoice" class="form-control" id="inputEmail3" value="<?php echo generate_string($permitted_chars, 20); ?>" placeholder="Nama Penyewa" readonly>
								 <input type="hidden" name="idTransaksi" class="form-control" value="<?php echo $kodeBarang; ?>" placeholder="Harga Barang" readonly>
                              </div>
							  <div class="form-group">
                                 <input class="form-control" type="text" placeholder="MM / YY">
                              </div>
                              <!--<div class="form-group">
                                 <label for="card-number">Card Number <span class="required">*</span></label>
                                 <input  id="card-number" class="form-control"   type="tel" placeholder="•••• •••• •••• ••••">
                              </div>
                              <div class="form-group half-width padding-right">
                                 <label for="card-expiry">Expiry (MM/YY) <span class="required">*</span></label>
                                 <input id="card-expiry" class="form-control" type="tel" placeholder="MM / YY">
                              </div>
                              <div class="form-group half-width padding-left">
                                 <label for="card-cvc">Card Code <span class="required">*</span></label>
                                 <input id="card-cvc" class="form-control"  type="tel" maxlength="4" placeholder="CVC" >
                              </div>
                              <a href="confirmation.html" class="btn btn-main mt-20">Place Order</a >
                           </form>
               </div>-->
            </div>
            <div class="col-md-4">
               <div class="product-checkout-details">
                  <div class="block">
                     <h4 class="widget-title">Order Summary</h4>
					 <?php
						include "koneksi.php";
						$email = $_SESSION['email'];
                  $query1 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email'");
                  $data1 = mysqli_fetch_array($query1);
                  $idMember = $data1['idMember'];

						$query2 = mysqli_query($koneksi,"SELECT a.*, a.idTransaksi AS idTrans, b.fotoBarang, b.namaBarang, b.hargaBarang FROM tb_transaksi a LEFT JOIN tb_barang b ON a.idBarang=b.idBarang WHERE a.status='Pending' AND a.idMember='$idMember'");
						while($rows2 = mysqli_fetch_array($query2)){
					  ?>
                     <div class="media product-card">
                        <a class="pull-left" href="#">
                           <img class="media-object" src="../admin-mcsci/dist/img/<?php echo $rows2['fotoBarang']; ?>" alt="Image" />
                        </a>
                        <div class="media-body">
                           <h4 class="media-heading"><a href="#"><?php echo $rows2['namaBarang']; ?></a></h4>
                           <p class="price"><?php echo $rows2['qty']; ?> x <?php echo "Rp."." ". number_format($rows2['hargaBarang']); ?></p>
                           <span class="remove" ><a class="product-remove" href="?page=cart-remove&id=<?php echo  $rows2['idTrans']; ?>">Remove</a></span>
                        </div>
                     </div>
					 <?php
						}
					 ?>
                     <!--<div class="discount-code">
                        <p>Have a discount ? <a data-toggle="modal" data-target="#coupon-modal" href="#!">enter it here</a></p>
                     </div>-->
					 <?php
						include "koneksi.php";
						$email2 = $_SESSION['email'];
                  $query22 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email2'");
                  $data22 = mysqli_fetch_array($query22);
                  $idMember22 = $data22['idMember'];

						$query3 = mysqli_query($koneksi,"SELECT SUM(total) AS GrandTotal FROM `tb_transaksi` WHERE status='Pending' AND idMember='$idMember22'");
						$rows3 = mysqli_fetch_array($query3)
					 ?>
                     <!--<ul class="summary-prices">
                        <li>
                           <span>Subtotal:</span>
                           <span class="price"><?php echo "Rp."." ". number_format($rows3['GrandTotal']); ?></span>
                        </li>
                        <!--<li>
                           <span>Shipping:</span>
                           <span>Free</span>
                        </li>-->
                     <!--</ul>-->
                     <div class="summary-total">
                        <span>Total</span>
                        <span><?php echo "Rp."." ". number_format($rows3['GrandTotal']); ?></span>
                     </div>
                     <!--<div class="verified-icon">
                        <img src="../images/shop/verified.png">
                     </div>-->
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>