<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Penjualan_model extends CI_Model
{
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('penjualan');
    // $this->db->join('dokter', 'penjualan.id_dokter = dokter.id_dokter');
    $this->db->order_by('tgl_penjualan', 'DESC');
    $this->db->order_by('id_penjualan', 'DESC');
    return $this->db->get()->result_array();
  }

  public function getMemberAll()
  {
    $this->db->from('pelanggan');
    $this->db->where('level_pelanggan', 'Member');
    return $this->db->get()->result_array();
  }

  public function getDokterAll()
  {
    return $this->db->get('dokter')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('penjualan', ["id_penjualan" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'id_penjualan' => htmlspecialchars($this->input->post('id_penjualan2', true)),
      'nama' => htmlspecialchars($this->input->post('nm_pelanggan', true)),
      'alamat' => htmlspecialchars($this->input->post('alamat_pelanggan', true)),
      'no_telp' => htmlspecialchars($this->input->post('notelp_pelanggan', true)),
      'tgl_penjualan' => htmlspecialchars($this->input->post('tgl_penjualan', true)),
      'id_dokter' => htmlspecialchars($this->input->post('id_dokter', true)),
      'nm_beautician' => htmlspecialchars($this->input->post('nm_beautician', true)),
    ];

    $this->db->insert('penjualan', $data);
  }

  public function simpan2()
  {
    $data = [
      'nama' => htmlspecialchars($this->input->post('nama', true)),
      'jk' => htmlspecialchars($this->input->post('jk', true)),
      'alamat' => htmlspecialchars($this->input->post('alamat', true)),
      'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
      'tgl_penjualan' => htmlspecialchars($this->input->post('tgl_penjualan', true)),
      'id_dokter' => htmlspecialchars($this->input->post('id_dokter', true)),
      'nm_beautician' => htmlspecialchars($this->input->post('nm_beautician', true)),
    ];

    $this->db->insert('penjualan', $data);
  }

  public function update($where = null)
  {
    $data = [
      'tgl_penjualan' => htmlspecialchars($this->input->post('tgl_penjualan', true)),
      'nm_supplier' => htmlspecialchars($this->input->post('nm_supplier', true)),
    ];

    $this->db->where('id_penjualan', $where);
    $this->db->update('penjualan', $data);
  }

  public function delete($where)
  {
    $this->db->delete('penjualan', $where);
  }

  public function view_data($id)
  {
    // $this->db->join('tbl_kota', "tbl_kota.id_kota=tbl_data.id_kota");
    return $this->db->get_where('pelanggan', "pelanggan.id_pelanggan='$id'");
  }
}
