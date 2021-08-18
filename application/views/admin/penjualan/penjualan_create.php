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
              <h4><i class="fas fa-user"></i> Pasien</h4>
            </div>
            <div class="card-body">

              <!-- Input Hidden -->
              <input type="hidden" name="id_admin" value="<?= $user['id_admin'] ?>">

              <input type="hidden" name="id_pelanggan" id="id_pelanggan">

              <label>Nama Pasien</label>
              <div class="input-group mb-3">
                <input type="text" name="nama" id="nama" class="form-control" readonly>
                <div class="input-group-append">
                  <a href="#" data-toggle="modal" data-target="#modal-item"><button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button></a>
                </div>
              </div>

              <!-- <div class="form-group">
                  <label>Nama Pasien</label>
                  <input type="text" class="form-control <?= form_error('nama') ? 'is-invalid' : '' ?>" name="nama" id="nama">
                  <div class="invalid-feedback">
                    <?= form_error('nama'); ?>
                  </div>
                </div> -->

              <div class="form-group">
                <label>Jenis Kelamin Pasien</label>
                <input type="text" id="jk" class="form-control <?= form_error('jk') ? 'is-invalid' : '' ?>" name="jk" id="jk" readonly>
                <div class="invalid-feedback">
                  <?= form_error('jk'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>Alamat Pasien</label>
                <textarea name="alamat" id="alamat" class="form-control" rows="2" id="alamat" readonly></textarea>
                <div class="invalid-feedback">
                  <?= form_error('alamat'); ?>
                </div>
              </div>

              <div class="form-group">
                <label>No Telp Pasien</label>
                <input type="text" id="notelp" class="form-control <?= form_error('no_telp') ? 'is-invalid' : '' ?>" name="no_telp" id="no_telp" readonly>
                <div class="invalid-feedback">
                  <?= form_error('no_telp'); ?>
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

              <!-- Input Hidden -->
              <input type="hidden" name="id_admin" value="<?= $user['id_admin'] ?>">

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

  <!-- Modal -->
  <div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cari Pasien</h5>
          <a href="#" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </a>
        </div>
        <div class="modal-body table-responsive">
          <h2 class="text-center">Cari Pasien</h2>
          <table class="table table-bordered table-striped first" id="#table1" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <!-- <th>Jenis</th> -->
                <th>Nama</th>
                <th>JK</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pelanggan as $p) : ?>
                <tr>
                  <td><?= $p['id_pelanggan'] ?></td>
                  <!-- <td><?= $p['jenis_pelanggan'] ?></td> -->
                  <td><?= $p['nm_pelanggan'] ?></td>
                  <td><?= $p['jk_pelanggan'] ?></td>
                  <td><?= $p['alamat_pelanggan'] ?></td>
                  <td><?= $p['notelp_pelanggan'] ?></td>
                  <td>
                    <button class="btn btn-sm btn-primary" id="pilih" data-id="<?= $p['id_pelanggan'] ?>" data-jenis="<?= $p['jenis_pelanggan'] ?>" data-nama="<?= $p['nm_pelanggan'] ?>" data-jk="<?= $p['jk_pelanggan'] ?>" data-alamat="<?= $p['alamat_pelanggan'] ?>" data-notelp="<?= $p['notelp_pelanggan'] ?>"><i class="fas fa-check"></i> Pilih</button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-dark" data-dismiss="modal">Tutup</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal -->

  <script src="<?= base_url('assets/') ?>concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  <script>
    $(document).ready(function() {
      $(document).on('click', '#pilih', function() {
        var item_id = $(this).data('id');
        var item_jenis = $(this).data('jenis');
        var item_nama = $(this).data('nama');
        var item_jk = $(this).data('jk');
        var item_alamat = $(this).data('alamat');
        var item_notelp = $(this).data('notelp');
        $('#id_pelanggan').val(item_id);
        $('#nama').val(item_nama);
        $('#jk').val(item_jk);
        $('#alamat').val(item_alamat);
        $('#notelp').val(item_notelp);
        $('#modal-item').modal('hide');
      })
    })
  </script>
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