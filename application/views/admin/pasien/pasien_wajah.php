<?php $this->session->set_userdata('pasien_wajah', current_url()); ?>
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

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
          <h4 class="alert-primary"><i class="fas fa-info"></i> Informasi</h4>
          Berikut ini adalah data wajah <strong><?= ucwords($pasien['nm_pelanggan']) ?></strong> yang sudah tersimpan dalam database.
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <?php if (!empty($pasien['foto_sebelum'])) : ?>
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-meh"></i> Wajah Sebelum (Before)</h4>
            </div>
            <div class="card-body">
              <input type="file" name="fotosebelum" class="dropify" data-default-file="<?= base_url('assets/img/pelanggan/') . $pasien['foto_sebelum'] ?>" data-height="500">
            </div>
            <div class="card-footer">
              <a class="tombol-hapus" href="<?= base_url() ?>admin/pasien/delete_wajah_before/<?= $pasien['id_pelanggan'] ?>"><button class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Hapus Gambar</button></a>
            </div>
          </div>
        <?php else : ?>
          <?php echo form_open_multipart('admin/pasien/upload_wajah_before/' . $this->uri->segment(4)); ?>
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-meh"></i> Wajah Sebelum (Before)</h4>
            </div>
            <div class="card-body">
              <input type="hidden" value="<?= $user['id_admin'] ?>">
              <input type="file" name="fotosebelum" class="dropify" data-height="500">
            </div>
            <div class="card-footer">
              <button class="btn btn-success btn-block"><i class="fas fa-save"></i> Simpan Gambar</button>
            </div>
          </div>
          </form>
        <?php endif; ?>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
        <?php if (!empty($pasien['foto_sesudah'])) : ?>
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-smile"></i> Wajah Sesudah (After)</h4>
            </div>
            <div class="card-body">
              <input type="file" name="fotosesudah" class="dropify" data-default-file="<?= base_url('assets/img/pelanggan/') . $pasien['foto_sesudah'] ?>" data-height="500">
            </div>
            <div class="card-footer">
              <a class="tombol-hapus" href="<?= base_url() ?>admin/pasien/delete_wajah_after/<?= $pasien['id_pelanggan'] ?>"><button class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Hapus Gambar</button></a>
            </div>
          </div>
        <?php else : ?>
          <?php echo form_open_multipart('admin/pasien/upload_wajah_after/' . $this->uri->segment(4)); ?>
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-smile"></i> Wajah Sesudah (After)</h4>
            </div>
            <div class="card-body">
              <input type="hidden" value="<?= $user['id_admin'] ?>">
              <input type="file" name="fotosesudah" class="dropify" data-height="500">
            </div>
            <div class="card-footer">
              <button class="btn btn-success btn-block"><i class="fas fa-save"></i> Simpan Gambar</button>
            </div>
          </div>
          </form>
        <?php endif; ?>
      </div>
    </div>

  </div>