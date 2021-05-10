<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Pembelian_model extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('pembelian')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('pembelian', ["id_pembelian" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'tgl_pembelian' => htmlspecialchars($this->input->post('tgl_pembelian', true)),
      'nm_supplier' => htmlspecialchars($this->input->post('nm_supplier', true)),
    ];

    $this->db->insert('pembelian', $data);
  }

  public function update($where = null)
  {
    $data = [
      'tgl_pembelian' => htmlspecialchars($this->input->post('tgl_pembelian', true)),
      'nm_supplier' => htmlspecialchars($this->input->post('nm_supplier', true)),
    ];

    $this->db->where('id_pembelian', $where);
    $this->db->update('pembelian', $data);
  }

  public function delete($where)
  {
    $this->db->delete('pembelian', $where);
  }
}
