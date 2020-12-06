<h1>Ubah Profile</h1>
<hr>

<?php
$id_admin = $_SESSION['admin']['id_admin'];
$ambil = $koneksi->query("SELECT * FROM admin WHERE id_admin = '$id_admin' ");
$pecah = $ambil->fetch_assoc();
?>
<form method="post">
    <div class="col-md-7">
        <div class="form-group">
            <label for="nama">Username</label>
            <input type="text" required id="nama" class="form-control" name="nama" value="<?= $pecah['username']; ?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" required id="email" class="form-control" name="email" value="<?= $pecah['email']; ?>">
        </div>
        <div class="form-group">
            <label for="nomor">No. Telp</label>
            <input type="number" required id="nomor" class="form-control" name="nomor"
                value="<?= $pecah['no_telp_admin']; ?>">
        </div>
    </div>
    <div class="text-right">
        <button type="submit" name="ubah" class="btn btn-primary"
            onclick="return confirm('Yakin? kalo ga ada yang diubah cancel aja')"><i class="fas fa-edit"></i>
            Ubah</button>
    </div>
    <a href="index.php" style="margin-top:-63.5px" class="btn btn-secondary"><i class="fas fa-arrow-left"> Back</i></a>
</form>

<?php
if (isset($_POST['ubah'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor'];
    $pass = $pecah['password'];
    $koneksi->query("INSERT INTO admin (username,password,email,no_telp_admin) VALUES('$nama','$pass','$email','$nomor') WHERE id_admin='$id_admin' ");

    echo "<script>alert('Data Di Ubah')</script>";
    echo "<script>location='index.php'</script>";
}
?>