<div class="container">
	<h1>Daftar Kategori</h1>
	<hr>
<a href="" class="mt-5btn btn-primary btn-sm" style="text-decoration:none;"><i class="fas fa-plus"></i> Tambah Data</a>
	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>No</th>
			<th>Kategori</th>
			<th>Aksi</th>
		</tr>
		<?php 
		$no = 1;
		$ambil = $koneksi->query("SELECT * FROM kategori");
		while($pecah = $ambil->fetch_assoc()){
		 ?>
		
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $pecah['kategori'] ?></td>
			<td class="text-center">
				<a href="index.php?halaman=hapuskategori" class="btn btn-danger btn-sm" onclick="return confirm('apakah anda yakin akan menghapus ini?')"><i class="fas fa-trash"></i></a> || 
				<a href="index.php?halaman=ubahkategori" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>
	</table>
</div>

