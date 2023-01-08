<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laporan</a></li>
              <li class="breadcrumb-item active">laporan Barang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-3">
        </div>
        <!--/.col (right) -->
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pilih Jenis Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="?page=laporanBarang" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Barang</label>
                    <select class="form-control select2bs4" name="jenisBarang" style="width: 100%;">
                    <?php
                        include "koneksi.php";
                        $no = 0;
                        $query1 = mysqli_query($koneksi,"SELECT * FROM tb_jenis ORDER BY '$jenis' ");
                        while ($data = mysqli_fetch_array($query1)){
                    ?>
                    <option value="<?php echo $data['idJenis']?>"><?php echo $data['jenis']?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Cari</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->