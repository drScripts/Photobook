<?php
$idprom = $_GET['id'];
$koneksi->query("DELETE FROM promo WHERE id_promo = '$idprom' ");

echo "<script>alert('Promo Dihapus')</script>";
echo "<script>location='index.php?halaman=promo'</script>";