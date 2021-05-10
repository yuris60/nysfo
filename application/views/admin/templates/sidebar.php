        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-light">
          <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
              <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                  <img src="<?= base_url('assets/') ?>img/sidebar3.jpg" width="100%" alt="">
                  <li class="nav-divider">
                    Menu
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/beranda') ?>"><i class="fa fa-fw fa-home"></i>Beranda</a>
                  </li>
                  <li class="nav-divider">
                    Data Master
                  </li>
                  <?php if ($user['akses'] == "Pemilik") : ?>
                    <li class="nav-item ">
                      <a class="nav-link" href="<?= base_url('admin/admin') ?>"><i class="fa fa-fw fa-user-circle"></i>Admin</a>
                    </li>
                  <?php endif; ?>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/dokter') ?>"><i class="fa fa-fw fa-user-md"></i>Dokter</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/jadwaldokter') ?>"><i class="fa fa-fw fa-clock"></i>Jadwal Dokter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2"><i class="fa fa-fw fa-user"></i> Pelanggan</a>
                    <div id="submenu-1-2" class="collapse submenu" style="background-color: #ececec;">
                      <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link" href="<?= base_url('admin/agen') ?>">Agen</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?= base_url('admin/distributor') ?>">Distributor</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?= base_url('admin/member') ?>">Member</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="<?= base_url('admin/reseller') ?>">Reseller</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/paket') ?>"><i class="fa fa-fw fa-archive"></i>Paket</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/produk') ?>"><i class="fa fa-fw fa-box"></i>Produk</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/treatment') ?>"><i class="fa fa-fw fa-stethoscope"></i>Treatment</a>
                  </li>
                  <li class="nav-divider">
                    Transaksi
                  </li>
                  <?php if ($user['akses'] == "Pemilik") : ?>
                    <li class="nav-item ">
                      <a class="nav-link" href="<?= base_url('admin/pembelian') ?>"><i class="fa fa-fw fa-dolly"></i>Pembelian</a>
                    </li>
                  <?php endif; ?>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/penjualan') ?>"><i class="fa fa-fw fa-shopping-cart"></i>Penjualan</a>
                  </li>
                  <li class="nav-divider">
                    Tentang
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="<?= base_url('admin/tentang/pembaruanaplikasi') ?>"><i class="fa fa-fw fa-info"></i>Pembaruan Aplikasi</a>
                  </li>
                  <li class="nav-divider">

                  </li>
                  <li class="nav-item ">
                    <a href="<?= base_url('admin/login/logout') ?>"><button class="btn btn-block btn-danger"><i class="fas fa-sign-out"></i> Logout</button></a>
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