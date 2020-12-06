<?php 
$tglm = '-';
$tgls = '-';
		$semuadata = array();

	if (isset($_POST['kirim'])) 
	{
		$tglm = $_POST['tglm'];
		$tgls = $_POST['tgls'];
		$ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN pelanggan pl ON pm.id_pelanggan=pl.id_pelanggan JOIN pembayaran ON pm.id_pembelian=pembayaran.id_pembelian WHERE tanggal_pembelian BETWEEN '$tglm' AND '$tgls' ");
		while($pecah = $ambil->fetch_assoc()){
			$semuadata[] = $pecah;
			// echo "<pre>";
			// print_r($semuadata);
			// echo "</pre>";
}
	}
 ?>


<div class="container">
	<h2>Laporan Pembelian Dari <?php echo $tglm ?> Hingga <?php echo $tgls ?></h2><hr>
<form method="post">
	<div class="row mt-5">
		<div class="col-md-5">
			<div class="form-group">
				<label for="tgl">*Tanggal Awal</label>
				<input type="date" id="tgl" name="tglm" class="form-control" value="<?php echo $tglm ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label for="sls">*Tanggal Selesai</label>
				<input type="date" id="sls" name="tgls" class="form-control" value="<?php echo $tgls ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary ml-3" type="submit" name="kirim" onclick="confirm('apakah anda yakin?')"> Lihat Laporan </button>
		</div>
	</div>
</form>
	
	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
		<?php $total = 0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
			<?php $total+=$value['jumlah'] ?>
			<tr>
				<td><?php echo $key+1; ?></td>
				<td><?php echo $value['nama_pelanggan'] ?></td>
				<td><?php echo $value['tanggal_pembelian']; ?></td>
				<td>Rp. <?php echo number_format($value['jumlah'],0,',','.') ?></td>
				<td><?php echo $value['status'] ?></td>
			</tr>
		<?php endforeach ?>
		<tr>
			<th colspan = "3">Total</th>
			<td colspan="1" >Rp. <?php echo number_format($total,0,',','.') ?></td>
			<td></td>
		</tr>
	</table>

	<a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>

</div>