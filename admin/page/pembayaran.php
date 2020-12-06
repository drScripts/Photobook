<?php 
$id_pem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE id_pembelian='$id_pem' ");
 $pecah = $ambil->fetch_assoc();
 // echo "<pre>";
 // print_r($pecah);
 // echo "</pre>";
 $get = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian = '$id_pem' ");
 $arr = $get->fetch_assoc();
 // echo "<pre>";
 // print_r($arr);
 // echo "</pre>";
 ?>
<h2>Data Pembayaran <?php echo $pecah['nama_pelanggan'] ?> </h2><hr>

<div class="row mt-5">
	<div class="col-md-6"><img src="../pembayaran/<?php echo $arr['bukti'] ?>" width="500px" class="img-responsive"></div>
	<div class="col-md-6">
		<table class="table">
			<tr>
				<th>Nama</th>
				<td><?php echo $arr['nama'] ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $arr['Bank'] ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($arr['jumlah'],0,',','.') ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $arr['tanggal'] ?></td>
			</tr>
		</table>
	</div>
</div>
<hr>
<form method="post">
	<div class="form-group">
		<label>*Update Status</label>
		<select class="form-control" name="status">
			<option value="">-- Pilih Status --</option>
			<option value="process">On Process</option>
			<option value="Unsuccessful Payment">Unsuccessful Payment</option>
		</select>
	</div>

	<div class="text-right">
		<button type="submit" name="jadi" class="btn btn-success" onclick="return confirm('apakah anda yakin mau memproses?');">Proses</button>
	</div>
	<a href="index.php?halaman=pembelian" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
</form>

<?php 
	if (isset($_POST['jadi'])) 
	{
		$stat = $_POST['status'];
		$bukti = $arr['bukti'];
		if ($stat == 'Unsuccessful Payment') {
			$koneksi->query("DELETE FROM pembayaran WHERE id_pembelian='$id_pem'");
			unlink("../pembayaran/$bukti");
		}

		$koneksi->query("UPDATE pembelian SET status='$stat' WHERE id_pembelian='$id_pem' ");


		echo "<script>alert('status di update')</script>";
		echo "<script>location='index.php?halaman=pembelian'</script>";
	}
 ?>