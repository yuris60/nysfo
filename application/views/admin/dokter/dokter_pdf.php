<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <style>
    .row {
      font-size: 10;
    }
  </style>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/bootstrap/css/bootstrap.min.css">

</head>

<body>

  <h3 class="text-center">Laporan <?= $menu ?></h3>
  <div class="row">
    <table class="table-striped table-bordered" class="mx-auto" style="width: 100%;">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Nama Dokter</th>
          <th>JK</th>
          <th>Tempat Tanggal Lahir</th>
          <th>Alamat</th>
          <th>No Telepon</th>
          <!-- <th>Email</th> -->
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($dokter as $d) {
        ?>
          <tr class="text-center">
            <td><?= $no ?></td>
            <td><?= $d['nm_dokter'] ?></td>
            <td>
              <?php
              if ($d['jk_dokter'] == "L") {
                echo "Laki-laki";
              } else {
                echo "Perempuan";
              }
              ?>
            </td>
            <td><?= $d['tempatlahir_dokter'] . ", " . tgl_indo($d['tanggallahir_dokter']) ?></td>
            <td><?= $d['alamat_dokter'] ?></td>
            <td><?= $d['notelp_dokter'] ?></td>
            <!-- <td><?= $d['email_dokter'] ?></td> -->
          </tr>
        <?php $no++;
        } ?>
      </tbody>
    </table>
  </div>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>

</body>

</html>