
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MCSCI | PURWOKERTO</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,900;1,800&display=swap">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- logo ico -->
  <link rel="icon" href="dist/img/logo.ico" type="image/x-icon" />
</head>
<body>
  <?php 
    include "koneksi.php";
    $kode = $_GET['id'];
    $query = mysqli_query($koneksi,"SELECT a.*, b.namaMember, b.email, b.telp, b.alamat FROM tb_transaksi a LEFT JOIN tb_user b on a.idMember=b.idMember WHERE a.idTransaksi='$kode'");
    $rows = mysqli_fetch_array($query);
  ?>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i><img src="dist/img/logo.ico" width="30px" height="30px"></i> MANCHASTER CITY PURWOKERTO 
          <small class="float-right">Date: <?php echo date('l, d F Y');?></small>
        </h2>
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
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
