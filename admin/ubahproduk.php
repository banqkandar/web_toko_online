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
        <li class="breadcrumb-item active">Produk</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Ubah Produk</div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
          <?php 
            if (isset($_POST['ubah'])) {
              $namagambar = $_FILES['gambar']['name'];
              $lokasigambar = $_FILES['gambar']['tmp_name'];

              $nama_produk=$koneksi->real_escape_string($_POST['nama']);
              $kategori=$koneksi->real_escape_string($_POST['kategori']);
              $harga=$koneksi->real_escape_string($_POST['harga']);
              $berat=$koneksi->real_escape_string($_POST['berat']);
              $deskripsi=$koneksi->real_escape_string($_POST['deskripsi']);
              $namalama=$koneksi->real_escape_string($_POST['namalama']);

              $ekstensi_diperbolehkan = array('png','jpg','jpeg','svg');   
              $x = explode('.', $namagambar);                
              $ekstensi = strtolower(end($x));
              if(($harga < 0) || ($berat < 0)){
                   echo"<script>alert('Tuliskan harga dan berat dengan benar !'); </script>";
              } else {
                if(!preg_match("/^[a-zA-Z0-9 ]*$/",$nama_produk)){
                                    echo '<div class="alert alert-danger">Nama Produk Hanya huruf dan angka yang diijinkan. </div>';
                }else { 
                  if (!empty($lokasigambar)) {
                    if(in_array($ekstensi, $ekstensi_diperbolehkan) == true){  
                      move_uploaded_file($lokasigambar, "../gambar/$namagambar");
                      $koneksi ->query("UPDATE produk SET nama_produk='$nama_produk',harga_produk='$harga',berat='$berat',gambar='$namagambar',deskripsi_produk='$deskripsi' WHERE id_produk='$get'");
                         if(is_file("../gambar/".$namalama))  //menghapus file yang lama jika ada 
                         unlink("../gambar/".$namalama);  
                         echo "<script>alert('Data Produk telah diubah');</script>";
                         echo "<script>location='".web."admin/produk';</script>";
                      } else {
                    echo"<script>alert('Hanya Memilih gambar dengan ekstensi .png / .jpg saja !'); </script>";
                    }  
                  }else{
                    $koneksi ->query("UPDATE produk SET nama_produk='$nama_produk', harga_produk='$harga',berat='$berat', deskripsi_produk='$deskripsi' WHERE id_produk='$get'");
                    echo "<script>alert('Data Produk telah diubah');</script>";
                    echo "<script>location='".web."admin/produk';</script>";
                  }
                }
              }
            }

            $ambil = $koneksi ->query("SELECT * FROM produk WHERE id_produk='$get'");
            $pecah = $ambil -> fetch_assoc();
          ?>
            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_produk']; ?>">
              </div>
            <div class="form-group">
              <label>Harga (Rp)</label>
              <input type="number" class="form-control" name="harga" value="<?php echo $pecah['harga_produk']; ?>">
            </div>
            <div class="form-group">
              <label>Berat (Gr)</label>
              <input type="number" class="form-control" name="berat" value="<?php echo $pecah['berat']; ?>">
            </div>
            <div class="form-group">
              <label>Deskripsi Produk</label>
              <textarea class="form-control" name="deskripsi" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea>
            </div>
            <div class="form-group">
              <img src="<?=web;?>gambar/<?php echo $pecah['gambar'] ?>" width="200">
              <input type="hidden" name="namalama" value="<?php echo $pecah['gambar'] ?>">
            </div>
            <div class="form-group">
              <label>Ganti Gambar</label>
              <input type="file" class="form-control" name="gambar">
            </div>
            <button class="btn btn-primary" name="ubah">Simpan</button>
          </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>

