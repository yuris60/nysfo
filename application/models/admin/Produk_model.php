<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

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
