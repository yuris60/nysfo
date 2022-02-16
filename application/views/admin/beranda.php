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
                <div class="text-xs font-weight-bold text-white text-uppercase mb-0">Jumlah Pasien</div>
                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $jumlahpasien ?></div>
              </div>
              <div class="col-auto mb-0">
                <i class="fas fa-user fa-5x text-gray-300"></i>
              </div>
            </div>
          </div>
          <div class="card-footer text-center bg-white">
            <a href="<?= base_url('admin/pasien') ?>" class="card-link">Lihat Selengkapnya</a>
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
      <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">

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

        <div class="row">

          <!-- Top 10 produk -->
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
              <h5 class="card-header bg-light"><i class="fas fa-stethoscope"></i> 10 Produk Terlaris</h5>
              <div class="card-body">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="topproduktahunini-tab" data-toggle="pill" href="#topproduktahunini" role="tab" aria-controls="topproduktahunini" aria-selected="true">Tahun Ini</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="topprodukkeseluruhan-tab" data-toggle="pill" href="#topprodukkeseluruhan" role="tab" aria-controls="topprodukkeseluruhan" aria-selected="false">Keseluruhan</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="topproduktahunini" role="tabpanel" aria-labelledby="topproduktahunini-tab">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th width="auto">Jenis Produk</th>
                            <th>Terjual</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($topproduktahunini as $tpti) :
                          ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td><?= $tpti['jns_produk'] ?></td>
                              <td align="center">
                                <?php
                                if ($tpti['qty'] == "") {
                                  echo 0;
                                } else echo $tpti['qty'];
                                ?>
                              </td>
                            </tr>
                          <?php
                            $no++;
                          endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="topprodukkeseluruhan" role="tabpanel" aria-labelledby="topprodukkeseluruhan-tab">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th width="auto">Jenis Produk</th>
                            <th>Terjual</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($topproduk as $tp) :
                          ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td><?= $tp['jns_produk'] ?></td>
                              <td align="center">
                                <?php
                                if ($tp['qty'] == "") {
                                  echo 0;
                                } else echo $tp['qty'];
                                ?>
                              </td>
                            </tr>
                          <?php
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

          <!-- Top 10 treatment -->
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
              <h5 class="card-header bg-light"><i class="fas fa-stethoscope"></i> 10 Treatment Terlaris</h5>
              <div class="card-body">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="toptreatmenttahunini-tab" data-toggle="pill" href="#toptreatmenttahunini" role="tab" aria-controls="toptreatmenttahunini" aria-selected="true">Tahun Ini</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="toptreatmentkeseluruhan-tab" data-toggle="pill" href="#toptreatmentkeseluruhan" role="tab" aria-controls="toptreatmentkeseluruhan" aria-selected="false">Keseluruhan</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="toptreatmenttahunini" role="tabpanel" aria-labelledby="toptreatmenttahunini-tab">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th width="auto">Jenis Produk</th>
                            <th>Terjual</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($toptreatmenttahunini as $ttti) :
                          ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td><?= $ttti['nm_treatment'] ?></td>
                              <td align="center">
                                <?php
                                if ($ttti['qty'] == "") {
                                  echo 0;
                                } else echo $ttti['qty'];
                                ?>
                              </td>
                            </tr>
                          <?php
                            $no++;
                          endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="toptreatmentkeseluruhan" role="tabpanel" aria-labelledby="toptreatmentkeseluruhan-tab">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th width="auto">Jenis Produk</th>
                            <th>Terjual</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($toptreatment as $tt) :
                          ?>
                            <tr>
                              <td><?= $no ?></td>
                              <td><?= $tt['nm_treatment'] ?></td>
                              <td align="center">
                                <?php
                                if ($tt['qty'] == "") {
                                  echo 0;
                                } else echo $tt['qty'];
                                ?>
                              </td>
                            </tr>
                          <?php
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
        </div>

      </div>
      <!-- /.col-lg-8 -->

      <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
        <div class="card">
          <h5 class="card-header bg-light"><i class="fas fa-money-bill-alt"></i> Pendapatan Hari ini</h5>
          <div class="card-body">
            <h2 align="center"><?= rupiah($totalpendapatanhariini) ?></h2>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
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
            <div class="card">
              <h5 class="card-header bg-light"><i class="fas fa-user"></i> Total Pelanggan</h5>
              <div class="card-body">
                <ul class="nav nav-pills mb-1 justify-content-center" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pengunjunghariiini-tab" data-toggle="pill" href="#pengunjunghariiini" role="tab" aria-controls="pengunjunghariiini" aria-selected="true">Hari Ini</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pengunjungkeseluruhan-tab" data-toggle="pill" href="#pengunjungkeseluruhan" role="tab" aria-controls="pengunjungkeseluruhan" aria-selected="false">Keseluruhan</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pengunjunghariiini" role="tabpanel" aria-labelledby="pengunjunghariiini-tab">
                    <p class="pengunjung-font-monofett text-center"><?= $jumlahpengunjunghariini ?></p>
                  </div>
                  <div class="tab-pane fade" id="pengunjungkeseluruhan" role="tabpanel" aria-labelledby="pengunjungkeseluruhan-tab">
                    <p class="pengunjung-font-monofett text-center"><?= $jumlahpengunjung ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
              <h5 class="card-header bg-light"><i class="fas fa-user"></i> Pelanggan Berdasarkan Jenis Kelamin</h5>
              <div class="card-body">
                <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="jeniskelaminhariini-tab" data-toggle="pill" href="#jeniskelaminhariini" role="tab" aria-controls="jeniskelaminhariini" aria-selected="true">Hari Ini</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="jeniskelaminkeseluruhan-tab" data-toggle="pill" href="#jeniskelaminkeseluruhan" role="tab" aria-controls="jeniskelaminkeseluruhan" aria-selected="false">Keseluruhan</a>
                  </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="jeniskelaminhariini" role="tabpanel" aria-labelledby="jeniskelaminhariini-tab">
                    <canvas id="myChart2" height="250px"></canvas>
                  </div>
                  <div class="tab-pane fade" id="jeniskelaminkeseluruhan" role="tabpanel" aria-labelledby="jeniskelaminkeseluruhan-tab">
                    <canvas id="myChart5" height="250px"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.col-lg-4 -->
    </div>

  </div>