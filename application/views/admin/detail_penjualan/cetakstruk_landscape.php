<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Transaksi</title>
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>

<?php
$bulan = date('m');
$tahun = date('Y');
?>

<body>

  <!-- Tabel Header -->
  <table cellpadding="7" width="100%">
    <tbody>
      <tr>
        <td valign="center" width="125px"><img src="<?= base_url('assets/img/logo2.png') ?>" width="100%" alt=""></td>
        <td width="400px">
          <h5>Nastya Beauty Care</h5>
          <hr style="margin: 0 0 0 0">
          <font style="font-size: 8;  margin-bottom: 0;">
            Jl. Raya Syeh Quro No.43 Johar Lamaran, Karawang Wetan, Karawang Timur <br>
            Kabupaten Karawang, Jawa Barat 41314 <br>
            Email : <a href="">nastyaderm75@gmail.com</a> | Telp : 0812 1856 9907 / 0813 1685 7489 <br>
            Facebook : Nbc Johar Lamaran / Ndk Karawang <br>
          </font>
          <font style="font-size: 8; margin-top: 0; padding-top: 0; margin-bottom: 0;">
            Instagram : @nbc_johar_lamaran / @nastyaderm <br>
          </font>
        </td>
        <td valign="top">
          <h5 style="margin-bottom: 0px">KWITANSI <br>
            <i>RECEIPT</i>
          </h5>
          <font style="font-size: 8;">No. : <font style="font-size: 8; margin: 0px 0px;"><?= $penjualanallbyid['id_penjualan']; ?>/NBC/<?= $bulan . "/" . $tahun ?></font>
          </font>
          <hr style="margin: 0px 0px;">

        </td>
      </tr>
    </tbody>
  </table>

  <!-- Tabel Penerima -->
  <table cellspacing="7" style="font-size: 8;">
    <tbody>
      <tr>
        <td>
          Sudah Terima Dari <br>
          <i>Received From</i>
        </td>
        <td valign="top">:</td>
        <td valign="top"><?= $penjualanallbyid['nama']; ?></td>
      </tr>
      <tr>
        <td>
          Banyak Uang<br>
          <i>Amount Received</i>
        </td>
        <td valign="top">:</td>
        <td valign="top"><?= strtoupper(terbilang($sum['total_penjualan'])) ?></td>
      </tr>
      <tr>
        <td>
          Untuk Pembayaran<br>
          <i>In Payment Of</i>
        </td>
        <td valign="top">:</td>
        <td valign="top">Pembelian Produk/Pelayanan NBC, tanggal <?= tgl_indo($penjualanallbyid['tgl_penjualan']) ?>, CASH</td>
      </tr>
    </tbody>
  </table>

  <div style="margin-bottom: 15px;"></div>

  <!-- Tabel Transaksi -->
  <table width="100%" style="font-size: 9;" border="1">
    <thead>
      <tr>
        <td align="center"><b>No</b></td>
        <td align="center"><b>Product/Service Name</b></td>
        <td align="center"><b>Price</b></td>
        <td align="center"><b>Qty</b></td>
        <td align="center" width="100px"><b>Discount Detail</b></td>
        <td align="center"><b>Total</b></td>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($penjualanall as $pa) {
        if ($pa['id_detailtreatment'] == 0) {
          foreach ($penjualanproduk as $pp) {
      ?>
            <tr>
              <td align="center"><?= $no ?></td>
              <td><?= $pp['jns_produk'] ?></td>
              <td align="right"><?= rupiah($pp['harga_produk']) ?></td>
              <td align="center"><?= $pp['qty_produk'] ?> x</td>
              <td></td>
              <td align="right"><?= rupiah($pp['qty_produk'] * $pp['harga_produk']) ?></td>
            </tr>
          <?php $no++;
          }
          break; ?>
          <!-- Penjualan Produk -->

          <?php } elseif ($pa['id_produk'] == 0) {
          foreach ($penjualantreatment as $pt) {
          ?>
            <tr>
              <td align="center"><?= $no ?></td>
              <td><?= $pt['nm_treatment'] ?></td>
              <td align="right"><?= rupiah($pt['harga_treatment']) ?></td>
              <td align="center"><?= $pt['qty_treatment'] ?> x</td>
              <td></td>
              <td align="right"><?= rupiah($pt['qty_treatment'] * $pt['harga_treatment']) ?></td>
            </tr>
          <?php $no++;
          } ?>
          <!-- Penjualan Treatment -->
        <?php } ?>
        <!-- Kondisi -->
      <?php
      } ?>
      <tr>
        <td colspan="4" rowspan="3" style="border-left: 0px; border-bottom: 0px;">
          <div style="border-top: 2px solid #000; border-bottom: 2px solid #000; width: 30%; margin-left: 20px;">
            <h5 align="center"><?= rupiah($sum['total_penjualan']) ?></h5>
          </div>
        </td>
        <td>SubTotal</td>
        <td align="right"><?= rupiah($sum['total_penjualan']) ?></td>
      </tr>
      <tr>
        <td>Discount Total</td>
        <td align="right">0</td>
      </tr>
      <tr>
        <td><strong>Grand Total</strong></td>
        <td align="right"><strong><?= rupiah($sum['total_penjualan']) ?></strong></td>
      </tr>
    </tbody>
  </table>
</body>

</html>