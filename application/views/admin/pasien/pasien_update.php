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
        <div class="alert alert-warning" role="alert">
          <h4 class="alert-warning"><i class="fas fa-info"></i> Perhatian</h4>
          Silahkan isi formulir data <strong><?= strtoupper($menu) ?></strong> ini dengan baik dan benar.
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <form action="" method="POST" autocomplete="off">
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-edit"></i> Perbaharui Data</h4>
            </div>
            <div class="card-body">

              <!-- Input Hidden -->
              <input type="hidden" name="id_admin" value="<?= $user['id_admin'] ?>">

              <div class="form-group">
                <label>Nama pasien</label>
                <input type="text" class="form-control <?= form_error('nm_pelanggan') ? 'is-invalid' : '' ?>" name="nm_pelanggan" id="nm_pelanggan" value="<?= $pasien['nm_pelanggan'] ?>" autofocus>
                <div class="invalid-feedback">
                  <?= form_error('nm_pelanggan'); ?>
                </div>
              </div>

              <label>Jenis Kelamin</label><br>
              <?php
              if ($pasien['jk_pelanggan'] == "L") :
              ?>
                <label class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="jk_pelanggan" checked="" class="custom-control-input" value="L"><span class="custom-control-label">Laki-laki</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="jk_pelanggan" class="custom-control-input" value="P"><span class="custom-control-label">Perempuan</span>
                </label><br>
              <?php else : ?>
                <label class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="jk_pelanggan" class="custom-control-input" value="L"><span class="custom-control-label">Laki-laki</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="jk_pelanggan" checked="" class="custom-control-input" value="P"><span class="custom-control-label">Perempuan</span>
                </label><br>
              <?php endif; ?>

              <label class="mt-2">Umur</label>
              <div class="input-group">
                <input type="number" min=0 class="form-control <?= form_error('umur_pelanggan') ? 'is-invalid' : '' ?>" name="umur_pelanggan" id="umur_pelanggan" value="<?= $pasien['umur_pelanggan'] ?>">
                <div class="input-group-append">
                  <span class="input-group-text">Tahun</span>
                </div>
              </div>

              <div class="form-group mt-3">
                <label>No Telepon</label>
                <input type="text" class="form-control <?= form_error('notelp_pelanggan') ? 'is-invalid' : '' ?>" name="notelp_pelanggan" id="notelp_pelanggan" value="<?= $pasien['notelp_pelanggan'] ?>">
              </div>

              <div class="form-group mt-2">
                <label>Alamat</label>
                <textarea class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" rows="3"><?= $pasien['alamat_pelanggan'] ?></textarea>
              </div>

              <label class="mt-2">Email</label>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control email-inputmask <?= form_error('email_pelanggan') ? 'is-invalid' : '' ?>" name="email_pelanggan" id="email_pelanggan email-mask" value="<?= $pasien['email_pelanggan'] ?>">
              </div><br>

              <label class="mt-2">Facebook</label>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                </div>
                <input type="text" class="form-control <?= form_error('fb_pelanggan') ? 'is-invalid' : '' ?>" name="fb_pelanggan" id="fb_pelanggan" value="<?= $pasien['fb_pelanggan'] ?>">
              </div><br>

              <label class="mt-2">Instagram</label>
              <div class="input-group">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                </div>
                <input type="text" class="form-control <?= form_error('ig_pelanggan') ? 'is-invalid' : '' ?>" name="ig_pelanggan" id="ig_pelanggan" value="<?= $pasien['ig_pelanggan'] ?>">
              </div><br>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Perbaharui</button>
              <a href="<?= base_url() . 'admin/' . strtolower($menu) ?>"><button type="button" class="btn btn-dark"><i class="fas fa-reply"></i> Kembali</button></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>