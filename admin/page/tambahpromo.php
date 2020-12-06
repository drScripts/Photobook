<h1>Tambah Promo</h1>
<hr>

<form method="post">
    <div class="col-md-7">
        <div class="form-group">
            <label for="produk" style="font-size:20px">Produk Promo</label>
            <select name="produk" id="produk" class="form-control">
                <?php $ambil = $koneksi->query("SELECT * FROM produk");
                while ($pecah = $ambil->fetch_assoc()) {
                ?>
                <option value="<?= $pecah['id_produk']; ?>"><?= $pecah['nama_produk']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="lama" style="font-size:20px">Berapa Hari Promo Dimulai</label>
            <input type="number" id="lama" name="lama" class="form-control" value="1" min='1' required>
        </div>
        <div class="form-group">
            <label for="min" style="font-size:20px">Minimal Pembelian Produk (minimal 1)</label>
            <input type="number" class="form-control" name="min" value="1" required>
        </div>
        <div class="form-group">
            <label for="keterangan" style="font-size:20px">Keterangan Promo (gausah panjang panjang)</label>
            <input type="text" id="keterangan" class="form-control" name="keterangan" required
                placeholder="keterangan singkat promo">
        </div>
        <div class="form-group">
            <label for="deskripsi" style="font-size:20px">Deskripsi Promo (Bole panjang)</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" placeholder="deskripsi promo"
                class="form-control" required></textarea>
        </div>

    </div>
    <div class="text-right">
        <button name="tambah" type="submit" onclick="return confirm('Yakin?')" class="btn btn-primary"><i
                class="fas fa-plus"></i>
            Tambahkan</button>
    </div>
</form>

<div style="margin-top:-37px">
    <a href="index.php?halaman=promo" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
</div>

<?php

?>

<?php
if (isset($_POST['tambah'])) {
    $tanggals = date("Y-m-d");
    $idprdk = $_POST['produk'];
    $lama = $_POST['lama'];
    $min = $_POST['min'];
    $keterangan = $_POST['keterangan'];
    $deskripsi = $_POST['deskripsi'];

    $koneksi->query("INSERT INTO promo (promo,id_produk,tanggal,lama,min,deskripsi_promo) VALUES('$keterangan','$idprdk','$tanggals','$lama','$min','$deskripsi')  ");

    echo "<script>alert('Data Ditambahkan')</script>";
    echo "<script>location='index.php?halaman=promo'</script>";
}
?>