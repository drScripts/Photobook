<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>

<?php
$idfoto = $_GET['idfoto'];
$ambil = $koneksi->query("SELECT * FROM foto_pelanggan WHERE id_foto_pelanggan='$idfoto' ");
$pecah = $ambil->fetch_assoc();
$namafoto = $pecah['nama_foto'];
$idker = $pecah['id_keranjang'];
$get = $koneksi->query("SELECT * FROM keranjang WHERE id_keranjang = '$idker' ");
$each = $get->fetch_assoc();
$pro = $each['nama_pro'];

?>
<h1 class="text-center">Foto Yang Akan di Ubah</h1>
<hr>
<div class="text-center">
    <img src="../foto_pelanggan/<?php echo $namafoto ?>" width="250px">
</div>
<h1 class="text-center mt-5">Ganti Foto</h1>
<hr>

<div align="center">
    <form class="mt-5" method="post" enctype="multipart/form-data">
        <input type="file" name="foto[]">
        <button name="ubah" type="submit" class="btn btn-primary"><i class="fas fa-edit"
                onclick="return confirm('apakah anda yakin mau mengubah?');"></i> Ganti</button>
    </form>
</div>

<?php

if (isset($_POST["ubah"])) {
	$idprdk = $_GET['idproduk'];
	$namauser = $_SESSION['pelanggan']['nama_pelanggan'];
	$namafoto = $_FILES["foto"]["name"];
	$lokasifoto = $_FILES["foto"]["tmp_name"];
	$tanggal = date("YmdHis");

	$namafotodulu = $pecah['nama_foto'];
	// echo "<pre>";
	// print_r($namafotodulu);
	// echo "</pre>";
	if ($namafotodulu != $namafoto) {
		unlink("../foto_pelanggan/" . $namafotodulu);
	}
	foreach ($namafoto as $key => $value) {
		$tiap_lokasi = $lokasifoto[$key];
		$namafiks = $tanggal . $namauser . '.' . $pro . '.' . $value;
		move_uploaded_file($tiap_lokasi, "../foto_pelanggan/" . $namafiks);

		$koneksi->query(" UPDATE foto_pelanggan SET nama_foto='$namafiks' WHERE id_foto_pelanggan='$idfoto' ");
		$idker = $pecah['id_keranjang'];
		echo "<script>alert('foto sudah dirubah')</script>";
		echo "<meta http-equiv='refresh' content='1;url=view.php?id=$idprdk&idker=$idker'>";
	}
}




?>






<?php require_once 'templates/footer.php' ?>