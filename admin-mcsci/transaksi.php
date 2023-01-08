<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaksi</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Transaksi</a></li>
              <li class="breadcrumb-item active">Form Transaksi</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pilih Barang</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="?page=tambah-transaksi" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Barang</label>
                    <select class="form-control select2bs4" id="barang" name="idBarang" onchange="changeValueId(this.value)" required>
                      <option value="">Pilih Barang</option>
                      <?php 
                        include "koneksi.php";
                        $sql=mysqli_query($koneksi,"SELECT a.*, b.ukuran FROM tb_barang a LEFT JOIN tb_ukuran b on a.idUkuran=b.idUkuran WHERE a.stok > 0 ORDER BY a.idBarang ASC");
                        $jsArray = "var prdNama = new Array();\n";
                          while ($data=mysqli_fetch_array($sql)) {
                             
                            echo '<option value="'.$data['idBarang'].'">'.$data['namaBarang'].'</option> ';
                            $jsArray .= "prdNama['" . $data['idBarang'] . "'] = {hargaBarang:'" . addslashes($data['hargaBarang']) ."',ukuran:'".addslashes($data['ukuran'])."'};\n"; 
                            }
                       ?>
                    </select>
                    <script type="text/javascript"> 
                      <?php echo $jsArray; ?>  
                        function changeValueId(y){  
                        document.getElementById('hargaBarang').value = prdNama[y].hargaBarang;
                        document.getElementById('ukuran').value = prdNama[y].ukuran;
                      }; 
                    </script>
                  </div>
                  <?php
                    $permittedd_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    function generate($inputt, $strengthh = 16) {
                        $inputt_length = strlen($inputt);
                        $randomm_string = '';
                        for($i = 0; $i < $strengthh; $i++) {
                            $randomm_character = $inputt[mt_rand(0, $inputt_length - 1)];
                            $randomm_string .= $randomm_character;
                        }
                        return $randomm_string;
      
                    }
                  ?>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Harga Barang</label>
                    <input type="hidden" name="kodePembelian" class="form-control" value="<?php echo generate($permittedd_chars, 8); ?> " readonly> 
                    <input type="text" class="form-control" id="hargaBarang" placeholder="Harga Barang" readonly> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ukuran Barang</label>
                    <input type="text" class="form-control" id="ukuran" placeholder="Ukuran Barang" readonly> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">QTY</label>
                    <input type="number" name="qty" class="form-control" id="" placeholder="QTY" require> 
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="insert" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <?php
              // https://www.malasngoding.com
              // menghubungkan dengan koneksi database
              include 'koneksi.php';
              
              // mengambil data barang dengan kode paling besar
              $query = mysqli_query($koneksi, "SELECT max(idTransaksi) as kodeTerbesar FROM tb_transaksi");
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
              $huruf = "T-";
              $kodeBarang = $huruf . sprintf("%05s", $urutan);

              
              $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
              function generate_string($input, $strength = 16) {
                  $input_length = strlen($input);
                  $random_string = '';
                  for($i = 0; $i < $strength; $i++) {
                      $random_character = $input[mt_rand(0, $input_length - 1)];
                      $random_string .= $random_character;
                  }
                  return $random_string;

              }

              $date = date("m/d/Y");

            ?>
          <div class="col-md-9">
            <!-- Form Element sizes -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Pembelian</h3>
              </div>
              <form action="?page=proses-tambah-transaksi" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">ID Transaksi</label>
                    <input type="hidden" name="idInvoice" class="form-control" id="inputEmail3" value="<?php echo generate_string($permitted_chars, 20); ?>" placeholder="Nama Penyewa" readonly>
                    <input type="text" name="idTransaksi" class="form-control" value="<?php echo $kodeBarang; ?>" placeholder="Harga Barang" readonly> 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nama Member</label>
                    <select class="form-control select2bs4" name="idMember" style="width: 100%;" require>
                    <?php
                      include "koneksi.php";
                      $no = 0;
                      $query2 = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE level='Member'");
                      while ($data = mysqli_fetch_array($query2)){
                    ?>
                        <option value="<?php echo $data['idMember']?>"><?php echo $data['namaMember']?></option>
                    <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Tanggal Transaksi</label>
                    <input type="text" name="tglTransaksi" class="form-control" value="<?php echo $date; ?>" placeholder="Harga Barang" readonly> 
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Keranjang Barang</h3>
              </div>
              <div class="card-body">
                <table id="example2" class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID Transaksi</th>
                      <th>Member</th>
                      <th>Barang</th>
                      <th>Tanggal Transaksi</th>
                      <th>Qty</th>
                      <th align="center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include "koneksi.php";
                      $query1 = mysqli_query($koneksi,"SELECT a.*, b.namaBarang, c.namaMember FROM tb_transaksi a LEFT JOIN tb_barang b on a.idBarang = b.idBarang LEFT JOIN tb_user c on a.idMember = c.idMember WHERE status='Pending'");
                        while ($data1 = mysqli_fetch_array($query1)){
                  	?>
                    <tr>
                      <td><?php echo $data1['idTransaksi']; ?></td>
                      <td><?php echo $data1['namaMember']; ?></td>
                      <td><?php echo $data1['namaBarang']; ?></td>
                      <td><?php echo $data1['tglTransaksi']; ?></td>
                      <td><?php echo $data1['qty']; ?></td>
                      <td>
                        <div align="center">
                          <a href="#" onclick="confirm_modal('hapus-barang-transaksi.php?&kodePembelian=<?php echo  $data1['kodePembelian']; ?>');"><button type='button' class="btn btn-danger btn-xs" data-placement="bottom" data-toggle="tooltip" title="Delete Barang"><i class="fas fa-trash"></i></button></a>
                        </div>
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
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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