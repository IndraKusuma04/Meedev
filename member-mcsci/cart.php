<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Cart</h1>
					<ol class="breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li class="active">cart</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>



<div class="page-wrapper">
  <div class="cart shopping">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="block">
            <div class="product-list">
              <form method="post">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="">Item Name</th>
                      <th class="">Item Price</th>
					  <th class="">Qty</th>
                      <th class="">Actions</th>
                    </tr>
                  </thead>
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
                  <tbody>
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="../admin-mcsci/dist/img/<?php echo $rows['fotoBarang']; ?>" alt="" />
                          <a href="#!"><?php echo $rows['namaBarang']; ?></a>
                        </div>
                      </td>
                      <td class=""><?php echo "Rp."." ". number_format($rows['hargaBarang']); ?></</td>
					  <td class=""><?php echo $rows['qty']; ?></</td>
                      <td class="">
                        <a class="product-remove" href="?page=cart-remove&id=<?php echo  $rows['idTrans']; ?>">Remove</a>
                      </td>
                    </tr>
                    <!--<tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="images/shop/cart/cart-2.jpg" alt="" />
                          <a href="#!">Airspace</a>
                        </div>
                      </td>
                      <td class="">$200.00</td>
                      <td class="">
                        <a class="product-remove" href="#!">Remove</a>
                      </td>
                    </tr>
                    <tr class="">
                      <td class="">
                        <div class="product-info">
                          <img width="80" src="images/shop/cart/cart-3.jpg" alt="" />
                          <a href="#!">Bingo</a>
                        </div>
                      </td>
                      <td class="">$200.00</td>
                      <td class="">
                        <a class="product-remove" href="#!">Remove</a>
                      </td>
                    </tr>-->
                  </tbody>
				  <?php
					}
				  ?>
                </table>
				<?php
					include "koneksi.php";
					$data = $_SESSION['email'];
					 $query2 = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE email='$email'");
					 $data2 = mysqli_fetch_array($query2);
					 $idMember2 = $data2['idMember'];
					//$id2 = $_GET['id'];
					$query3 = mysqli_query($koneksi,"SELECT a.*, a.idTransaksi AS idTrans, b.fotoBarang, b.namaBarang, b.hargaBarang, c.idMember FROM tb_transaksi a LEFT JOIN tb_barang b ON a.idBarang=b.idBarang LEFT JOIN tb_user c ON a.idMember=c.idMember WHERE a.status='Pending' AND a.idMember='$idMember2'");
					$rows3 = mysqli_fetch_array($query3)
				  ?>
				  <?php
				if ($rows3['status'] == NULL){?>
					<a href="#" class="btn btn-main pull-right" style="cursor: not-allowed; opacity: 0.5;" >Checkout</a>
				<?php
				}else {?>
					<a href="?page=checkout" class="btn btn-main pull-right" >Checkout</a>
				<?php
				}
				?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>