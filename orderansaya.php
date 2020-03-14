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

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>Riwayat Pembelian</h1>

                        <p class="lead">Catatan Riwayat Pembelian.</p>
                        <p class="text-muted">Pembelian yang sudah anda lakukan akan tersimpan di table, seperti di bawah ini.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No Faktur</th>
                                        <th>Tanggal</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php   
                                        $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan where pembelian.id_pelanggan='$id_pelanggan'");
                                        while($pecah = $ambil->fetch_assoc()){ ?>
                                    <tr>
                                        <th><?php echo $pecah['no_faktur']; ?></th>
                                        <td><?php echo $pecah['tanggal_pembelian']; ?></td>
                                        <td>Rp. <?php echo number_format($pecah['total_pembelian'],0,',','.'); ?></td>
                                        <td><?php if($pecah['status_pembelian']=="Belum Lunas"){?>
                                            <a class="btn btn-danger btn-sm">Belum Lunas</a>
                                            <?php }else{ ?>
                                            <a class="btn btn-info btn-sm">Lunas</a>
                                            <?php } ?>
                                        </td>
                                        <td><a href="orderanaku.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-primary btn-sm">Lihat</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php include("footer.php");?>

</body>

</html>