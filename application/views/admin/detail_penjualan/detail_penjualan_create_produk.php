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
              <input type="hidden" name="id_treatment" id="id_treatment" value="0">
              <input type="hidden" name="qty_treatment" id="qty_treatment" value="0">
              <input type="hidden" name="id_admin" value="<?= $user['id_admin'] ?>">

              <input type="hidden" name="id_produk" id="id_produk">
              <!-- <div class="form-group">
                <label>Jenis Produk</label>
                <select class="custom-select" name="id_produk">
                  <option>-== Pilih Disini ==-</option>
                  <?php
                  foreach ($produk as $p) {
                  ?>
                    <option value="<?= $p['id_produk'] ?>"><?= $p['jns_produk'] ?> - Stok : <?= $p['stok'] ?> (<?= rupiah($p['harga_produk']) ?>)</option>
                  <?php $no++;
                  } ?>
                </select>
              </div> -->

              <label>Nama Produk</label>
              <div class="input-group mb-3">
                <input type="text" name="jns_produk" id="jns_produk" class="form-control" readonly>
                <div class="input-group-append">
                  <a href="#" data-toggle="modal" data-target="#modal-item"><button type="button" class="btn btn-primary"><i class="fas fa-search"></i> Cari Produk</button></a>
                </div>
              </div>

              <div class="form-group">
                <label>Qty Jual</label>
                <input type="number" min=1 value=1 class="form-control <?= form_error('qty_produk') ? 'is-invalid' : '' ?>" name="qty_produk" id="qty_produk">
                <div class="invalid-feedback">
                  <?= form_error('qty_produk'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>Diskon <code>(Dalam Persen)</code></label>
                <input type="number" min=0 value=0 max="100" class="form-control <?= form_error('diskon') ? 'is-invalid' : '' ?>" name="diskon" id="diskon">
                <div class="invalid-feedback">
                  <?= form_error('diskon'); ?>
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
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga Produk</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($produk as $p) : ?>
                <tr>
                  <td><?= $p['id_produk'] ?></td>
                  <td><?= $p['jns_produk'] ?></td>
                  <td><?= $p['stok'] ?></td>
                  <td><?= $p['harga_produk'] ?></td>
                  <td>
                    <button class="btn btn-sm btn-primary" id="pilih" data-id="<?= $p['id_produk'] ?>" data-jenis="<?= $p['jns_produk'] ?>" data-stok="<?= $p['stok'] ?>" data-harga="<?= $p['harga_produk'] ?>"><i class="fas fa-check"></i> Pilih</button>
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
        var item_jenis = $(this).data('jenis');
        $('#id_produk').val(item_id);
        $('#jns_produk').val(item_jenis);
        $('#modal-item').modal('hide');
      })
    })
  </script>