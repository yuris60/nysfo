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

              <div class="form-group">
                <label>Nama Dokter</label>
                <input type="text" class="form-control <?= form_error('nm_dokter') ? 'is-invalid' : '' ?>" name="nm_dokter" id="nm_dokter">
                <div class="invalid-feedback">
                  <?= form_error('nm_dokter'); ?>
                </div>
              </div>

              <label>Jenis Kelamin</label><br>
              <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="jk_dokter" checked="" class="custom-control-input" value="L"><span class="custom-control-label">Laki-laki</span>
              </label>
              <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="jk_dokter" class="custom-control-input" value="P"><span class="custom-control-label">Perempuan</span>
              </label><br>

              <div class="form-group mt-2">
                <label>Tempat Lahir</label>
                <input type="text" min=0 class="form-control <?= form_error('tempatlahir_dokter') ? 'is-invalid' : '' ?>" name="tempatlahir_dokter" id="tempatlahir_dokter">
                <div class="invalid-feedback">
                  <?= form_error('tempatlahir_dokter'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar-alt"></i> </span></span>
                  <input type="text" min=0 class="form-control datepicker <?= form_error('tanggallahir_dokter') ? 'is-invalid' : '' ?>" name="tanggallahir_dokter" id="tanggallahir_dokter" readonly>
                  <div class="invalid-feedback">
                    <?= form_error('tanggallahir_dokter'); ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" id="alamat_dokter" name="alamat_dokter" rows="3"></textarea>
              </div>

              <div class="form-group">
                <label>No Telepon</label>
                <input type="text" class="form-control <?= form_error('notelp_dokter') ? 'is-invalid' : '' ?>" name="notelp_dokter" id="notelp_dokter">
                <div class="invalid-feedback">
                  <?= form_error('notelp_dokter'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control email-inputmask <?= form_error('email_dokter') ? 'is-invalid' : '' ?>" name="email_dokter" id="email_dokter email-mask">
                <div class="invalid-feedback">
                  <?= form_error('email_dokter'); ?>
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