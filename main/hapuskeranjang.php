<?php session_start() ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'db/database.php' ?>
<?php
$id_keranjang = $_GET['id'];
$id_produk = $_GET['idprdk'];
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$ambil = $koneksi->query("SELECT * FROM foto_pelanggan WHERE id_pelanggan = '$id_pelanggan' AND id_produk = '$id_produk' ");
while ($pecah = $ambil->fetch_assoc()) {

	// hapus file
	$namafoto = $pecah['nama_foto'];
	$id_foto  = $pecah['id_foto_pelanggan'];
	unlink("../foto_pelanggan/" . $namafoto);
	// hapus db
	$koneksi->query("DELETE FROM foto_pelanggan WHERE id_foto_pelanggan='$id_foto' AND id_produk='$id_produk' AND id_pelanggan='$id_pelanggan' ");
}
$get = $koneksi->query("SELECT * FROM foto_cover WHERE id_keranjang = '$id_keranjang' ");
$arr = $get->fetch_assoc();
// print_r($arr);
$cover = $arr['nama_foto_cover'];
unlink("../cover_foto/" . $cover);
$koneksi->query("DELETE FROM foto_cover WHERE id_keranjang = '$id_keranjang' ");
$koneksi->query("DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang' ");
echo "<script>alert('Keranjang sudah di hapus')</script>";
echo "<script>location='keranjang.php' </script>";
?>