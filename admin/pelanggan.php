      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Pelanggan</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Pelanggan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Email</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;
                      $ambil=$koneksi->query("SELECT * FROM pelanggan");
                      while($pecah = $ambil->fetch_assoc()){ ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $pecah['nama_pelanggan']; ?></td>
                  <td><?php echo $pecah['email_pelanggan']; ?></td>
                  <td><?php echo $pecah['telepon_pelanggan']; ?></td>
                  <td><a href="<?=web;?>admin/pelanggan/ubahpelanggan/<?php echo $pecah['id_pelanggan']; ?>">Ubah</a> /
                      <a href="<?=web;?>admin/pelanggan/hapuspelanggan/<?php echo $pecah['id_pelanggan']; ?>" onclick="return confirm('Anda yakin akan menghapus data?')">Hapus
                      </a>
                  </td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>