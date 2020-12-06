<?php session_start(); ?>
<?php
if (isset($_SESSION['pelanggan'])) {
  header('Location:index.php');
}

?>
<?php require_once 'db/database.php' ?>
<?php require_once 'templates/header.php' ?>
<?php require_once 'templates/sidebar.php' ?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-5 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register user!</h1>
                                    </div>
                                    <form class="user" method="post">

                                        <?php if (isset($_POST['register'])) {
                      $name = htmlspecialchars(stripcslashes($_POST['nama']));
                      $email = htmlspecialchars($_POST['email']);
                      $password = mysqli_real_escape_string($koneksi, $_POST['password']);
                      $confirm = mysqli_real_escape_string($koneksi, $_POST['con_password']);
                      $telpon = $_POST['telepon'];
                      $alamat = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST['alamat']));

                      if (strlen($password) < 8) {
                        echo "<div class='alert alert-danger'>password anda harus 8 digit </div>";
                        echo "<meta http-equiv='refresh' content='1.5;'>";
                      }
                      if ($password != $confirm) {
                        echo "<div class='alert alert-danger'>password tidak sama</div>";
                        echo "<meta http-equiv='refresh' content='1.5;'>";
                      }

                      $comot = $koneksi->query("SELECT * FROM pelanggan WHERE nama_pelanggan = '$name'");
                      $ada = $comot->num_rows;



                      $get = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'   ");
                      $cocok = $get->num_rows;
                      if ($cocok == 1) {
                        echo "<div class='alert alert-danger'>email sudah digunakan</div>";
                        echo "<meta http-equiv='refresh' content='1.5;'>";
                      } elseif ($ada == 1) {
                        echo "<div class='alert alert-danger'>username sudah digunakan</div>";
                        echo "<meta http-equiv='refresh' content='1.5;'>";
                      } else {
                        $passwordfiks = password_hash($password, PASSWORD_DEFAULT);
                        $koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_lengkap) VALUES ('$email','$passwordfiks','$name','$telpon','$alamat') ");
                        echo "<script>alert('anda berhasil mendaftar silahkan login')</script>";
                        echo "<script>location = 'login.php'</script>";
                        exit();
                      }
                    }


                    ?>
                                        <div class="form-group">
                                            <label>*Nama</label>
                                            <input type="text" class="form-control form-control-user" name="nama"
                                                placeholder="nama " required>
                                        </div>
                                        <div class="form-group">
                                            <label>*Email</label>
                                            <input type="email" class="form-control form-control-user" name="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>*Password</label>
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>*Enter Your Password Again</label>
                                            <input type="password" class="form-control form-control-user"
                                                name="con_password" placeholder="confirm Password" required>
                                        </div>

                                        <div class="form-group">
                                            <label>*Nomor telpon</label>
                                            <input type="text" class="form-control form-control-user" name="telepon"
                                                placeholder="nomor telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <label>*Alamat Lengkap Beserta Code Pos</label>
                                            <textarea type="text" name="alamat" class="form-control"
                                                placeholder="alamat anda" required></textarea>
                                        </div>

                                        <div class="text-center">
                                            <button name="register" type="submit" class="text-center btn btn-primary"
                                                onclick="return confirm('apakah anda yakin?');">Register!</button>
                                        </div>
                                    </form>

                                    <?php require_once 'templates/footer.php' ?>