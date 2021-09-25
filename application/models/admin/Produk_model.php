<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class Produk_model extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('produk')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('produk', ["id_produk" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'jns_produk' => htmlspecialchars($this->input->post('jns_produk', true)),
      'stok' => htmlspecialchars($this->input->post('stok', true)),
      'stok_gudang' => htmlspecialchars($this->input->post('stok_gudang', true)),
      'harga_produk' => htmlspecialchars($this->input->post('harga_produk', true)),
    ];

    $this->db->insert('produk', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Produk",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where = null)
  {
    $data = [
      'jns_produk' => htmlspecialchars($this->input->post('jns_produk', true)),
      'stok' => htmlspecialchars($this->input->post('stok', true)),
      'stok_gudang' => htmlspecialchars($this->input->post('stok_gudang', true)),
      'harga_produk' => htmlspecialchars($this->input->post('harga_produk', true)),
    ];

    $this->db->where('id_produk', $where);
    $this->db->update('produk', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Produk",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function addStokGudang($where)
  {
    $this->db->select('stok_gudang');
    $this->db->from('produk');
    $this->db->where('id_produk', $where);
    $query = $this->db->get()->row_array();

    $stokgudanglama = $query['stok_gudang'];
    $tambahstokgudang = htmlspecialchars($this->input->post('stok_gudang', true));

    $stokgudangbaru = $stokgudanglama + $tambahstokgudang;

    $this->db->set('stok_gudang', $stokgudangbaru);
    $this->db->where('id_produk', $where);
    $this->db->update('produk');

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Produk",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  // public function reduceStokGudang($where)
  // {
  //   $this->db->select('stok_gudang');
  //   $this->db->from('produk');
  //   $this->db->where('id_produk', $where);
  //   $query = $this->db->get()->row_array();

  //   $stokgudanglama = $query['stok_gudang'];
  //   $kurangistokgudang = htmlspecialchars($this->input->post('stok', true));

  //   $stokgudangbaru = $stokgudanglama - $kurangistokgudang;

  //   // echo $stokgudangbaru;

  //   $this->db->set('stok_gudang', $stokgudangbaru);
  //   $this->db->where('id_produk', $where);
  //   $this->db->update('produk');

  //   //simpan notifikasi
  //   $datanotifikasi = [
  //     'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
  //     'notifikasi' => "Memperbaharui Data",
  //     'tabel' => "Produk",
  //     'waktu_simpan' => date('Y-m-d H:i:s')
  //   ];
  // }

  public function addStokReady($where)
  {

    //panggil stok_ready terakhir
    $this->db->select('stok');
    $this->db->from('produk');
    $this->db->where('id_produk', $where);
    $query_ready = $this->db->get()->row_array();

    //panggil stok_gudang terakhir
    $this->db->select('stok_gudang');
    $this->db->from('produk');
    $this->db->where('id_produk', $where);
    $query_gudang = $this->db->get()->row_array();

    // buatkan variabel diatas
    $stokreadylama = $query_ready['stok'];
    $stokgudanglama = $query_gudang['stok_gudang'];


    //panggil inputan
    $tambahstokready = htmlspecialchars($this->input->post('stok', true));

    // echo "Stok Ready Lama" . $stokreadylama . "<br>";
    // echo "Stok Gudang Lama" . $stokgudanglama . "<br>";
    // echo "Input Baru" . $tambahstokready;

    if ($stokgudanglama < $tambahstokready) { //jika input stok ready melebihi stok gudang
      $this->session->set_flashdata('flash-data-stok-gudang-kurang', 'ready');
      redirect('admin/produk');
    } else {
      // tambahkan stok ready
      $stokreadybaru = $stokreadylama + $tambahstokready;
      $this->db->set('stok', $stokreadybaru);
      $this->db->where('id_produk', $where);
      $this->db->update('produk');

      //kurangi stok gudang
      $stokgudangbaru = $stokgudanglama - $tambahstokready;
      $this->db->set('stok_gudang', $stokgudangbaru);
      $this->db->where('id_produk', $where);
      $this->db->update('produk');
    }
  }

  public function delete($where)
  {
    $this->db->delete('produk', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Produk",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
