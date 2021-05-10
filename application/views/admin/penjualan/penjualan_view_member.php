<?php
if ($hasil['jk_pelanggan'] == "L") {
  $jk = "Laki-laki";
} else {
  $jk = "Perempuan";
}
?>

<!-- Hidden Form -->
<input type="hidden" value="<?= $hasil['id_pelanggan'] ?>" name="id_pelanggan2">
<input type="hidden" value="<?= $hasil['nm_pelanggan'] ?>" name="nm_pelanggan">

<div class="form-group">
  <label>Jenis Kelamin</label>
  <input type="text" class="form-control <?= form_error('jk_pelanggan') ? 'is-invalid' : '' ?>" name="jk_pelanggan" id="jk_pelanggan" readonly value="<?= $jk ?>">
  <div class="invalid-feedback">
    <?= form_error('jk_pelanggan'); ?>
  </div>
</div>

<div class="form-group">
  <label>No HP Member</label>
  <input type="text" class="form-control <?= form_error('notelp_pelanggan') ? 'is-invalid' : '' ?>" name="notelp_pelanggan" id="notelp_pelanggan" readonly value="<?= $hasil['notelp_pelanggan'] ?>">
  <div class="invalid-feedback">
    <?= form_error('notelp_pelanggan'); ?>
  </div>
</div>

<div class="form-group">
  <label>Alamat Member</label>
  <textarea name="alamat_pelanggan" id="alamat_pelanggan" class="form-control" rows="2" readonly><?= $hasil['alamat_pelanggan'] ?></textarea>
  <div class="invalid-feedback">
    <?= form_error('alamat_pelanggan'); ?>
  </div>
</div>