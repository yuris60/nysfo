<div class="flash-data-stok-kurang" data-flashdata="<?= $this->session->flashdata('flash-data-stok-gudang-kurang'); ?>"></div>

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
                <li class="breadcrumb-item"><a href="<?= base_url('beranda') ?>" class="breadcrumb-link"><span class="badge badge-primary">Beranda</span></a></li>
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
          Berikut ini adalah menu <strong><?= strtoupper($menu) ?></strong>. Silahkan pilih laporan yang akan dibuat.
        </div>
      </div>
    </div>

    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>

    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <h4><i class="fas fa-database"></i> Data
              <a href="<?= base_url('admin/laporanproduk/exporttoexcel') ?>" target="_blank"><button type="button" class="btn btn-sm btn-success float-right" data-toggle="tooltip" data-placement="top" title="Export to Excel"><i class="fas fa-file-excel"></i></button></a>
              <a href="<?= base_url('admin/laporanproduk/exporttopdf') ?>" target="_blank"><button type="button" class="btn btn-sm btn-danger float-right mx-2" data-toggle="tooltip" data-placement="top" title="Export to PDF"><i class="fas fa-file-pdf"></i></button></a>
            </h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th>No</th>
                    <th width="auto">Jenis Produk</th>
                    <th width="80px">Harga</th>
                    <th>Stok Ready</th>
                    <th>Stok Gudang</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  foreach ($produk as $p) :
                    // $this->db->select('(SELECT SUM(detail_penjualan.qty_produk) WHERE detail_penjualan.id_produk = ' . $p['id_produk'] . ') AS qty', FALSE);
                    $this->db->select_sum('detail_penjualan.qty_produk');
                    $this->db->where("detail_penjualan.id_produk", $p['id_produk']);
                    $query = $this->db->get('detail_penjualan')->result_array();
                    foreach ($query as $q) :
                  ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $p['jns_produk'] ?></td>
                        <td align="right"><?= rupiah($p['harga_produk']) ?></td>
                        <td align="center"><?= $p['stok'] ?></td>
                        <td align="center"><?= $p['stok_gudang'] ?></td>
                      </tr>
                  <?php endforeach;
                    $no++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>