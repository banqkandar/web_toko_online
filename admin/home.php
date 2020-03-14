<?php 
$pelanggans	= $koneksi->query("SELECT * FROM pelanggan");
$pelanggan	= $pelanggans->num_rows;
$pembeliz  = $koneksi->query("SELECT * FROM pembelian");
$pembelian = $pembeliz->num_rows;
$produks  = $koneksi->query("SELECT * FROM produk");
$produk = $produks->num_rows;

?>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Dashboard Saya</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-user"></i>
              </div>
              <div class="mr-5"><?php echo $pelanggan;?> Pelanggan Telah Terdaftar!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="pelanggan">
              <span class="float-left">Lihat Data</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo $pembelian;?> Produk Telah Laku</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="pembelian">
              <span class="float-left">Lihat Data</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo $produk;?> Produk Telah Tersedia!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="produk">
              <span class="float-left">Lihat Data</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
    </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Admin</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Terakhir Login</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;
                      $ambil=$koneksi->query("SELECT * FROM admin");
                      while($pecah = $ambil->fetch_assoc()){ ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pecah['nama_admin']; ?></td>
                  <td><?php echo $pecah['username_admin']; ?></td>
                  <td><?php echo $_SESSION['lastlog']; ?></td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>