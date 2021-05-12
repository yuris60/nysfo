<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Paket_model extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('paket')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('paket', ["id_paket" => $where])->row_array();
  }

  public function getJoin()
  {
    $this->db->select('*');
    $this->db->from('paket');
    $this->db->join('detail_paket', 'paket.id_paket = detail_paket.id_paket');
    $this->db->order_by('jns_paket', 'ASC');
    $this->db->order_by('nm_paket', 'ASC');
    return $this->db->get()->result_array();
  }

  public function simpan()
  {
    $data = [
      'nm_paket' => htmlspecialchars($this->input->post('nm_paket', true)),
      'harga_paket' => htmlspecialchars($this->input->post('harga_paket', true)),
    ];

    $this->db->insert('paket', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Paket",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where = null)
  {
    $data = [
      'nm_paket' => htmlspecialchars($this->input->post('nm_paket', true)),
      'harga_paket' => htmlspecialchars($this->input->post('harga_paket', true)),
    ];

    $this->db->where('id_paket', $where);
    $this->db->update('paket', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Paket",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where)
  {
    $this->db->delete('paket', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Paket",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
