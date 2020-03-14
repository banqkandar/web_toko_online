<?php
$get= addslashes($_GET['id']);
if (!isset($get)) {
    echo "<script>alert('Apa yang mau di lihat?');</script>";
    echo "<script>location='".web."admin';</script>";
}
?>  
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pembelian</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Pembelian</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Harga Produk</th>
                  <th>Jumlah Produk</th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;
                      $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$get'");
                      while($pecah = $ambil->fetch_assoc()){ ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pecah['nama_produk']; ?></td>
                  <td><?php echo $pecah['harga_produk']; ?></td>
                  <td><?php echo $pecah['jumlah']; ?></td>
                  <td><?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
                  </td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>