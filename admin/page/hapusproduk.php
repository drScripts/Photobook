<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[gila]'");
$pecah = $ambil->fetch_assoc();
$foto = $pecah['foto'];

if (file_exists("../foto produk/$foto")) 
{
	unlink("../foto produk/$foto");
}




$koneksi->query("DELETE FROM produk WHERE id_produk='$_GET[gila]' ");

echo "<script>alert('produk telah terhapus')</script>";
echo "<script>location='index.php?halaman=produk'</script>";
 ?>
 