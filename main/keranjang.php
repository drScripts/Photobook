<?php session_start() ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>

<div class="container-fluid mt-5">



    <?php
	$id = $_SESSION["pelanggan"]["id_pelanggan"];
	$ambil = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan = $id ");
	$pecah = $ambil->fetch_assoc();
	if (mysqli_num_rows($ambil) == 0) {
		echo "<center class='mt-3' style='padding-top:150px'><h1>keranjang anda masih kosong</h1></center>
		<a href='index.php' class='mt-5 btn btn-secondary'><i class='fas fa-shopping-cart'></i> Belanja </a>";
		require_once 'templates/footer.php';

		exit();
	}

	?>
    <h1>Keranjang <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></h1>
    <hr>


    <div class='row'>
        <table class='table table-bordered table-hover table-striped'>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Tema</th>
                <th>Nama Project</th>
                <th>Aksi</th>
            </tr>
            <?php
			$no = 1;
			$id_user = $_SESSION['pelanggan']['id_pelanggan'];

			$ambil1 = $koneksi->query("SELECT * FROM keranjang JOIN produk ON keranjang.id_produk=produk.id_produk  WHERE id_pelanggan = '$id_user'");
			while ($pecah = $ambil1->fetch_assoc()) {

				$idker = $pecah['id_keranjang'];
				// print_r($pecah);
				$idtem = $pecah['id_tema'];
				$comot = $koneksi->query("SELECT * FROM tema WHERE id_tema = '$idtem' ");
				$cimit = $comot->fetch_assoc();
				$tema =  $cimit['nama_tema'];


			?>


            <tr>
                <td><?php echo $no ?></td>
                <td><?php echo 	$pecah['nama_produk'] ?></td>
                <td>Rp. <?php echo 	number_format($pecah['harga'], 0, ',', '.'); ?></td>
                <td><?php echo $tema ?></td>
                <td><?= $pecah['nama_pro']; ?></td>
                <td>
                    <div class="text-center">
                        <a href="hapuskeranjang.php?id=<?php echo $pecah['id_keranjang'] ?>&idprdk=<?php echo $pecah['id_produk'] ?>"
                            class="btn btn-sm btn-danger mr-4"
                            onclick="return confirm('apakah anda yakin mau menghapus produk ini dari keranjang?');"><i
                                class="fas fa-trash"></i></a> ||
                        <?php
							$max = $pecah['max'];
							// echo $max;
							$fotos = $koneksi->query("SELECT * FROM foto_pelanggan WHERE id_keranjang ='$idker' ");
							$jum_fotos = mysqli_num_rows($fotos);
							$cover	= $koneksi->query("SELECT * FROM foto_cover WHERE id_keranjang = '$idker'  ");
							$jum_cover = mysqli_num_rows($cover);
							if ($jum_fotos < 25) {
								echo "<a href='view.php?id=$pecah[id_produk]&idker=$idker' class='text-center btn btn-danger btn-sm ml-4'><i class='fas fa-eye'></i></a>";

								echo "</td>";
								echo "</table>";

								echo "<div class='alert alert-danger text-small'>foto anda belum lengkap silahkan lengkapi dengan menekan tombol mata yang berwarna merah</div>";
								echo "</div>";
								echo "<a href='index.php' class='mt-5 btn btn-secondary'><i class='fas fa-shopping-cart'></i> Belanja </a>";
								require_once 'templates/footer.php';

								exit();
							} elseif ($jum_cover !== 1) {
								echo "<a href='view.php?id=$pecah[id_produk]&idker=$idker' class='text-center btn btn-danger btn-sm ml-4'><i class='fas fa-eye'></i></a>";

								echo "</td>";
								echo "</table>";
								echo "<div align='text-center'>";
								echo "<div class='alert alert-danger text-small'>foto anda belum lengkap silahkan lengkapi dengan menekan tombol mata yang berwarna merah</div>";
								echo "</div>";
								echo "<a href='index.php' class='mt-5 btn btn-secondary'><i class='fas fa-shopping-cart'></i> Belanja </a>";
								require_once 'templates/footer.php';

								exit();
							} elseif ($jum_fotos > $max) {
								echo "<a href='view.php?id=$pecah[id_produk]&idker=$idker' class='text-center btn btn-warning btn-sm ml-4'><i class='fas fa-eye'></i></a>";

								echo "</td>";
								echo "</table>";

								echo "<div class='alert alert-danger text-small'>foto anda melebihi maksimal foto yang dapat di pilih silahkan lihat dengan menekan tombol mata yang berwarna kuning</div>";
								echo "</div>";
								echo "<a href='index.php' class='mt-5 btn btn-secondary'><i class='fas fa-shopping-cart'></i> Belanja </a>";
								require_once 'templates/footer.php';

								exit();
							} else {
								echo "<a href='view.php?id=$pecah[id_produk]&idker=$idker' class='text-center btn btn-success btn-sm ml-4'><i class='fas fa-eye'></i></a>";
							}
							?>




                    </div>

    </div>
    </td>
    </tr>

    <?php $no++; ?>
    <?php } ?>


    </table>
</div>

<div align="right">
    <a href='checkout.php' class='btn btn-secondary'><i class='fas fa-money-bill-wave'></i> Checkout</a>
</div>

<div class="row mb-5"></div>
<div class="row mb-5"></div>

</div>





<?php require_once 'templates/footer.php' ?>