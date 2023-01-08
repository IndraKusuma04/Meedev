<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan Stok</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laporan</a></li>
              <li class="breadcrumb-item active">laporan Stok</li>
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
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Nama</th>
                    <th>Stok</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    include "koneksi.php";
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT * FROM tb_barang");
                      while($rows = mysqli_fetch_array($query)){
                      $no++; 
                  ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td align="center">
                      <span class="badge bg-green" data-placement="bottom" data-toggle="tooltip" title="Edit Jenis"><?php echo $rows['idBarang'];?> </span>
                    </td>
                    <td><?php echo $rows['namaBarang']; ?></td>
                    <td>
                    <?php
                      if($rows['stok'] <= 5){
                    ?>
                        <span class="badge bg-red"><?php echo $rows['stok']; ?> </span>
                    <?php
                      }else{
                    ?>
                        <span class="badge bg-green"><?php echo $rows['stok']; ?> </span>
                    <?php
                      }
                    ?>
                    </td>
                  </tr>
                  </tbody>
                  <?php } ?>
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