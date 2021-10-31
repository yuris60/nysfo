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
    <h3 style="margin-top: -10px;">Laporan Produk</h3>
  </div>

  <table width="75%" border="1" class="mx-auto">
    <thead>
      <tr class="text-center">
        <th width="50px">No</th>
        <th>Jenis Produk</th>
        <th width="100px">Harga</th>
        <th>Stok Ready</th>
        <th>Stok Gudang</th>
      </tr>
    </thead>
    </thead>
    <tbody>
      <?php
      $no = 1;
      foreach ($produk as $p) :
        // $this->db->select('(SELECT SUM(detail_penjualan.qty_produk) WHERE detail_penjualan.id_produk = ' . $p['id_produk'] . ') AS qty', FALSE);
        $this->db->select_sum('detail_penjualan.qty_produk');
        $this->db->where("detail_penjualan.id_produk", $p['id_produk']);
        $query = $this->db->get('detail_penjualan')->result_array();
        foreach ($query as $q) :
      ?>
          <tr>
            <td class="text-center"><?= $no ?></td>
            <td><?= $p['jns_produk'] ?></td>
            <td align="right"><?= rupiah($p['harga_produk']) ?></td>
            <td align="center"><?= $p['stok'] ?></td>
            <td align="center"><?= $p['stok_gudang'] ?></td>
          </tr>
      <?php endforeach;
        $no++;
      endforeach; ?>
    </tbody>
  </table>
</body>

</html>