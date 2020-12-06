<div class="container">
	
	<?php 
		$idpem = $_GET['id'];
	 	$get = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian='$idpem' ");
	 	$arr = $get->fetch_assoc();
	 			// echo "<pre>";
	 			// print_r($arr);
	 			// echo "</pre>";
	 ?>
	 <h1>Daftar Foto Pelanggan 	<?= $arr['nama_pelanggan'] ?></h1><hr>

<div class="text-center mt-5">
	<h1>Foto Cover </h1><hr>
	 <?php 
	 $ambil = $koneksi->query("SELECT * FROM foto_cover_pem WHERE id_pembelian='$idpem' ");
	 $pecah = $ambil->fetch_assoc();
	 		// echo "<pre>";
	 		// print_r($pecah);
	 		// echo "</pre>";
	  ?>

	  <img src="../cover_foto/<?php echo $pecah['nama_foto_cover_pem'] ?>" width="250px">
	</div>


	<div class="text-center mt-5">
		<h1 class="mb-5">Isi Foto</h1><hr>
		<div class="row">
		<?php 
		$isi = $koneksi->query("SELECT * FROM foto_pelanggan_pem WHERE id_pembelian='$idpem' ");
		while($array = $isi->fetch_assoc()){
					// echo "<pre>";
					// print_r($array);
					// echo "</pre>";
		
		 ?>	
		 <div class="col-md-3">
		 	<img src="../foto_pelanggan/<?php echo $array['nama_foto_pem'] ?>" width="250px" height="250px" class="img-responsive mt-3">
		 </div>
		 <?php } ?>

</div>
	</div>

<a href="index.php?halaman=image&id=24" class="btn btn-secondary mt-5"><i class="fas fa-arrow-left"></i> Back</a>
</div>