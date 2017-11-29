<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url() ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url() ?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url() ?>css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <div style="color:red"><?php echo validation_errors(); ?></div>
        <?php echo form_open('register/submit') ?>
          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <input class="form-control" name="email" id="InputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputPassword1">Password</label>
                <input class="form-control" name="password" id="InputPassword1" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="ConfirmPassword">Confirm password</label>
                <input class="form-control" name="confirmPassword" id="ConfirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="APIKey1">API Key</label>
                <input class="form-control" name="api" id="APIKey1" type="text" placeholder="API Key">
              </div>
              <div class="col-md-6">
                <label for="SecretKey1">Secret Key</label>
                <input class="form-control" name="secret" id="SecretKey1" type="text" placeholder="Secret Key">
              </div>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Register" name="register">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('login') ?>">Login Page</a>
          <a class="d-block small" href="#">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url() ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
