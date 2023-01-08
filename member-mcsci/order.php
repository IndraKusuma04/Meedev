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
									<th>Total Price</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<?php
								include "koneksi.php";
								$data = $_SESSION['email'];
								$query = mysqli_query($koneksi,"SELECT a.*, b.namaBarang, c.*, COUNT(c.idTransaksi) AS Jumlah, SUM(c.total) AS Total FROM tb_user a LEFT JOIN tb_transaksi c ON c.idMember=a.idMember LEFT JOIN tb_barang b ON c.idBarang=b.idBarang WHERE a.email='$data' GROUP BY c.idTransaksi");
								while($rows = mysqli_fetch_array($query)){
							?>
							<tbody>
								<tr>
									<td><?php echo $rows['idTransaksi']; ?></td>
									<td><?php echo $rows['tglTransaksi']; ?></td>
									<td><?php echo $rows['Jumlah']; ?></td>
									<td><?php echo "Rp."." ". number_format($rows['Total']); ?></td>
									<td>
										<?php if($rows['status'] == "Menunggu Pembayaran"){
										?>
											<span class="label label-warning"><?php echo $rows['status']; ?></span>
										<?php
										}else{
										?>
											<span class="label label-primary"><?php echo $rows['status']; ?></span>
										<?php
										} ?>
										
									</td>
									<td><a href="?page=order-details&id=<?php echo $rows['idTransaksi'];?>" class="btn btn-default">View</a></td>
								</tr>
							</tbody>
							<?php
								}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>