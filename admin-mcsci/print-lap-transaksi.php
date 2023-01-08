<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laporan</a></li>
              <li class="breadcrumb-item active">laporan Transaksi</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button type="button" class="btn bg-navy btn-flat-left" onclick="history.back()" data-placement="bottom" data-toggle="tooltip" title="Kembali"><i class="fa fa-arrow-left"></i></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Serial #</th>
                    <th>transaction date</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    include "koneksi.php";
                    $dari = $_POST['dari'];
                    $sampai = $_POST['sampai'];
                    $query = mysqli_query($koneksi,"SELECT a.*, b.namaBarang, b.hargaBarang FROM tb_transaksi a LEFT JOIN tb_barang b on a.idBarang=b.idBarang WHERE a.tglTransaksi BETWEEN '$dari' AND '$sampai' ORDER BY a.idTransaksi ASC");
                      while($rows = mysqli_fetch_array($query)){
                  ?>
                  <tr>
                    <td><?php echo $rows['idTransaksi']; ?></td>
                    <td><?php echo $rows['namaBarang']; ?></td>
                    <td><?php echo "Rp."." ". number_format($rows['hargaBarang']); ?></td>
                    <td><?php echo $rows['idBarang']; ?></td>
                    <td><?php echo $rows['tglTransaksi']; ?></td>
                    <td><?php echo "Rp."." ". number_format( $rows['total']); ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->