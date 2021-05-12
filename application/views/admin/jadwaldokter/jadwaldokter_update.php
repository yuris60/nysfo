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
                <li class="breadcrumb-item"><a href="<?= base_url('admin/jadwaldokter') ?>" class="breadcrumb-link"><span class="badge badge-primary"><?= $menu ?></span></a></li>
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
          Silahkan perbaharui formulir data <strong><?= strtoupper($menu) ?></strong> ini dengan baik dan benar.
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
                <label>Nama Dokter</label>
                <select class="custom-select" name="id_dokter">
                  <option>-== Pilih Disini ==-</option>
                  <?php
                  foreach ($dokter as $d) :
                  ?>
                    <?php
                    if ($jadwaldokter['id_dokter'] == $d['id_dokter']) :
                    ?>
                      <option value="<?= $d['id_dokter'] ?>" selected><?= $d['nm_dokter'] ?></option>
                    <?php else : ?>
                      <option value="<?= $d['id_dokter'] ?>"><?= $d['nm_dokter'] ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="form-group">
                <label>Hari</label>
                <input type="text" class="form-control <?= form_error('hari') ? 'is-invalid' : '' ?>" name="hari" value="<?= $jadwaldokter['hari'] ?>">
                <div class="invalid-feedback">
                  <?= form_error('hari'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>Jam Mulai</label>
                <input type="text" class="form-control <?= form_error('jam_mulai') ? 'is-invalid' : '' ?>" name="jam_mulai" id="datetimepicker3" value="<?= $jadwaldokter['jam_mulai'] ?>">
                <div class="invalid-feedback">
                  <?= form_error('jam_mulai'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>Jam Selesai</label>
                <input type="text" class="form-control <?= form_error('jam_selesai ') ? 'is-invalid' : '' ?>" name="jam_selesai" id="datetimepicker4" value="<?= $jadwaldokter['jam_selesai'] ?>">
                <div class="invalid-feedback">
                  <?= form_error('jam_selesai'); ?>
                </div>
              </div>


            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-warning"><i class="fas fa-edit"></i> Perbaharui</button>
              <a href="<?= base_url('admin/jadwaldokter') ?>"><button type="button" class="btn btn-dark"><i class="fas fa-reply"></i> Kembali</button></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>