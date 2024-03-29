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
          Berikut ini adalah menu <strong><?= strtoupper($menu) ?></strong>. Silahkan pilih laporan yang akan dibuat.
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-4">
        <form action="<?= base_url('admin/laporanpenjualan/penjualanproduk') ?>" method="POST" autocomplete="off" target="_blank">
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-box"></i> Laporan Penjualan Produk</h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <select name="pilihan" class="form-control" id="pilihan" onchange="laporan()">
                  <option value="">-== Pilih Rentang Waktu ==-</option>
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
                  <input type="text" class="input-sm form-control" name="custom_start" placeholder="Mulai" />
                  <span class="input-group-addon"> - </span>
                  <input type="text" class="input-sm form-control" name="custom_end" placeholder="Selesai" />
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-danger" name="pdf"><i class="fas fa-file-pdf"></i> PDF</button>
              <button type="submit" class="btn btn-success" name="excel"><i class="fas fa-file-excel"></i> Excel</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-xl-4">
        <form action="<?= base_url('admin/laporanpenjualan/penjualanTreatment') ?>" method="POST" autocomplete="off" target="_blank">
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-stethoscope"></i> Laporan Penjualan Treatment

              </h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <select name="pilihan2" class="form-control" id="pilihan2" onchange="laporan()">
                  <option value="">-== Pilih Rentang Waktu ==-</option>
                  <option value="" id="bulanan2">Bulanan</option>
                  <option value="" id="tahunan2">Tahunan</option>
                  <option value="" id="custom2">Custom</option>
                </select>
              </div>

              <!-- Bulanan -->
              <div class="pilihan2 bulanan2">
                <input type="text" class="form-control datepicker-bulanan" id="bulanan2" name="bulanan" placeholder="Masukkan Bulanan">
              </div>

              <!-- Semesteran -->
              <div class="pilihan2 tahunan2">
                <input type="text" class="form-control datepicker-tahunan" id="tahunan2" name="tahunan" placeholder="Masukkan Tahunan">
              </div>


              <!-- Custom -->
              <div class="pilihan2 custom2">
                <div class="input-daterange datepicker-range input-group" id="custom2">
                  <input type="text" class="input-sm form-control" name="custom_start" placeholder="Mulai" />
                  <span class="input-group-addon"> - </span>
                  <input type="text" class="input-sm form-control" name="custom_end" placeholder="Selesai" />
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-danger" name="pdf"><i class="fas fa-file-pdf"></i> PDF</button>
              <button type="submit" class="btn btn-success" name="excel"><i class="fas fa-file-excel"></i> Excel</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col-xl-4">
        <form action="<?= base_url('admin/laporanpenjualan/keuangan') ?>" method="POST" autocomplete="off" target="_blank">
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-money-bill-alt"></i> Laporan Keuangan

              </h4>
            </div>
            <div class="card-body">
              <div class="form-group">
                <select name="pilihan3" class="form-control" id="pilihan3" onchange="laporan()">
                  <option value="">-== Pilih Rentang Waktu ==-</option>
                  <option value="" id="bulanan3">Bulanan</option>
                  <option value="" id="tahunan3">Tahunan</option>
                  <option value="" id="custom3">Custom</option>
                </select>
              </div>

              <!-- Bulanan -->
              <div class="pilihan3 bulanan3">
                <input type="text" class="form-control datepicker-bulanan" id="bulanan3" name="bulanan" placeholder="Masukkan Bulanan">
              </div>

              <!-- Semesteran -->
              <div class="pilihan3 tahunan3">
                <input type="text" class="form-control datepicker-tahunan" id="tahunan3" name="tahunan" placeholder="Masukkan Tahunan">
              </div>


              <!-- Custom -->
              <div class="pilihan3 custom3">
                <div class="input-daterange datepicker-range input-group" id="custom3">
                  <input type="text" class="input-sm form-control" name="custom_start" placeholder="Mulai" />
                  <span class="input-group-addon"> - </span>
                  <input type="text" class="input-sm form-control" name="custom_end" placeholder="Selesai" />
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-danger" name="pdf"><i class="fas fa-file-pdf"></i> PDF</button>
              <button type="submit" class="btn btn-success" name="excel"><i class="fas fa-file-excel"></i> Excel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>