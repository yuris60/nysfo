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
              <a href="<?= base_url('admin/laporanpasien/exporttoexcel') ?>" target="_blank"><button type="button" class="btn btn-sm btn-success float-right" data-toggle="tooltip" data-placement="top" title="Export to Excel"><i class="fas fa-file-excel"></i></button></a>
              <a href="<?= base_url('admin/laporanpasien/exporttopdf') ?>" target="_blank"><button type="button" class="btn btn-sm btn-danger float-right mx-2" data-toggle="tooltip" data-placement="top" title="Export to PDF"><i class="fas fa-file-pdf"></i></button></a>
            </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Jenis Kelamin</th>
                    <th width="50px">Usia</th>
                    <th>Alamat</th>
                    <th>No Telp</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($pasien as $p) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $p['nm_pelanggan'] ?></td>
                      <td>
                        <?php if ($p['jk_pelanggan'] == "L") : ?>
                          <?= "Laki-laki" ?>
                        <?php else : ?>
                          <?= "Perempuan" ?>
                        <?php endif; ?>
                      </td>
                      <td><?= $p['umur_pelanggan'] ?> Tahun</td>
                      <td><?= $p['alamat_pelanggan'] ?></td>
                      <td><?= $p['notelp_pelanggan'] ?></td>
                      <td class="text-center">
                        <?php if (empty($p['fb_pelanggan'])) : ?>
                          <?= "-" ?>
                        <?php else : ?>
                          <?= $p['fb_pelanggan'] ?>
                        <?php endif; ?>
                      </td>
                      <td class="text-center">
                        <?php if (empty($p['ig_pelanggan'])) : ?>
                          <?= "-" ?>
                        <?php else : ?>
                          <?= $p['ig_pelanggan'] ?>
                        <?php endif; ?>
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