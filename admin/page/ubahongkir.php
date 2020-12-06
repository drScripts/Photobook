<h1>Ubah Data Ongkir</h1>

 <?php 
 	$id_ongkir = $_GET['id'];
 	$ambil = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ongkir' ");
 	$pecah = $ambil->fetch_assoc();
 	// echo "<pre>";
 	// print_r($pecah);
 	// echo "</pre>";
  ?>

<form method="post"   enctype="multipart/form-data">
	<div class="form-group">
		<label class="text-danger">Kota Tujuan</label>
		<input type="text" name="kota" class="form-control" value="<?php echo $pecah['nama_kota'] ?>" required >
	</div>
	<div class="form-group">
		<label class="text-danger">Jenis Kurir <strong>(nulis yang bener)</strong></label>
		<input type="text" name="kurir" class="form-control" value="<?php echo $pecah['jenis_kurir'] ?>" required>
	</div>
	<div class="form-group">
		<label class="text-danger">Tarif(angka saja tanpa , atau .)</label>
		<input type="number" name="tarif" class="form-control" value="<?php echo $pecah['tarif'] ?>" required>
	</div>
	<button name="tambah" class="btn btn-primary btn-sm" type="submit">Ubah Data</button>
</form>
 <?php 
	if (isset($_POST['tambah'])) 
	{

		$koneksi->query("UPDATE ongkir SET nama_kota='$_POST[kota]',jenis_kurir='$_POST[kurir]',tarif='$_POST[tarif]' WHERE id_ongkir='$id_ongkir' "); 	 
		echo "<script>alert('Data sudah diubah')</script>";
		echo "<script>location='index.php?halaman=ongkir'</script>";
	}
	 	 
				
 
 ?>	   
