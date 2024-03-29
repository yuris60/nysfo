<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class Detail_treatment_model extends CI_Model
{
  public function getAll($where)
  {
    return $this->db->get_where('detail_treatment', ["id_treatment" => $where])->result_array();
  }

  public function getById($where, $where2)
  {
    $this->db->select('*');
    $this->db->from('detail_treatment');
    $this->db->join('treatment', 'treatment.id_treatment = detail_treatment.id_treatment');
    $this->db->where('treatment.id_treatment', $where);
    $this->db->where('detail_treatment.id_detailtreatment', $where2);
    return $this->db->get();

    // $this->db->where('detail_treatment', ["id_detailtreatment" => $where2]);
    // return $this->db->where('treatment', ["id_treatment" => $where])->row_array();
  }

  public function getKey($where)
  {
    return $this->db->get_where('treatment', ["id_treatment" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'id_treatment' => htmlspecialchars($this->input->post('id_treatment', true)),
      'nm_treatment' => htmlspecialchars($this->input->post('nm_treatment', true)),
      'harga_treatment' => htmlspecialchars($this->input->post('harga_treatment', true)),
    ];

    $this->db->insert('detail_treatment', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Detail Treatment",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where2)
  {
    $data = [
      'nm_treatment' => htmlspecialchars($this->input->post('nm_treatment', true)),
      'harga_treatment' => htmlspecialchars($this->input->post('harga_treatment', true)),
    ];

    $this->db->where('id_detailtreatment', $where2);
    $this->db->update('detail_treatment', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Detail Treatment",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where2)
  {
    $this->db->delete('detail_treatment', $where2);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Detail Treatment",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
