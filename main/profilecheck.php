<?php session_start() ?>
<?php require_once 'db/proteksi.php' ?>
<?php require_once 'db/database.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>


<div class="container">
    <h1>Profile <?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?></h1>
    <hr>
    <form method="post">
        <div class="col-md-7">
            <div class="form-group">
                <?php
				$nama = $_SESSION['pelanggan']['nama_pelanggan'];
				$email = $_SESSION['pelanggan']['email_pelanggan'];
				$telp = $_SESSION['pelanggan']['telepon_pelanggan'];
				$alamat = $_SESSION['pelanggan']['alamat_lengkap'];
				?>
                <label><strong>Nama Anda :</strong></label>
                <input type="text" name="nama" value="<?php echo $nama ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label><strong>Email Anda :</strong></label>
                <input type="text" name="email" value="<?php echo $email ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label><strong>No. Telp Anda :</strong></label>
                <input type="number" name="telp" value="<?php echo $telp ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label><strong>Alamat Anda :</strong></label>
                <textarea class="form-control" name="alamat"><?php echo $alamat ?></textarea>
            </div>
    </form>
    <div class='text-right'>
        <button type="submit" name="update" class="btn btn-primary"
            onclick="return confirm('anda yakin mau mengubah informasi diri anda?')"><i class='fas fa-upload'></i>
            Update!</button>
    </div>
</div>
</div>
<?php if (isset($_POST['update'])) {
	$namabaru = htmlspecialchars(stripcslashes($_POST['nama']));
	$emailbaru = htmlspecialchars($_POST['email']);
	$telpbaru = htmlspecialchars($_POST['telp']);
	$alamatbaru = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['alamat']));
	$idpel = $_SESSION['pelanggan']['id_pelanggan'];
	$koneksi->query("UPDATE pelanggan SET email_pelanggan='$emailbaru',nama_pelanggan='$namabaru',telepon_pelanggan='$telpbaru',alamat_lengkap='$alamatbaru' WHERE id_pelanggan = '$idpel'  ");
	echo "<script>alert('data diri anda sudah di perbaharui')</script>";
	echo "<script>location='checkout.php'</script>";
}

?>

<?php require_once 'templates/footer.php' ?>