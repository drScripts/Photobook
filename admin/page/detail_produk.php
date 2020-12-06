<?php
$semuadata = array(); 
$id_produk = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON kategori.id_kategori=produk.id_kategori WHERE produk.id_produk = '$id_produk' ");
$pecah = $ambil->fetch_assoc();
	// 
	// echo "<pre>";
	// print_r($pecah);
	// echo "</pre>";
$get = $koneksi->query("SELECT * FROM foto_produk WHERE id_produk='$id_produk' ");
while($per = $get->fetch_assoc()){
	$semuadata[] = $per;

	// echo "<pre>";
	// print_r($semuadata);
	// echo "</pre>";
}

 ?>

<div class="container">
	<h1>Detail Produk <?php echo $pecah['nama_produk'] ?></h1><hr>
 <table class="table mt-5 table-hover">
 	<tr>
 		<th>Kategori</th>
 		<td><?php echo $pecah['kategori'] ?></td>
 	</tr>
 	<tr>
 		<th>Produk</th>
 		<td><?php echo $pecah['nama_produk'] ?></td>
 	</tr>
 	<tr>
 		<th>Harga</th>
 		<td>Rp. <?php echo number_format($pecah['harga'],0,',','.') ?></td>
 	</tr>
 	<tr>
 		<th>Berat</th>
 		<td><?php echo $pecah['berat'] ?> Gr</td>
 	</tr>
 	<tr>
 		<th>Deskripsi</th>
 		<td><?php echo $pecah['deskripsi'] ?></td>
 	</tr>
 </table>

<h1 class="mt-5">Foto-foto Produk</h1><hr>
<div class="row">
<?php foreach ($semuadata as $key => $value): ?>
	
	<div class="col-md-4 text-center">
		<img src="../foto produk/<?php echo $value['nama_produk_foto'] ?>" class="mt-3 img-responsive" width="200px"><br>
		<a href="index.php?halaman=hapusprodukfoto&idfot=<?php echo $value['id_foto_produk'] ?>&idprd=<?php echo $id_produk ?>" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin ingin menghapusnya?') "><i class="fas fa-trash"></i></a>
	</div>
<?php endforeach ?>

</div>
<h1 class="mt-5">Tambah Foto</h1><hr> 
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<div class="col-md-6">
				<label>File foto</label>
				<input type="file" name="foto" class="form-control">
			</div>

		</div>
			<button type="submit" name="simpan" onclick="return confirm('anda yakin ingin menambah foto?')" class="btn btn-primary mt-5"><i class="fas fa-upload"></i> Upload</button>

	</form><hr>

<a href="index.php?halaman=produk" class="btn btn-secondary mt-5"><i class="fas fa-arrow-left"></i> Back</a>
</div>


<?php 
	if (isset($_POST['simpan'])) {
		$fotos = $_FILES["foto"]["name"];
		$lokasi = $_FILES['foto']['tmp_name'];
		$tanggal = date("YmdHis").$fotos;		
		
		// echo "<pre>";
		// print_r($tanggal);
		// echo "</pre>";

		move_uploaded_file($lokasi, "../foto produk/$tanggal");

		$koneksi->query("INSERT INTO foto_produk(id_produk,nama_produk_foto) VALUES('$id_produk','$tanggal')  ");
         echo "<script>alert('foto berhasil di tambahkan')</script>";

         echo "<meta http-equiv='refresh' content='1.5;'>";

	}
		
 ?>
