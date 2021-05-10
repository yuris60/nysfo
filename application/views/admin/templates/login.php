<div class="flash-data-admin-belum-login" data-flashdata=<?= $this->session->flashdata('flash-belum-login') ?>></div>
<div class="flash-data-admin-gagal" data-flashdata=<?= $this->session->flashdata('flash') ?>></div>
<div class="flash-data-admin-logout" data-flashdata=<?= $this->session->flashdata('flash-logout') ?>></div>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/bootstrap/css/bootstrap.min.css">
  <link href="<?= base_url('assets/') ?>concept/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/libs/css/style.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
    }
  </style>
</head>

<body>
  <!-- ============================================================== -->
  <!-- login page  -->
  <!-- ============================================================== -->

  <div class="splash-container">
    <form action="" method="POST" autocomplete="off">
      <div class="card">
        <div class="card-header text-center">
          <a href="../index.html">
            <h2>NBC Login</h2>
          </a>
        </div>
        <div class="card-body">
          <div class="form-group">
            <label>Username :</label>
            <input type="text" name="username" class="form-control form-control-lg <?php echo form_error('username') ? 'is-invalid' : '' ?>" id="username" placeholder="Masukkan Username">
            <div class="invalid-feedback">
              <?php echo form_error('username'); ?>
            </div>
          </div>
          <div class="form-group">
            <label>Password :</label>
            <input type="password" name="password" class="form-control form-control-lg <?php echo form_error('password') ? 'is-invalid' : '' ?>" id="password" placeholder="Masukkan Password">
            <div class="invalid-feedback">
              <?php echo form_error('password'); ?>
            </div>
          </div>
        </div>
        <div class="card-footer bg-white p-0  ">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </div>
      </div>
    </form>
  </div>

  <!-- ============================================================== -->
  <!-- end login page  -->
  <!-- ============================================================== -->
  <!-- Optional JavaScript -->
  <script src="<?= base_url('assets/') ?>concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url('assets/') ?>concept/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.all.min.js"></script>
  <script src="<?= base_url('assets/') ?>js/myscript.js"></script>
</body>

</html>