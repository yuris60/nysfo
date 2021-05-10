<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Transaksi</title>
  <link rel="stylesheet" href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>

<body>
  <!-- <h5 class="text-center">FAKTUR PENJUALAN</h5> -->
  <center>
    <img src="<?= base_url('assets/img/logo_name.png') ?>" width="150px" alt="">
    <p style="font-size: 8;">
      Jl. Raya Syeh Quro, RT.002/RW.18, Karawang Wetan, Kec. Karawang Timur <br>
      Kabupaten Karawang, Jawa Barat 41314 <br>
      Email : <a href="">contoh@gmail.com</a> | telp : (0267) 1234567
    </p>
    <hr>

    <h6><u>STRUK TRANSAKSI</u></h6>
  </center>

  <font style="font-size: 8">
    <table width="100%" border="1" style="margin-top: 5px;">
      <thead>
        <tr>
          <td align="center"><b>No</b></td>
          <td align="center"><b>Nama Produk/Pelayanan</b></td>
          <td align="center"><b>Harga</b></td>
          <td align="center"><b>Qty</b></td>
          <td align="center"><b>Total Harga</b></td>
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
                <td align="center"><?= $pp['qty_produk'] ?></td>
                <td align="right"><?= rupiah($pp['qty_produk'] * $pp['harga_produk']) ?></td>
              </tr>
            <?php } ?>
            <!-- Penjualan Produk -->

            <?php } elseif ($pa['id_produk'] == 0) {
            foreach ($penjualantreatment as $pt) {
            ?>
              <tr>
                <td align="center"><?= $no ?></td>
                <td><?= $pt['nm_treatment'] ?></td>
                <td align="right"><?= rupiah($pt['harga_treatment']) ?></td>
                <td align="center"><?= $pt['qty_treatment'] ?></td>
                <td align="right"><?= rupiah($pt['qty_treatment'] * $pt['harga_treatment']) ?></td>
              </tr>
            <?php } ?>
            <!-- Penjualan Treatment -->
          <?php } ?>
          <!-- Kondisi -->
        <?php $no++;
        } ?>
      </tbody>
    </table>

    <table width="100%" border="0">
      <tbody>
        <tr>
          <td width="360px" align="right">Diskon</td>
          <td align="right">Rp. 0,-</td>
        </tr>
        <tr>
          <td align="right"><b>Grand Total</b></td>
          <td align="right"><b><?= rupiah($sum['total_penjualan']) ?></b></td>
        </tr>
      </tbody>
    </table>

    <p>Terbilang : <?= terbilang($sum['total_penjualan']) ?></p>

    <p>Hormat Kami,</p>
    <p style="margin-top: 50px;">(____________________)</p>
  </font>
</body>

</html>