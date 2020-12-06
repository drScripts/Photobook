<h1>Tambah Data Ongkir JNE</h1>

<form method="post"   enctype="multipart/form-data">
	<div class="form-group">
		<label class="text-danger">Kota Tujuan</label>
		<input type="text" name="kota" class="form-control" placeholder="isi nama kota" required>
	</div>
	<div class="form-group">
		<label class="text-danger">Jenis Kurir <strong>(nulis yang bener)</strong></label>
		<input type="text" name="kurir" class="form-control" placeholder="Jenis kurir hanya JNE(sementara)" required>
	</div>
	<div class="form-group">
		<label class="text-danger">Tarif(angka saja tanpa , atau .)</label>
		<input type="number" name="tarif" class="form-control" placeholder="Tarif" required>
	</div>
	<button name="tambah" class="btn btn-primary btn-sm" type="submit">Tambah Data</button>
</form>
<?php 
	if (isset($_POST['tambah'])) 
	{

		$koneksi->query("INSERT INTO ongkir(nama_kota,jenis_kurir,tarif)VALUES('$_POST[kota]','$_POST[kurir]','$_POST[tarif]') "); 	 
		echo "<script>alert('Data ditambahkan')</script>";
		echo "<script>location='index.php?halaman=ongkir'</script>";
	}
	 	 
				
 
 ?>	 
