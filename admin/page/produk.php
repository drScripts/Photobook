<h1>Daftar Produk</h1>

<a href="index.php?halaman=tambahproduk" class="mt-4 btn btn-primary btn-sm"><i class="fas fa-plus"></i>Tambah Produk</a>
<table class="th-dark table table-bordered table-hover table-striped">
	<tr>
		<th>No.</th>
		<th>Nama Produk</th>
		<th>Kategori</th>
		<th>Harga</th>
		<th>Berat</th>
		<th>Max Foto</th>
		<th>Foto</th>
		<th>Aksi</th>
	</tr>
	<?php $no=1; ?>
	<?php $ambil = $koneksi->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori "); ?>
	<?php while($pecah = $ambil->fetch_assoc()){ 
		// echo "<pre>";
		// print_r($pecah);
		// echo "</pre>";
		?>
	
	
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $pecah['nama_produk'] ?></td>
		<td><?php echo $pecah['kategori'] ?></td>
		<td>Rp. <?php echo number_format($pecah['harga'],0,",",".") ?></td>
		<td><?php echo $pecah['berat'] ?>Gr</td>
		<td><?php echo $pecah['max'] ?></td>
		<td><img src="../foto produk/<?php echo $pecah['foto'] ?>" width="150px" height="150px"></td>
		<td class="text-center">
			<a class="btn btn-sm btn-danger" href="index.php?halaman=hapusproduk&gila=<?php echo $pecah['id_produk'] ?>" onclick="return confirm('apakah anda yakin mau menghapus?');"><i class="fas fa-trash"></i></a> || 
			<a class="btn btn-sm btn-warning" href="index.php?halaman=detailproduk&id=<?php echo $pecah['id_produk'] ?>"><i class="fas fa-eye"></i></a> || 
			<a class="btn btn-sm btn-secondary" href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk'] ?>"><i class="fas fa-edit"></i></a>
		</td>
	</tr>
	<?php $no++ ?>
	<?php } ?>
</table>