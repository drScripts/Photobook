<?php session_start() ?>
<?php include 'db/database.php' ?>
<?php include 'templates/header.php' ?>
<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5">

      <div class="col-xl-5 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
               
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="username" class="form-control form-control-user" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" name="login">
                      Login
                    </button>
                    <hr>
                     
                  </form>

                  <?php 
                  if (isset($_POST['login'])) {
                  	$nama = $_POST['username'];
                  	$pass = $_POST['password'];

                  	if ($nama != "admin") {
                  		echo "<script>location='../index.php'</script>";
                  	}elseif($pass != "123123123123" ){
                  		echo "<script>location='../index.php'</script>";
                  	}else{
                      $_SESSION['register'] = "register"; 
                  		echo "<script>location='registers.php'</script>";
                  	}
                  }
                   ?>
                  <hr>
                   
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

 <?php include 'templates/footer.php' ?>