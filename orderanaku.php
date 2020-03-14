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
        Riwayat Pembelian - <?=nama;?>
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
                        <li>Akun Saya</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Menu Akun</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active">
                                    <a href="orderansaya.php"><i class="fa fa-list"></i> Riwayat Pembelian</a>
                                </li>
                                <li>
                                    <a href="akunsaya.php"><i class="fa fa-user"></i> Akun Saya</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
                <?php $ambilfaktur = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");
                      $faktur = $ambilfaktur->fetch_assoc();
                ?>
                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>No Faktur <?php echo $faktur['no_faktur'];?></h1>

                        <p class="lead">Pembelian #<?php echo $faktur['no_faktur'];?> Dilakukan pada tanggal <?php echo $faktur['tanggal_pembelian'];?>.</p>
                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Jumlah</th>
                                        <th>Harga Produk</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                    $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'");
                                    while($pecah = $ambil->fetch_assoc()){
                                    $saya = $pecah['harga_produk']*$pecah['jumlah']; ?>
                                    <tr>
                                        <td>
                                            <a href="#">
                                                <img src="gambar/<?php echo $pecah['gambar']; ?>" alt="<?php echo $pecah['nama_produk']; ?>">
                                            </a>
                                        </td>
                                        <td><a href="detail.php?id_produk=<?php echo $pecah['id_produk']; ?>"><?php echo $pecah['nama_produk']; ?></a>
                                        </td>
                                        <td><?php echo $pecah['jumlah']; ?></td>
                                        <td>Rp. <?php echo number_format($pecah['harga_produk'],0,',','.'); ?></td>
                                        <td>Rp. <?php echo number_format($saya,0,',','.'); ?></td>
                                    </tr>
                                <?php $sub = $saya+$sub; } ?>
                                </tbody>
                                <tfoot>
                                        <th colspan="5" class="text-right">Total</th>
                                        <th>Rp. <?php echo number_format($saya,0,',','.'); ?></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include("footer.php");?>

</body>

</html>