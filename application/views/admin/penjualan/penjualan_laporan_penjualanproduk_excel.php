<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
if (!empty($periode_bulanan)) {
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Penjualan Produk Bulan " . date('M Y', strtotime($periode_bulanan)) . ".xls");
} elseif (!empty($periode_tahunan)) {
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Penjualan Produk Tahun " . date('Y', strtotime($periode_tahunan)) . ".xls");
} else {
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Penjualan Produk Custom.xls");
}
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

<body>
  <!-- <div class="text-center">
    <img src="<?= base_url('assets/img/logo_name_small.png') ?>" width="200px">
    <h3 style="margin-top: -10px;">Laporan Penjualan Produk</h3>
    <p style="margin-top: -10px;">Periode Bulan : <?= date('M Y', strtotime($periode)) ?></p>
  </div> -->

  <table width="70%" border="1" class="mx-auto">
    <thead>
      <tr class="text-center">
        <th>No</th>
        <th>Nama Produk</th>
        <th>Terjual</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1;
      foreach ($penjualan as $p) :
        if ($p['qty'] > 0) : ?>
          <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $p['jns_produk']; ?></td>
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
        endif;
      endforeach; ?>
    </tbody>
  </table>
</body>

</html>