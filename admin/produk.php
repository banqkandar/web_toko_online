      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Produk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Produk</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Berat</th>
                  <th>Gambar</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;
                      $ambil=$koneksi->query("SELECT * FROM produk");
                      while($pecah = $ambil->fetch_assoc()){ ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pecah['nama_produk']; ?></td>
                  <td><?php echo number_format($pecah['harga_produk']); ?></td>
                  <td><?php echo $pecah ['berat']; ?></td>
                  <td><img src="../gambar/<?php echo $pecah['gambar']; ?>" width="100"></td>
                  <td><a href="<?=web;?>admin/produk/ubah/<?php echo $pecah['id_produk']; ?>">Ubah</a> /
                      <a href="<?=web;?>admin/produk/hapus/<?php echo $pecah['id_produk']; ?>" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus
                      </a>
                  </td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
        </div>
        <a href="<?=web;?>admin/produk/tambah" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah Data</a>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>