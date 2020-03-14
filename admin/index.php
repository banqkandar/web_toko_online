<?php 
require_once("../config.php");
session_start();
if (!(isset($_SESSION['admin']))) {
        echo '
            <script>
                window.alert("Anda Tidak Berhak Mengakses Halaman Ini Karena Anda Belum Login Sebagai Admin");
                window.location = "../login.php";
            </script>
        ';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Admin SantuyShop</title>
  <!-- Bootstrap core CSS-->
  <link href="<?=web;?>admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?=web;?>admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?=web;?>admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?=web;?>admin/css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php include "nav.php";?>
  <div class="content-wrapper">
    <div class="container-fluid">
<?php 
    if (isset($_GET['halaman'])){
      if ($_GET['halaman']=="produk"){
        include 'produk.php';
      }elseif ($_GET['halaman']=="pembelian"){
        include 'pembelian.php';
      }elseif ($_GET['halaman']=="pelanggan"){
        include 'pelanggan.php';
      }elseif ($_GET['halaman']=="detail"){
        include 'detail.php';
      }elseif ($_GET['halaman']=="tambahproduk"){
        include 'tambahproduk.php';
      }elseif ($_GET['halaman']=="ubahproduk"){
        include 'ubahproduk.php';
      }elseif ($_GET['halaman']=="hapusproduk"){
        include 'hapusproduk.php';
      }elseif ($_GET['halaman']=="hapuspelanggan"){
        include 'hapuspelanggan.php';
      }elseif ($_GET['halaman']=="ubahpelanggan"){
        include 'ubahpelanggan.php';
      }elseif ($_GET['halaman']=="ubahstatus"){
        include 'ubahstatus.php';
      }
    }else{
      include 'home.php';
    }
?>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © <?=nama;?> 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mau Keluar?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Klik Logout untuk keluar.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?=web;?>admin/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?=web;?>admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?=web;?>admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?=web;?>admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?=web;?>admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?=web;?>admin/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="<?=web;?>admin/vendor/chart.js/Chart.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?=web;?>admin/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?=web;?>admin/js/sb-admin-datatables.min.js"></script>
    <script src="<?=web;?>admin/js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
