<?php session_start() ?>

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

            <div class="col-xl-5 col-lg-12 col-md-9 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login user!</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                aria-describedby="emailHelp" placeholder="Enter Email Address..."
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Password" required>
                                        </div>
                                        <div class="text-center">
                                            <button name="simpan" type="submit" class="btn btn-primary"
                                                onclick="return confirm('anda yakin?')">Login!</button>
                                        </div>

                                    </form>
                                    <?php
                  if (isset($_POST['simpan'])) {
                    // query untuk mencari email di database
                    $pass = $_POST['password'];
                    $email = $_POST['email'];
                    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'  ");
                    // ngitung jumlah akun
                    if (mysqli_num_rows($ambil) === 1) {

                      $row = $ambil->fetch_assoc();

                      if (password_verify($pass, $row['password_pelanggan'])) {


                        $_SESSION['pelanggan'] = $row;

                        // cookie check


                        echo "<div class='mt=3 alert alert-success'>Login sukses</div>";

                        $id = $_SESSION["pelanggan"]["id_pelanggan"];
                        $get = $koneksi->query("SELECT * FROM keranjang WHERE id_pelanggan = $id ");
                        if (mysqli_num_rows($get) === 0) {
                          echo "<script>location='index.php'</script>";

                          exit;
                        } else {

                          echo "<script>location='keranjang.php'</script>";
                          exit;
                        }
                      }
                    }
                    echo "<div class='mt-3 alert alert-danger'>Login Gagal!</div>";
                    echo "<meta http-equiv='refresh' content='1.5;'>";
                    exit();
                  }



                  ?>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="register.php">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php require_once 'templates/footer.php' ?>