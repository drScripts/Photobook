<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<?php
$id_pembelian = $_GET['id'];
$id_produk = $_GET['idprdk'];
?>
<div class="container">

    <h1 class="text-center">Cover Foto</h1>
    <hr>
    <div class="text-center">
        <?php
		$ambil = $koneksi->query("SELECT * FROM foto_cover_pem WHERE id_produk='$id_produk' AND id_pembelian='$id_pembelian' ");
		$pecah = $ambil->fetch_assoc();
		// echo "<pre>";
		// print_r($pecah);
		// echo "</pre>"; 
		$namacover = $pecah['nama_foto_cover_pem'];
		?>
        <img src="../cover_foto/<?= $namacover ?>" width="250px">
    </div>

    <h1 class="text-center mt-5">Isi Foto</h1>
    <hr>
    <div class="row">

        <?php
		$get = $koneksi->query("SELECT * FROM foto_pelanggan_pem WHERE id_produk='$id_produk' AND id_pembelian='$id_pembelian' ");
		while ($arr = $get->fetch_assoc()) {
			// echo "<pre>";
			// print_r($arr);
			// echo "</pre>";

		?>

        <div class="col-md-3">

            <img src="../foto_pelanggan/<?= $arr['nama_foto_pem'] ?>" class="img-responsive mt-3" width="250px"
                height="250px">

        </div>
        <?php } ?>

    </div>

    <a href="viewr.php?id=<?php echo $id_pembelian ?>" class="btn btn-secondary mt-5"><i class="fas fa-arrow-left"></i>
        Back</a>
</div>


<?php require_once 'templates/footer.php' ?>