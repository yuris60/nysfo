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
                <li class="breadcrumb-item active" aria-current="page"><span class="badge badge-dark"><?= $menu ?></span></li>
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
          Berikut ini adalah data <strong><?= strtoupper($menu) ?></strong> yang sudah tersimpan dalam database.
        </div>
      </div>
    </div>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fas fa-database"></i> Data
              <a href="<?= base_url('admin/' . strtolower($menu) . '/laporanpdfall') ?>" target="_blank"><button type="button" class="btn btn-sm btn-danger float-right mx-2" data-toggle="tooltip" data-placement="top" title="Export PDF"><i class="fas fa-file-pdf"></i></button></a>
              <a href="<?= base_url('admin/member/create') ?>" class="float-right" data-toggle="tooltip" data-placement="top" title="Tambah Data"><button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button></a>
            </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Member</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>JK</th>
                    <th>Umur</th>
                    <th>Email</th>
                    <th width="auto">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($member as $m) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $m['nm_pelanggan'] ?></td>
                      <td><?= $m['alamat_pelanggan'] ?></td>
                      <td><?= $m['notelp_pelanggan'] ?></td>
                      <td><?= $m['jk_pelanggan'] ?></td>
                      <td><?= $m['umur_pelanggan'] ?></td>
                      <td><?= $m['email_pelanggan'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/member/update/<?= $m['id_pelanggan'] ?>">
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Perbaharui Data"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="<?= base_url() ?>admin/member/delete/<?= $m['id_pelanggan'] ?>/<?= $user['id_admin'] ?>" class="tombol-hapus">
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></button>
                        </a>
                      </td>
                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>