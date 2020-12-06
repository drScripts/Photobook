<?php 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

 ?>
 <h1>Ubah Produk</h1>
 <?php 
	$semuadata = array();
	$get = $koneksi->query("SELECT * FROM kategori");
	while($break = $get->fetch_assoc()){
		$semuadata[] = $break;
	}
 ?>
 <center class="mt-5">
 <img src="../foto produk/<?php echo $pecah['foto']; ?>" width="250px" height="250px">
 </center>
 <!-- <pre>
 	<?php print_r($pecah) ?>
 </pre> -->

 <form method="post" class="mt-5" class="form-control" enctype="multipart/form-data">
	<div class="ml-5 mr-5 col-md-7">
		<div class="form-group">
				<label class="text-danger">Kategori</label>
				<select name="kategori" class="form-control">
					<option value=""> -- Pilih Kategori -- </option>
					<?php foreach ($semuadata as $key => $value): ?>
					<option value="<?php echo $value['id_kategori'] ?>" <?php if ($pecah['id_kategori']==$value['id_kategori']){
						echo "selected";
					} ?>><?php echo $value['kategori'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
		<div class="form-group">
			<label class="text-danger">Nama Produk</label>
			<input class="form-control" type="text" name="nama" value="<?php echo $pecah['nama_produk'] ?>">
		</div>
		<div class="from-group">
			<label class="text-danger">Harga</label>
			<input class="form-control" type="number" name="harga" value="<?php echo $pecah['harga'] ?>" >
		</div>
		<div class="form-group">
			<label class="text-danger">Berat (gr)</label>
			<input class="form-control" type="number" name="berat" value="<?php echo $pecah['berat'] ?>" readonly>
		</div>
		<div class="form-group">
			<label>Maksimal Foto</label>
			<input type="number" class="form-control" name="max" value="<?php echo $pecah['max'] ?>">
		</div>
		<div class="form-group">
			<label class="text-danger">Ganti Foto</label>
			<input class="form-control" type="file" name="foto" >
		</div>
		<div class="form-group">
			<label class="text-danger">Deskripsi</label>
			<textarea type="text" class="form-control" name="deskripsi" value="<?php echo $pecah['deskripsi'] ?>" ><?php echo $pecah['deskripsi'] ?></textarea>
		</div>
		
		<a href="index.php?halaman=produk" class=" btn btn-secondary" ><i class="fas fa-arrow-left"></i> Back</a>

	<div align="right">
		<button type="submit"  style="margin-top:-50px" class="  btn btn-success" name="submit" onclick="return confirm('apakah anda yakin mau merubahnya?');">simpan</button>
	</div>
</div>
</form>
<?php 
if (isset($_POST['submit'])) 
{
	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	// fotodirubah
	if (!empty($lokasi)) 
	{
		// diubah dengan foto
		move_uploaded_file($lokasi, "../foto produk/$foto");
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga='$_POST[harga]',berat='$_POST[berat]',foto='$foto',deskripsi='$_POST[deskripsi]',id_kategori='$_POST[kategori]',max='$_POST[max]' WHERE id_produk='$_GET[id]'");
	}
	else
	{
		// kalao fotonya ga dirubah
		move_uploaded_file($lokasi, "../foto produk/$foto");
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga='$_POST[harga]',berat='$_POST[berat]',deskripsi='$_POST[deskripsi]',id_kategori='$_POST[kategori]',max='$_POST[max]' WHERE id_produk='$_GET[id]'");
	}


	echo "<script>alert('produk telah dirubah')</script>";
	echo "<script>location='index.php?halaman=produk'</script>";
}


 ?>