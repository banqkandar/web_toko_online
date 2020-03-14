<?php 
require_once("config.php");
session_start();
if (isset($_SESSION['pelanggan'])) {
    header("location:index.php");
}elseif(isset($_SESSION['admin'])){
    header("location:admin");
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
        Daftar - <?=nama;?>
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
                        <li>Daftar</li>
                    </ul>

                </div>
                <div class="col-md-12">
                    <div class="box">
                        <h1>Daftar Akun Baru</h1>

                        <p class="lead">Sudah mempunyai akun?</p>
                        <p class="text-muted">Klik <a href="login.php">disini</a> untuk login.</p>

                        <hr>

                        <form action="" method="post">
                    <?php
                        if($_POST){
                            $nama = $koneksi->real_escape_string(ucwords($_POST['nama']));
                            $password = $_POST['password'];
                            $encrypt = password_hash($password,PASSWORD_DEFAULT);
                            $email = $koneksi->real_escape_string($_POST['email']);
                            $phone = $koneksi->real_escape_string($_POST['telepon']);
                            $cek_email = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan ='".$email."'");
                            $has    = $cek_email->fetch_array();
                            if($has){
                                echo '<div class="alert alert-danger">Email yang anda masukkan sudah di gunakan user lain!</div>';
                            }else{
                                if(!preg_match("/^[a-z A-Z]*$/",$nama)){
                                    echo '<div class="alert alert-danger">Nama Hanya huruf yang diijinkan, dan tidak boleh menggunakan spasi.</div>';
                                }else{
                                echo '<div class="alert alert-success">Sukses...Silahkan ke halaman login</div>';
                                $daftar = "INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) VALUES ('$email','$encrypt','$nama','$phone')";
                                $submit = $koneksi->query($daftar);
                            }
                            }

                        }?>
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" name="nama" required="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" required="">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required="">
                            </div>
                            <div class="form-group">
                                <label for="telepon">Telepon</label>
                                <input type="number" class="form-control" name="telepon" required="">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
<?php include("footer.php");?>

</body>

</html>