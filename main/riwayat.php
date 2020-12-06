<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<div class="container">

    <?php
	$ids = $_SESSION['pelanggan']['id_pelanggan'];
	$nama = $_SESSION['pelanggan']['nama_pelanggan'];
	?>

    <?php
	$id = $_SESSION["pelanggan"]["id_pelanggan"];
	$comot = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = $ids ");
	$cimit = $comot->fetch_assoc();
	if (mysqli_num_rows($comot) == 0) {
		echo "<center class='mt-3' style='padding-top:150px;text-transform:capitalize'><h2>anda belum menyelesaikan pembelian apapun ayo belanja</h2></center>
		<a href='index.php' class='mt-5 btn btn-secondary'><i class='fas fa-shopping-cart'></i> Belanja </a>";
		require_once 'templates/footer.php';

		exit();
	}

	?>

    <h1 style=";">Riwayat Belanja <?php echo $nama ?></h1>
    <hr>

    <table class="table table-bordered table-striped table-hover mt-5">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Opsi</th>
        </tr>
        <?php
		$no = 1;
		$riw = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan = '$ids' ");
		while ($perr = $riw->fetch_assoc()) {

			$id_ong = $perr['id_ongkir'];
			$rows = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ong' ");
			$row = $rows->fetch_assoc();

			// echo "<pre>";
			// print_r($perr);
			// print_r($row);
			// echo "</pre>";
			$ongkir = $row['ongkir'];
			$total = $perr['total'];

			$semuanya = $ongkir + $total;
		?>
        <?php if ($ids != $perr['id_pelanggan']) : ?>
        <script>
        location = 'index.php'
        </script>
        <?php endif ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $perr['tanggal_pembelian'] ?></td>
            <td><?php echo $perr['status'] ?>
                <?php if ($perr['status'] == 'pending' || $perr['status'] == 'Unsuccessful Payment') : ?>
                <i class="fas fa-money-bill-wave"></i>
                <?php elseif ($perr['status'] == 'shipped') : ?>
                <i class="fas fa-shipping-fast"></i>
                <?php endif ?>
            </td>
            <td>Rp. <?php echo number_format($semuanya, 0, ',', '.') ?> </td>
            <td class="text-center">
                <a href="viewr.php?id=<?php echo $perr['id_pembelian'] ?>" class="btn btn-secondary"><i
                        class="fas fa-images"></i></a> ||
                <?php if ($perr['status'] == 'pending' || $perr['status'] == 'Unsuccessful Payment') : ?>
                <a href="nota.php?id=<?php echo $perr['id_pembelian'] ?>" class="btn btn-warning"><i
                        class="fas fa-eye"></i> Detail</a> ||
                <a href=""><a href="pembayaran.php?id=<?php echo $perr['id_pembelian'] ?>" class="btn btn-success"><i
                            class="fas fa-money-bill-wave"></i> Bayar</a>
                    <?php elseif ($perr['status'] == 'shipped') : ?>
                    <a href="detail_pengiriman.php?id=<?php echo $perr['id_pembelian'] ?>" class="btn btn-primary"><i
                            class="fas fa-shipping-fast"></i> Detail</a> ||
                    <a href="detail_semua.php?id=<?php echo $perr['id_pembelian'] ?>" class="btn btn-warning"><i
                            class="fas fa-eye"></i> Riwayat</a>
                    <?php else : ?>

                    <?php endif ?>

            </td>
        </tr>
        <?php $no++; ?>
        <?php } ?>
    </table>
</div>


<?php require_once 'templates/footer.php' ?>