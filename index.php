<?php 
require_once("config.php");
session_start();
if (isset($_SESSION['pelanggan'])) {
    $id_pelanggan = $_SESSION['pelanggan'];
}
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
        Home - <?=nama;?>
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
                    <div id="main-slider">
                        <div class="item">
                            <img src="img/santuyshop.png" alt="" class="img-responsive">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/2.png" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive" src="img/3.png" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-lock"></i>
                                </div>

                                <h3>Aman</h3>
                                <p>Dengan menggunakan layanan kami, anda aman dari penipuan.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3>Nyaman</h3>
                                <p>Demi kenyamanan Konsumen, kami memperhatikan tampilan website yang dinamis.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3>Cepat</h3>
                                <p>Kami sangat cepat dalam hal respon.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Produk Terbaru Kami</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        <?php   $ambil = $koneksi->query("SELECT * FROM produk");
                                while($perproduk = $ambil->fetch_assoc()){ ?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="detail.php?id_produk=<?php echo $perproduk['id_produk']; ?>">
                                                <img src="gambar/<?php echo $perproduk['gambar']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="detail.php?id_produk=<?php echo $perproduk['id_produk']; ?>">
                                                <img src="gambar/<?php echo $perproduk['gambar']; ?>" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="detail.php?id_produk=<?php echo $perproduk['id_produk']; ?>" class="invisible">
                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <h3><a href="detail.php?id_produk=<?php echo $perproduk['id_produk']; ?>"><?php echo $perproduk['nama_produk']; ?></a></h3>
                                    <p class="price">Rp. <?php echo number_format($perproduk['harga_produk'],0,',','.'); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
<?php include("footer.php");?>

</body>

</html>