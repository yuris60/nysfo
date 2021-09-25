<!-- wrapper  -->
<!-- ============================================================== -->
<div class="dashboard-wrapper">
  <div class="container-fluid dashboard-content">
    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title"><i class="fas fa-<?= $icon ?>"></i> <?= strtoupper($menu) ?></h2>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li>
                  <p class="pr-2"><span class="badge badge-light">Menu Navigasi : </span></p>
                </li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/beranda') ?>" class="breadcrumb-link"><span class="badge badge-primary">Beranda</span></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/' . strtolower($menu)) ?>" class="breadcrumb-link"><span class="badge badge-primary"><?= $menu ?></span></a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="badge badge-dark"><?= $submenu ?></span></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="alert alert-primary" role="alert">
          <h4 class="alert-primary"><i class="fas fa-info"></i> Perhatian</h4>
          Silahkan isi formulir data <strong><?= strtoupper($menu) ?></strong> ini dengan baik dan benar.
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <form action="" method="POST" autocomplete="off">
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-plus"></i> Tambah Data</h4>
            </div>
            <div class="card-body">

              <!-- Hidden Id Admin -->
              <input type="hidden" name="id_admin" value="<?= $user['id_admin'] ?>">

              <div class="form-group">
                <label>Nama Admin</label>
                <input type="text" class="form-control <?= form_error('nm_admin') ? 'is-invalid' : '' ?>" name="nm_admin" id="nm_admin" value="<?= set_value('nm_admin') ?>" autofocus>
                <div class="invalid-feedback">
                  <?= form_error('nm_admin'); ?>
                </div>
              </div>

              <label>Akses</label><br>
              <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="akses" checked="" class="custom-control-input" value="Pemilik"><span class="custom-control-label">Pemilik</span>
              </label>
              <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="akses" class="custom-control-input" value="CS"><span class="custom-control-label">Customer Service</span>
              </label><br>

              <div class="form-group mt-3">
                <label>Username</label>
                <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" name="username" id="username" value="<?= set_value('username') ?>">
                <div class="invalid-feedback">
                  <?= form_error('username'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" name="password" id="password">
                <div class="invalid-feedback">
                  <?= form_error('password'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" class="form-control <?= form_error('passconf') ? 'is-invalid' : '' ?>" name="passconf" id="passconf">
                <div class="invalid-feedback">
                  <?= form_error('passconf'); ?>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url() . 'admin/' . strtolower($menu) ?>"><button type="button" class="btn btn-dark"><i class="fas fa-reply"></i> Kembali</button></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>