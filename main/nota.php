<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<div class="container">
    <?php $nama = $_SESSION['pelanggan']['nama_pelanggan'];
	$idslogin = $_SESSION['pelanggan']['id_pelanggan'];
	?>
    <h1>Nota <?php echo $nama ?></h1>
    <hr><br>
    <?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$_GET[id]' "); ?>
    <?php $detail = $ambil->fetch_assoc(); ?>
    <?php $idsnot = $detail['id_pelanggan'] ?>
    <?php if ($idslogin !== $idsnot) : ?>
    <?php echo "<script>location('riwayat.php')</script>";
		exit(); ?>
    <?php endif ?>

    <?php
	$id_ongkir = $detail['id_ongkir'];
	$get = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir'");
	$each = $get->fetch_assoc();

	// echo "<pre>";
	// print_r($each);
	// echo "</pre>";
	?>

    <!-- <pre> -->
    <!-- <?php print_r($detail) ?> -->
    <!-- </pre> -->

    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Tema</th>
            <th>Subtotal</th>
        </tr>
        <?php $no = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$_GET[id]'  ") ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
        <tr>
            <?php

				$idtem = $pecah['id_tema'];
				$select = $koneksi->query("SELECT * FROM tema WHERE id_tema = '$idtem' ");
				$semua = $select->fetch_assoc();
				?>
            <td><?php echo $no ?></td>
            <td><?php echo $pecah['nama_produk'] ?></td>
            <td>Rp. <?php echo number_format($pecah['harga']) ?></td>
            <td><?php echo $semua['nama_tema'] ?></td>
            <td>Rp. <?php echo number_format($pecah['harga'] * $pecah['jumlah']) ?></td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </table>
    <br>
    <hr><br>

    <div class="row">
        <div class="col-md-4">
            <h3>Pembelian</h3>
            Nomor Pembelian = <?php echo $detail['id_pembelian'] ?><br>
            Tanggal Pembelian = <?php echo $detail['tanggal_pembelian'] ?><br>
            Total pembelian = Rp. <?php echo number_format($detail['total'], 0, ',', '.') ?>
        </div>
        <div class="col-md-4">
            <h3>Pelanggan</h3>
            Nama = <?php echo $detail['nama_pelanggan'] ?><br>
            Telepon = <?php echo $detail['telepon_pelanggan'] ?><br>
            Email = <?php echo $detail['email_pelanggan'] ?> <br>
        </div>
        <div class="col-md-4">
            <h3>Pengirimian</h3>
            Ongkos kirim = Rp. <?php echo number_format($each['ongkir'], 0, ',', '.'); ?><br>
            <?php $total = $detail['total'] + $each['ongkir']; ?>Total pembayaran = Rp.
            <?php echo number_format($total, 0, ',', '.') ?> <br>
            Alamat = <?php echo $each['provinsi'] . ' ' ?>, <?php echo $each['kota'], ' ' ?>,
            <?php echo $each['alamat_lengkap'] . ' '; ?> <br>
            Estimasi pengiriman = <?php echo $each['estimasi'] . ' Hari' ?><br><br>
        </div>
    </div>
    <hr><br>


    <div class="row">
        <div class="col-md-9">
            <?php $norek =  $koneksi->query("SELECT * FROM  rek ");
			while ($array = $norek->fetch_assoc()) {

				echo "<div class='alert alert-info'>Silahkan Lakukan Pembayaran Sebesar Rp." . number_format($total, 0, ',', '.') . " Ke " . $array['no_rek'] . ' (' . $array['bank'] . ')' . " AN. " . $array['atas_nama'] . "</div> ";
			}
			?>


        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <?php $cari =  $koneksi->query("SELECT * FROM admin WHERE username = 'claresta' ");
			$arr = $cari->fetch_assoc();
			// echo "<pre>";
			// print_r($arr);
			// echo "</pre>";

			?>


        </div>
    </div>

    <div class="text-right">
        <?php $id_pem = $_GET['id'] ?>
        <a href="pembayaran.php?id=<?php echo $id_pem ?>" class="btn btn-success mt-5"><i
                class="fas fa-money-bill-wave"></i> Pembayaran</a>
    </div>
    <div class="text-light text-center mt-5">
        <div class=" text-center">
            <div class="alert bg-dark text-light">Untuk informasi lebih lanjut silahkan hubungi ke No.
                <?php echo $arr['no_telp_admin'] ?></div>
        </div>
    </div>
</div>
<?php require_once 'templates/footer.php' ?>