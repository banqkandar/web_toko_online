<?php 
require_once("config.php");
session_start();
$idna=addslashes($_GET['id_produk']);
$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$idna' ");
$perproduk = $ambil->fetch_assoc();
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
        Detail - <?=nama;?>
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
                        <li><a href="#">Home</a>
                        </li>
                        </li>
                        <li><?php echo $perproduk['nama_produk']; ?></li>
                    </ul>

                </div>
                <div class="col-md-12">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <img src="gambar/<?php echo $perproduk['gambar']; ?>" alt="" class="img-responsive">
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $perproduk['nama_produk']; ?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Klik disini untuk lihat deskripsi barang.</a>
                                </p>
                                <p class="price">Rp. <?php echo number_format($perproduk['harga_produk'],0,',','.'); ?></p>
                                <form method="POST">
                                <label>Jumlah Barang : </label>
                                <div class="input-group">
                                    <input type="number" name="jumlah" class="form-control" min="1" value="1">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" name="beli"><i class="fa fa-shopping-cart"></i> Tambahkan ke Keranjang </button>
                                    </div>
                                </div>
                                </form>
                                <?php  $id_produk = $perproduk['id_produk'];
                                        if (isset($_POST["beli"])) {
                                            $jumlah = $_POST["jumlah"];
                                            $_SESSION["keranjang"][$id_produk] += $jumlah;
                                            echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
                                            echo "<script>location='keranjang.php';</script>";
                                        } 
                                ?>
                            </div>

                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Deskripsi Produk</h4>
                            <p><?php echo $perproduk['deskripsi_produk'];?></p>
                            <h4>Berat Barang</h4>
                            <ul>
                                <li><?php echo $perproduk['berat'];?> Gram </li>
                            </ul>

                            <blockquote>
                                <p><em>Gunakan metode COD untuk transaksi yang lebih aman.</em>
                                </p>
                            </blockquote>

                            <hr>
                    </div>

                </div>
            </div>
        </div>
<?php include("footer.php");?>
</body>

</html>