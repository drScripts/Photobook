<h1>Daftar Pelanggan</h1>

<table class="table table-bordered table-hover table-striped">

		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
		<?php $ambil = $koneksi->query("SELECT * FROM pelanggan") ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<?php $no=1; ?>	
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $pecah['nama_pelanggan'] ?></td>
			<td><?php echo $pecah['email_pelanggan'] ?></td>
			<td><?php echo $pecah['telepon_pelanggan'] ?></td>
			<td><a class="btn btn-danger btn-sm" href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan'] ?>" onclick="return confirm('apakah anda yakin mau menghapus?');"><i class="fas fa-trash"></i></a></td>
		</tr>
		<?php $no++ ?>
		<?php } ?>

</table>