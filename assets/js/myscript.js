const flashData = $('.flash-data').data('flashdata');
const flashDataStokKurang = $('.flash-data-stok-kurang').data('flashdata');
const flashDataStokGudangKurang = $('.flash-data-stok-gudang-kurang').data('flashdata');

//login
const flashDataLoginAdmin = $('.flash-data-login').data('flashdata');
const flashDataLoginAdminGagal = $('.flash-data-admin-gagal').data('flashdata');
const flashDataLoginBelumLogin = $('.flash-data-admin-belum-login').data('flashdata');
const flashDataLoginAdminLogout = $('.flash-data-admin-logout').data('flashdata');

if (flashData) {
  Swal.fire({
    title: 'Selamat',
    text: 'Data berhasil ' + flashData,
    icon: 'success'
  });
}

if (flashDataStokKurang) {
  Swal.fire({
    title: 'Maaf',
    text: 'Stok gudang yang tersedia tidak mencukupi dari jumlah ' + flashDataStokKurang,
    icon: 'error'
  });
}

if (flashDataStokGudangKurang) {
  Swal.fire({
    title: 'Maaf',
    text: 'Stok gudang yang tersedia tidak mencukupi dari jumlah input produk' + flashDataStokGudangKurang,
    icon: 'error'
  });
}

if (flashDataLoginAdmin) {
  Swal.fire({
    title: 'Berhasil',
    text: 'Selamat Datang, ' + flashDataLoginAdmin,
    icon: 'success'
  });
}

if (flashDataLoginAdminGagal) {
  Swal.fire({
    title: 'Maaf',
    text: 'Akun tidak ' + flashDataLoginAdminGagal,
    icon: 'error'
  });
}

if (flashDataLoginBelumLogin) {
  Swal.fire({
    title: 'Maaf',
    text: 'Silahkan login terlebih ' + flashDataLoginBelumLogin,
    icon: 'error'
  });
}

if (flashDataLoginAdminLogout) {
  Swal.fire({
    title: 'Selamat',
    text: 'Anda berhasil logout, ' + flashDataLoginAdminLogout,
    icon: 'success'
  });
}

//tombol-hapus
$('.tombol-hapus').on('click', function (e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Peringatan!',
    text: "Apakah anda yakin data ini akan dihapus?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#4e73df',
    cancelButtonColor: '#e74a3b',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  })
});

$('.tombol-hapus2').on('click', function (e) {

  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Peringatan!',
    text: "Sebelum dihapus, pastikan data pada Detail Penjualan didalamnya dihapus terlebih dahulu",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#4e73df',
    cancelButtonColor: '#e74a3b',
    confirmButtonText: 'Hapus',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.value) {
      document.location.href = href;
    }
  })
});

//belum tersedia
$('.belum-tersedia').on('click', function (e) {
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Maaf saat ini konten belum tersedia',
  });
});