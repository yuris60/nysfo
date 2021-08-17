<div class="flash-data-stok-kurang" data-flashdata="<?= $this->session->flashdata('flash-data-stok-kurang'); ?>"></div>
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


    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fas fa-database"></i> Data
              <button type="button" class="btn btn-sm btn-danger float-right ml-2" data-toggle="modal" data-target="#pilihan_laporan" title="Cetak Laporan"><i class="fas fa-file-pdf"></i> Cetak Laporan</button>
              <a href="<?= base_url('admin/penjualan/create') ?>" class="float-right" data-toggle="tooltip" data-placement="top" title="Tambah Data"><button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button></a>

            </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal Penjualan</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Handphone</th>
                    <th width="auto">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($penjualan as $p) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= tgl_indo($p['tgl_penjualan']) ?></td>
                      <td><?= $p['nm_pelanggan'] ?></td>
                      <td><?= $p['alamat_pelanggan'] ?></td>
                      <td><?= $p['notelp_pelanggan'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/detail_penjualan/read/<?= $p['id_penjualan'] ?>">
                          <button class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Lihat Detail Penjualan"><i class="fas fa-info-circle"></i></button>
                        </a>
                        <!-- <a href="<?= base_url() ?>penjualan/update/<?= $p['id_penjualan'] ?>">
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Perbaharui Data"><i class="fas fa-edit"></i></button>
                        </a> -->
                        <a href="<?= base_url() ?>admin/penjualan/delete/<?= $p['id_penjualan'] ?>/<?= $user['id_admin'] ?>" class="tombol-hapus">
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

  <!-- Modal -->
  <div class="modal fade" id="pilihan_laporan" tabindex="-1" role="dialog" aria-labelledby="pilihan_laporan" Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <form action="<?= base_url('admin/penjualan/pendapatanpdf') ?>" method="post" autocomplete="off" target="_blank">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle"><i class="fas fa-file-pdf"></i> Cetak Laporan Berdasarkan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Pilihan</label>
              <select name="pilihan" class="form-control" id="pilihan" onchange="laporan_danamasuk()">
                <option value="">-== Pilih Disini ==-</option>
                <option value="" id="bulanan">Bulanan</option>
                <option value="" id="tahunan">Tahunan</option>
                <option value="" id="custom">Custom</option>
              </select>
            </div>

            <!-- Bulanan -->
            <div class="pilihan bulanan">
              <input type="text" class="form-control datepicker-bulanan" id="bulanan" name="bulanan" placeholder="Masukkan Bulanan">
            </div>

            <!-- Semesteran -->
            <div class="pilihan tahunan">
              <input type="text" class="form-control datepicker-tahunan" id="tahunan" name="tahunan" placeholder="Masukkan Tahunan">
            </div>


            <!-- Custom -->
            <div class="pilihan custom">
              <div class="input-daterange datepicker-range input-group" id="custom">
                <input type="text" class="input-sm form-control" name="custom_start" placeholder="Masukkan Tanggal Mulai" />
                <span class="input-group-addon">to</span>
                <input type="text" class="input-sm form-control" name="custom_end" placeholder="Masukkan Tanggal Akhir" />
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Cetak Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>