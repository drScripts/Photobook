<?php 
$ids_pem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pengiriman ON pembelian.id_pembelian = pengiriman.id_pembelian  JOIN pembayaran ON pembelian.id_pembelian=pembayaran.id_pembelian WHERE pembelian.id_pembelian = '$ids_pem' ");
$pecah = $ambil->fetch_assoc();
$id_ong = $pecah['id_ongkir'];
$ambilong = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ong' ");
$pecahong = $ambilong->fetch_assoc();
// echo "<pre>";
// print_r($pecah);
// print_r($pecahong);
// echo "</pre>";
 ?>

 <?php  ?>
 <div class="container">
	<h1>Pembayaran</h1><hr>
	<div class="row">
	 <div class="col-md-6">
	 	<img src="../pembayaran/<?php echo $pecah['bukti'] ?>" width='500px' class="img-responsive">
	 </div>
	 <div class="col-md-6">
	 	<table class="table">
	

	 		<tr>
	 			<th>Nama pengirim</th>
	 			<td><?php echo $pecah['nama'] ?></td>
	 		</tr>
	 		<tr>
	 			<th>Bank</th>
	 			<td><?php echo $pecah['Bank'] ?></td>
	 		</tr>
	 		<tr>
	 			<th>jumlah</th>
	 			<td>Rp. <?php 
	 			 
	 			echo number_format($pecah['jumlah'],0,',','.') ?></td>
	 		</tr>
	 		<tr>
	 			<th>Tanggal</th>
	 			<td><?php echo $pecah['tanggal'] ?></td>
	 		</tr>
	 	</table>
	 </div>

	</div>
	<h1 class="mt-5">Pengiriman</h1><hr>
	<div class="col-md-9">
		<table class="table mt-5">
			<tr>
				<th>Provinsi</th>
				<td><?php echo $pecahong['provinsi'] ?></td>
			</tr>
			<tr>
				<th>Kota/Kabupaten</th>
				<td><?php echo $pecahong['kota'] ?></td>
			</tr>
			<tr>
				<th>Alamat Lengkap</th>
				<td><?php echo $pecahong['alamat_lengkap'] ?></td>
			</tr>
			<tr>
				<th>Jenis Kurir</th>
				<td style='text-transform: uppercase;'><?php echo $pecahong['ekspedisi_kurir'] ?></td>
			</tr>
			<tr>
				<th>Jenis Paket</th>
				<td><?php echo $pecahong['jenis_paket'] ?></td>
			</tr>
			<tr>
				<th>Harga Ongkir</th>
				<td>Rp. <?php echo number_format($pecahong['ongkir'],0,',','.') ?></td>
			</tr>
			<tr>
				<th>Resi</th>
				<td><strong><?php echo $pecah['resi'] ?></strong></td>
			</tr>
		</table>
	</div>
	<?php 
	 ?>
	<div class="text-center alert alert-info">Total yang di bayarkan <strong>Rp. <?php echo number_format($pecah['jumlah'],0,',','.') ?></strong></div>

	<a href="index.php?halaman=pembelian" class="mt-5 btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
</div>