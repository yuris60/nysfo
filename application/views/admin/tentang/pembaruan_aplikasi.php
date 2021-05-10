<div class="dashboard-wrapper">
  <div class="container-fluid dashboard-content">

    <!-- ============================================================== -->
    <!-- pageheader -->
    <!-- ============================================================== -->
    <div class="row mb-0">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
          <h2 class="pageheader-title"><i class="fas fa-<?= $icon ?>"></i> <?= strtoupper($menu) ?></h2>
          <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce
            sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
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
          Berikut ini adalah timeline pembaruan aplikasi Nysfo dari waktu ke waktu
        </div>
      </div>
    </div>


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