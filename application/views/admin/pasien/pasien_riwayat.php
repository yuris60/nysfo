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
          <h2 class="pageheader-title"><i class="fas fa-<?= $icon ?>"></i> <?= strtoupper($submenu) ?> <small>(<?= $penjualan['nm_pelanggan'] ?>)</small></h2>
          <div class="page-breadcrumb">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li>
                  <p class="pr-2"><span class="badge badge-light">Menu Navigasi : </span></p>
                </li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/beranda') ?>" class="breadcrumb-link"><span class="badge badge-primary">Beranda</span></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/penjualan') ?>" class="breadcrumb-link"><span class="badge badge-primary"><?= $menu ?></span></a></li>
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
          Berikut ini adalah data <strong><?= strtoupper($submenu) ?></strong> atas nama
          <strong><?= $penjualan['nm_pelanggan'] ?></strong> yang sudah tersimpan dalam database.
        </div>
      </div>
    </div>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
          <div class="card-header bg-primary">
            <h4 style="color: white"><i class="fas fa-user"></i> Customer
            </h4>
          </div>
          <div class="card-body">

            <div class="form-group">
              <label>Tanggal Transaksi</label>
              <input type="text" class="form-control <?= form_error('tgl_penjualan') ? 'is-invalid' : '' ?>" name="tgl_penjualan" id="tgl_penjualan" readonly value="<?= tgl_indo($penjualan['tgl_penjualan']) ?>">
            </div>

            <div class="form-group">
              <label>Nama</label>
              <input type="text" class="form-control <?= form_error('jk_pelanggan') ? 'is-invalid' : '' ?>" name="jk_pelanggan" id="jk_pelanggan" readonly value="<?= $penjualan['nm_pelanggan'] ?>">
            </div>

            <div class="form-group">
              <label>No Telp</label>
              <input type="text" class="form-control <?= form_error('notelp_pelanggan') ? 'is-invalid' : '' ?>" name="notelp_pelanggan" id="notelp_pelanggan" readonly value="<?= $penjualan['notelp_pelanggan'] ?>">
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat_pelanggan" id="alamat_pelanggan" class="form-control" rows="2" readonly><?= $penjualan['alamat_pelanggan'] ?></textarea>
            </div>

            <div class="form-group">
              <label>Facebook</label>
              <input type="text" class="form-control <?= form_error('fb_pelanggan') ? 'is-invalid' : '' ?>" name="fb_pelanggan" id="fb_pelanggan" readonly value="<?= $penjualan['fb_pelanggan'] ?>">
            </div>

            <div class="form-group">
              <label>Instagram</label>
              <input type="text" class="form-control <?= form_error('ig_pelanggan') ? 'is-invalid' : '' ?>" name="ig_pelanggan" id="ig_pelanggan" readonly value="<?= $penjualan['ig_pelanggan'] ?>">
            </div>

            <div>
              <a href="<?= base_url() . 'admin/' . strtolower($menu) ?>"><button class="btn btn-block btn-dark">Kembali</button></a>
            </div>

          </div>
        </div>
        <!-- End Of Customer -->
      </div>


      <!-- Treatment -->
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fas fa-stethoscope"></i> Treatment
              <!-- <a href="<?= base_url('admin/detail_penjualan/createtreatment/') . $penjualan['id_penjualan'] ?>" class="float-right" data-toggle="tooltip" data-placement="top" title="Tambah Data"><button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button></a> -->
            </h4>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Treatment</th>
                    <th>Harga</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Diskon</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($join_treatment as $jt) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $jt['tgl_penjualan'] ?></td>
                      <td><?= $jt['nm_treatment'] ?></td>
                      <td align="right"><?= rupiah($jt['harga_treatment']); ?></td>
                      <td align="center"><?= $jt['qty_treatment'] ?></td>
                      <td align="right"><?= rupiah($jt['total']); ?></td>
                      <td align="right"><?= rupiah($jt['diskon']); ?></td>
                      <td align="right"><?= rupiah($jt['subtotal']); ?></td>
                    </tr>
                  <?php $no++;
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of Treatment -->

        <!-- Produk -->
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h4><i class="fas fa-box"></i> Produk
                  <!-- <a href="<?= base_url('admin/detail_penjualan/createproduk/') . $penjualan['id_penjualan'] ?>" class="float-right" data-toggle="tooltip" data-placement="top" title="Tambah Data"><button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button></a> -->
                </h4>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered first">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th>Diskon</th>
                        <th>Subtotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($join_produk as $jp) {
                      ?>
                        <tr>
                          <td><?= $no ?></td>
                          <td><?= $jp['tgl_penjualan'] ?></td>
                          <td><?= $jp['jns_produk'] ?></td>
                          <td align="right"><?= rupiah($jp['harga_produk']); ?></td>
                          <td align="center"><?= $jp['qty_produk'] ?></td>
                          <td align="right"><?= rupiah($jp['total']); ?></td>
                          <td align="right"><?= rupiah($jp['diskon']); ?></td>
                          <td align="right"><?= rupiah($jp['subtotal']); ?></td>
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
        <!-- End of Produk -->
      </div>

    </div>
  </div>