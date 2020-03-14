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
        Kontak - <?=nama;?>
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

                 <div class="col-md-12" id="customer-order">
                    <div class="box">
                        <h1>Contact Form</h1>

                        <div class="form-area">  
                            <form action="captcha/validate.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="nama" placeholder="Masukkan Nama akun" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email akun" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subjek" required>
                                        </div>
                                        <div class="form-group">
                                        <textarea class="form-control" type="textarea" id="message" name="pesan" placeholder="Isi Pesan !" maxlength="140" rows="7"></textarea>            
                                        </div>
                                        <div class="form-group">
                                            Masukkan CAPTCHA<input  type="text" class="form-control" name="captcha" ><img src="captcha/captcha.php" /><br>
                                        </div>
                                        <input class="btn btn-success" type="submit" name="submit" value="Kirim">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php include("footer.php");?>

</body>

</html>
