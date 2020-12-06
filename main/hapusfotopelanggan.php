<?php session_start() ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'db/database.php' ?>
<?php
$id_foto = $_GET['idfoto'];
$id_produk = $_GET['idproduk'];
$id_user = $_SESSION['pelanggan']['id_pelanggan'];
// hapus file
$ambil = $koneksi->query("SELECT * FROM foto_pelanggan WHERE id_foto_pelanggan='$id_foto' AND id_produk='$id_produk' AND id_pelanggan='$id_user'  ");
$pecah = $ambil->fetch_assoc();

$namafile = $pecah['nama_foto'];
// hapus deh
unlink("../foto_pelanggan/" . $namafile);

// echo "<pre>";
// print_r($namafile);
// echo "</pre>";




// hapus db
$idker = $pecah['id_keranjang'];
$koneksi->query("DELETE FROM foto_pelanggan WHERE id_foto_pelanggan='$id_foto' AND id_produk='$id_produk' AND id_pelanggan='$id_user' ");

echo "<script>alert('foto dihapus')</script>";
echo "<script>location='view.php?id=$id_produk&idker=$idker'</script>";

?>