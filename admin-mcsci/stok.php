<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Stok</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Master</a></li>
            <li class="breadcrumb-item active">Stok</li>
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
              </h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID Barang</th>
                    <th>Barang</th>
                    <th>Stok</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                   include "koneksi.php";
                   $no = 0;
                   $query = mysqli_query($koneksi,"SELECT * FROM tb_barang");
                    while ($data = mysqli_fetch_array($query)){
                      $no++
                ?>
                  <tr>
                    <td><?php echo $no; ?> </td>
                    <td align="center">
                      <a href="#ModalEdit<?php echo $data['idBarang'];?>" data-toggle="modal"> <span class="badge bg-green" data-placement="bottom" data-toggle="tooltip" title="Edit Jenis"><?php echo $data['idBarang']; ?> </span></a>
                    </td>
                    <td><?php echo $data['namaBarang']; ?></td>
                    <td align="center">
                    <?php
                      if($data['stok'] <= 5){
                    ?>
                      <span class="badge bg-red"><?php echo $data['stok']; ?> </span>
                    <?php
                      }else{
                    ?>
                      <span class="badge bg-green"><?php echo $data['stok']; ?> </span>
                    <?php
                      }
                    ?>
                    </td>
                    <td align="center">
                      <a href="#"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip" data-toggle="modal" data-target="#ModalEdit<?php echo $data['idBarang'];?>" ><i class="fas fa-edit" data-placement="bottom" data-toggle="tooltip" title="Edit Stok"></i></button></a>
                    </td>
                  </tr>
                  <!-- ModalEdit -->
                  <div id="ModalEdit<?php echo $data['idBarang'];?>" class="modal modal-default fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="margin-top: 100px;">
                      <div class="modal-header">
                        <h4 class="modal-title">Form Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="index.php?page=proses-edit-stok" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">ID Barang</label>
                                <input type="text" name="idBarang" class="form-control" id="exampleInputEmail1" value="<?php echo $data['idBarang'];?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Nama Berang</label>
                                <input type="text" name="namaBarang" class="form-control" id="exampleInputEmail1" value="<?php echo $data['namaBarang'];?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Stok Barang</label>
                                <input type="text" name="stok" class="form-control" id="exampleInputPassword1" value="<?php echo $data['stok'];?>" placeholder="Masukan Ukuran Barang" required>
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
                  <?php } ?>
                  </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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

<?php
 
    // https://www.malasngoding.com
    // menghubungkan dengan koneksi database
    include 'koneksi.php';
    
    // mengambil data barang dengan kode paling besar
    $query = mysqli_query($koneksi, "SELECT max(idUkuran) as kodeTerbesar FROM tb_ukuran");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
    
    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
    // dan diubah ke integer dengan (int)
    $urutan = (int) substr($kodeBarang, 6, 3);
    
    // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
    $urutan++;
    
    // membentuk kode barang baru
    // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
    // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
    // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
    $huruf = "U-";
    $kodeBarang = $huruf . sprintf("%05s", $urutan);
    
?>

<div class="modal fade" id="ModalTambah">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="?page=tambah-ukuran" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">ID Ukuran</label>
              <input type="text" name="idUkuran" class="form-control" id="exampleInputEmail1" value="<?php echo $kodeBarang;?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Ukuran</label>
              <input type="text" name="ukuran" class="form-control" id="exampleInputPassword1" placeholder="Masukan Jenis" required>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="insert" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--ModalDelete -->
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top: 100px;">
      <div class="modal-header">
        <h4 class="modal-title">Are you sure to delete this member ?</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
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