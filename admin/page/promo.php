<h1>Daftar Promo</h1>
<div style="margin-top:-40px" class="text-right"><a href="index.php?halaman=tambahPromo" class="btn btn-primary"><i
            class="fas fa-plus"></i>
        Tambah Promo</a></div>
<hr>


<table class="table table-bordered table-hover table-striped">
    <?php
    $ambil = $koneksi->query("SELECT * FROM promo JOIN produk ON promo.id_produk=produk.id_produk");
    $jumlah = mysqli_num_rows($ambil);
    if ($jumlah == 0) {
        echo "<div class='text-danger' style='margin-top:200px'><h3 class='mt-5 text-center'>Belum Ada Promo Tambahkan Promo Dulu Weh!</h3></div>";
        exit();
    }
    ?>
    <thead>
        <tr>
            <th>No</th>
            <th>Produk Promo</th>
            <th>Tanggal</th>
            <th>Lama Hari</th>
            <th>Min Pembelian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($pecah = $ambil->fetch_assoc()) {
        ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $pecah['nama_produk']; ?></td>
            <td><?= $pecah['tanggal']; ?></td>
            <td><?= $pecah['lama']; ?></td>
            <td><?= $pecah['min']; ?></td>
            <td class="text-center">
                <a href="index.php?halaman=ubahPromo&id=<?php echo "$pecah[id_promo]" ?>"
                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> ||
                <a href="index.php?halaman=hapusPromo&id=<?php echo "$pecah[id_promo]" ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('yakin mau di hapus?')"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++ ?>
        <?php } ?>
    </tbody>
</table>