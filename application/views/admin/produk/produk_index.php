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
              <a href="<?= base_url('admin/produk/create') ?>" class="float-right" data-toggle="tooltip" data-placement="top" title="Tambah Data"><button class="btn btn-sm btn-primary"><i class="fas fa-plus"></i></button></a>
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
                    <th>Terjual</th>
                    <th width="170px">Aksi</th>
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
                      <td align="center">
                        <?php 
                          if($q['qty_produk']==""){
                            echo 0;
                          } else echo $q['qty_produk'];
                        ?>
                      </td>
                      <td>
                        <a href="<?= base_url() ?>admin/produk/addstokready/<?= $p['id_produk'] ?>">
                          <button type="button" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Tambah Stok Ready"><i class="fas fa-check"></i></button>
                        </a>
                        <a href="<?= base_url() ?>admin/produk/addstokgudang/<?= $p['id_produk'] ?>">
                          <button type="button" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah Stok Gudang"><i class="fas fa-warehouse"></i></button>
                        </a>
                        <a href="<?= base_url() ?>admin/produk/update/<?= $p['id_produk'] ?>">
                          <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Perbaharui Data"><i class="fas fa-edit"></i></button>
                        </a>
                        <a href="<?= base_url() ?>admin/produk/delete/<?= $p['id_produk'] ?>/<?= $user['id_admin'] ?>" class="tombol-hapus">
                          <button type="button" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus Data"><i class="fas fa-trash"></i></button>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; $no++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>