<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Berita</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Master</a></li>
            <li class="breadcrumb-item active">Berita</li>
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
              <button type="button" class="btn bg-navy btn-flat-left" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-plus-circle" data-placement="bottom" data-toggle="tooltip" title="Tambah Berita"></i></button>
                <button type="button" class="btn bg-navy btn-flat-left" onclick="history.back()" data-placement="bottom" data-toggle="tooltip" title="Kembali"><i class="fa fa-arrow-circle-left"></i></button>
              </h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID Berita</th>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                    include "koneksi.php";
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT a.*, b.jenis as kategoriBerita, b.idJenis FROM tb_berita a LEFT JOIN tb_jenis b on a.kategoriBerita = b.idJenis");
                      while($rows = mysqli_fetch_array($query)){
                      $no++;
                ?>
                  <tr>
                    <td align="center">
                      <a href="#ModalEdit<?php echo $rows['idBerita'];?>" data-toggle="modal"> <span class="badge bg-green" data-placement="bottom" data-toggle="tooltip" title="Edit Jenis"><?php echo $rows['idBerita']; ?> </span></a>
                    </td>
                    <td><?php echo $rows['tglBerita']; ?></td>
                    <td><?php echo $rows['kategoriBerita']; ?></td>
                    <td><?php echo $rows['namaBerita']; ?></td>
                    <td><?php echo $rows['deskripsiBerita']; ?></td>
                    <td align="center">
                      <a href="#"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip" data-toggle="modal" data-target="#ModalEdit<?php echo $rows['idBerita'];?>" ><i class="fas fa-edit" data-placement="bottom" data-toggle="tooltip" title="Edit Berita"></i></button></a>
                      <a href="#" onclick="confirm_modal('hapus-berita.php?&idBerita=<?php echo  $rows['idBerita']; ?>');"><button type='button' class="btn btn-danger btn-xs" data-placement="bottom" data-toggle="tooltip" title="Delete Berita"><i class="fas fa-trash"></i></button></a>
                    </td>
                  </tr>
                  <!-- ModalEdit -->
                  <div id="ModalEdit<?php echo $rows['idBerita'];?>" class="modal modal-default fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="margin-top: 100px;">
                      <div class="modal-header">
                        <h4 class="modal-title">Form Edit Berita</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="index.php?page=proses-edit-berita" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="card-body">
                              <div class="form-group">
                                <input type="text" name="idBerita" class="form-control" id="exampleInputEmail1" value="<?php echo $rows['idBerita'];?>" readonly>
                              </div>
                              <div class="form-group">
                                <label>Tanggal Berita</label>
                                <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                                  <input type="text" name="tglBerita" class="form-control datetimepicker-input" value="<?php echo $rows['tglBerita'];?>" data-target="#reservationdate1"/>
                                  <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Kategori Berita</label>
                                <select class="form-control select2bs4" name="kategoriBerita" style="width: 100%;">
                                  <?php
                                    include "koneksi.php";
                                    $no = 0;
                                    $query1 = mysqli_query($koneksi,"SELECT * FROM tb_jenis");
                                    while ($data = mysqli_fetch_array($query1)){
                                  ?>
                                    <option value="<?php echo $data['idJenis']?>"  <?php if($data['idJenis'] == $rows['idJenis']) echo "selected='selected'"?>><?php echo $data['jenis']?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nama Berita</label>
                                <input type="text" name="namaBerita" class="form-control" id="exampleInputPassword1" value="<?php echo $rows['namaBerita']; ?>" placeholder="Masukan Nama Berita" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Deskripsi Berita</label>
                                <textarea class="form-control" rows="4" name="deskripsiBerita" placeholder="Masukan Deskripsi Berita" require><?php echo $rows['deskripsiBerita']; ?></textarea>
                              </div>
                              <div class="form-group">
                                <img src="dist/img/<?php echo $rows['foto'];?>" width="250px" height="250px">
                              </div>
                              <div class="form-group">
                                <label for="exampleInputFile">File Foto</label>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
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
  $query = mysqli_query($koneksi, "SELECT max(idBerita) as kodeTerbesar FROM tb_berita");
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
  $huruf = "BE-";
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
      <form action="index.php?page=tambah-berita" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">ID Berita</label>
              <input type="text" name="idBerita" class="form-control" id="exampleInputEmail1" value="<?php echo $kodeBarang;?>" readonly>
            </div>
            <div class="form-group">
              <label>Tanggal Berita</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" name="tglBerita" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Kategori Berita</label>
              <select class="form-control select2bs4" name="kategoriBerita" style="width: 100%;">
                <?php
                include "koneksi.php";
                $no = 0;
                $query1 = mysqli_query($koneksi,"SELECT * FROM tb_jenis");
                while ($data = mysqli_fetch_array($query1)){
                ?>
                  <option value="<?php echo $data['idJenis']?>" selected="selected"><?php echo $data['jenis']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama Berita</label>
              <input type="text" name="namaBerita" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama Berita" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi Berita</label>
              <textarea class="form-control" rows="4" name="deskripsiBerita" placeholder="Masukan Deskripsi Berita" require></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="exampleInputFile" required>
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
              <p> * File Harus Format JPG/PNG</p>
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
        <h4 class="modal-title">Are you sure to delete this data ?</h4>
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