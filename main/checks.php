<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>

<?php
$id_pem = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM foto_pelanggan WHERE id_pembelian='$id_pem' ");
while ($pecah = $ambil->fetch_assoc()) {
	$nama_lama = $pecah['nama_foto'];
	$id_produk = $pecah['id_produk'];
	// echo "<pre>";
	// print_r($pecah);
	// echo "</pre>"; 

	$koneksi->query("INSERT INTO foto_pelanggan_pem(nama_foto_pem,id_pembelian,id_produk) VALUES('$nama_lama','$id_pem','$id_produk')  ");
	$koneksi->query("DELETE FROM foto_pelanggan WHERE id_pembelian='$id_pem' ");
}
$get = $koneksi->query("SELECT * FROM foto_cover WHERE id_pembelian='$id_pem' ");
$arr = $get->fetch_assoc();
// echo "<pre>";
// print_r($arr);
// echo "</pre>";
$namacoverbar = $arr['nama_foto_cover'];
$idprdk = $arr['id_produk'];
$koneksi->query("INSERT INTO foto_cover_pem(nama_foto_cover_pem,id_pembelian,id_produk) VALUES('$namacoverbar','$id_pem','$idprdk')  ");
$koneksi->query("DELETE FROM foto_cover WHERE id_pembelian='$id_pem' ");

echo "<script>location='nota.php?id=$id_pem'</script>";
?>