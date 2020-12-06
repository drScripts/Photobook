	<div class="container">

			<?php 

			 $id_pem = $_GET['id'];
			 $get = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$id_pem' ");
 			 $arr = $get->fetch_assoc();	
 						// echo "<pre>";
 						// print_r($arr);
 						// echo "</pre>";
 			?>
		<h1>Daftar Produk  Yang di Beli Oleh	<?= $arr['nama_pelanggan'] ?></h1><hr>
		<table class="table table-striped table-hover table-bordered">
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Tema</th>
				<th>Aksi</th>
			</tr>
			

			<?php 
			$no = 1;
			 $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN tema ON pembelian_produk.id_tema=tema.id_tema WHERE pembelian_produk.id_pembelian = '$id_pem' ");
			 while($pecah = $ambil->fetch_assoc()){
			 			// echo "<pre>";
			 			// print_r($pecah);
			 			// echo "</pre>";
			 
			 ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $pecah['nama_produk'] ?></td>
				<td>Rp. <?= number_format($pecah['harga'],0,',','.')  ?></td>
				<td><?= $pecah['nama_tema']  ?></td>
				<td class="text-center">
					<a href="index.php?halaman=images&id=<?php echo $id_pem ?>" class="btn btn-secondary"><i class="far fa-images"></i></a>
				</td>
			</tr>
			<?php $no++ ?>
			<?php } ?>
		</table>
<a href="index.php?halaman=pembelian" class="mt-5 btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>

	</div>