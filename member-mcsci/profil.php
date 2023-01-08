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
		  <li><a href="?page=order">Orders</a></li>
		  <li><a class="active" href="?page=profil">Profile Details</a></li>
        </ul>
        <div class="dashboard-wrapper dashboard-user-profile">
		<?php
			include "koneksi.php";
			$data = $_SESSION['email'];
			$query = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$data'");
			while($rows = mysqli_fetch_array($query)){
		?>
          <div class="media">
            <div class="pull-left text-center" href="#!">
              <img class="media-object user-img" src="../admin-mcsci/dist/img/<?php echo $rows['foto']; ?>" alt="Image">
			  <span  data-toggle="modal" data-target="#product-modal<?php echo $rows['id'];?>">
				<a class="btn btn-transparent mt-20">Edit Profile</a>
			  </span>
            </div>
            <div class="media-body">
              <ul class="user-profile-list">
				<li><span>ID Member:</span><?php echo $rows['idMember']; ?></li>
                <li><span>Nama:</span><?php echo $rows['namaMember']; ?></li>
                <li><span>Jenis Kelamin:</span><?php echo $rows['jkMember']; ?></li>
				<li><span>Alamat:</span><?php echo $rows['alamat']; ?></li>
                <li><span>Email:</span><?php echo $rows['email']; ?></li>
                <li><span>Phone:</span><?php echo $rows['telp']; ?></li>
              </ul>
            </div>
          </div>
		  <!-- Modal -->
		<div class="modal product-modal fade" id="product-modal<?php echo $rows['id'];?>">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<i class="tf-ion-close"></i>
			</button>
		  	<div class="modal-dialog " role="document">
		    	<div class="modal-content">
			      	<div class="modal-body">
			        	<div class="row">
			        		<div class="col-md-12 col-sm-6 col-xs-12">
								<div class="product-short-details">
									<div class="modal-header">
									  <h4 class="modal-title">Form Edit Member</h4>
									</div>
									  <form action="index.php?page=edit" method="post" enctype="multipart/form-data">
										<div class="modal-body">
										  <div class="card-body">
											<div class="form-group">
											  <label for="exampleInputPassword1">ID Member</label>
											  <input type="hidden" name="id" class="form-control" id="exampleInputEmail1" value="<?php echo $rows['id'];?>">
											  <input type="text" name="idmember" class="form-control" id="exampleInputEmail1" value="<?php echo $rows['idMember'];?>" readonly>
											</div>
											<div class="form-group">
											  <label for="exampleInputPassword1">No Identitas</label>
											  <input type="text" name="identitasMember" class="form-control" value="<?php echo $rows['identitasMember'];?>" id="exampleInputPassword1" placeholder="Masukan Identitas" required>
											</div>
											<div class="form-group">
											  <label for="exampleInputPassword1">Nama</label>
											  <input type="text" name="nama" class="form-control" value="<?php echo $rows['namaMember'];?>" id="exampleInputPassword1" placeholder="Masukan Nama" required>
											</div>
											<div class="form-group">
											  <label for="exampleInputPassword1">Jenis Kelamin</label>
											  <select class="form-control select2bs4" name="jkMember" style="width: 100%;">
												<option value="Laki-Laki" <?php if($rows['jkMember'] == "Laki-laki") echo "selected='selected'" ?>> Laki-Laki</option>
												<option value="Perempuan" <?php if($rows['jkMember'] == "Perempuan") echo "selected='selected'" ?>> Perempuan</option>
											  </select>
											</div>
											<div class="form-group">
											  <label for="exampleInputPassword1">Telp</label>
											  <input type="text" name="telp" class="form-control" value="<?php echo $rows['telp'];?>" id="exampleInputPassword1" placeholder="Masukan No Telp" required>
											</div>
											<div class="form-group">
											  <label for="exampleInputPassword1">Alamat</label>
											  <textarea class="form-control" name="alamat" rows="4" require><?php echo $rows['alamat'];?></textarea>
											</div>
											<div class="form-group">
											  <label for="exampleInputPassword1">Email</label>
											  <input type="email" name="email" class="form-control" value="<?php echo $rows['email'];?>" id="exampleInputPassword1" placeholder="Masukan Email" required>
											</div>
											<div class="form-group">
											  <label for="exampleInputPassword1">Username</label>
											  <input type="text" name="username" class="form-control" value="<?php echo $rows['username'];?>" id="exampleInputPassword1" placeholder="Masukan Username" required>
											</div>
											<div class="form-group">
											  <label for="exampleInputPassword1">Password</label>
											  <input type="password" name="password" class="form-control" value="<?php echo $rows['password'];?>" id="exampleInputPassword1" placeholder="Masukan Password" required>
											</div>
											<div class="form-group">
											  <input type="hidden" name="tglPembuatan" class="form-control" value="<?php echo $rows['tanggalPembuatan']; ?>" id="exampleInputPassword1" placeholder="Masukan Password" readonly>
											</div>
											<div class="form-group">
											  <?php $tglUpdate = date("Y-m-d");?>
											  <input type="hidden" name="tglUpdate" class="form-control" id="exampleInputPassword1" value="<?php echo $tglUpdate; ?>" placeholder="Masukan Password" readonly>
											</div>
											<div class="form-group">
											  <img src="../admin-mcsci/dist/img/<?php echo $rows['foto'];?>" width="250px" height="250px">
											</div>
											<div class="form-group">
											  <label for="exampleInputFile">File Foto</label>
											  <div class="input-group">
												<div class="custom-file">
												  <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
												  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
												</div>
												<div class="input-group-append">
												  <span class="input-group-text">Upload</span>
												</div>
											  </div>
											  <p> * File Harus Format JPG/PNG</p>
											</div>
											<div class="form-check">
											  <input type="checkbox" name="ubahFoto" class="form-check-input" id="exampleCheck1">
											  <label class="form-check-label" for="exampleCheck1"> *Centang jika ingin merubah Foto</label>
											</div>
										  </div>
										</div>
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										  <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
										</div>
									  </form>
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
    </div>
  </div>
</section>