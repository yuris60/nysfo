        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar collapsing sidebar-primary text-white">
          <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-dark text-white">
              <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                  <img src="<?= base_url('assets/') ?>img/sidebar3.jpg" width="100%" alt="">
                  <li class="nav-divider text-white">
                    <strong>Menu</strong>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'beranda') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/beranda') ?>"><i class="fa fa-fw fa-home text-white"></i>Beranda</a>
                  </li>
                  <li class="nav-divider text-white">
                    <strong>Data Master</strong>
                  </li>
                  <?php if ($user['akses'] == "Pemilik") : ?>
                    <li class="nav-item ">
                      <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'admin') {
                                                      echo 'active';
                                                    } ?>" href="<?= base_url('admin/admin') ?>"><i class="fa fa-fw fa-user-circle text-white"></i>Admin</a>
                    </li>
                  <?php endif; ?>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'dokter') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/dokter') ?>"><i class="fa fa-fw fa-user-md text-white"></i>Dokter</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'jadwaldokter') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/jadwaldokter') ?>"><i class="fa fa-fw fa-clock text-white"></i>Jadwal Dokter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'pasien') {
                                                    echo 'active';
                                                  } ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2"><i class="fa fa-fw fa-user text-white"></i> Pelanggan</a>
                    <div id="submenu-1-2" class="collapse submenu" style="background-color: #ececec;">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="<?= base_url('admin/agen') ?>">Agen</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="<?= base_url('admin/distributor') ?>">Distributor</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="<?= base_url('admin/member') ?>">Member</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="<?= base_url('admin/pasien') ?>">Pasien</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="<?= base_url('admin/reseller') ?>">Reseller</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'paket') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/paket') ?>"><i class="fa fa-fw fa-archive text-white"></i>Paket</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'produk') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/produk') ?>"><i class="fa fa-fw fa-box text-white"></i>Produk</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'treatment') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/treatment') ?>"><i class="fa fa-fw fa-stethoscope text-white"></i>Treatment</a>
                  </li>
                  <li class="nav-divider text-white">
                    <strong>Transaksi</strong>
                  </li>
                  <?php if ($user['akses'] == "Pemilik") : ?>
                    <li class="nav-item ">
                      <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'pembelian') {
                                                      echo 'active';
                                                    } ?>" href="<?= base_url('admin/pembelian') ?>"><i class="fa fa-fw fa-dolly text-white"></i>Pembelian</a>
                    </li>
                  <?php endif; ?>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'penjualan') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/penjualan') ?>"><i class="fa fa-fw fa-shopping-cart text-white"></i>Penjualan</a>
                  </li>
                  <li class="nav-divider text-white">
                    <strong>Laporan</strong>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'laporanpenjualan') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/laporanpenjualan') ?>"><i class="fa fa-fw fa-shopping-cart text-white"></i>Laporan Penjualan</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'laporanproduk') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/laporanproduk') ?>"><i class="fa fa-fw fa-box text-white"></i>Laporan Produk</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'laporanpasien') {
                                                    echo 'active';
                                                  } ?>" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-3" aria-controls="submenu-1-2"><i class="fa fa-fw fa-user text-white"></i> Laporan Pelanggan</a>
                    <div id="submenu-1-3" class="collapse submenu" style="background-color: #ececec;">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link text-dark belum-tersedia">Agen</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark belum-tersedia">Distributor</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark belum-tersedia">Member</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark" href="<?= base_url('admin/laporanpasien') ?>">Pasien</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link text-dark belum-tersedia">Reseller</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-divider text-white">
                    <strong>Tentang</strong>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link text-white <?php if ($this->uri->segment(2) == 'tentang') {
                                                    echo 'active';
                                                  } ?>" href="<?= base_url('admin/tentang/') ?>"><i class="fa fa-fw fa-info text-white"></i>Pembaruan Aplikasi</a>
                  </li>
                  <li class="nav-divider">

                  </li>
                  <li class="nav-item text-white">
                    <a href="<?= base_url('admin/login/logout') ?>"><button class="btn btn-block btn-danger"><i class="fas fa-sign-out text-white"></i> Logout</button></a>
                  </li>
                  <li class="nav-divider"></li>
                  <li class="nav-divider"></li>
                  <li class="nav-divider"></li>
                  <!-- <li class="nav-divider">
                    Laporan
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('pembelian') ?>"><i class="fa fa-fw fa-dolly"></i>Pembelian</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('penjualan') ?>"><i class="fa fa-fw fa-shopping-cart"></i>Penjualan</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('produk') ?>"><i class="fa fa-fw fa-box"></i>Produk</a>
                  </li> -->
                </ul>
              </div>
            </nav>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->