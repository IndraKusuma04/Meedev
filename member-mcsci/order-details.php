<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Dashboard</h1>
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
					<li><a href="?page=member">Dashboard</a></li>
					<li><a class="active" href="?page=order">Orders</a></li>
					<li><a href="?page=profil">Profile Details</a></li>
				</ul>
				<div class="dashboard-wrapper user-dashboard">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Order ID</th>
									<th>Date</th>
									<th>Items</th>
									<th>Price</th>
									<th>Qty</th>
									<th>Total</th>
									<th></th>
								</tr>
							</thead>
							<?php
								include "koneksi.php";
								$id = $_GET['id'];
								$query = mysqli_query($koneksi,"SELECT a.*, b.namaBarang, b.hargaBarang FROM `tb_transaksi` a LEFT JOIN tb_barang b ON a.idBarang=b.idBarang WHERE a.idTransaksi='$id'");
								while($rows = mysqli_fetch_array($query)){
							?>
							<tbody>
								<tr>
									<td><?php echo $rows['idTransaksi']; ?></td>
									<td><?php echo $rows['tglTransaksi']; ?></td>
									<td><?php echo $rows['namaBarang']; ?></td>
									<td><?php echo "Rp."." ". number_format($rows['hargaBarang']); ?></td>
									<td><?php echo $rows['qty']; ?></td>
									<td><?php echo "Rp."." ". number_format($rows['total']); ?></td>
								</tr>
							<?php
								}
							?>
							<?php
								include "koneksi.php";
								$id2 = $_GET['id'];
								$query2 = mysqli_query($koneksi,"SELECT SUM(total) AS GrandTotal, status FROM `tb_transaksi` WHERE idTransaksi='$id2'");
								$rows2 = mysqli_fetch_array($query2);
							?>
								<tr>
									<th colspan="5" align="right"><b>Total :</b></th>
									<td><b><?php echo "Rp."." ". number_format($rows2['GrandTotal']); ?></b></td>
								</tr>
								<?php if ($rows2['status'] == 'Menunggu Pembayaran'){ ?>
								<tr>
									<td><a href="https://api.whatsapp.com/send/?phone=6285842230721&text=Halo%20Admin%20saya%20ingin%20melakukan%20konfirmasi%20pembayaran%20dengan%20ID%20Transaksi%20<?php echo $id2; ?>" class="btn btn-main mt-20" target="_blank">Konfirmasi Pembayaran</a ></td>
								</tr>
								<?php } else { ?>
								<tr>
									<td></td>
								</tr>	
								<?php } ?>
								
								<!--<tr>
									<td>#451231</td>
									<td>Mar 25, 2016</td>
									<td>3</td>
									<td>$150.00</td>
									<td><span class="label label-success">Completed</span></td>
									<td><a href="order.html" class="btn btn-default">View</a></td>
								</tr>
								<tr>
									<td>#451231</td>
									<td>Mar 25, 2016</td>
									<td>3</td>
									<td>$150.00</td>
									<td><span class="label label-danger">Canceled</span></td>
									<td><a href="order.html" class="btn btn-default">View</a></td>
								</tr>
								<tr>
									<td>#451231</td>
									<td>Mar 25, 2016</td>
									<td>2</td>
									<td>$99.00</td>
									<td><span class="label label-info">On Hold</span></td>
									<td><a href="order.html" class="btn btn-default">View</a></td>
								</tr>
								<tr>
									<td>#451231</td>
									<td>Mar 25, 2016</td>
									<td>3</td>
									<td>$150.00</td>
									<td><span class="label label-warning">Pending</span></td>
									<td><a href="order.html" class="btn btn-default">View</a></td>
								</tr>-->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>