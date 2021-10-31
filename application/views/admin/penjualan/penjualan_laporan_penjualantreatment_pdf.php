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
  <div class="text-center">
    <img src="<?= base_url('assets/img/logo_name_small.png') ?>" width="200px">
    <h3 style="margin-top: -10px;">Laporan Penjualan Treatment</h3>
    <p style="margin-top: -10px;">
      <?php if (!empty($periode_bulanan)) : ?>
        Periode Bulan : <?= date('M Y', strtotime($periode_bulanan)) ?>
      <?php elseif (!empty($periode_tahunan)) : ?>
        Periode Tahun : <?= $periode_tahunan ?>
      <?php else : ?>
        Periode : <?= date('d M Y', strtotime($custom_start)) . " - " . date('d M Y', strtotime($custom_end)) ?>
      <?php endif; ?>
  </div>

  <table width="100%" border="1" class="mx-auto">
    <thead>
      <tr class="text-center">
        <th>No</th>
        <th>Jenis Treatment</th>
        <th>Nama Treatment</th>
        <th>Terjual</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($penjualan as $p) : ?>
        <tr>
          <td class="text-center"><?= $no ?></td>
          <td><?= $p['jns_treatment']; ?></td>
          <td><?= $p['nm_treatment']; ?></td>
          <td class="text-center">
            <?php
            if ($p['qty'] == null) {
              echo 0;
            } else {
              echo $p['qty'];
            }
            ?>
          </td>
        </tr>
      <?php $no++;
      endforeach; ?>
    </tbody>
  </table>
</body>

</html>