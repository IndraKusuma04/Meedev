<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
                <button type="button" class="btn bg-navy btn-flat-left" data-toggle="modal" data-target="#ModalTambah"><i class="fa fa-plus-circle" data-placement="bottom" data-toggle="tooltip" title="Tambah Member"></i></button>
                <button type="button" class="btn bg-navy btn-flat-left" onclick="history.back()" data-placement="bottom" data-toggle="tooltip" title="Kembali"><i class="fa fa-arrow-circle-left"></i></button>
              </h3>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>ID Member</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Level</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  include "koneksi.php";
                  $no = 0;
                  $query = mysqli_query($koneksi,"SELECT * FROM tb_user");
                    while($rows = mysqli_fetch_array($query)){
                    $no++;
                ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td align="center">
                    <?php
                      if($rows['level'] == "Admin"){
                    ?>
                        <a href="#ModalEdit<?php echo $rows['idMember'];?>" data-toggle="modal"> <span class="badge bg-red" data-placement="bottom"  data-toggle="tooltip" title="Edit Member"><?php echo $rows['idMember']; ?> </span></a>
                    <?php
                      }else{
                    ?>
                      <a href="#ModalEdit<?php echo $rows['idMember'];?>" data-toggle="modal"> <span class="badge bg-green" data-placement="bottom" data-toggle="tooltip" title="Edit Member"><?php echo $rows['idMember']; ?> </span></a>
                    <?php
                      }
                    ?>
                    </td>
                    <td><?php echo $rows['namaMember']; ?></td>
                    <td><?php echo $rows['username']; ?></td>
                    <td><?php echo $rows['email']; ?></td>
                    <td align="center">
                    <?php
                      if($rows['level'] == "Admin" ){
                        echo '<span class="label label-danger"> Admin </span>';
                      }else{
                        echo '<span class="label label-success"> Member </span>';
                      }
                    ?>
                    </td>
                    <td align="center">
                      <a href="#"><button type='button' class="btn btn-warning btn-xs" toggle="tooltip" data-toggle="modal" data-target="#ModalEdit<?php echo $rows['idMember'];?>" ><i class="fas fa-edit" data-placement="bottom" data-toggle="tooltip" title="Edit Member"></i></button></a>
                      <a href="#" onclick="confirm_modal('hapus-member.php?&idMember=<?php echo  $rows['idMember']; ?>');"><button type='button' class="btn btn-danger btn-xs" data-placement="bottom" data-toggle="tooltip" title="Delete Member"><i class="fas fa-trash"></i></button></a>
                    </td>
                  </tr>
                  <!-- ModalEdit -->
                  <div id="ModalEdit<?php echo $rows['idMember'];?>" class="modal modal-default fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="margin-top: 100px;">
                      <div class="modal-header">
                        <h4 class="modal-title">Form Edit User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <form action="index.php?page=proses-edit-member" method="post" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="card-body">
                              <div class="form-group">
                                <label for="exampleInputPassword1">ID User</label>
                                <input type="text" name="idmember" class="form-control" id="exampleInputEmail1" value="<?php echo $rows['idMember'];?>" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">No Identitas</label>
                                <input type="text" name="identitasMember" class="form-control" value="<?php echo $rows['identitasMember'];?>" id="exampleInputPassword1" placeholder="Masukan Identitas" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Nama</label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $rows['namaMember'];?>" id="exampleInputPassword1" placeholder="Masukan Nama" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Jenis Kelamin</label>
                                <select class="form-control select2bs4" name="jkMember" style="width: 100%;">
                                  <option value="Laki-Laki" <?php if($rows['jkMember'] == "Laki-laki") echo "selected='selected'" ?>> Laki-Laki</option>
                                  <option value="Perempuan" <?php if($rows['jkMember'] == "Perempuan") echo "selected='selected'" ?>> Perempuan</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Telp</label>
                                <input type="text" name="telp" class="form-control" value="<?php echo $rows['telp'];?>" id="exampleInputPassword1" placeholder="Masukan No Telp" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="4" require><?php echo $rows['alamat'];?></textarea>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $rows['email'];?>" id="exampleInputPassword1" placeholder="Masukan Email" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo $rows['username'];?>" id="exampleInputPassword1" placeholder="Masukan Username" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $rows['password'];?>" id="exampleInputPassword1" placeholder="Masukan Password" required>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Pembuatan</label>
                                <input type="text" name="tglPembuatan" class="form-control" value="<?php echo $rows['tanggalPembuatan']; ?>" id="exampleInputPassword1" placeholder="Masukan Password" readonly>
                              </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Tanggal Update</label>
                                <?php $tglUpdate = date("Y-m-d");?>
                                <input type="text" name="tglUpdate" class="form-control" id="exampleInputPassword1" value="<?php echo $tglUpdate; ?>" placeholder="Masukan Password" readonly>
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
                                  <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
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
  $query = mysqli_query($koneksi, "SELECT max(idMember) as kodeTerbesar FROM tb_user WHERE level = 'Member'");
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
  $huruf = "M-";
  $kodeBarang = $huruf . sprintf("%05s", $urutan);

  $tglPembuatan = date("Y-m-d");
  $tglUpdate = date("Y-m-d");
  
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
      <form action="index.php?page=tambah-member" method="post" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputEmail1">IDMember</label>
              <input type="text" name="idmember" class="form-control" id="exampleInputEmail1" value="<?php echo $kodeBarang;?>" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">No Identitas</label>
              <input type="text" name="identitasMember" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama</label>
              <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Jenis Kelamin</label>
              <select class="form-control select2bs4" name="jkMember" style="width: 100%;">
                <option value="Laki-Laki" selected="selected">Laki-Laki</option>
                <option value="Perempuan"> Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Telp</label>
              <input type="text" name="telp" class="form-control" value="" id="exampleInputPassword1" placeholder="Masukan No Telp" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Alamat</label>
              <textarea class="form-control" name="alamat" rows="4" require></textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Masukan Email" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Username</label>
              <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Masukan Username" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal Pembuatan</label>
              <input type="text" name="tglPembuatan" class="form-control" value="<?php echo $tglPembuatan; ?>" id="exampleInputPassword1" placeholder="Masukan Password" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Tanggal Update</label>
              <input type="text" name="tglUpdate" class="form-control" id="exampleInputPassword1" value="<?php echo $tglUpdate; ?>" placeholder="Masukan Password" readonly>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File Foto</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="foto" class="custom-file-input" id="exampleInputFile" required>
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
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!--ModalDelete -->
<div class="modal fade" id="modalConfirm">
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
    $('#modalConfirm').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
  }
</script>