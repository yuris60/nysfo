<?php
$totalpendapatanhariini = 0;
foreach ($jumlahpendapatanhariini as $pendapatanhariini) {
  $totalpendapatanhariini += $pendapatanhariini;
}
?>
<!-- Flash Data -->
<div class="flash-data-login" data-flashdata=<?= $this->session->flashdata('flash-login') ?>></div>

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

      <!-- Dokter -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-primary text-white shadow h-100 mb-1">
          <div class="card-body mb-0">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-0">Jumlah Dokter</div>
                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $jumlahdokter ?></div>
              </div>
              <div class="col-auto mb-0">
                <i class="fas fa-user-md fa-5x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer text-center bg-white">
            <a href="<?= base_url('admin/dokter') ?>" class="card-link">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- end of Dokter -->

      <!-- Member -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-success text-white shadow h-100 mb-1">
          <div class="card-body mb-0">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-0">Jumlah Member</div>
                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $jumlahmember ?></div>
              </div>
              <div class="col-auto mb-0">
                <i class="fas fa-user fa-5x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer text-center bg-white">
            <a href="<?= base_url('admin/member') ?>" class="card-link">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- end of Member -->

      <!-- Produk -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-warning text-white shadow h-100 mb-1">
          <div class="card-body mb-0">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-0">Jumlah Produk</div>
                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $jumlahproduk ?></div>
              </div>
              <div class="col-auto mb-0">
                <i class="fas fa-box fa-5x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer text-center bg-white">
            <a href="<?= base_url('admin/produk') ?>" class="card-link">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- end of Produk -->

      <!-- Treatment -->
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card bg-danger text-white shadow h-100 mb-1">
          <div class="card-body mb-0">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-white text-uppercase mb-0">Jumlah Treatment</div>
                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $jumlahtreatment ?></div>
              </div>
              <div class="col-auto mb-0">
                <i class="fas fa-stethoscope fa-5x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer text-center bg-white">
            <a href="<?= base_url('admin/treatment') ?>" class="card-link">Lihat Selengkapnya</a>
          </div>
        </div>
      </div>
      <!-- end of Treatment -->

    </div>


    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h2 class="page-title">Data Hari Ini</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
          <h5 class="card-header bg-light"><i class="fas fa-user"></i> Pelanggan Hari ini</h5>
          <div class="card-body">
            <p class="pengunjung-font-monofett text-center"><?= $jumlahpengunjunghariini ?></p>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <h5 class="card-header bg-light"><i class="fas fa-money-bill-alt"></i> Pendapatan Hari ini</h5>
              <div class="card-body">
                <h2 align="center"><?= "Rp. " . number_format($totalpendapatanhariini, 0, ",", "."); ?></h2>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
          <h5 class="card-header bg-light"><i class="fas fa-user"></i> Pelanggan Berdasarkan Jenis Kelamin</h5>
          <div class="card-body">
            <canvas id="myChart2" height="250px"></canvas>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
          <h5 class="card-header bg-light"><i class="fas fa-box"></i> Penjualan Hari ini</h5>
          <div class="card-body">
            <p class="pengunjung-font-monofett text-center"><canvas id="myChart4"" height=" 300px"></canvas></p>
          </div>
        </div>
      </div>


    </div>

    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <h2 class="page-title">Data Keseluruhan</h2>
      </div>
    </div>

    <div class=" row">
      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card">
          <h5 class="card-header bg-light"><i class="fas fa-money-bill-alt"></i> Total Pendapatan Perbulan</h5>
          <div class="card-body">

            <canvas id="myChart"></canvas>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <h5 class="card-header bg-light"><i class="fas fa-box"></i> Laporan Penjualan Tahun <?= date('Y') ?></h5>
              <div class="card-body">
                <canvas id="myChart3"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Kanan -->
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <div class="card">
          <h5 class="card-header bg-light"><i class="fas fa-user"></i> 10 Pelanggan Terakhir</h5>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($penjualan as $p) :
                ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $p['nama'] ?></td>
                    <td><?= $p['alamat'] ?></td>
                  </tr>
                <?php
                  $no++;
                endforeach;
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <h5 class="card-header bg-light"><i class="fas fa-user"></i> Jumlah Pelanggan</h5>
              <div class="card-body">
                <p class="pengunjung-font-monofett text-center"><?= $jumlahpengunjung ?></p>
              </div>
            </div>
          </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <h5 class="card-header bg-light"><i class="fas fa-user"></i> Pelanggan Berdasarkan Jenis Kelamin</h5>
              <div class="card-body">
                <canvas id="myChart5" height="250px"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>