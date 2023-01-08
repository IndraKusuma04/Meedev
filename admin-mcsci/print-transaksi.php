 <?php 
    include "koneksi.php";
    $kode = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT a.*, b.namaMember, b.email, b.telp, b.alamat FROM tb_transaksi a LEFT JOIN tb_user b on a.idMember=b.idMember WHERE a.idTransaksi='$kode'");
    $rows = mysqli_fetch_array($query);
  ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Invoice :</h5>
              <?php echo $rows['noInvoice'];?>
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i><img src="dist/img/logo.ico" width="30px" height="30px"></i> MANCHASTER CITY PURWOKERTO 
                    <small class="float-right">Date: <?php echo date('l, d F Y');?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                  <strong>MANCHESTER CITY PURWOKERTO</strong><br>
                  PURWOKERTO, BANYUMAS<br>
                  Jawa Tengah, Indonesia<br>
                  Phone: -<br>
                  Email: -
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                  <strong><?php echo $rows['namaMember']; ?></strong><br>
                  <?php echo $rows['alamat']; ?><br>
                  Phone: <?php echo $rows['telp']; ?><br>
                  Email: <?php echo $rows['email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice :<span class="text-red">#<?php echo $rows['noInvoice'];?><span></b><br>
                  <b>Order ID: <span class="text-red">#<?php echo $rows['idTransaksi'];?><span></b></br>
                  <b>Tanggal Transaksi : <span class="text-red">#<?php echo $rows['tglTransaksi'];?><span></b><br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Serial #</th>
                      <th>Subtotal</th>
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
                      <td><?php echo $rows['namaBarang']; ?></td>
                      <td><?php echo $rows['qty']; ?></td>
                      <td><?php echo "Rp."." ". number_format($rows['hargaBarang']); ?></td>
                      <td><?php echo $rows['idBarang']; ?></td>
                      <td><?php echo "Rp."." ". number_format( $rows['total']); ?></td>
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
                      <th colspan="4" align="right"><b>Total :</b></th>
                      <td><b class="text-red"><?php echo "Rp."." ". number_format($rows1['totalTransaksi']); ?></b></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Barang yang sudah dibeli tidak dapat
                    dikembalikan/ditukar jika melebihi masa garansi.<br>
                    #garansi 3 hari tanpa membuang barcode barang.
                  </p>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <?php
                include "koneksi.php";
                $no = 0;
                $code = $_GET['id'];
                $q = mysqli_query($koneksi,"SELECT a.idTransaksi, a.tglTransaksi, a.qty, a.total, b.idMember, b.namaMember, c.idBarang, c.namaBarang, c.hargaBarang FROM `tb_transaksi` a LEFT JOIN tb_user b on a.idMember=b.idMember LEFT JOIN tb_barang c ON a.idBarang=c.idBarang WHERE a.idTransaksi = '$code';");
                $r = mysqli_fetch_array($q)
              ?>

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="printTransaksi.php?id=<?php echo $r['idTransaksi'];?>" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->