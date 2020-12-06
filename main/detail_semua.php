<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<?php
$id_pem = $_GET['id'];
$ids = $_SESSION['pelanggan']['id_pelanggan'];
$nama = $_SESSION['pelanggan']['nama_pelanggan'];
?>
<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pembayaran ON pembelian.id_pembelian=pembayaran.id_pembelian JOIN pengiriman ON pengiriman.id_pembelian=pembelian.id_pembelian WHERE pembelian.id_pembelian = '$id_pem' ");
$perr = $ambil->fetch_assoc();
// echo "<pre>";
// print_r($perr);
// echo "</pre>";

if ($ids != $perr['id_pelanggan']) {
	echo "<script>location='index.php'</script>";
	exit();
} elseif ($perr['status'] !== 'shipped') {
	echo "<script>alert('belum ada pengiriman barang yang di lakukan')</script>";
	echo "<script>location='riwayat.php'</script>";
	exit();
}
?>

<div class="container">
    <h1>Pembelian</h1>
    <hr>
    <table class="table table-bordered table-striped table-hover mt-5">
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>jumlah</th>
            <th>subtotal</th>
        </tr>
        <tr>
            <?php
			$no = 1;
			$take = $koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian = '$id_pem'  ");
			while ($pecah = $take->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $no ?></td>
            <td><?php echo $pecah['nama_produk'] ?></td>
            <td>Rp. <?php echo number_format($pecah['harga']) ?></td>
            <td><?php echo $pecah['jumlah'] ?></td>
            <td>Rp. <?php echo number_format($pecah['harga'] * $pecah['jumlah']) ?></td>
        </tr>

        <?php $no++ ?>
        <?php } ?>
        </tr>
    </table>

    <h1 class="mt-5">Pembayaran</h1>
    <hr>
    <div class="row mt-5">
        <div class="col-md-6">
            <img src="../pembayaran/<?php echo $perr['bukti'] ?>" width='350px'>
        </div>
        <div class="col-md-6">
            <table class="table">
                <tr>
                    <th>Nama Pengirim</th>
                    <td><?php echo $perr['nama'] ?></td>
                </tr>
                <tr>
                    <th>Bank</th>
                    <td><?php echo $perr['Bank'] ?></td>
                </tr>
                <tr>
                    <th>Jumlah</th>
                    <td>Rp. <?php echo number_format($perr['jumlah'], 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <th>Tanggal Pembayaran</th>
                    <td><?php echo $perr['tanggal'] ?></td>
                </tr>
            </table>
        </div>
    </div>
    <h1 class="mt-5">Pengiriman</h1>
    <hr>
    <div class="col-md-8">
        <table class="table">
            <?php
			$tarik = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$perr[id_ongkir]'  ");
			$ulur = $tarik->fetch_assoc();
			?>
            <tr>
                <th>Nama Pelanggan</th>
                <td><?php echo $ulur['nama_pelanggan'] ?></td>
            </tr>
            <tr>
                <th>Alamat Lengkap</th>
                <td><?php echo $ulur['provinsi'] . ',' . $ulur['kota'] . ',' . $ulur['alamat_lengkap']; ?></td>
            </tr>
            <tr>
                <th>Resi</th>
                <td><?php echo $perr['resi'] ?></td>
            </tr>
        </table>
        <hr>
    </div>

    <a href="riwayat.php" class="btn btn-secondary mt-5 mb-5"><i class="fas fa-arrow-left"></i> Back</a>
</div>


<?php require_once 'templates/footer.php' ?>