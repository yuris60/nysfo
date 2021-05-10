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
                <li class="breadcrumb-item"><a href="<?= base_url('admin/' . strtolower($menu)) ?>" class="breadcrumb-link"><span class="badge badge-primary"><?= $menu ?></span></a></li>
                <li class="breadcrumb-item active" aria-current="page"><span class="badge badge-dark"><?= $submenu ?></span></li>
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
          <h4 class="alert-primary"><i class="fas fa-info"></i> Perhatian</h4>
          Silahkan isi formulir data <strong><?= strtoupper($menu) ?></strong> ini dengan baik dan benar.
        </div>
      </div>
    </div>

    <form action="" method="POST" autocomplete="off">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-user"></i> Customer</h4>
            </div>
            <div class="card-body">

              <label>Jenis Member</label><br>
              <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="jns_pelanggan" class="custom-control-input" id="Member" value="L" onclick="member()"><span class="custom-control-label">Member</span>
              </label>
              <label class="custom-control custom-radio custom-control-inline">
                <input type="radio" name="jns_pelanggan" checked="" class="custom-control-input" id="NonMember" value="P" onclick="member()"><span class="custom-control-label">Non Member</span>
              </label><br><br>

              <div id="member" class="d-none">

                <div class="form-group">
                  <label>Pilih Member</label>
                  <select name="id_pelanggan" id="id_pelanggan" class="custom-select" onchange="cek_data()">
                    <option value="">-== Pilih Disini ==-</option>
                    <?php foreach ($member as $m) : ?>
                      <option value="<?= $m['id_pelanggan'] ?>"><?= $m['nm_pelanggan'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="loading"></div>
                <div class="tampilkan_data"></div>

              </div>

              <div id="nonmember" class="">

                <div class="form-group">
                  <label>Nama Customer</label>
                  <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" name="nama" id="nama">
                  <div class="invalid-feedback">
                    <?= form_error('nama'); ?>
                  </div>
                </div>

                <label>Jenis Kelamin</label><br>
                <label class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="jk" checked="" class="custom-control-input" value="L"><span class="custom-control-label">Laki-laki</span>
                </label>
                <label class="custom-control custom-radio custom-control-inline">
                  <input type="radio" name="jk" class="custom-control-input" value="P"><span class="custom-control-label">Perempuan</span>
                </label><br>

                <div class="form-group">
                  <label>Alamat Customer</label>
                  <textarea name="alamat" id="" class="form-control" rows="2"></textarea>
                  <div class="invalid-feedback">
                    <?= form_error('alamat'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label>No HP Customer</label>
                  <input type="text" class="form-control <?= form_error('no_telp') ? 'is-invalid' : '' ?>" name="no_telp" id="no_telp">
                  <div class="invalid-feedback">
                    <?= form_error('no_telp'); ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <h4><i class="fas fa-plus"></i> Tambah Data</h4>
            </div>
            <div class="card-body">

              <div class="form-group">
                <label>Tanggal Penjualan</label>
                <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-calendar-alt"></i> </span></span>
                  <input type="text" min=0 class="form-control datepicker <?= form_error('tgl_penjualan') ? 'is-invalid' : '' ?>" name="tgl_penjualan" id="tgl_penjualan" value="<?= date('Y-m-d') ?>" readonly>
                  <div class="invalid-feedback">
                    <?= form_error('tgl_penjualan'); ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Nama Dokter</label>
                <select class="custom-select" name="id_dokter">
                  <option>-== Pilih Disini ==-</option>
                  <?php
                  foreach ($dokter as $d) {
                  ?>
                    <option value="<?= $d['id_dokter'] ?>"><?= $d['nm_dokter'] ?></option>
                  <?php } ?>
                </select>
                <code>Note : Jangan dipilih jika tidak menggunakan jasa dokter</code>
              </div>

              <div class="form-group">
                <label>Nama Beautician</label>
                <input type="text" class="form-control <?= form_error('nm_beautician') ? 'is-invalid' : '' ?>" name="nm_beautician" id="nm_beautician">
                <div class="invalid-feedback">
                  <?= form_error('nm_beautician'); ?>
                </div>
                <code>Note : Jangan diisi jika tidak menggunakan jasa beautician</code>
              </div>

            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
              <a href="<?= base_url() . 'admin/' . strtolower($menu) ?>"><button type="button" class="btn btn-dark"><i class="fas fa-reply"></i> Kembali</button></a>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <script src="<?= base_url('assets/') ?>concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    function member() {

      if (document.getElementById('NonMember').checked) {
        $("#member").addClass('d-none');
        $("#nonmember").removeClass('d-none');
        // $("#member").show(500);
        // document.getElementById('member').style.visibility = "visible";
      } else {
        $("#member").removeClass('d-none');
        $("#nonmember").addClass('d-none');
        // document.getElementById('member').style.visibility = "hidden"
        // $("#member").hide(500);
      }
    }

    function cek_data() {
      cari_pelanggan = $('[name="id_pelanggan"]');
      jns_pelanggan = $('[name="jns_pelanggan"]');
      $.ajax({
        type: 'POST',
        data: "cari=" + 1 + "&id_pelanggan=" + cari_pelanggan.val(),
        url: 'penjualan/view_data',
        cache: false,
        beforeSend: function() {
          cari_pelanggan.attr('disabled', true);
          jns_pelanggan.attr('disabled', true);
          $('.loading').html('Loading...');
        },
        success: function(data) {
          cari_pelanggan.attr('disabled', true);
          jns_pelanggan.attr('disabled', true);
          $('.loading').html('');
          $('.tampilkan_data').html(data);
        }
      });
      return false;
    }
  </script>