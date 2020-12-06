<?php 
 $id_pem = $_GET['id'];
 $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$id_pem'");
 $arr = $ambil->fetch_assoc();
 $id_ong = $arr['id_ongkir'];
 $get= $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ong' ");
 $pecah=$get->fetch_assoc();
 // echo "<pre>";
 // print_r($pecah);
 // print_r($arr);
 // echo "</pre>";
 ?>
<div class="container">

<h1>Keterangan</h1>

	<h2 class="mt-5">nama pelanggan = <?php echo $pecah['nama_pelanggan'] ?></h2>
	<h2>Alamat = <?php echo $pecah['provinsi'].','. $pecah['kota'].','.$pecah['alamat_lengkap'] ?> </h2>
	<h2>Jenis Ekspedisi = <?php echo $pecah['ekspedisi_kurir'] ?></h2>
	<h2>Jenis Paket = <?php echo $pecah['jenis_paket'] ?></h2>

	<hr>
	<h1>Pengiriman</h1>
	<?php 
	$semua = $koneksi->query("SELECT * FROM pengiriman WHERE id_pembelian='$id_pem' ");
	$pecahan = $semua->fetch_assoc(); 
	
	 ?>
		<form method="post" class="mt-5">
		<div class="col-md-5">
			<div class="form-group">
				<label>input resi</label>		
				<input type="number" name="resi" class="form-control" placeholder="masukan disini" required value="<?php echo $pecahan['resi'] ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>pembaharuan status</label>
				<select name="pengiriman" class="form-control" >
					<option value="">-- pilih status --</option>
					<option value="shipped" required>Di kirim</option>
				</select>
			</div>	
			<div class="text-right">
				<button class="btn btn-success" name='update' type="submit"><i class="fas fa-edit" onclick="return confirm('apakah anda yakin mau update?');"></i> Update</button>
			</div>
	</div>		<hr>
	<a href="index.php?halaman=pembelian" class="btn btn-secondary mt-5"><i class="fas fa-arrow-left"></i> Back</a>
		</form>
		<?php 
		if (isset($_POST['update'])) 
		{
			$resi = $_POST['resi'];
			$pelanggan = $arr['id_pelanggan'];
			$update = $_POST['pengiriman'];


			$koneksi->query("INSERT INTO pengiriman(resi,id_pembelian,id_pelanggan) VALUES('$resi','$id_pem','$pelanggan') ");

			$koneksi->query("UPDATE pembelian SET status='$update' WHERE id_pembelian='$id_pem' ");

			echo "<script>alert('data berhasil di update')</script>";
			echo "<script>location='index.php?halaman=pembelian'</script>";
		}


		 ?>
	
</div>