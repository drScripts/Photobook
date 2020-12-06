<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>
<?php $id_prdk = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk = '$id_prdk'  ");
$pecah = $ambil->fetch_assoc();
// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>
<div class="container">
    <h1 class="animate__animated animate__fadeInRightBig">Detail Produk</h1>
    <hr>
    <div class="row mt-5">

        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
            <?php
            $select = $koneksi->query("SELECT * FROM foto_produk WHERE id_produk = '$id_prdk' ");
            $array = $select->fetch_assoc();
            ?>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../foto produk/<?php echo $array['nama_produk_foto'] ?>" class="d-block w-100" alt="...">
                </div>
                <?php
                $get = $koneksi->query("SELECT * FROM foto_produk WHERE id_produk='$id_prdk' ");

                while ($arr = $get->fetch_assoc()) {
                ?>
                <div class="carousel-item ">
                    <img src="../foto produk/<?php echo $arr['nama_produk_foto'] ?>" class="d-block w-100" alt="...">

                </div>
                <?php } ?>

                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>


        <div class="col-md-5 mt-2"></div>
        <table class="table mt-5 WOW animate__animated animate__fadeInUpBig">
            <tr>
                <th>Nama Produk</th>
                <td><?php echo $pecah['nama_produk'] ?></td>
            </tr>
            <tr>
                <th>Harga</th>
                <td>Rp. <?php echo number_format($pecah['harga'], 0, ',', '.') ?></td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td><?php echo $pecah['deskripsi'] ?></td>
            </tr>
            <?php
            $select = $koneksi->query("SELECT * FROM promo WHERE id_produk='$id_prdk' ");

            $jumlahs = mysqli_num_rows($select);
            ?>

            <?php if ($jumlahs >= 1) : ?>
            <?php
                $promos = $select->fetch_assoc();
                ?>
            <tr>
                <th>Promo</th>
                <td><?php echo $promos['deskripsi_promo'] ?> dengan minimal pembelian sebanyak <?= $promos['min']; ?>
                    buah.</td>
            </tr>
            <?php endif ?>


        </table>



        <?php
        if (isset($_POST['beli'])) {
            $tema = $_POST['tema'];
            $pro = $_POST['pro'];
            echo "<script>location='pecahan/beli.php?id=$id_prdk&idtem=$tema&pro=$pro'</script>";
            exit();
        }
        ?>

    </div>


    <form method="post">
        <div class="form-group mt-5 col-md-7">
            <label><strong>Pilih Tema</strong></label>
            <select name='tema' class="form-control">
                <?php
                $comot = $koneksi->query("SELECT * FROM tema");
                while ($cimit = $comot->fetch_assoc()) {
                ?>
                <option value="<?php echo $cimit['id_tema'] ?>"><?php echo $cimit['nama_tema'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-7">
            <label for="pro">Nama Project Anda</label>
            <input name="pro" class="form-control" type="text" id="pro" required placeholder="project anda">
        </div>
        <div class="text-right mt-5">
            <button type="submti" name="beli" class="btn btn-primary mt-5"><i class="fas fa-shopping-cart"></i>
                Beli</button>
        </div>
        <a href="index.php" style="margin-top:-64px" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
            Back</a>
    </form>

</div>

</div>

<?php require_once 'templates/footer.php' ?>