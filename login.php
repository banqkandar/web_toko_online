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
        Masuk - <?=nama;?>
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
                        <li>Masuk</li>
                    </ul>

                </div>
                <div class="col-md-12">
                    <div class="box">
                        <h1>Masuk</h1>

                        <p class="lead">Belum mempunyai akun?</p>
                        <p class="text-muted">Jika anda belum mempunyai akun, harap Klik <a href="daftar.php">disini</a> untuk daftar.</p>

                        <hr>

                        <form method="post" action="">
                            <?php if($_POST){
                                $username   = $_POST['email'];
                                $userpass   = $_POST['pswd'];
                                $cek_login = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$username'");
                                $f = $cek_login->fetch_assoc();
                                if($cek_login->num_rows==1){
                                    if(password_verify($userpass,$f['password_pelanggan'])) {
                                        $_SESSION['pelanggan'] = $f['id_pelanggan'];
                                        $_SESSION['lastlog']  = date('Y-m-d h:i:s');
                                        echo "<script>alert('Anda berhasil login');</script>";
                                        echo "<script>location='index.php';</script>";
                                    }else{
                                        echo '<div class="alert alert-danger">Username atau Password anda salah!</div>';
                                    }
                                }else{
                                    $cek_admin = $koneksi->query("SELECT * FROM admin WHERE username_admin = '$username' AND password_admin = '$userpass'");
                                    $z = $cek_admin->fetch_assoc();
                                    $password = $z['password_admin'];
                                    if($cek_admin->num_rows==1){
                                        if ($userpass == $password) {
                                            $_SESSION['admin']   = $z['id_admin'];
                                            $_SESSION['lastlog']  = date('Y-m-d h:i:s');
                                            echo "<script>location='admin';</script>";
                                        }else{
                                            echo '<div class="alert alert-danger">Username atau Password anda salah!</div>';
                                        }
                                    }else{
                                        echo '<div class="alert alert-danger">Username atau Password anda salah!</div>';
                                    }
                                }
                            }
                            ?>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="pswd">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Masuk</button>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
<?php include("footer.php");?>

</body>

</html>