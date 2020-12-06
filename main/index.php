<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="container-fluid mt-5 ">
        <div id="carouselExampleFade"
            class="mt-5 pt-5 carousel slide carousel-fade animate__animated animate__fadeInRight" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../foto/1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../foto/2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../foto/3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../foto/4.jpg" class="d-block w-100" alt="...">
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

        <!-- Content Row -->

        <div class="row mt-5 ">
            <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
            <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <div class="col-md-4 mt-5">
                <div class="card animate__animated animate__fadeInUpBig">
                    <img class="card-img-top" src="../foto produk/<?php echo $pecah['foto'] ?>" width="900px"
                        height="200px">
                    <div class="card-body">


                        <h6 class="card-title"><?php echo $pecah['nama_produk'] ?></h6>

                        <p class="card-text">Rp. <?php echo number_format($pecah['harga'], 0, ',', '.') ?></p>
                        <a href="detail.php?id=<?php echo $pecah['id_produk'] ?>" class="btn btn-info mr-5"><i
                                class="fas fa-search-plus"></i> Detail</a>
                    </div>
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
            <?php } ?>
        </div>

        <!-- Content Row -->
        <div class="row">


        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
</div>
<!-- Footer -->
<?php require_once 'templates/footer.php' ?>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>