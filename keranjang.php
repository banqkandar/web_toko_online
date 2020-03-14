 <?php 
require_once("config.php");
session_start();
if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
    echo "<script>alert('Keranjang kosong, silahkan pilih produk terlebih dahulu.');</script>";
    echo "<script>location='index.php';</script>";
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
        Keranjang - <?=nama;?>
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
                        <li>Keranjang</li>
                    </ul>
                </div>

                <div class="col-md-12" id="basket">

                    <div class="box">

                        <form method="post" action="checkout.php">

                            <h1>Keranjang</h1>
                            <p class="text-muted">Kamu memiliki <?php echo count($_SESSION['keranjang']);?> Produk di Keranjang.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga/Barang</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah):
                                        $ambil = $koneksi->query("SELECT * FROM produk where id_produk='$id_produk'");
                                        $pecah = $ambil->fetch_assoc();
                                        $Subharga= $pecah['harga_produk']*$jumlah; ?>
                                        <tr>
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
                                            <td>Rp. <?php echo number_format($pecah['harga_produk'],0,',','.'); ?></td>
                                            <td>Rp. <?php echo number_format($Subharga,0,',','.'); ?></td>
                                            <td><a href="hapuskeranjang.php?id=<?php echo $id_produk ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <?php $sub = $Subharga+$sub; endforeach?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th colspan="2">Rp. <?php echo number_format($sub,0,',','.'); ?></th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="index.php" class="btn btn-default"><i class="fa fa-chevron-left"></i> Melanjutkan Berbelanja</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Bayar Produk Sekarang <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
<?php include("footer.php");?>
</body>

</html>