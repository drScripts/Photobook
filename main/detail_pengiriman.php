<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>

<div class="container">
    <?php
	$ids = $_SESSION['pelanggan']['id_pelanggan'];
	$id_pem = $_GET['id'];
	$ambil = $koneksi->query("SELECT * FROM pengiriman WHERE id_pembelian = '$id_pem' ");
	$get = $ambil->fetch_assoc();

	$take = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pem' ");
	$arr = $take->fetch_assoc();
	// echo "<pre>";
	// print_r($arr);
	// echo "</pre>";
	$id_ong = $arr['id_ongkir'];
	$simpan = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ong' ");
	$semua = $simpan->fetch_assoc();
	// echo "<pre>";
	// print_r($semua);
	// echo "</pre>";

	?>
    <?php if ($ids != $arr['id_pelanggan']) : ?>
    <script>
    location = 'riwayat.php'
    </script>
    <?php endif ?>

    <h1>Pengiriman <?php echo $semua['nama_pelanggan'] ?></h1>
    <hr>

    <h3>Alamat = <?php echo $semua['provinsi'] . ',' .  $semua['kota'] . ',' .  $semua['alamat_lengkap'];  ?></h3>
    <h3>Resi pengiriman = <?php echo $get['resi'] ?></h3>

    <a href="riwayat.php" class="mt-5 btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>

</div>




<?php require_once 'templates/footer.php' ?>