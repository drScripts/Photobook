<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<?php $id_pem = $_GET['id'];
$get = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pem' ");
$pecah = $get->fetch_assoc();
$total = $pecah['total'];
// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
$idslogin = $_SESSION['pelanggan']['id_pelanggan'];
$idspem = $pecah['id_pelanggan'];
if ($idslogin !== $idspem) {
    echo "<script>location('riwayat.php')</script>";
    exit();
}
$idong = $pecah['id_ongkir'];
$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$idong' ");
$detail = $ambil->fetch_assoc();
//  echo "<pre>";
// print_r($detail);
// echo "</pre>";
$ongkir = $detail['ongkir'];

$totalsemua = $total + $ongkir;

if ($pecah['status'] !== 'pending') {
    echo "<script>alert('tidak ada yang perlu di bayar')</script>";
    echo "<script>location='riwayat.php'</script>";
    exit();
}
?>

<div class="container">
    <h1>Konfirmasi Pembayaran</h1>
    <div class="alert alert-info">Total Tagihan Anda = <strong>Rp.
            <?php echo number_format($totalsemua, 0, ',', '.'); ?></strong></div>
    <hr>
    <p class="text-danger">*kirim bukti pembayaran</p>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama"><strong>Nama Penyetor</strong></label>
            <input type="text" id="nama" class="form-control" name="nama" required>
        </div>
        <div class="form-group">
            <label for="bank"><strong>Bank</strong></label>
            <input type="text" id="bank" class="form-control" name="bank" required>
        </div>
        <div class="form-group">
            <label for="jumlah"><strong>Jumlah</strong></label>
            <input type="number" id="jumlah" class="form-control" name="jumlah" required
                value="<?php echo $totalsemua ?>" readonly>
        </div>
        <div class="form-group">
            <label for="Bukti"><strong>Bukti Pembayaran</strong></label>
            <input type="file" id="Bukti" class="form-control col-md-3" name="bukti" required>
            <p class="text-danger">*foto harus JPG maksimal ukuran foto 2mb</p>
            <div class="text-right">
                <button class="btn btn-success mt-5 " name="kirim" type="submit"
                    onclick="return confirm('apakah anda yakin untuk mengkonfirmasi pembayaran ini?');"><i
                        class="fas fa-money-bill-wave"></i> Confirm!</button>
            </div>
        </div>
    </form>
    <?php if (isset($_POST['kirim'])) {
        $nama = $_POST['nama'];
        $bank = $_POST['bank'];
        $jumlah = $_POST['jumlah'];
        $date = date("Y-m-d");
        $namab = $_FILES['bukti']['name'];
        $tmp = $_FILES['bukti']['tmp_name'];
        $tanggal = date("YmdHis") . $nama . $namab;
        move_uploaded_file($tmp, "../pembayaran/$tanggal");
        $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,Bank,jumlah,tanggal,bukti) VALUES ('$id_pem','$nama','$bank','$jumlah','$date','$tanggal') ");

        $koneksi->query("UPDATE pembelian SET status = 'Confirm' WHERE id_pembelian='$id_pem' ");
        echo "<script>alert('bukti sudah di kirim dan sedang di proses');</script>";
        echo "<script>location='riwayat.php';</script>";
    }

    ?>
</div>


<?php require_once 'templates/footer.php' ?>