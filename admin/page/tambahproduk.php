<h1>Tambah produk</h1>

<?php 
	$semuadata = array();
	$ambil = $koneksi->query("SELECT * FROM kategori");
	while($pecah = $ambil->fetch_assoc()){
		$semuadata[] = $pecah;
	}
 ?>
a
<form method="post" class="mt-5" class="form-control" enctype="multipart/form-data">
	<div class="col-md-7">
		<div class="form-group">
			<label class="text-danger">Kategori</label>
			<select name="kategori" class="form-control">
				<option value=""> -- Pilih Kategori -- </option>
				<?php foreach ($semuadata as $key => $value): ?>
				<option value="<?php echo $value['id_kategori'] ?>"><?php echo $value['kategori'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group">
			<label class="text-danger">Nama Produk</label>
			<input class="form-control" type="text" name="nama" required placeholder="Nama produk">
		</div>
		<div class="from-group">
			<label class="text-danger">Harga</label>
			<input class="form-control" type="number" name="harga" required placeholder="Harga produk">
		</div>
		<div class="form-group">
			<label class="text-danger">Berat (gr)</label>
			<input class="form-control" type="number" value="1200" name="berat" readonly required>
		</div>
		<div class="form-group">
			<label class="text-danger">Foto</label>
			<div class="input mb-2">
				<input class="form-control" type="file" name="foto[]" required multiple>
			</div>
			<span class="btn-tambah btn-primary btn-lg "><i class="fas fa-plus"></i></span>
		</div>
		<div class="form-group">
			<label class="text-danger">Deskripsi</label>
			<textarea class="form-control" name="deskripsi" required placeholder="deskripsi produk"></textarea>
		</div>
		<a href="index.php?halaman=produk" class=" mt-2 btn btn-secondary" ><i class="fas fa-arrow-left"></i> Back</a>
		<div align="right">
			<button type="submit" style="margin-top:-50px" class="btn btn-success" name="submit" onclick="return confirm('apakah anda yakin menambah data tersebut?');">simpan</button>
		</div>
	</div>
</form>

<?php 



if(isset($_POST['submit'])) 
{
	if (empty($_POST['kategori'])) 
{
	echo "<script>alert('kategori tidak boleh kosong')</script>";
	echo "<script>location='index.php?halaman=tambahproduk'</script>";
	exit();
}
	$namas = $_FILES['foto']['name'];
	$lokasis = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasis[0], "../foto produk/".$namas[0]);
	$koneksi->query("INSERT INTO produk(nama_produk,harga,berat,deskripsi,id_kategori,foto) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[berat]','$_POST[deskripsi]','$_POST[kategori]','$namas[0]') ");
	$id_prod = $koneksi->insert_id;
	foreach ($namas as $key => $value) 
	{
		$t_lokasi = $lokasis[$key];
		move_uploaded_file($t_lokasi, "../foto produk/".$value);
		$koneksi->query("INSERT INTO foto_produk(id_produk,nama_produk_foto) VALUES ('$id_prod','$value') ");
	}


	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";

	// echo "<pre>";
	// print_r($_FILES['foto']);
	// echo "</pre>";
}
?>
<script>
	$(document).ready(function(){
		$(".btn-tambah").on("click",function(){
			$(".input").append("<input class='form-control' type='file' name='foto[]' required multiple>");
		})
	})
</script>




