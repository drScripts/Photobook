<?php session_start(); ?> 
<?php 
  if (isset($_SESSION['pelanggan'])) {
    header('Location:../index.php');
  }elseif(!isset($_SESSION['register'])){
    header('Location:../index.php');
  }

 ?>
<?php include 'db/database.php' ?>
<?php include 'templates/header.php' ?>

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
                    <h1 class="h4 text-gray-900 mb-4">Register Admin!</h1>
                  </div>
                  <form class="user" method="post">

                      <?php if (isset($_POST['register'])) 
                  {
                    $name = htmlspecialchars(stripcslashes($_POST['nama']));
                    $email = htmlspecialchars($_POST['email']);
                    $password = mysqli_real_escape_string($koneksi,$_POST['password']);
                    $confirm = mysqli_real_escape_string($koneksi,$_POST['con_password']);
                    $telpon = $_POST['telepon'];

                    if (strlen($password) < 8 ) 
                    {
                      echo "<div class='alert alert-danger'>password anda harus 8 digit </div>";
                      echo "<meta http-equiv='refresh' content='1.5;'>";

                    }
                    if($password != $confirm){
                      echo "<div class='alert alert-danger'>password tidak sama</div>";
                      echo "<meta http-equiv='refresh' content='1.5;'>";

                      }

                      $comot = $koneksi->query("SELECT * FROM admin WHERE username = '$name'");
                       $ada = $comot->num_rows;
                       
                        
                       
                      $get = $koneksi->query("SELECT * FROM admin WHERE email = '$email'   ");
                      $cocok = $get->num_rows;
                    if ($cocok==1) 
                      {
                      echo "<div class='alert alert-danger'>email sudah digunakan</div>";
                      echo "<meta http-equiv='refresh' content='1.5;'>";
                      }elseif($ada==1){
                         echo "<div class='alert alert-danger'>username sudah digunakan</div>";
                         echo "<meta http-equiv='refresh' content='1.5;'>";
                      }else{
                        $passwordfiks = password_hash($password, PASSWORD_DEFAULT);
                        $koneksi->query("INSERT INTO admin(username,password,email,no_telp_admin) VALUES('$name','$passwordfiks','$email','$telpon')");
                        echo "<script>alert('anda berhasil mendaftar silahkan login')</script>";
                        echo "<script>location = 'login.php'</script>";
                        exit();
                      }
                  } 


                  ?>
                    <div class="form-group">
                      <label>*Username</label>
                      <input type="text" class="form-control form-control-user" name="nama" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                      <label>*Email</label>
                      <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                    </div>
                    <div class="form-group">
                      <label>*Password</label>
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <label>*Enter Your Password Again</label>
                      <input type="password" class="form-control form-control-user" name="con_password" placeholder="confirm Password" required>
                    </div>
                    <div class="form-group">
                      <label>*Nomor telpon</label>
                      <input type="text" class="form-control form-control-user" name="telepon" placeholder="nomor telepon" required>
                    </div>
                    <div class="text-center">
                      <button name="register" type="submit" class="text-center btn btn-primary" onclick="return confirm('apakah anda yakin?');">Register!</button>
                    </div>
                  </form>
                  
  <?php include 'templates/footer.php' ?>
 