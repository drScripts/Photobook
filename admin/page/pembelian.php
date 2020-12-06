<h1>Daftar Pembelian</h1><hr>
<table class="table table-bordered table-hover table-striped">
	<tr>
		<th>no</th>
		<th>Nama Pelanggan</th>
		<th>Tanggal</th>
		<th>Status</th>
		<th>Total</th>
		
		<th>Aksi</th>
	</tr>
	<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan") ?>
	<?php while($pecah = $ambil->fetch_assoc()){ ?>
	<?php $no=1; ?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $pecah['nama_pelanggan'] ?></td>
		<td><?php echo $pecah['tanggal_pembelian'] ?></td>
		<td><?php echo $pecah['status'].'    ';  ?> 
			<?php if ($pecah['status'] == 'shipped'): ?>
				  <i class="fas fa-shipping-fast"></i>
			<?php elseif ($pecah['status'] == 'Unsuccessful Payment' || $pecah['status'] == 'pending' ) : ?>
				<i class="fas fa-money-bill-wave"></i>
			<?php elseif($pecah['status']=='shipped'): ?>	
				<i class="fas fa-shipping-fast"></i>
			<?php endif ?>
	</td>
		<td>Rp. <?php 
		$id_ong = $pecah["id_ongkir"];
		$take = $koneksi->query("SELECT * FROM ongkir WHERE id_ongkir = '$id_ong' ");
		$arrt = $take->fetch_assoc();
		$ongkir = $arrt['ongkir'];
		$total = $pecah['total'];
		$semua = $ongkir + $total; 
		echo number_format($semua,0,".",".") ?></td>
		
		<td><div class='text-center'>
			<a class="btn btn-secondary btn-sm" href="index.php?halaman=image&id=<?php echo $pecah['id_pembelian'] ?>"><i class="fas fa-images"></i></a> ||
			<a class="btn btn-warning btn-sm" href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian'] ?>"><i class="fas fa-search-plus"></i></a>

			 
			<?php if ($pecah['status'] == 'Confirm'|| $pecah['status']== '') {
				echo "|| <a class='btn btn-primary btn-sm' href='index.php?halaman=pembayaran&id=$pecah[id_pembelian]'><i class='fas fa-eye'></i></a>";
			} ?>
			<?php if ($pecah['status'] == 'process'): ?>
				|| <a class="btn btn-primary btn-sm" href="index.php?halaman=pengiriman&id=<?php echo $pecah['id_pembelian'] ?>"><i class="fas fa-truck"></i></a>
			<?php elseif($pecah['status'] == 'shipped'): ?>
				|| <a class="btn btn-primary btn-sm" href="index.php?halaman=detailpengiriman&id=<?php echo $pecah['id_pembelian'] ?>"><i class="fas fa-shipping-fast"></i></a>

			<?php endif ?>
		 	 

			</div>
		</td>
	</tr>
	<?php $no++ ?>
	<?php } ?>
</table>