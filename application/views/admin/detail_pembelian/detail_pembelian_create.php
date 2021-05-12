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
          <h2 class="pageheader-title"><i class="fas fa-<?= $icon ?>"></i> <?= strtoupper($submenu) ?> <small>(<?= tgl_indo($pembelian['tgl_pembelian']) . " | " . $pembelian['nm_supplier'] ?>)</small></h2>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li>
                  <p class="pr-2"><span class="badge badge-light">Menu Navigasi : </span></p>
                </li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/beranda') ?>" class="breadcrumb-link"><span class="badge badge-primary">Beranda</span></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/pembelian') ?>" class="breadcrumb-link"><span class="badge badge-primary"><?= $menu ?></span></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/detail_pembelian/read/') . $pembelian['id_pembelian'] ?>" class="breadcrumb-link"><span class="badge badge-primary"><?= $submenu ?></span></a></li>
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
              <input type="hidden" name="id_pembelian" id="id_detailpembelian" value="<?= $pembelian['id_pembelian'] ?>">
              <input type="hidden" name="id_admin" value="<?= $user['id_admin'] ?>">

              <div class="form-group">
                <label>Jenis Produk</label>
                <select class="custom-select" name="id_produk">
                  <option>-== Pilih Disini ==-</option>
                  <?php
                  $no = 1;
                  foreach ($produk as $p) {
                  ?>
                    <option value="<?= $p['id_produk'] ?>"><?= $no . ". " . $p['jns_produk'] ?></option>
                  <?php $no++;
                  } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Harga Beli</label>
                <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Rp. </span></span>
                  <input type="number" min=0 class="form-control <?= form_error('harga_beli') ? 'is-invalid' : '' ?>" name="harga_beli" id="harga_beli">
                  <div class="invalid-feedback">
                    <?= form_error('harga_beli'); ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Qty Beli</label>
                <input type="number" min=1 class="form-control <?= form_error('qty_beli') ? 'is-invalid' : '' ?>" name="qty_beli" id="qty_beli">
                <div class="invalid-feedback">
                  <?= form_error('qty_beli'); ?>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url('admin/detail_pembelian/read/') . $pembelian['id_pembelian'] ?>"><button type="button" class="btn btn-dark"><i class="fas fa-reply"></i> Kembali</button></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>