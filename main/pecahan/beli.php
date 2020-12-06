<?php
session_start();
if (!isset($_SESSION['pelanggan'])) {
	echo "<script>alert('silahkan login terlebih dahulu')</script>";
	echo "<script>location='../login.php'</script>";
}



include '../db/database.php';
$id_produk = $_GET['id'];
$idtem = $_GET['idtem'];
$uwaw = $_SESSION['pelanggan']['id_pelanggan'];
$pro = $_GET['pro'];

$koneksi->query("INSERT INTO keranjang(id_pelanggan,id_produk,id_tema,nama_pro) VALUES('$uwaw','$id_produk','$idtem','$pro') ");
$id_bar = $koneksi->insert_id;
echo "<script>alert('produk sudah masuk kekeranjang belanja')</script>";
echo "<script>location='../pilih_foto.php?id=$id_produk&idker=$id_bar'</script>";