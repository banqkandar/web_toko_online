<?php  
session_start();
$id_produk=addslashes($_GET['id']);
unset($_SESSION["keranjang"][$id_produk]);

echo "<script>alert('Produk telah di hapus');</script>";
echo "<script>location='keranjang.php';</script>";

?>