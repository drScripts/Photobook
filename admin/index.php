<?php session_start() ?>
<?php include 'db/database.php' ?>
<?php
if (!isset($_SESSION['admin'])) {

  echo "<script>location='login.php'</script>";
  header('loaction:login.php');
  exit();
}


?>
<?php include 'templates/header.php' ?>
<!-- <?php include 'templates/koneksi.php' ?> -->

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include 'templates/sidebar.php' ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">



            <!-- Content Row -->

            <?php if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == 'produk') {
          include 'page/produk.php';
        } elseif ($_GET['halaman'] == 'pembelian') {
          include 'page/pembelian.php';
        } elseif ($_GET['halaman'] == 'pelanggan') {
          include 'page/pelanggan.php';
        } elseif ($_GET['halaman'] == 'detail') {
          include 'page/detail.php';
        } elseif ($_GET['halaman'] == 'tambahproduk') {
          include 'page/tambahproduk.php';
        } elseif ($_GET['halaman'] == 'ubahproduk') {
          include 'page/ubahproduk.php';
        } elseif ($_GET['halaman'] == 'hapusproduk') {
          include 'page/hapusproduk.php';
        } elseif ($_GET['halaman'] == 'hapuspelanggan') {
          include 'page/hapuspelanggan.php';
        } elseif ($_GET['halaman'] == 'logout') {
          include 'page/logout.php';
        } elseif ($_GET['halaman'] == 'ongkir') {
          include 'page/ongkir.php';
        } elseif ($_GET['halaman'] == 'tambahongkir') {
          include 'page/tambahongkir.php';
        } elseif ($_GET['halaman'] == 'ubahongkir') {
          include 'page/ubahongkir.php';
        } elseif ($_GET['halaman'] == 'detailongkir') {
          include 'page/detailongkir.php';
        } elseif ($_GET['halaman'] == 'pembayaran') {
          include 'page/pembayaran.php';
        } elseif ($_GET['halaman'] == 'pengiriman') {
          include 'page/pengiriman.php';
        } elseif ($_GET['halaman'] == 'edit') {
          include 'page/edit.php';
        } elseif ($_GET['halaman'] == 'detailpengiriman') {
          include 'page/detailpengiriman.php';
        } elseif ($_GET['halaman'] == 'laporanpembelian') {
          include 'page/laporan_pembelian.php';
        } elseif ($_GET['halaman'] == 'kategori') {
          include 'page/kategori.php';
        } elseif ($_GET['halaman'] == 'detailproduk') {
          include 'page/detail_produk.php';
        } elseif ($_GET['halaman'] == 'hapusprodukfoto') {
          include 'page/hapus_produk_foto.php';
        } elseif ($_GET['halaman'] == 'image') {
          include 'page/image.php';
        } elseif ($_GET['halaman'] == 'images') {
          include 'page/images.php';
        } elseif ($_GET['halaman'] == 'promo') {
          include 'page/promo.php';
        } elseif ($_GET['halaman'] == 'tambahPromo') {
          include 'page/tambahpromo.php';
        } elseif ($_GET['halaman'] == 'hapusPromo') {
          include 'page/hapuspromo.php';
        } elseif ($_GET['halaman'] == 'ubahPromo') {
          include 'page/ubahpromo.php';
        } elseif ($_GET['halaman'] == 'profile') {
          include 'page/profile.php';
        }
      } else {
        include 'page/home.php';
      }


      ?>




        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Scroll to Top Button-->




    <?php include 'templates/footer.php' ?>