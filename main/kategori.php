<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>

<div class="container-fluid">


    <div class="container-fluid">
        <div id="carouselExampleFade" class="carousel slide carousel-fade animate__animated animate__fadeInRightBig"
            data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../foto/1.jpg" class="d-block w-100" alt="1">
                </div>
                <div class="carousel-item">
                    <img src="../foto/2.jpg" class="d-block w-100" alt="2">
                </div>
                <div class="carousel-item">
                    <img src="../foto/3.jpg" class="d-block w-100" alt="3">
                </div>
                <div class="carousel-item">
                    <img src="../foto/4.jpg" class="d-block w-100" alt="4">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <?php
        $id_kat = $_GET['id'];
        $get = $koneksi->query("SELECT * FROM kategori WHERE id_kategori = '$id_kat' ");
        $arr = $get->fetch_assoc();
        // echo "<pre>";
        // print_r($arr);
        // echo "</pre>";
        ?>
        <h1 class="mt-5 animate__animated animate__fadeInUpBig" style="text-transform: capitalize;">Produk Dengan
            Kategori <?php echo $arr['kategori'] ?></h1>
        <hr>
        <div class="row mt-5 ">

            <?php
            $ambil = $koneksi->query("SELECT * FROM produk JOIN kategori ON produk.id_kategori=kategori.id_kategori WHERE produk.id_kategori = '$id_kat' ");
            while ($pecah = $ambil->fetch_assoc()) {
            ?>


            <div class="col-md-3 mt-5">
                <div class="card animate__animated animate__fadeInLeftBig" style="width:16rem; ">
                    <img class="card-img-top" src="../foto produk/<?php echo $pecah['foto'] ?>" width="900px"
                        height="200px">
                    <div class="card-body">
                        <div class="row">
                            <div class="col ml-5">
                            </div>
                            <hr>
                            <div class="col">

                            </div>
                            <div class="col">

                            </div>
                        </div>
                        <h5 class="card-title"><?php echo $pecah['nama_produk'] ?></h5>

                        <p class="card-text">Rp. <?php echo number_format($pecah['harga'], 0, ',', '.') ?></p>
                        <a href="detail.php?id=<?php echo $pecah['id_produk'] ?>" class="btn btn-info mr-5"><i
                                class="fas fa-search-plus"></i> Detail</a>
                        <?php
                            $get_promo = $koneksi->query("SELECT * FROM promo WHERE id_produk = '$pecah[id_produk]' ");
                            $prom_arr = $get_promo->fetch_assoc();
                            ?>

                        <?php if (isset($prom_arr)) : ?>
                        <marquee behavior="" direction="" class="text-danger">
                            <?php echo $prom_arr['deskripsi_promo'] ?>
                        </marquee>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <?php } ?>
        </div>

    </div>
    <!-- Footer -->


    <?php require_once 'templates/footer.php' ?>