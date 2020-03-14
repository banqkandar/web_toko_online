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
          <i class="fa fa-table"></i> Tambah Produk</div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
          <?php 
            if (isset($_POST['save'])) {
              $nama = $_FILES['gambar']['name'];
              $lokasi = $_FILES['gambar']['tmp_name'];

              $nama_produk=$koneksi->real_escape_string($_POST['nama']);
              $kategori=$koneksi->real_escape_string($_POST['kategori']);
              $harga=$koneksi->real_escape_string($_POST['harga']);
              $berat=$koneksi->real_escape_string($_POST['berat']);
              $deskripsi=$koneksi->real_escape_string($_POST['deskripsi']);

              $ekstensi_diperbolehkan = array('png','jpg','jpeg','svg');   
              $x = explode('.', $nama);                
              $ekstensi = strtolower(end($x));

              
              if(($harga < 0) || ($berat < 0)){
                   echo"<script>alert('Tuliskan harga dan berat dengan benar !'); </script>";
              } else {
                if(!preg_match("/^[a-zA-Z0-9 ]*$/",$nama_produk)){
                                    echo '<div class="alert alert-danger">Nama Produk Hanya huruf dan angka ! </div>';
                }else {  
                  if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){

                    move_uploaded_file($lokasi, "../gambar/".$nama);
                    $koneksi->query("INSERT INTO produk(nama_produk,id_kategori,harga_produk,berat,gambar,deskripsi_produk) VALUES ('$nama_produk','$kategori','$harga','$berat','$nama','$deskripsi')");
                    echo "<div class='alert alert-info'>Data Tersimpan</div>";
                    echo "<meta http-equiv='refresh' content='1;url=".web."admin/produk'>";

                  } else {
                    echo"<script>alert('Hanya Memilih gambar dengan ekstensi .png / .jpg saja !'); </script>";
                  } 
                } 
              }
            }  
          ?>
            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" class="form-control" name="nama">
              </div>
            <div class="form-group">
              <label>Kategori</label>
              <select name="kategori" class="form-control">
                <?php $ambilkategori = $koneksi->query("SELECT * from kategori"); 
                while($ambildata = $ambilkategori->fetch_assoc()){?>
                <option value="<?php echo $ambildata['id_kategori'];?>"><?php echo $ambildata['nama_kategori'];?></option>
              <?php } ?>
              </select>
            </div>  
            <div class="form-group">
              <label>Harga (Rp)</label>
              <input type="number" class="form-control" name="harga">
            </div>
            <div class="form-group">
              <label>Berat (Gr)</label>
              <input type="number" class="form-control" name="berat">
            </div>
            <div class="form-group">
              <label>Deskripsi Produk</label>
              <textarea class="form-control" name="deskripsi" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label>Gambar Produk</label>
              <input type="file" class="form-control" name="gambar">
            </div>
            <button class="btn btn-primary" name="save">Simpan</button>
          </form>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>

