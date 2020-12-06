<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<?php
$id_produk = $_GET['id'];
$id_ker = $_GET['idker'];
$ambil = $koneksi->query("SELECT * FROM keranjang WHERE id_keranjang='$id_ker' ");
$pecah = $ambil->fetch_assoc();
$pro = $pecah['nama_pro'];

?>
<div class="container">
    <h2 class="text-center">Silahkan Pilih Foto yang akan di masukan ke Photobook minimal 22 foto</h2>

    <form method="post" class="mt-5" class="form-control" enctype="multipart/form-data">
        <div class="col-md-7">
            <div class="form-group">
                <label class="text-danger"><strong>*Foto Cover</strong></label>
                <input type="file" name="cover" class="form-control">
            </div>
            <div class="form-group">
                <label class="text-danger "><strong>*Pilih Foto Isi</strong></label>

                <div class="letak-input">
                    <input class="form-control mb-2 " id="pilih1" type="file" name="foto[]" multiple>
                </div>
                <span class="btn btn-primary btn-tambah"><i class="fas fa-plus"></i></span>
            </div>
        </div>
        <div align="right" class="mt-5 mr-3">
            <button type="submit" id="pilih" class="btn btn-success waw" name="submit"><i class="fas fa-upload"
                    onclick="return confirm('apakah anda yakin?');"></i> Upload</button>
        </div>
</div>


</form>
<?php

if (isset($_POST['submit'])) {
	$user = $_SESSION['pelanggan']['id_pelanggan'];
	$namauser = $_SESSION['pelanggan']['nama_pelanggan'];
	$namafoto = $_FILES["foto"]["name"];
	$lokasifoto = $_FILES["foto"]["tmp_name"];
	$tanggal = date("YmdHis");
	$namafotocover = $_FILES['cover']['name'];
	$lokasifotocover = $_FILES['cover']['tmp_name'];
	$cover = "cover";
	$namacoper = $tanggal . $namauser . $cover . '.' . $pro . '.' . $namafotocover;
	move_uploaded_file($lokasifotocover, "../cover_foto/" . $namacoper);
	$koneksi->query("INSERT INTO foto_cover(id_keranjang,id_produk,id_pelanggan,nama_foto_cover) VALUES ('$id_ker','$id_produk','$user','$namacoper') ");
	// $no = 1;


	foreach ($namafoto as $key => $value) {
		$tiap_lokasi = $lokasifoto[$key];
		$namafiks = $tanggal . $namauser . '.' . $pro . '.' . $key . $value;

		move_uploaded_file($tiap_lokasi, "../foto_pelanggan/" . $namafiks);
		$koneksi->query("INSERT INTO foto_pelanggan(id_pelanggan,id_produk,nama_foto,id_keranjang) VALUES ('$user','$id_produk','$namafiks','$id_ker') ");
		// $no++;

	}
	echo "<script>location='view.php?id=$id_produk&idker=$id_ker'</script>";
	// echo "<pre>";
	// print_r($_FILES['foto']);
	// echo "</pre>";
}

?>





<?php require_once 'templates/footer.php' ?>