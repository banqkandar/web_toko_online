<?php 
$get= addslashes($_GET['id']);
if (!isset($get)) {
    echo "<script>alert('Apa yang mau di hapus?');</script>";
    echo "<script>location='".web."admin';</script>";
} 
$ambil = $koneksi->query("SELECT * FROM produk where id_produk='$get'");
$pecah = $ambil->fetch_assoc();
$gambar = $pecah['gambar'];
if (file_exists("../gambar/$gambar")) 
{
	unlink("../gambar/$gambar");
}

$koneksi->query("DELETE FROM produk where id_produk='$get'");
echo "<script>alert('Produk Berhasil Dihapus');</script>";
echo "<script>location='".web."admin/produk'</script>";
?>