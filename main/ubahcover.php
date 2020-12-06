<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<?php
$id_cover = $_GET['id'];

$ambil = $koneksi->query("SELECT * FROM foto_cover WHERE id_foto_cover='$id_cover' ");
$pecah = $ambil->fetch_assoc();
$idprdk = $pecah['id_produk'];
$idker = $pecah['id_keranjang'];
$get = $koneksi->query("SELECT * FROM keranjang WHERE id_keranjang='$idker' ");
$each = $get->fetch_assoc();
$pro = $each['nama_pro'];
?>
<div class="text-center">
    <img src="../cover_foto/<?php echo $pecah['nama_foto_cover'] ?>" width="250px">
</div>

<h1 class="text-center mt-5">Ganti Foto Cover</h1>
<hr>



<div align="center">
    <form class="mt-5" method="post" enctype="multipart/form-data">
        <input type="file" name="cover">
        <button name="ubah" type="submit" class="btn btn-primary"><i class="fas fa-edit"
                onclick="return confirm('apakah anda yakin mau mengubah?');"></i> Ganti</button>
    </form>
</div>
<?php

if (isset($_POST["ubah"])) {
	$namauser = $_SESSION['pelanggan']['nama_pelanggan'];
	$namacover = $_FILES["cover"]["name"];
	$lokasicover = $_FILES["cover"]["tmp_name"];
	$tanggal = date("YmdHis");
	$namafotodulu = $pecah['nama_foto_cover'];
	$cover = "cover";
	// echo "<pre>";
	// print_r($namafotodulu);
	// echo "</pre>";
	if ($namafotodulu != $namacover) {
		// echo "haaii gengss";
		unlink("../cover_foto/" . $namafotodulu);
	}
	$namacoper = $tanggal . $namauser . $cover . '.' . $pro . '.' . $namacover;
	move_uploaded_file($lokasicover, "../cover_foto/" . $namacoper);
	$koneksi->query(" UPDATE foto_cover SET nama_foto_cover='$namacoper' WHERE id_foto_cover='$id_cover' ");

	echo "<script>alert('foto cover sudah dirubah')</script>";
	echo "<meta http-equiv='refresh' content='1;url=view.php?id=$idprdk&idker=$idker'>";
}




?>



<?php require_once 'templates/footer.php' ?>