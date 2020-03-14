<?php 
require_once("config.php");
session_start();
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login !');</script>";
    echo "<script>location='login.php';</script>";
}elseif($_SESSION['admin']){
    echo "<script>location='admin';</script>";
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
        Riwayat - <?=nama;?>
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
                        <form method="post" action="nota.php">
                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout.php"><i class="fa fa-map-marker"></i><br>Alamat</a>
                                </li>
                                <!-- <li><a href="checkout2.html"><i class="fa fa-truck"></i><br>Delivery Method</a>
                                </li>
                                <li><a href="checkout3.html"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li> -->
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Riwayat Pembelanjaan</a>
                                </li>
                            </ul>

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
                                                <td>Rp. <?php echo number_format($pecah['harga_produk'],0,',','.'); ?></td>
                                                <td>Rp. <?php echo number_format($Subharga,0,',','.'); ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php $sub = $Subharga+$sub; endforeach?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total Pembayaran</th>
                                                <th colspan="2">Rp. <?php echo number_format($sub,0,',','.'); ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>

                            <div class="box-footer">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary"> Tampilkan Nota<i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

<?php  include 'footer.php' ;?>
</body>

</html>