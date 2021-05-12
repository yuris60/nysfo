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

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Pembelian",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where = null)
  {
    $data = [
      'tgl_pembelian' => htmlspecialchars($this->input->post('tgl_pembelian', true)),
      'nm_supplier' => htmlspecialchars($this->input->post('nm_supplier', true)),
    ];

    $this->db->where('id_pembelian', $where);
    $this->db->update('pembelian', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Pembelian",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where)
  {
    $this->db->delete('pembelian', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Pembelian",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
