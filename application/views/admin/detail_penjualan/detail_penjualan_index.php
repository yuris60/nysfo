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
          <strong><?= $penjualan['nm_pelanggan'] ?></strong> pada tanggal <strong><?= tgl_indo($penjualan['tgl_penjualan']) ?></strong> yang sudah tersimpan dalam database.
        </div>
      </div>
    </div>

    <?php $this->session->set_userdata('detail_penjualan', current_url()); ?>
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

            <div>
              <a href="<?= base_url() . 'admin/' . strtolower($menu) ?>"><button class="btn btn-block btn-dark">Kembali</button></a>
            </div>

          </div>
        </div>
        <!-- End Of Customer -->

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header bg-success">
                <h4 style="color: white"><i class="fas fa-dollar-sign"></i> Total Pembayaran
                  <a href="<?= base_url('admin/detail_penjualan/cetakstruk/') . $penjualan['id_penjualan'] ?>" target="_blank"><button type="button" class="btn btn-sm btn-danger float-right mx-2" data-toggle="tooltip" data-placement="top" title="Cetak Struk"><i class="fas fa-file-pdf"></i></button></a>
                </h4>
              </div>
              <div class="card-body">

                <div class="form-group">
                  <label>Total</label>
                  <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Rp. </span></span>
                    <input type="text" class="form-control" value="<?= rupiah($sum_total['total']) ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label>Diskon</label>
                  <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Rp. </span></span>
                    <input type="text" class="form-control" value="<?= rupiah($sum_diskon['diskon']) ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label>Subtotal</label>
                  <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text">Rp. </span></span>
                    <input type="text" class="form-control" value="<?= rupiah($sum_subtotal['subtotal']) ?>" readonly>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- Treatment -->
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">

        <div class="alert alert-warning" role="alert">
          <h4 class="alert-warning"><i class="fas fa-exclamation"></i> Perhatian</h4>
          Silahkan isi semua penjualan pada bagian treatment terlebih dahulu, setelah itu baru isi bagian produk. Hal ini untuk meminimalisir eror pada struk.
        </div>

        <div class="card">
          <div class="card-header">
            <h4><i class="fas fa-stethoscope"></i> Treatment
              <a href="<?= base_url('admin/detail_penjualan/createtreatment/') . $penjualan['id_penjualan'] ?>" class="float-right" data-toggle="tooltip" data-placement="top" title="Tambah Data"><button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button></a>
            </h4>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th width="10px">No</th>
                    <th>Nama Produk</th>
                    <th width="10px">Qty</th>
                    <th>Harga</th>
                    <th>Diskon</th>
                    <th>Subtotal</th>
                    <th width="auto">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($join_treatment as $jt) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td><?= $jt['nm_treatment'] ?></td>
                      <td><?= $jt['qty_treatment'] ?></td>
                      <td><?= rupiah($jt['total']) ?></td>
                      <td><?= rupiah($jt['diskon']) ?></td>
                      <td><?= rupiah($jt['subtotal']) ?></td>
                      <td>
                        <!-- <a href="<?= base_url() ?>detail_penjualan/update/<?= $jt['id_penjualan'] ?>/<?= $jt['id_penjualan'] ?>">
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Perbaharui Data"><i class="fas fa-edit"></i></button>
                        </a> -->
                        <a href="<?= base_url() ?>admin/detail_penjualan/deleteTreatment/<?= $jt['id_detailpenjualan'] ?>/<?= $user['id_admin'] ?>" class="tombol-hapus">
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
        <!-- End of Treatment -->

        <!-- Produk -->
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <div class="card-header">
                <h4><i class="fas fa-box"></i> Produk
                  <a href="<?= base_url('admin/detail_penjualan/createproduk/') . $penjualan['id_penjualan'] ?>" class="float-right" data-toggle="tooltip" data-placement="top" title="Tambah Data"><button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button></a>
                </h4>
              </div>

              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped table-bordered first">
                    <thead>
                      <tr>
                        <th width="10px">No</th>
                        <th>Nama Produk</th>
                        <th width="10px">Qty</th>
                        <th>Harga</th>
                        <th>Diskon</th>
                        <th>Subtotal</th>
                        <th width="auto">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no = 1;
                      foreach ($join_produk as $jp) {
                      ?>
                        <tr>
                          <td width="10px"><?= $no ?></td>
                          <td><?= $jp['jns_produk'] ?></td>
                          <td width="10px"><?= $jp['qty_produk'] ?></td>
                          <td><?= rupiah($jp['total']) ?></td>
                          <td><?= rupiah($jp['diskon']) ?></td>
                          <td><?= rupiah($jp['subtotal']) ?></td>
                          <td>
                            <!-- <a href="<?= base_url() ?>detail_penjualan/update/<?= $jp['id_detailpenjualan'] ?>/<?= $jp['id_penjualan'] ?>">
                              <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Perbaharui Data"><i class="fas fa-edit"></i></button>
                            </a> -->
                            <a href="<?= base_url() ?>admin/detail_penjualan/deleteProduk/<?= $jp['id_detailpenjualan'] ?>/<?= $jp['id_produk'] ?>/<?= $jp['qty_produk'] ?>/<?= $user['id_admin'] ?>" class="tombol-hapus">
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
        <!-- End of Produk -->
      </div>

    </div>
  </div>