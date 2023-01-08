<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Transaksi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Transaksi</a></li>
            <li class="breadcrumb-item active">Data Transaksi</li>
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
                  <th>Total</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  include "koneksi.php";
                  $no = 0;
                  $query = mysqli_query($koneksi,"SELECT a.*, b.idMember, b.namaMember, c.namaBarang, c.hargaBarang, SUM(a.total) AS totalTransaksi FROM `tb_transaksi` a LEFT JOIN tb_user b on a.idMember=b.idMember LEFT JOIN tb_barang c ON a.idBarang=c.idBarang GROUP BY a.idTransaksi ASC");
                  while($rows = mysqli_fetch_array($query)){
                  $no++; 
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td align="center">
                    <a href="?page=detail-transaksi&id=<?php echo $rows['idTransaksi'];?>"><span class="badge bg-green" data-placement="bottom" data-toggle="tooltip" title="Edit Jenis"><?php echo $rows['idTransaksi'];?> </span></a>
                  </td>
                  <td><?php echo $rows['tglTransaksi']; ?></td>
                  <td><?php echo $rows['namaMember']; ?></td>
                  <td><?php echo "Rp."." ".number_format($rows['totalTransaksi']); ?></td>
                  <td align="center">
                    <?php
                      if($rows['status'] == "Pending"){
                    ?>
                        <span class="badge bg-red" data-placement="bottom"  data-toggle="tooltip" title="Pembayaran Masih Pending"><?php echo $rows['status']; ?> </span>
                    <?php
                      }elseif($rows['status'] == "Menunggu Pembayaran"){
                    ?>
                        <span class="badge bg-warning" data-placement="bottom"  data-toggle="tooltip" title="Pembayaran Masih Menunggu"><?php echo $rows['status']; ?> </span
                    <?php
                      }else{
                    ?>
                        <span class="badge bg-success" data-placement="bottom"  data-toggle="tooltip" title="Pembayaran Success"><?php echo $rows['status']; ?> </span>
                    <?php
                      }
                    ?>
                  </td>
                  <td align="center">
                    <?php
                      if($rows['status'] == "Pending"){
                    ?>
                        <a href="?page=detail-transaksi&id=<?php echo $rows['idTransaksi'];?>"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip"><i class="fas fa-folder-open" data-placement="bottom" data-toggle="tooltip" title="Detail Transaksi"></i></button></a>
                    <?php
                      }elseif($rows['status'] == "Menunggu Pembayaran"){
                    ?>
                        <a href="?page=detail-transaksi&id=<?php echo $rows['idTransaksi'];?>"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip"><i class="fas fa-folder-open" data-placement="bottom" data-toggle="tooltip" title="Detail Transaksi"></i></button></a>
                        <a href="#" onclick="confirm_modal('konfirmasi-pembayar.php?&idTransaksi=<?php echo  $rows['idTransaksi']; ?>');"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip"><i class="fas fa-recycle" data-placement="bottom" data-toggle="tooltip" title="Konfirmasi Pembayaran"></i></button></a>
                        <a href="?page=print-transaksi&id=<?php echo $rows['idTransaksi'];?>"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip"><i class="fas fa-print" data-placement="bottom" data-toggle="tooltip" title="Print Transaksi"></i></button></a>
                    <?php
                      }else{
                    ?>
                        <a href="?page=detail-transaksi&id=<?php echo $rows['idTransaksi'];?>"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip"><i class="fas fa-folder-open" data-placement="bottom" data-toggle="tooltip" title="Detail Transaksi"></i></button></a>
                    <a href="?page=print-transaksi&id=<?php echo $rows['idTransaksi'];?>"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip"><i class="fas fa-print" data-placement="bottom" data-toggle="tooltip" title="Print Transaksi"></i></button></a>
                    <?php
                      }
                    ?>
                  </td>
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

  <!--ModalDelete -->
  <div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
      <div class="modal-content" style="margin-top: 100px;">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Pembayaran Transaksi Ini ?</h4>
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
          <a href="#" class="btn btn-success" id="delete_link">Yes</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Javascrpit Delete -->
  <script type="text/javascript">
	function confirm_modal(delete_url)
	{
	  $('#modal_delete').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
  </script>