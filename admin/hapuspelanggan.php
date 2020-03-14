<?php 
$get= addslashes($_GET['id']);
if (!isset($get)) {
    echo "<script>alert('Apa yang mau di hapus?');</script>";
    echo "<script>location='".web."admin';</script>";
}
$ambil = $koneksi->query("SELECT * FROM pelanggan where id_pelanggan='$get'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM pelanggan where id_pelanggan='$get'");
echo "<script>alert('Pelanggan Berhasil Dihapus');</script>";
echo "<script>location='".web."admin/pelanggan'</script>";
?>