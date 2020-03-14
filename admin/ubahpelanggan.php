<?php
$get= addslashes($_GET['id']);
if (!isset($get)) {
    echo "<script>alert('Apa yang mau di ubah?');</script>";
    echo "<script>location='".web."admin';</script>";
}
?>  
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
          <i class="fa fa-table"></i> Ubah Pelanggan</div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
          <?php 
            if (isset($_POST['ubah'])) {
              $nama=$koneksi->real_escape_string($_POST['nama']);
              $email=$koneksi->real_escape_string($_POST['email']);
              $telepon=$koneksi->real_escape_string($_POST['telepon']);  

              if(!preg_match("/^[a-z A-Z]*$/",$nama)){
                                    echo '<div class="alert alert-danger">Nama Pelanggan Hanya huruf ! </div>';
              }else {  
                $koneksi ->query("UPDATE pelanggan SET nama_pelanggan='$nama', email_pelanggan='$email',telepon_pelanggan='$telepon' WHERE id_pelanggan='$get'");
                echo "<script>alert('Data Pelanggan telah diubah');</script>";
                echo "<script>location='".web."admin/pelanggan';</script>";
              }
            }
            $ambil = $koneksi ->query("SELECT * FROM pelanggan WHERE id_pelanggan='$get'");
            $pecah = $ambil -> fetch_assoc();
          ?>
            <div class="form-group">
              <label>Nama Pelanggan</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_pelanggan']; ?>">
              </div>
            <div class="form-group">
              <label>Email Pelanggan</label>
              <input type="email" class="form-control" name="email" value="<?php echo $pecah['email_pelanggan']; ?>">
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="number" class="form-control" name="telepon" value="<?php echo $pecah['telepon_pelanggan']; ?>">
            </div>
            <button class="btn btn-primary" name="ubah">Simpan</button>
          </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>

