<h1>Daftar Ongkir</h1>
 
	
	<div class="row">
		<div class="col-md-4">
			<form class="d-none d-sm-inline-block form-inline mr-auto   my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Cari daftar ongkir.." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
		             <button class="btn btn-info" type="button">
		                  <i class="fas fa-search fa-sm"></i>
	               	 </button>
             	 </div>
           	 	</div>
         	 </form>
		</div>
		 <div class="col-md-4"></div>
		 <div class="col-md-4">
		 	<div align="right">
		 		<a href="index.php?halaman=tambahongkir" class=" btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
		 	</div>
		 </div>	
	</div>
 
<table class="table table-bordered table-hove table-striped">
	<tr>
		<th>No.</th>
		<th>Tujuan Kota</th>
		<th>Detail</th>
		<th>Aksi</th>
	</tr>
	<?php 
	$no = 1;
		$ambil = $koneksi->query("SELECT * FROM ongkir");
		while($pecah = $ambil->fetch_assoc()){
		// echo "<pre>";
		// print_r($pecah);
		// echo "</pre>";
	 ?>
	<tr>
		<td><?php echo $no ?></td>
		<td><?php echo $pecah['nama_kota'] ?></td>
		<td align="center">
			<a href="index.php?halaman=detailongkir" class="btn btn-sm btn-secondary">
				<i class="fas fa-eye"></i>
			</a>
		</td>
		<td>
			<div class="text-center" align="center">
			<a href="index.php?halaman=ubahongkir&id=<?php echo $pecah['id_ongkir'] ?>" class="text btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
			<a href="" class="text btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
			</div>
		</td>
	</tr>
	<?php $no++ ?>
	<?php } ?>
</table>