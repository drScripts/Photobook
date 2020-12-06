<h1>Ubah Data Promo</h1>
<hr>

<?php
$id_promo = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM promo JOIN produk ON promo.id_produk=produk.id_produk WHERE id_promo = '$id_promo' ");
$pecah = $ambil->fetch_assoc();
?>

<form method="post">
    <div class="col-md-7">
        <div class="form-group">

            <label for="Produk">Produk sebelumnya || <strong class="text-danger">("<?= $pecah['nama_produk']; ?>
                    ")</strong></label>
            <select name="produk" class="form-control">
                <?php
                $get = $koneksi->query("SELECT * FROM produk");
                while ($arr = $get->fetch_assoc()) {
                ?>
                <option value="<?= $arr['id_produk'] ?>"><?= $arr['nama_produk']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="lama">Lama Produk Dimulai</label>
            <input name="lama" required class="form-control" type="text" id="lama" value="<?= $pecah['lama'] ?>">
        </div>

        <div class="form-group">
            <label for="min">Minimal Pembelian</label>
            <input name="min" required class="form-control" type="text" id="min" value="<?= $pecah['min'] ?>">
        </div>

        <div class="form-group">
            <label for="keterangan">Keterangan Promo Singkat</label>
            <input name="promo" required class="form-control" type="text" id="keterangan"
                value="<?= $pecah['promo'] ?>">
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Promo</label>
            <textarea class="form-control" required name="deskripsi" id="deskripsi" cols="30"
                rows="10"><?= $pecah['deskripsi_promo']; ?></textarea>
        </div>
    </div>

    <div class="text-right">
        <button name="ubah" type="submit" class="btn btn-primary"
            onclick="return confirm('yakin mau di ubah ada yang diubah ga? kalo ga ada cancel aja')"><i
                class="fas fa-edit"></i> Ubah</button>
    </div>
    <a style="margin-top:-63px" href="index.php?halaman=promo" class="btn btn-secondary"><i
            class="fas fa-arrow-left"></i> Back</a>
</form>
<?php
if (isset($_POST['ubah'])) {
    $tanggals = date("Y-m-d");
    $idprdk = $_POST['produk'];
    $lama = $_POST['lama'];
    $min = $_POST['min'];
    $keterangan = $_POST['promo'];
    $deskripsi = $_POST['deskripsi'];

    $koneksi->query("INSERT INTO promo (promo,id_produk,tanggal,lama,min,deskripsi_promo)VALUES('$keterangan','$idprdk','$tanggals','$lama','$min','$deskripsi') ");

    echo "<script>alert('Data Di Ubah')</script>";
    echo "<script>location='index.php?halaman=promo'</script>";
}
?>