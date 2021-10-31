<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan Pasien.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>

<style>
  body {
    font-size: 10pt;
  }
</style>

<body>
  <!-- <div class="text-center">
    <img src="<?= base_url('assets/img/logo_name_small.png') ?>" width="200px">
    <h3 style="margin-top: -10px;">Laporan Produk</h3>
  </div> -->

  <table width="100%" border="1" class="mx-auto">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pasien</th>
        <th>Jenis Kelamin</th>
        <th width="50px">Usia</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Facebook</th>
        <th>Instagram</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($pasien as $p) {
      ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $p['nm_pelanggan'] ?></td>
          <td>
            <?php if ($p['jk_pelanggan'] == "L") : ?>
              <?= "Laki-laki" ?>
            <?php else : ?>
              <?= "Perempuan" ?>
            <?php endif; ?>
          </td>
          <td><?= $p['umur_pelanggan'] ?> Tahun</td>
          <td><?= $p['alamat_pelanggan'] ?></td>
          <td><?= $p['notelp_pelanggan'] ?></td>
          <td class="text-center">
            <?php if (empty($p['fb_pelanggan'])) : ?>
              <?= "-" ?>
            <?php else : ?>
              <?= $p['fb_pelanggan'] ?>
            <?php endif; ?>
          </td>
          <td class="text-center">
            <?php if (empty($p['ig_pelanggan'])) : ?>
              <?= "-" ?>
            <?php else : ?>
              <?= $p['ig_pelanggan'] ?>
            <?php endif; ?>
          </td>
        </tr>
      <?php $no++;
      } ?>
    </tbody>
  </table>
</body>

</html>