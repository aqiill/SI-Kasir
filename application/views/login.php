<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Web Aplikasi Kasir Elektronik">
  <meta name="author" content="Aqil Rahman">

  <title>Kasir - Login</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo base_url('img/kasiroke.png'); ?>">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <style type="text/css">
    body{
      background-image: url(<?php echo base_url('img/bg.jpg'); ?>);
      background-size: cover;
    }
  </style>

</head>

<body>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"><img src="<?php echo base_url('img/bglogin.jpg') ?>"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="POST" action="<?php echo base_url('login/proses') ?>">
                    <div class="form-group">
                      <input required name="username" type="text" class="form-control form-control-user" placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input required name="password" type="password" class="form-control form-control-user" placeholder="Password">
                    </div>

                    <?php 
                      if($this->session->flashdata('gagal')){ ?>
                      <div class="form-group">
                        <div align="center" class="alert alert-danger" role="alert">
                          <?php echo $this->session->flashdata('gagal'); ?>
                        </div>
                      </div>
                    <?php  }
                     ?>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label text-primary" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" name="login" class="btn btn-primary btn-user btn-block" value="Login">
                  </form>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url() ?>js/sb-admin-2.min.js"></script>

</body>

</html>
