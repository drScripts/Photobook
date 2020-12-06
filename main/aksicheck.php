<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php
$berat = $_POST["berat"];
$provinsi = $_POST["di_prov"];
$kota = $_POST["di_kota"];
$type = $_POST["type"];
$kodepos = $_POST["kodepos"];
$ekspedisi = $_POST["ekspedisi_kurir"];
$jenis = $_POST["jenis_paket"];
$estimasi = $_POST["estimasi"];
$ongkir = $_POST["ongkir"];
$alamat_lengkap = $_POST["alamat_lengkap"];
$nama = $_SESSION['pelanggan']['nama_pelanggan'];
$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
$total = $_POST["total"];

// echo $total;
$id_use = $_SESSION['pelanggan']['id_pelanggan'];
$select = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan = '$id_use' ");
$persel = $select->fetch_assoc();
$alamat_dulu = $persel['alamat_lengkap'];

if (isset($provinsi)) {
	$koneksi->query("INSERT INTO ongkir (nama_pelanggan,berat,provinsi,kota,type,kodepos,ekspedisi_kurir,jenis_paket,estimasi,ongkir,alamat_lengkap) VALUES ('$nama','$berat','$provinsi','$kota','$type','$kodepos','$ekspedisi','$jenis','$estimasi','$ongkir','$alamat_lengkap') ");
} else {
	header('Location: checkout.php');
}

$tanggal = date("Y-m-d");
$ongkir_barusan = $koneksi->insert_id;
$koneksi->query("INSERT INTO pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total)VALUES ( '$id_pelanggan','$ongkir_barusan','$tanggal','$total' ) ");

$id_pembelian = $koneksi->insert_id;
// echo $id_pembelian;
$nyomot = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan = '$id_use' ");
while ($pecahin = $nyomot->fetch_assoc()) {
	$koneksi->query("UPDATE foto_pelanggan SET id_pembelian='$id_pembelian' WHERE id_pelanggan='$id_use' AND id_produk='$pecahin[id_produk]' ");
	$koneksi->query("UPDATE foto_cover SET id_pembelian='$id_pembelian' WHERE id_pelanggan='$id_use' AND id_produk='$pecahin[id_produk]'  ");
}



$get = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan = '$id_pelanggan'");
while ($each = $get->fetch_assoc()) {
	$jumlahs = $each["jumlah"];
	$ids_produk = $each["id_produk"];
	$idtem = $each['id_tema'];
	$tarik = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$ids_produk' ");
	while ($ulur = $tarik->fetch_assoc()) {
		$hargas = $ulur['harga'];
		$namas = $ulur['nama_produk'];
		$koneksi->query("INSERT INTO pembelian_produk (id_pembelian,id_produk,nama_produk,harga,jumlah,id_tema) VALUES ('$id_pembelian','$ids_produk','$namas','$hargas','$jumlahs','$idtem') ");
	}
}


$koneksi->query("DELETE FROM keranjang WHERE id_pelanggan = '$id_pelanggan' ");
echo "<script>location = 'checks.php?id=$id_pembelian';</script>";


?>