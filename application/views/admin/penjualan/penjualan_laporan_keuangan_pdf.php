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
    <h3 style="margin-top: -10px;">Laporan Keuangan</h3>
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
        <th>Nama Produk/Treatment</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Diskon</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="font-weight-bold" colspan="7">TREATMENT</td>
      </tr>
      <?php $no = 1;
      $totaltreatment = 0;
      $totaldiskontreatment = 0;
      $subtotaltreatment = 0;
      foreach ($penjualantreatment as $pt) :
        if ($pt['qty'] > 0) : ?>
          <?php
          $totaltreatment += $pt['total'];
          $totaldiskontreatment += $pt['diskon'];
          $subtotaltreatment += $pt['subtotal'];
          ?>
          <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $pt['nm_treatment']; ?></td>
            <td class="text-right"><?= rupiah($pt['harga_treatment']); ?></td>
            <td class="text-center">
              <?php
              if ($pt['qty'] == null) {
                echo 0;
              } else {
                echo $pt['qty'];
              }
              ?>
            </td>
            <td class="text-right"><?= rupiah($pt['total']); ?></td>
            <td class="text-right"><?= rupiah($pt['diskon']); ?></td>
            <td class="text-right"><?= rupiah($pt['subtotal']); ?></td>
          </tr>
      <?php $no++;
        endif;
      endforeach; ?>
      <tr>
        <td class="font-weight-bold" colspan="7">PRODUK</td>
      </tr>
      <?php
      $totalproduk = 0;
      $totaldiskonproduk = 0;
      $subtotalproduk = 0;
      foreach ($penjualanproduk as $pp) :
        if ($pp['qty'] > 0) : ?>
          <?php
          $totalproduk += $pp['total'];
          $totaldiskonproduk += $pp['diskon'];
          $subtotalproduk += $pp['subtotal'];
          ?>
          <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $pp['jns_produk']; ?></td>
            <td class="text-right"><?= rupiah($pp['harga_produk']); ?></td>
            <td class="text-center">
              <?php
              if ($pp['qty'] == null) {
                echo 0;
              } else {
                echo $pp['qty'];
              }
              ?>
            </td>
            <td class="text-right"><?= rupiah($pp['total']); ?></td>
            <td class="text-right"><?= rupiah($pp['diskon']); ?></td>
            <td class="text-right"><?= rupiah($pp['subtotal']); ?></td>
          </tr>
      <?php $no++;
        endif;
      endforeach; ?>
      <tr>
        <td class="text-center font-weight-bold" colspan="4">TOTAL PENDAPATAN</td>
        <td class="text-right font-weight-bold"><?= rupiah($totaltreatment + $totalproduk) ?></td>
        <td class="text-right font-weight-bold"><?= rupiah($totaldiskontreatment + $totaldiskonproduk) ?></td>
        <td class="text-right font-weight-bold"><?= rupiah($subtotaltreatment + $subtotalproduk) ?></td>
      </tr>
    </tbody>
  </table>
</body>

</html>