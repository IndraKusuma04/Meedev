<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Detail Transaksi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Transaksi</a></li>
            <li class="breadcrumb-item active">Detail Transaksi</li>
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
              <h3 class="card-title">
                <button type="button" class="btn bg-navy btn-flat-left" onclick="history.back()" data-placement="bottom" data-toggle="tooltip" title="Kembali"><i class="fa fa-arrow-circle-left"></i></button>
            </button>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID Transaksi</th>
                  <th>Tanggal Transaksi</th>
                  <th>Member</th>
                  <th>Harga Barang</th>
                  <th>QTY</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  include "koneksi.php";
                  $no = 0;
                  $code = $_GET['id'];
                  $query = mysqli_query($koneksi,"SELECT a.idTransaksi, a.tglTransaksi, a.qty, a.total, b.idMember, b.namaMember, c.idBarang, c.namaBarang, c.hargaBarang FROM `tb_transaksi` a LEFT JOIN tb_user b on a.idMember=b.idMember LEFT JOIN tb_barang c ON a.idBarang=c.idBarang WHERE a.idTransaksi = '$code';");
                  while($rows = mysqli_fetch_array($query)){
                  $no++; 
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td align="center">
                    <span class="badge bg-green" data-placement="bottom" data-toggle="tooltip" title="Edit Jenis"><b><?php echo $rows['idTransaksi'];?></b> </span>
                  </td>
                  <td><?php echo $rows['tglTransaksi']; ?></td>
                  <td><?php echo $rows['namaMember']; ?></td>
                  <td><?php echo "Rp."." ".number_format($rows['hargaBarang']); ?></td>
                  <td><?php echo $rows['qty']; ?></td>
                  <td><?php echo "Rp."." ".number_format($rows['total']); ?></td>
                </tr>
                <?php } ?>
                <?php
                  include "koneksi.php";
                  
                  $no = 0;
                  $code1 = $_GET['id'];
                  $query1 = mysqli_query($koneksi,"SELECT SUM(total) AS totalTransaksi FROM tb_transaksi WHERE idTransaksi='$code1'");
                  while($rows1 = mysqli_fetch_array($query1)){
                  $no++;
                ?>
                <tr>
                  <th colspan="6" align="right"><b>Total :</b></th>
                  <td><b><?php echo "Rp."." ". number_format($rows1['totalTransaksi']); ?></b></td>
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