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
$ambildong = $ambil->fetch_assoc();
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
        Akun Saya - <?=nama;?>
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
                                <li>
                                    <a href="orderansaya.php"><i class="fa fa-list"></i> Riwayat Pembelian</a>
                                </li>
                                 <li class="active">
                                    <a href="akunsaya.php"><i class="fa fa-user"></i> Akun Saya</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>Akun  Saya</h1>
                        <p class="lead">Ganti Password kamu disini.</p>
                        <form action="" method="post">
                            <?php 
                            if($_POST['password_old']){
                                $plama = $_POST['password_old'];
                                $pbaru = $_POST['password_1'];
                                $encryptplama = password_hash($plama,PASSWORD_DEFAULT);
                                $encryptpbaru = password_hash($pbaru,PASSWORD_DEFAULT);
                                $cek_password = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan ='$id_pelanggan'");
                                $cekp = $cek_password->fetch_assoc();
                                $user_password = $cekp['password_pelanggan'];
                                if(password_verify($plama,$user_password)){
                                    $submit = $koneksi->query("UPDATE pelanggan SET password_pelanggan='$encryptpbaru' WHERE id_pelanggan='$id_pelanggan'");
                                    echo '<div class="alert alert-success">Sukses, Password baru anda adalah '.$pbaru.'</div>';
                                }else{
                                    echo '<div class="alert alert-danger">Password Lama anda salah!</div>';
                                }
                            }
                            ?>
                        
                            <div class="form-group">
                                <label for="password_old">Password Lama</label>
                                <input type="password" class="form-control" name="password_old">
                            </div>
                            <div class="form-group">
                                <label for="password_1">Password Baru</label>
                                <input type="password" class="form-control" name="password_1">
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Password Baru</button>
                            </div>
                        </form>

                        <hr>

                        <h3>Info Akun</h3>
                        <form action="" method="post">
                            <?php if($_POST['nama']){
                                $nama_pelanggan=$koneksi->real_escape_string($_POST['nama']);
                                $email=$koneksi->real_escape_string($_POST['email']);
                                $telepon=$koneksi->real_escape_string($_POST['telepon']);
                                $alamat=$koneksi->real_escape_string($_POST['alamat']); 

                                if(!preg_match("/^[a-z A-Z]*$/",$nama_pelanggan)){
                                    echo '<div class="alert alert-danger">Nama Hanya huruf yang diijinkan, dan tidak boleh menggunakan spasi.</div>';
                                }else{
                                    $koneksi ->query("UPDATE pelanggan SET nama_pelanggan='$nama_pelanggan' , email_pelanggan='$email',telepon_pelanggan='$telepon', alamat_pelanggan='$alamat' WHERE id_pelanggan='$id_pelanggan'");
                                    echo '<div class="alert alert-success">Sukses, Data telah di simpan</div>';
                                }
                            }

                            ?>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?php echo $ambildong['nama_pelanggan'];?>" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $ambildong['email_pelanggan'];?>"required="">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" required=""><?php echo $ambildong['alamat_pelanggan'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Telepon</label>
                                <input type="number" class="form-control" name="telepon" value="<?php echo $ambildong['telepon_pelanggan'];?>" required="">
                            </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" class="btn btn-primary" name="info"><i class="fa fa-save"></i> Simpan</button>
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