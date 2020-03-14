<?php
$get= addslashes($_GET['id']);
if (!isset($get)) {
    echo "<script>alert('Apa yang mau di ubah?');</script>";
    echo "<script>location='".web."admin';</script>";
}
?>      <!-- Breadcrumbs-->
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
          <form method="post" enctype="multipart/form-data">
          <?php 
            if (isset($_POST['ubah'])) {
              $pilihan = $_POST['pilihan'];
              $koneksi ->query("UPDATE pembelian SET status_pembelian='$pilihan' WHERE id_pembelian='$get'");
              echo "<script>location='".web."admin/pembelian'</script>";
            }
            $ambil = $koneksi ->query("SELECT * FROM pembelian WHERE id_pembelian='$get'");
            $pecah = $ambil -> fetch_assoc();
          ?>
          <div class="form-group">
            Status Pembelian  Dengan Nomor Faktur <?php echo $pecah['no_faktur'];?>:
            <div class="col-sm-12">
              <?php if($pecah['status_pembelian']=="Belum Lunas"){?>
                      <label><input type="radio" name="pilihan" value="Lunas"> Lunas</label>
                      <label><input type="radio" name="pilihan" value="Belum Lunas" checked=""> Belum Lunas</label>
              <?php }else{ ?>
                      <label><input type="radio" name="pilihan" value="Lunas" checked=""> Lunas</label>
                      <label><input type="radio" name="pilihan" value="Belum Lunas"> Belum Lunas</label>
              <?php } ?>
            </div>
            <button class="btn btn-primary" name="ubah">Simpan</button>
          </div>
            
          </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>