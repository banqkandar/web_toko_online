<?php 
error_reporting(0);
$host = "localhost";
$usernmae = "root";
$pass = "";
$db = "santuyshop";

$koneksi = new mysqli($host, $usernmae, $pass, $db);
define('web','http://localhost/tokosantuy/'); //url, kalau ini salah admin juga salah...
define('nama','TokoSantuy');
define('pemilik','SantuyClub');
define('deskripsi','Toko Santuy Merupakan sebuah implementasi dari pesatnya teknologi masa kini di bidang jual beli.');
?>