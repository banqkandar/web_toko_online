<?php 
require_once("config.php");
session_start();
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
        Kategori - <?=nama;?>
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
 
            <div id="hot">
                <?php 
                    $idna = htmlspecialchars($_GET['id_kategori']);
                    $kategori = $koneksi->query("SELECT * FROM kategori where id_kategori = '$idna'");
                    $ambilz = $kategori->fetch_assoc();
                ?>
                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Produk Terbaru <?php echo $ambilz['nama_kategori'];?></h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
                        <?php   $ambil = $koneksi->query("SELECT * FROM produk where id_kategori = '$idna'");
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