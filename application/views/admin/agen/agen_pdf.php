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

  <h3 class="text-center">Laporan Member</h3>
  <div class="row">
    <table class="table-striped table-bordered" class="mx-auto" style="width: 100%;">
      <thead>
        <tr class="text-center">
          <th>No</th>
          <th>Nama Member</th>
          <th>Alamat</th>
          <th>No Telp</th>
          <th>JK</th>
          <th>Umur</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($agen as $a) {
        ?>
          <tr class="text-center">
            <td><?= $no ?></td>
            <td><?= $a['nm_pelanggan'] ?></td>
            <td><?= $a['alamat_pelanggan'] ?></td>
            <td><?= $a['notelp_pelanggan'] ?></td>
            <td>
              <?php if ($a['jk_pelanggan'] == "L") : ?>
                <?= "Laki-laki" ?>
              <?php else : ?>
                <?= "Perempuan" ?>
              <?php endif; ?>
            </td>
            <td><?= $a['umur_pelanggan'] ?> Tahun</td>
            <td><?= $a['email_pelanggan'] ?></td>
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