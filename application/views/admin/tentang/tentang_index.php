<div class="dashboard-wrapper">
  <div class="container-fluid dashboard-content">

    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row mb-0">
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

    <!-- <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="alert alert-primary" role="alert">
          <h4 class="alert-primary"><i class="fas fa-info"></i> Informasi</h4>
          Berikut ini adalah timeline pembaruan aplikasi Nysfo dari waktu ke waktu
        </div>
      </div>
    </div> -->

    <div class="row">

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
        <!-- Profile Programmer -->
        <div class="card card-fluid">
          <div class="card-img-top">
            <img src="<?= base_url('assets/') ?>img/bg-profile.jpg" alt="" class=" img-fluid">
          </div>
          <!-- .card-body -->
          <div class="card-body text-center">
            <!-- .user-avatar -->
            <a href="user-profile.html" class="user-avatar user-avatar-floated user-avatar-xl">
              <img src="<?= base_url('assets/') ?>img/yuris.png" alt="User Avatar" class="rounded-circle user-avatar-xl">
            </a>
            <!-- /.user-avatar -->
            <h3 class="card-title mb-2">
              <a href="http://www.instagram.com/yuris60">Yuris Alkhalifi (YAK)</a>
            </h3>
            <h6 class="card-subtitle text-muted mb-3"> Programmer & Database Analyst </h6>
            <!-- grid row -->
            <div class="row">
              <!-- grid column -->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- .metric -->
                <div class="metric">
                  <h6 class="metric-value"> D3 </h6>
                  <p class="metric-label"> 2018 </p>
                </div>
                <!-- /.metric -->
              </div>
              <!-- /grid column -->
              <!-- grid column -->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- .metric -->
                <div class="metric">
                  <h6 class="metric-value"> S1 </h6>
                  <p class="metric-label"> 2019 </p>
                </div>
                <!-- /.metric -->
              </div>
              <!-- /grid column -->
              <!-- grid column -->
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <!-- .metric -->
                <div class="metric">
                  <h6 class="metric-value"> S2 </h6>
                  <p class="metric-label"> On Going </p>
                </div>
                <!-- /.metric -->
              </div>
              <!-- /grid column -->
            </div>
            <!-- /grid row -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /Profile Programmer -->

        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card bg-info mb-3">
              <div class="card-body text-center">
                <h4 class="card-text">Versi Aplikasi Saat Ini :</h4>
                <h1>v.1.0.3</h1>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
        <div class="card" style="height: 700px;">
          <div class="card-header">
            <h5 class="card-title"><i class="fas fa-clock"></i> Timeline Aplikasi</h5>
            <p>Berikut ini adalah timeline pembaruan aplikasi Nysfo dari waktu ke waktu</p>
          </div>
          <div class="card-body table-responsive">
            <section class="cd-timeline js-cd-timeline">
              <div class="cd-timeline__container">

                <!-- Pewarnaan Lingkaran
            img--movie = merah
            img--picture = hijau
            img--location = kuning
            -->

                <!-- 7 Mei 2021 -->
                <div class="cd-timeline__block js-cd-block">
                  <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                    <img src="<?= base_url('assets/svg/home.svg') ?>" alt="Picture">
                  </div>
                  <!-- cd-timeline__img -->
                  <div class="cd-timeline__content js-cd-content">
                    <h3>Penambahan Fitur</h3>
                    <p>Penambahan fitur grafik pada menu beranda dan perbaikan-perbaikan bug pada aplikasi.</p>
                    <p>Versi : v.1.0.3</p>
                    <!-- <a href="#0" class="btn btn-primary btn-lg">Read More</a> -->
                    <span class="cd-timeline__date">7 Mei 2021</span>
                  </div>
                  <!-- cd-timeline__content -->
                </div>

                <!-- 22 Maret 2021 -->
                <div class="cd-timeline__block js-cd-block">
                  <div class="cd-timeline__img cd-timeline__img--picture js-cd-img">
                    <img src="<?= base_url('assets/svg/shuttle.svg') ?>" alt="Picture">
                  </div>
                  <!-- cd-timeline__img -->
                  <div class="cd-timeline__content js-cd-content">
                    <h3>Launching Aplikasi</h3>
                    <p>Bismillah, tahap launching aplikasi dengan fitur hingga struk belanja pelanggan</p>
                    <p>Versi : v.1.0.2</p>
                    <!-- <a href="#0" class="btn btn-primary btn-lg">Read More</a> -->
                    <span class="cd-timeline__date">22 Maret 2021</span>
                  </div>
                  <!-- cd-timeline__content -->
                </div>

                <!-- 21 Maret 2021 -->
                <div class="cd-timeline__block js-cd-block">
                  <div class="cd-timeline__img cd-timeline__img--location js-cd-img">
                    <img src="<?= base_url('assets/svg/bill.svg') ?>" alt="Picture">
                  </div>
                  <!-- cd-timeline__img -->
                  <div class="cd-timeline__content js-cd-content">
                    <h3>Tambah Fitur</h3>
                    <p>Penambahan fitur struk belanja pelanggan</p>
                    <p>Versi : v.1.0.1</p>
                    <!-- <a href="#0" class="btn btn-primary btn-lg">Read More</a> -->
                    <span class="cd-timeline__date">21 Maret 2021</span>
                  </div>
                  <!-- cd-timeline__content -->
                </div>

                <!-- 12 Maret 2021 -->
                <div class="cd-timeline__block js-cd-block">
                  <div class="cd-timeline__img cd-timeline__img--movie js-cd-img">
                    <img src="<?= base_url('assets/svg/test.svg') ?>" alt="Picture">
                  </div>
                  <!-- cd-timeline__img -->
                  <div class="cd-timeline__content js-cd-content">
                    <h3>Tahap Percobaan Aplikasi</h3>
                    <p>Instalasi dan uji coba aplikasi tanpa struk belanja</p>
                    <p>Versi : v.1.0.0</p>
                    <!-- <a href="#0" class="btn btn-primary btn-lg">Read More</a> -->
                    <span class="cd-timeline__date">12 Maret 2021</span>
                  </div>
                  <!-- cd-timeline__content -->
                </div>

                <!-- cd-timeline__block -->
              </div>
            </section>
          </div>
        </div>
      </div>
    </div>
  </div>