<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class Treatment_model extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('treatment')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('treatment', ["id_treatment" => $where])->row_array();
  }

  public function getJoin()
  {
    $this->db->select('*');
    $this->db->from('treatment');
    $this->db->join('detail_treatment', 'treatment.id_treatment = detail_treatment.id_treatment');
    $this->db->order_by('jns_treatment', 'ASC');
    $this->db->order_by('nm_treatment', 'ASC');
    return $this->db->get()->result_array();
  }

  public function simpan()
  {
    $data = [
      'jns_treatment' => htmlspecialchars($this->input->post('jns_treatment', true)),
    ];

    $this->db->insert('treatment', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Treatment",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where = null)
  {
    $data = [
      'jns_treatment' => htmlspecialchars($this->input->post('jns_treatment', true)),
    ];

    $this->db->where('id_treatment', $where);
    $this->db->update('treatment', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Treatment",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where)
  {
    $this->db->delete('treatment', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Treatment",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
