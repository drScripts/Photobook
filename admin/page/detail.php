<h1>Detail Pembelian</h1><hr>
<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan  WHERE pembelian.id_pembelian='$_GET[id]' "); ?>
<?php $detail = $ambil->fetch_assoc(); ?>

<?php 
	$id_ong = $detail['id_ongkir'];
	$get = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ong' ");
	$arr = $get->fetch_assoc();
	// echo "<pre>";
	// print_r($arr);
	// echo "</pre>";
	$ongkir = $arr['ongkir'];
 ?>
 <!-- <pre>
 	  <?php print_r($detail) ?>  
 </pre> -->
 	
 <table class="table table-bordered table-striped table-hover mt-5">
 	<tr>
 		<th>no</th>
 		<th>nama produk</th>
 		<th>harga</th>
 		<th>jumlah</th>
 		<th>subtotal</th>
 	</tr>
 	<?php $no=1; ?>
 	<?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'") ?>
 	<?php while($pecah = $ambil->fetch_assoc()){ ?>
 	<tr>
 		<td><?php echo $no ?></td>
 		<td><?php echo $pecah['nama_produk'] ?></td>
 		<td>Rp.<?php echo number_format($pecah['harga']) ?></td>
 		<td><?php echo $pecah['jumlah'] ?></td>
 		<td>Rp.<?php
 		$uwaw = $pecah['harga'] * $pecah['jumlah'];
 		echo number_format($uwaw) ?></td>
 	</tr>
 	<?php $no++ ?>
 	<?php } ?>
 </table><hr class="mt-5">
 <div class="row">
 	<div class="col-md-4">
 		<?php $fiks = $uwaw + $ongkir ?>
 		<h1>Pelanggan</h1><hr>
 		<h5>Nama = <strong><?php echo $detail['nama_pelanggan'] ?></strong></h5>
 		<h5>No.telp = <strong><?php echo $detail['telepon_pelanggan'] ?></strong></h5>
 		<h5>Email = <strong><?php echo $detail['email_pelanggan'] ?></strong></h5>
 	</div>
 	<div class="col-md-4"><h1>Pengirimian</h1>
			Ongkos kirim = Rp. <?php echo number_format($arr['ongkir'],0,',','.'); ?><br>
			<?php $total = $detail['total'] + $arr['ongkir'];?>Total pembayaran = Rp. <?php echo number_format($total,0,',','.') ?> <br>
			 Alamat =  <?php echo $arr['provinsi'].' ' ?>, <?php echo $arr['kota'],' ' ?>,  <?php echo $arr['alamat_lengkap'].' ' ; ?> <br>
			 Estimasi pengiriman = <?php echo $arr['estimasi'].' Hari' ?><br><br>
		</div>
		<div class="col-md-4"><h1>Total Semua</h1>
 		<h5>Total = <strong>Rp. <?php echo number_format($fiks,0,',','.') ?></strong></h5>
 </div>


 <a href="index.php?halaman=pembelian" class="btn btn-secondary mt-5"><i class="fas fa-arrow-left"></i> Back</a>
 