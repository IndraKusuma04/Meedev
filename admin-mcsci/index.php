<?php 
  session_start();
  // cek apakah yang mengakses halaman ini sudah login
  if($_SESSION['level']==""){
    header("location:../index.php");
  }elseif($_SESSION['level']== "Member"){
    header("location:member-mcsci/index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MCSCI | PURWOKERTO</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
	<!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- logo ico -->
  <link rel="icon" href="dist/img/logo.ico" type="image/x-icon" />
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logo.png" alt="AdminLTELogo" height="90" width="90">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <?php
      include "koneksi.php";
      $query1 = mysqli_query($koneksi,"SELECT COUNT(idTransaksi) AS jmlTransaksi FROM tb_transaksi WHERE status='Menunggu Pembayaran'");
      $rows = mysqli_fetch_array($query1);
      ?>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"  data-placement="bottom" data-toggle="tooltip" title="Transaksi Barang"></i>
          <span class="badge badge-danger navbar-badge">
            <?php
              if($rows > 0){
                echo $rows['jmlTransaksi'];
              }else{
                echo "0";
              }
            ?>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">
            <?php
              if($rows > 0){
                echo $rows['jmlTransaksi']." "."Notifikasi";
              }else{
                echo "0 Notifikasi";
              }
            ?>
          </span>
          <div class="dropdown-divider"></div>
          
          <?php 
              include "koneksi.php";
              $query = mysqli_query($koneksi,"SELECT * FROM tb_transaksi WHERE status='Menunggu Pembayaran' GROUP BY idTransaksi");
              while($rows1 = mysqli_fetch_array($query)){
            ?>
          <a href="#" class="dropdown-item">
            <i class="fas fa-shopping-cart mr-2"></i> <?php echo $rows1['idTransaksi']; ?>
            <span class="float-right text-muted text-sm"><?php echo $rows1['tglTransaksi']; ?></span>
            <?php } ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="?page=data-transaksi" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <marquee><b><span class="brand-text font-weight-light">MCSCI PURWOKERTO</span></b></marquee>
    </a>
    <?php
      include "koneksi.php";
      $data = $_SESSION['email'];
      $qu = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE email='$data'");
      $ro = mysqli_fetch_array($qu);
    ?>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/<?php echo $ro['foto'];?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $ro['namaMember']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?page=users" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-server"></i>
              <p>
                Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=barang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=jenis" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jenis</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=ukuran" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ukuran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=stok" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=berita" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Berita</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Transaksi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=transaksi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=data-transaksi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Transaksi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?page=laporan-barang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=laporan-stok" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Stok</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?page=laporan-transaksi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Transaksi</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header"><hr color="white"></li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
	
	<?php

    $page = (isset($_GET['page']))? $_GET['page'] : "main";
        switch ($page){
            
            case 'users'              : include "user.php"              ; break;
            case 'tambah-member'      : include "tambah-member.php"     ; break;
            case 'edit-member'        : include "edit-member.php";      ; break;
            case 'proses-edit-member' : include "proses-edit-member.php"; break;
            case 'hapus-member'       : include "hapus-member.php"      ; break;
            
            case 'barang'             : include "barang.php"            ; break;
            case 'tambah-barang'      : include "tambah-barang.php"     ; break;
            case 'edit-barang'        : include "edit-barang.php"       ; break;
            case 'proses-edit-barang' : include "proses-edit-barang.php"; break;

            case 'jenis'              : include "jenis.php"             ; break;
            case 'tambah-jenis'       : include "tambah-jenis.php"      ; break;
            case 'edit-jenis'         : include "edit-jenis.php"        ; break;
            case 'proses-edit-jenis'  : include "proses-edit-jenis.php" ; break;
            case 'hapus-jenis'        : include "hapus-jenis.php"       ; break;

            case 'ukuran'             : include "ukuran.php"            ; break;
            case 'tambah-ukuran'      : include "tambah-ukuran.php"     ; break;
            case 'edit-ukuran'        : include "edit-ukuran.php"       ; break;
            case 'proses-edit-ukuran' : include "proses-edit-ukuran.php"; break;
            case 'hapus-ukuran'       : include "hapus-ukuran.php"      ; break;

            case 'stok'               : include "stok.php"              ; break;
            case 'tambah-stok'        : include "tambah-stok.php"       ; break;
            case 'edit-stok'          : include "edit-stok.php"         ; break;
            case 'proses-edit-stok'   : include "proses-edit-stok.php"  ; break;
            case 'hapus-stok'         : include "hapus-stok.php"        ; break;

            case 'berita'             : include "berita.php"            ; break;
            case 'tambah-berita'      : include "tambah-berita.php"     ; break;
            case 'edit-berita'        : include "edit-berita.php"       ; break;
            case 'proses-edit-berita' : include "proses-edit-berita.php"; break;
            case 'hapus-berita'       : include "hapus-berita.php"      ; break;

            case 'transaksi'          : include "transaksi.php"			    ; break;
            case 'tambah-transaksi'   : include "tambah-transaksi.php"  ; break;
            case 'proses-tambah-transaksi'  : include "proses-tambah-transaksi.php"; break;
            case 'data-transaksi'     : include "data-transaksi.php"    ; break;
            case 'detail-transaksi'   : include "detail-transaksi.php"  ; break;
            case 'print-transaksi'    : include "print-transaksi.php"   ; break;

            case 'laporan-barang'     : include "laporan-barang.php"    ; break;
            case 'laporanBarang'      : include "laporanBarang.php"     ; break;
            case 'print-barang'       : include "print-barang.php"      ; break;

            case 'laporan-stok'        : include "laporanStok.php"       ; break;
            case 'print-stok'         : include "print-stok.php"        ; break;
            case 'printStok'          : include "printStok.php"         ; break;

            case 'laporan-transaksi'  : include "laporan-transaksi.php" ; break;
            case 'print-lap-transaksi': include "print-lap-transaksi.php"; break;

            case 'main' : 
            default : include 'dashboard.php';
        }

  ?>

 
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip()

  //Date picker
  $('#reservationdate1').datetimepicker({
    format: 'L'
  });
})
</script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
<!-- Page specific script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )
  })
</script>
</body>
</html>
