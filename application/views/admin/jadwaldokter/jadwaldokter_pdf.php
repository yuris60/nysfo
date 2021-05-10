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
          <th>Hari</th>
          <th>Jam Mulai</th>
          <th>Jam Selesai</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($jadwaldokter as $jd) {
        ?>
          <tr class="text-center">
            <td><?= $no ?></td>
            <td><?= $jd['nm_dokter'] ?></td>
            <td><?= $jd['hari'] ?></td>
            <td><?= $jd['jam_mulai'] ?></td>
            <td><?= $jd['jam_selesai'] ?></td>
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