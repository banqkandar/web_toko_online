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
                  <th>No Faktur</th>
                  <th>Nama Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1;
                      $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan");
                      while($pecah = $ambil->fetch_assoc()){ ?>
                <tr>
                  <td><?php echo $pecah['no_faktur']; ?></td>
                  <td><?php echo $pecah['nama_pelanggan']; ?></td>
                  <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                  <td><?php echo $pecah['total_pembelian']; ?></td>
                  <td><?php if($pecah['status_pembelian']=="Belum Lunas"){?>
                        <a class="btn btn-danger btn-sm">Belum Lunas</a>
                      <?php }else{ ?>
                        <a class="btn btn-info btn-sm">Lunas</a>
                      <?php } ?>
                  </td>
                  <td><a href="<?=web;?>admin/detail/<?php echo $pecah['id_pembelian']; ?>">Detail</a> / <a href="<?=web;?>admin/ubahstatus/<?php echo $pecah['id_pembelian']; ?>">Ubah</a>
                  </td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>