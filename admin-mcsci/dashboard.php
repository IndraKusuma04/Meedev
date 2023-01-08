 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php
            include "koneksi.php";
            $query = mysqli_query($koneksi,"SELECT count(idTransaksi) AS jumlah,  SUM(total) AS totaltransaksi  FROM tb_transaksi");
            while($rows = mysqli_fetch_array($query)){       
          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $rows['jumlah'];?></h3>

                <p>Total Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="?page=data-transaksi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
          <!-- ./col -->
          <?php
            include "koneksi.php";
            $query = mysqli_query($koneksi,"SELECT count(idBarang) AS jumlah FROM tb_barang");
            while($rows = mysqli_fetch_array($query)){       
          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $rows['jumlah'];?></h3>

                <p>Total Barang</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="?page=barang" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
          <!-- ./col -->
          <?php
            include "koneksi.php";
            $query = mysqli_query($koneksi,"SELECT count(idMember) AS jumlah FROM tb_user");
            while($rows = mysqli_fetch_array($query)){       
          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $rows['jumlah'];?></h3>

                <p>Total Member</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="?page=users" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
          <!-- ./col -->
          <?php
            include "koneksi.php";
            $query = mysqli_query($koneksi,"SELECT sum(stok) AS jumlah FROM tb_barang");
            while($rows = mysqli_fetch_array($query)){       
          ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $rows['jumlah'];?></h3>

                <p>Total Stok</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="?page=stok" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php } ?>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>