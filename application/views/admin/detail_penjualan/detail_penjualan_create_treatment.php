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
          <h2 class="pageheader-title"><i class="fas fa-<?= $icon ?>"></i> <?= strtoupper($submenu) ?> <small>(<?= tgl_indo($penjualan['tgl_penjualan']) . " | " . $penjualan['nm_pelanggan'] ?>)</small></h2>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li>
                  <p class="pr-2"><span class="badge badge-light">Menu Navigasi : </span></p>
                </li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/beranda') ?>" class="breadcrumb-link"><span class="badge badge-primary">Beranda</span></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/penjualan') ?>" class="breadcrumb-link"><span class="badge badge-primary"><?= $menu ?></span></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/detail_penjualan/read/') . $penjualan['id_penjualan'] ?>" class="breadcrumb-link"><span class="badge badge-primary"><?= $submenu ?></span></a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="badge badge-dark"><?= $subsubmenu ?></span></li>
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
          Silahkan isi formulir data <strong><?= strtoupper($submenu) ?></strong> ini dengan baik dan benar.
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

              <!-- Input Hidden -->
              <input type="hidden" name="id_penjualan" id="id_detailpenjualan" value="<?= $penjualan['id_penjualan'] ?>">
              <input type="hidden" name="id_produk" id="id_produk" value="0">
              <input type="hidden" name="qty_produk" id="qty_produk" value="0">
              <input type="hidden" name="id_admin" value="<?= $user['id_admin'] ?>">

              <input type="hidden" name="id_detailtreatment" id="id_detailtreatment">

              <!-- <div class="form-group">
                <label>Jenis Treatment</label>
                <select class="custom-select" name="id_detailtreatment">
                  <option>-== Pilih Disini ==-</option>
                  <?php
                  foreach ($treatment as $t) {
                  ?>
                    <option value="<?= $t['id_detailtreatment'] ?>"><?= $t['jns_treatment'] ?> - <?= $t['nm_treatment'] ?> (<?= rupiah($t['harga_treatment']) ?>)</option>
                  <?php $no++;
                  } ?>
                </select>
              </div> -->

              <label>Nama Treatment</label>
              <div class="input-group mb-3">
                <input type="text" name="nm_treatment" id="nm_treatment" class="form-control" readonly>
                <div class="input-group-append">
                  <a href="#" data-toggle="modal" data-target="#modal-item"><button type="button" class="btn btn-primary"><i class="fas fa-search"></i> Cari Treatment</button></a>
                </div>
              </div>

              <div class="form-group">
                <label>Qty</label>
                <input type="number" min=1 value=1 class="form-control <?= form_error('qty_treatment') ? 'is-invalid' : '' ?>" name="qty_treatment" id="qty_treatment">
                <div class="invalid-feedback">
                  <?= form_error('qty_treatment'); ?>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('admin/detail_penjualan/read/') . $penjualan['id_penjualan'] ?>"><button type="button" class="btn btn-dark"><i class="fas fa-reply"></i> Kembali</button></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cari Pasien</h5>
          <a href="#" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body table-responsive">
          <h2 class="text-center">Cari Pasien</h2>
          <table class="table table-bordered table-striped first" id="#table1" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Jenis Treatment</th>
                <th>Nama Treatment</th>
                <th>Harga Treatment</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($treatment as $t) : ?>
                <tr>
                  <td><?= $t['id_detailtreatment'] ?></td>
                  <td><?= $t['jns_treatment'] ?></td>
                  <td><?= $t['nm_treatment'] ?></td>
                  <td><?= rupiah($t['harga_treatment']) ?></td>
                  <td>
                    <button class="btn btn-sm btn-primary" id="pilih" data-id="<?= $t['id_detailtreatment'] ?>" data-jenis="<?= $t['jns_treatment'] ?>" data-nama="<?= $t['nm_treatment'] ?>" data-harga="<?= $t['harga_treatment'] ?>"><i class="fas fa-check"></i> Pilih</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-dark" data-dismiss="modal">Tutup</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <script src="<?= base_url('assets/') ?>concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $(document).on('click', '#pilih', function() {
        var item_id = $(this).data('id');
        var item_nama = $(this).data('nama');
        $('#id_detailtreatment').val(item_id);
        $('#nm_treatment').val(item_nama);
        $('#modal-item').modal('hide');
      })
    })
  </script>