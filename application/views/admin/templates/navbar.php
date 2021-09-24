    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header">
      <nav class="navbar navbar-expand-lg bg-white fixed-top">
        <a class="navbar-brand text-primary" href="<?= base_url('admin/beranda') ?>"><img src="<?= base_url('assets/img/logo_nysfo.png') ?>" height="40px" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto navbar-right-top">
            <!-- <li class="nav-item">
              <div id="custom-search" class="top-search-bar">
                <input class="form-control" type="text" placeholder="Search..">
              </div>
            </li> -->
            <li class="nav-item dropdown notification">
              <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
              <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                <li>
                  <div class="notification-title"> Notifikasi</div>
                  <div class="notification-list">
                    <div class="list-group">

                      <?php
                      // $this->db->query("SELECT * FROM notifikasi");
                      $this->db->select("*");
                      $this->db->from("notifikasi");
                      $this->db->order_by('id_notifikasi', 'DESC');
                      $this->db->limit(5);
                      $notifikasi = $this->db->get()->result_array();
                      foreach ($notifikasi as $n) :
                        //admin
                        if ($n['id_admin'] == $user['id_admin']) {
                          $admin = 'Anda';
                        } else {
                          $admin = $user['nm_admin'];
                        }

                        //icon
                        if ($n['notifikasi'] == "Menyimpan Data") {
                          $icon = 'icon_simpan';
                        } elseif ($n['notifikasi'] == "Menghapus Data") {
                          $icon = 'icon_hapus';
                        } else {
                          $icon = 'icon_edit';
                        }
                      ?>

                        <div class="notification-info list-group-item list-group-item-action">
                          <div class="notification-list-user-img"><img src="<?= base_url('assets/img/') . $icon . '.png' ?>" alt="" class="user-avatar-md rounded-circle"></div>
                          <div class="notification-list-user-block">
                            <span class="notification-list-user-name"><?= $admin ?></span><?= $n['notifikasi'] . " " . $n['tabel'] ?>
                            <div class="notification-date"><?= waktu_lalu($n['waktu_simpan']) ?></div>
                          </div>
                        </div>

                      <?php endforeach; ?>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="list-footer"> <a href="#">View all notifications</a></div>
                </li>
              </ul>
            </li>
            <!-- <li class="nav-item dropdown connection">
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
              <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                <li class="connection-list">
                  <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                      <a href="#" class="connection-item"><img src="<?= base_url('assets/') ?>concept/assets/images/github.png" alt=""> <span>Github</span></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                      <a href="#" class="connection-item"><img src="<?= base_url('assets/') ?>concept/assets/images/dribbble.png" alt=""> <span>Dribbble</span></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                      <a href="#" class="connection-item"><img src="<?= base_url('assets/') ?>concept/assets/images/dropbox.png" alt=""> <span>Dropbox</span></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                      <a href="#" class="connection-item"><img src="<?= base_url('assets/') ?>concept/assets/images/bitbucket.png" alt="">
                        <span>Bitbucket</span></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                      <a href="#" class="connection-item"><img src="<?= base_url('assets/') ?>concept/assets/images/mail_chimp.png" alt=""><span>Mail
                          chimp</span></a>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                      <a href="#" class="connection-item"><img src="<?= base_url('assets/') ?>concept/assets/images/slack.png" alt=""> <span>Slack</span></a>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="conntection-footer"><a href="#">More</a></div>
                </li>
              </ul>
            </li> -->
            <li class="nav-item dropdown nav-user">
              <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url('assets/') ?>concept/assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
              <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                <div class="nav-user-info">
                  <h5 class="mb-0 text-white nav-user-name">
                    <?= $user['nm_admin'] ?></h5>
                  <span class="status"></span><span class="ml-2">
                    Akses : <?= $user['akses'] ?>
                  </span>
                </div>
                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                <a class="dropdown-item" href="<?= base_url('admin/login/logout') ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->