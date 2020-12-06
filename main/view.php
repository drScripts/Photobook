<?php session_start() ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>

<div class="container">

    <?php
	$idker = $_GET['idker'];
	$id_produk = $_GET['id'];
	$id_user = $_SESSION['pelanggan']['id_pelanggan'];
	$namauser = $_SESSION['pelanggan']['nama_pelanggan'];
	$foto_produk = array();
	$take = $koneksi->query("SELECT * FROM keranjang WHERE id_keranjang = '$idker' ");
	$arr = $take->fetch_assoc();
	$pro = $arr['nama_pro'];
	$ambil = $koneksi->query("SELECT * FROM foto_pelanggan WHERE id_keranjang='$idker' ");
	while ($pecah = $ambil->fetch_assoc()) {
		$foto_produk[] = $pecah;
	}
	// echo "<pre>";
	// print_r($foto_produk);
	// echo "</pre>";

	?>

    <div class="mt-5"></div>
    <?php
	$ngambil = $koneksi->query("SELECT * FROM produk WHERE id_produk ='$id_produk' ");
	$ambilmax = $ngambil->fetch_assoc();
	?>
    <p class="text-small text-danger ml-5"><strong>*bila foto kurang dari 25 buah pemesanan tidak akan di proses dan
            maksimal <?php echo $ambilmax['max'] ?> buah.</strong></p>
    <p class="text-small text-danger ml-5"><strong>*Foto akan dimasukan sesuai urutan</strong></p>

    <div align="center" class="mt-5">
        <h1>Foto Cover</h1>
        <hr>

        <?php
		$get = $koneksi->query("SELECT * FROM foto_cover WHERE id_keranjang='$idker' ");
		$urr = $get->fetch_assoc();


		// print_r($fot_cover);
		if (!isset($urr['nama_foto_cover'])) {
			echo "
			 		<form method='post' enctype='multipart/form-data'>
			 	<input type='file' name='coper'  multiple />
			  	<button type='submit' name='udin' class='btn btn-primary'><i class='fas fa-plus'></i> Tambahkan</button>
			  </form>
		 		";
			require_once 'templates/footer.php';
			exit();
			if (isset($_POST['udin'])) {
				$user = $_SESSION['pelanggan']['id_pelanggan'];
				$namauser = $_SESSION['pelanggan']['nama_pelanggan'];
				$tanggal = date("YmdHis");
				$namafotocover = $_FILES['coper']['name'];
				$lokasifotocover = $_FILES['coper']['tmp_name'];
				$cover = "cover";
				$namacoper = $tanggal . $namauser . $cover . '.' . $pro . '.' . $namafotocover;
				move_uploaded_file($lokasifotocover, "../cover_foto/" . $namacoper);
				$koneksi->query("INSERT INTO foto_cover(id_keranjang,id_produk,id_pelanggan,nama_foto_cover) VALUES ('$idker','$id_produk','$user','$namacoper') ");
				echo "<script>alert('foto cover sudah ditambah')</script>";

				echo "<meta http-equiv='refresh' content='1.5'>";
			}
		} else {
			$fot_cover = $urr['nama_foto_cover'];
			echo "<div class='text-center'>
						  	<img src='../cover_foto/$fot_cover' width='250px'>
						  </div><a class='btn btn-warning btn-sm mt-2' href='ubahcover.php?id=$urr[id_foto_cover]' ><i class='fas fa-sync-alt'></i></a>
					 

					";
		}
		?>


        <h1 class='mt-5'>Isi Foto</h1>
        <hr>
        <div class='row mt-5'>
            <?php
			$no = 1;
			?>
            <?php foreach ($foto_produk as $key => $value) : ?>

            <div class="col-md-3 mt-5">
                <label class="text-center"><?php echo $no ?></label>
                <img src="../foto_pelanggan/<?php echo $value['nama_foto'] ?>" width="250px" height="250px"
                    class="img-responsive mb-2 ml-2 mr-2">
                <div align="center">
                    <a href="hapusfotopelanggan.php?idfoto=<?php echo $value['id_foto_pelanggan'] ?>&idproduk=<?php echo $id_produk ?>"
                        class="btn btn-danger btn-sm mb-2"><i class="fas fa-trash"></i></a>
                    <a href="editfotopelanggan.php?idfoto=<?php echo $value['id_foto_pelanggan'] ?>&idproduk=<?php echo $id_produk ?>"
                        class="btn btn-warning btn-sm mb-2"><i class="fas fa-sync-alt"></i></a>
                </div>
            </div>
            <?php $no++ ?>

            <?php endforeach ?>
        </div>

        <h3 class="mt-5">Tambah Isi Foto</h3>
        <hr>

        <form method="post" enctype="multipart/form-data">
            <div align="center" class="mr-3 mt-3">

                <input type="file" name="foto[]" multiple />
                <button type="submit" name="tambah" class="btn btn-sm btn-primary"
                    onclick="return confirm('apakah anda yakin?');"><i class="fas fa-upload"></i> Tambahkan</button>
            </div>
        </form>
        <?php

		if (isset($_POST["tambah"])) {
			$namauser = $_SESSION['pelanggan']['nama_pelanggan'];
			$user = $_SESSION['pelanggan']['id_pelanggan'];
			$namafoto = $_FILES["foto"]["name"];
			$lokasifoto = $_FILES["foto"]["tmp_name"];
			$tanggal = date("YmdHis");
			foreach ($namafoto as $key => $value) {
				$tiap_lokasi = $lokasifoto[$key];
				$namafiks = $tanggal . $namauser  . '.' . $pro . '.' . $value;
				move_uploaded_file($tiap_lokasi, "../foto_pelanggan/" . $namafiks);

				$koneksi->query("INSERT INTO foto_pelanggan(id_pelanggan,id_produk,nama_foto,id_keranjang) VALUES ('$user','$id_produk','$namafiks','$idker') ");
			}
			echo "<script>alert('foto sudah ditambah')</script>";
			echo "<meta http-equiv='refresh' content='1'>";
		}

		?>
        <hr>

        <?php
		$ambil = $koneksi->query("SELECT * FROM foto_pelanggan WHERE id_keranjang='$idker' ");
		$nyomot = $koneksi->query("SELECT * FROM foto_cover WHERE id_keranjang = '$idker' ");
		if (mysqli_num_rows($ambil) < 25) {
			echo "<label class='text-danger'>tombol lanjut akan muncul setelah jumlah minimal foto 25 buah.<label>";
		} elseif (mysqli_num_rows($nyomot) != 1) {
			echo "<label class='text-danger'>tombol lanjut akan muncul setelah foto ada cover <label>";
		} elseif (mysqli_num_rows($ambil) > $ambilmax['max']) {
			echo "<label class='text-danger'>tombol lanjut akan muncul setelah foto kurang dari $ambilmax[max] buah. <label>";
		} else {
			echo "<div align='right'>	
	<a class='btn btn-primary btn-sm mb-5 mr-3 mt-5' href='keranjang.php'>Selesai! <i class='fas fa-check'></i> </a>
</div>";
		}

		?>
    </div>

    <?php require_once 'templates/footer.php' ?>