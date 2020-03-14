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
        Nota - <?=nama;?>
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
                        <li>Nota</li>
                    </ul>
                </div>

                <div class="col-md-12" id="checkout">

                    <div class="box">

						<!-- Nota -->
						<h1>Nota Pembayaran</h1>
						<?php   
                                        $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pembelian='$_GET[id]'");
                                        while($pecah = $ambil->fetch_assoc()){ ?>
 						
							<div class="row">
								<div class="col-md-3">
									<h3>Pembelian</h3>
									<strong>No Faktur : <?php echo $pecah['no_faktur']; ?></strong><br>
									Tanggal : <?php echo $pecah['tanggal_pembelian']; ?><br>
									Total : Rp. <?php echo number_format($pecah['total_pembelian'],0,',','.'); ?>
								</div>
								<div class="col-md-3">
									<h3>Pelanggan</h3>
									<strong>Nama :<?php echo $username['nama_pelanggan'] ?></strong>
									<p> No Telepon :<?php echo $username['telepon_pelanggan'] ?><br>
										Email :<?php echo $username['email_pelanggan'] ?>
									</p>
								</div>
								<div class="col-md-3">
									<h3>Pengiriman</h3>
									<strong>
									Alamat : <?php echo $username['alamat_pelanggan']; ?></strong>
								</div>
								<div class="col-md-3">
									<h3>Status</h3>
									<strong>
									<?php echo $pecah['status_pembelian']; ?></strong>
								</div>
							</div>
<?php } ?>
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Produk</th>
										<th>Harga</th>
										<th>Berat</th>
										<th>Jumlah Produk</th>
										<th>Subberat</th>
										<th>Subtotal</th>
									</tr>
								</thead>
								<tbody>
									<?php $no=1; ?>
									<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk where pembelian_produk.id_pembelian='$_GET[id]'"); ?>
									<?php while($pecah = $ambil->fetch_assoc()){ ?>
									<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $pecah['nama_produk']; ?></td>
										<td>Rp. <?php echo number_format($pecah['harga_produk'],0,',','.'); ?></td>
										<td><?php echo $pecah['berat']; ?></td>
										<td><?php echo $pecah['jumlah']; ?></td>
										<td><?php echo $pecah['subberat']; ?></td>
										<td>Rp. <?php echo number_format($pecah['subharga'],0,',','.'); ?></td>
									</tr>
									<?php $no++ ?>
									<?php $subt = $pecah['subharga']+$subt; } ?>
								</tbody>
								
							</table>
							<div class="row">
								<div class="col-md-12">
									<div class="alert alert-info">
										<p>
											Silahkan anda melakukan pembayaran Rp. <?php echo number_format($subt,0,',','.'); ?> ke 
											<strong>BANK BNI 323-2393740-0239 AN santuyshop</strong>
										</p>
									</div>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
							

</body>
</html>