<?php 
require_once("config.php");
session_start();
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login !');</script>";
    echo "<script>location='login.php';</script>";
}elseif($_SESSION['admin']){
    echo "<script>location='admin';</script>";
}
$id_pelanggan = $_SESSION['pelanggan'];
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$id_pelanggan'");
$username = $ambil->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=deskripsi;?>">
    <meta name="author" content="<?=peimilik;?>">
    <meta name="keywords" content="TokoSantuy">
    <title>
        Checkout - <?=nama;?>
    </title>
    <meta name="keywords" content="">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">
</head>
<body>
<?php include("navbar.php");?>
    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>Checkout</li>
                    </ul>
                </div>



                <div class="col-md-12" id="checkout">

                    <div class="box">

                        <form method="post" action="">

                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="checkout.php"><i class="fa fa-map-marker"></i><br>Alamat</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Nama</label>
                                            <input type="text" readonly value="<?php echo $username['nama_pelanggan'] ?>" class="form-control" id="nama">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">No Telepon/HP</label>
                                            <input type="text" readonly value="<?php echo $username['telepon_pelanggan'] ?>" class="form-control" id="no_telp">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="company">Alamat</label>
                                            <textarea class="form-control" readonly id="alamat"><?php echo $username['alamat_pelanggan'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </div>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th colspan="2">Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga/Barang</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php 
                                            foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):
                                            $ambil = $koneksi->query("SELECT * FROM produk where id_produk='$id_produk'");
                                            $pecah = $ambil->fetch_assoc();
                                            $Subharga= $pecah['harga_produk']*$jumlah; ?>
                                            <tr>
                                                <td>
                                                    <?php echo $no; ?>
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <img src="gambar/<?php echo $pecah['gambar']; ?>" alt="<?php echo $pecah['nama_produk']; ?>">
                                                    </a>
                                                </td>
                                                <td><a href="detail.php?id_produk=<?php echo $id_produk; ?>"><?php echo $pecah['nama_produk']; ?></a>
                                                </td>
                                                <td>
                                                    <input type="number" value="<?php echo $jumlah; ?>"  readonly>
                                                </td>
                                                <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
                                                <td>Rp. <?php echo number_format($Subharga); ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php $total_belanja = $Subharga+$sub; endforeach?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total Pembayaran</th>
                                                <th colspan="2">Rp. <?php echo number_format($total_belanja); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary" name="checkout"> Checkout<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php 
                            if (isset($_POST["checkout"])) {
                                // mencari kode barang dengan nilai paling besar
                                $nofak = mt_rand(100000, 999999);
                                
                                $tanggal_pembelian = date("Y-m-d");
                                
                                $total_pembelian = $total_belanja;

                                //1.menyimpan data ke tabel pembelian
                                $koneksi->query("INSERT INTO pembelian(no_faktur,id_pelanggan,tanggal_pembelian,total_pembelian)
                                    VALUES ('$nofak','$id_pelanggan','$tanggal_pembelian','$total_pembelian')");

                                //mendapatkan id_pembelian barusan
                                $id_pembelian_barusan = $koneksi->insert_id;

                                foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) 
                                    {
                                        //mendapatkan data produk berdasarkan id produk
                                        
                                        $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk= '$id_produk'");
                                        $perproduk = $ambil->fetch_assoc();

                                        $nama= $perproduk['nama_produk'];
                                        $harga= $perproduk['harga_produk'];
                                        $berat= $perproduk['berat'];

                                        $subberat= $perproduk['berat']*$jumlah;
                                        $subharga= $perproduk['harga_produk']*$jumlah;

                                        $koneksi->query("INSERT INTO pembelian_produk(id_pembelian,id_produk,jumlah,nama_produk,harga,berat,subberat,subharga) 
                                VALUES ('$id_pembelian_barusan','$id_produk','$jumlah','$nama_produk','$harga','$berat','$subberat','$subharga')");

                                    //mengkosongkan keranjang pembelian
                                    unset($_SESSION['keranjang']);

                                    echo "<script>alert('Pembelian Sukses');</script>";
                                    echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
                                }
                            }
                        ?>
                    </div>

                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


<?php include 'footer.php' ?>
</body>

</html>
