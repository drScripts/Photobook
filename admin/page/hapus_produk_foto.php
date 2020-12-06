<?php 
	$id_prd = $_GET['idprd'];
	$id_fot = $_GET['idfot'];

	$ambil = $koneksi->query("SELECT * FROM foto_produk WHERE id_foto_produk = '$id_fot' ");
	$pecah = $ambil->fetch_assoc();


	$nama = $pecah['nama_produk_foto'];
	unlink("../foto produk/".$nama);
	// echo "<pre>";
	// print_r($nama);
	// echo "</pre>";
	$koneksi->query("DELETE FROM foto_produk WHERE id_foto_produk = '$id_fot' ");

	echo "<script>alert('foto produk telah di hapus')</script>";
	echo "<script>location='index.php?halaman=detailproduk&id=$id_prd'</script>";

 ?>