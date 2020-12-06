<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<?php
$cari = '-';
$cari = $_GET['search'];
$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$cari%' OR kategori LIKE '%$cari%' OR deskripsi LIKE '%$cari%' ");
while ($pecah = $ambil->fetch_assoc()) {
  $semuadata[] = $pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
?>
<div class="container">
    <h1><i class="fas fa-search"></i> Hasil Pencarian: <?php echo $cari ?>... </h1>
    <hr>
</div>

<div class="row mt-5 ">
    <?php foreach ($semuadata as $key => $value) : ?>

    <div class="col-md-3 ml-4">
        <div class="card" style="width:20rem; ">
            <img class="card-img-top img-responsive" src="../foto produk/<?php echo $value['foto'] ?>" width="250px"
                height="200px">
            <div class="card-body">
                <div class="row">
                    <div class="col ml-5">
                    </div>
                    <hr>
                    <div class="col">

                    </div>
                    <div class="col">
                        <a href="pecahan/beli.php?id=<?php echo $value['id_produk'] ?>" style="color:grey;"><i
                                class="fas fa-cart-plus fa-lg ml-5"></i></a>
                    </div>
                </div>
                <h5 class="card-title"><?php echo $value['nama_produk'] ?></h5>

                <p class="card-text">Rp. <?php echo number_format($value['harga'], 0, ',', '.') ?></p>
                <a href="detail.php?id=<?php echo $value['id_produk'] ?>" class="btn btn-info mr-5"><i
                        class="fas fa-search-plus"></i> Detail</a>
            </div>
        </div>

    </div>
    <?php endforeach ?>
</div>
<?php if (empty($semuadata)) : ?>
<h1 class="text-center mt-5" style="padding-top: 150px;">Barang yang di cari tidak ditemukan...</h1>
<?php endif ?>

<!-- Content Row -->
<div class="row">


</div>
<?php require_once 'templates/footer.php' ?>