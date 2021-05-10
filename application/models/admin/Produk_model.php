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
  }

  public function delete($where)
  {
    $this->db->delete('produk', $where);
  }
}
