  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Master</a></li>
              <li class="breadcrumb-item active">Barang</li>
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
				          <button type="button" class="btn bg-navy btn-flat-left" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-plus-circle" data-placement="bottom" data-toggle="tooltip" title="Tambah Barang"></i></button>
        		      <button type="button" class="btn bg-navy btn-flat-left" onclick="history.back()" data-placement="bottom" data-toggle="tooltip" title="Kembali"><i class="fa fa-arrow-circle-left"></i></button>
				        </h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Barang</th>
                      <th>Nama Barang</th>
                      <th>Jenis Barang</th>
                      <th>Ukuran Barang</th>
                      <th>Harga Barang</th>
                      <th>Stok</th>
                      <th>Foto</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    include "koneksi.php";
                    $no = 0;
                    $query = mysqli_query($koneksi,"SELECT a.*, b.jenis, c.ukuran FROM tb_barang a LEFT JOIN tb_jenis b on a.idJenis=b.idJenis LEFT JOIN tb_ukuran c ON a.idUkuran=c.idUkuran");
                      while($rows = mysqli_fetch_array($query)){
                        $no++;
                  ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td align="center">
                          <a href="#ModalEdit<?php echo $rows['idBarang'];?>" data-toggle="modal"> <span class="badge bg-green" data-placement="bottom" data-toggle="tooltip" title="Edit Barang"><?php echo $rows['idBarang']; ?> </span></a>
                      </td>
                      <td><?php echo $rows['namaBarang']; ?></td>
                      <td><?php echo $rows['jenis']; ?></td>
                      <td><?php echo $rows['ukuran']; ?></td>
                      <td><?php echo "Rp."." ". number_format($rows['hargaBarang']); ?></td>
                      <td align="center">
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
                      <td align="center"><img src="dist/img/<?php echo $rows['fotoBarang'];?>" width="200px" height="200px"></td>
                      <td align="center">
                      <a href="#"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip" data-toggle="modal" data-target="#ModalEdit<?php echo $rows['idBarang'];?>" ><i class="fas fa-edit" data-placement="bottom" data-toggle="tooltip" title="Edit Barang"></i></button></a>
                          <a href="#" onclick="confirm_modal('hapus-barang.php?&idBarang=<?php echo  $rows['idBarang']; ?>');"><button type='button' class="btn btn-danger btn-xs" data-placement="bottom" data-toggle="tooltip" title="Delete Barang"><i class="fas fa-trash"></i></button></a>
                      </td>
                    </tr>
                    <!-- ModalEdit -->
                    <div id="ModalEdit<?php echo $rows['idBarang'];?>" class="modal modal-default fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="margin-top: 100px;">
                          <div class="modal-header">
                            <h4 class="modal-title">Form Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <form action="index.php?page=proses-edit-barang" method="post" enctype="multipart/form-data">
                              <div class="modal-body">
                                <div class="card-body">
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">ID Barang</label>
                                    <input type="text" name="idBarang" class="form-control" id="exampleInputEmail1" value="<?php echo $rows['idBarang'];?>" readonly>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Barang</label>
                                    <input type="text" name="namaBarang" class="form-control" value="<?php echo $rows['namaBarang'];?>" id="exampleInputPassword1" placeholder="Masukan Identitas" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Jenis Barang</label>
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
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Ukuran Barang</label>
                                    <select class="form-control select2bs4" name="ukuranBarang" style="width: 100%;">
                                    <?php
                                      include "koneksi.php";
                                      $no = 0;
                                      $query2 = mysqli_query($koneksi,"SELECT * FROM tb_ukuran ORDER BY '$ukuran' ");
                                      while ($data = mysqli_fetch_array($query2)){
                                    ?>
                                      <option value="<?php echo $data['idUkuran']?>"><?php echo $data['ukuran']?></option>
                                    <?php } ?>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Harga Barang</label>
                                    <input type="text" name="hargaBarang" class="form-control" value="<?php echo $rows['hargaBarang'];?>" id="exampleInputPassword1" placeholder="Masukan Email" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Stok Barang</label>
                                    <input type="text" name="stok" class="form-control" value="<?php echo $rows['stok'];?>" id="exampleInputPassword1" placeholder="Masukan Email" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi Barang</label>
                                    <textarea type="text" name="deskripsiBarang" class="form-control" rows="4" id="exampleInputPassword1" placeholder="Masukan Deskripsi Barang" required><?php echo $rows['deskripsiBarang']; ?></textarea>
                                  </div>
                                  <div class="form-group">
                                    <img src="dist/img/<?php echo $rows['fotoBarang'];?>" width="250px" height="250px">
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
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="ubahFoto" class="custom-control-input" id="customCheckbox1">
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
    $query = mysqli_query($koneksi, "SELECT max(idBarang) as kodeTerbesar FROM tb_barang");
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
    $huruf = "B-";
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
        <form action="index.php?page=tambah-barang" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">IDBarang</label>
              <input type="text" name="idBarang" class="form-control" id="exampleInputEmail1" value="<?php echo $kodeBarang;?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama Barang</label>
              <input type="text" name="namaBarang" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Jenis Barang</label>
              <select class="form-control select2bs4" name="jenisBarang" style="width: 100%;">
              <?php
                include "koneksi.php";
                $no = 0;
                $query = mysqli_query($koneksi,"SELECT * FROM tb_jenis");
                while ($data = mysqli_fetch_array($query)){
              ?>
                <option value="<?php echo $data['idJenis']?>"><?php echo $data['jenis']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Ukuran Barang</label>
              <select class="form-control select2bs4" name="ukuranBarang" style="width: 100%;">
              <?php
                include "koneksi.php";
                $query = mysqli_query($koneksi,"SELECT * FROM tb_ukuran");
                while ($data = mysqli_fetch_array($query)){
              ?>
                <option value="<?php echo $data['idUkuran']?>"><?php echo $data['ukuran']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Harga Barang</label>
              <input type="text" name="hargaBarang" class="form-control" id="exampleInputPassword1" placeholder="Masukan Harga Barang" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Stok</label>
              <input type="text" name="stok" class="form-control" id="exampleInputPassword1" placeholder="Masukan Stok Barang" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Deskripsi Barang</label>
              <textarea type="text" name="deskripsiBarang" class="form-control" rows="4" id="exampleInputPassword1" placeholder="Masukan Deskripsi Barang" required></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="fotoBarang" class="custom-file-input" id="exampleInputFile" required>
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
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