<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>



<div class="container">
    <h1 style="text-transform: capitalize;">Daftar Produk Yang di beli</h1>
    <hr>
    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Tema</th>
            <th>Aksi</th>
        </tr>
        <?php
		$no = 1;
		$id_pem = $_GET['id'];
		$ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk JOIN tema ON pembelian_produk.id_tema=tema.id_tema WHERE pembelian_produk.id_pembelian = '$id_pem' ");
		while ($get = $ambil->fetch_assoc()) {
			// echo "<pre>";
			// print_r($get);
			// echo "</pre>";

		?>
        <tr>
            <td><?= $no  ?></td>
            <td><?= $get['nama_produk'] ?></td>
            <td>Rp. <?= number_format($get['harga'], 0, ',', '.') ?></td>
            <td><?= $get['nama_tema']  ?></td>
            <td>
                <a href="viewr2.php?id=<?= $id_pem ?>&idprdk=<?= $get['id_produk'] ?>"
                    class="btn btn-secondary btn-sm"><i class="fas fa-images"></i></a>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </table>
    <a href="riwayat.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<?php require_once 'templates/footer.php' ?>