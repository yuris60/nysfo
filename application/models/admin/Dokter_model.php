<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class Dokter_model extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('dokter')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('dokter', ["id_dokter" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'nm_dokter' => htmlspecialchars($this->input->post('nm_dokter', true)),
      'jk_dokter' => htmlspecialchars($this->input->post('jk_dokter', true)),
      'tempatlahir_dokter' => htmlspecialchars($this->input->post('tempatlahir_dokter', true)),
      'tanggallahir_dokter' => htmlspecialchars($this->input->post('tanggallahir_dokter', true)),
      'alamat_dokter' => htmlspecialchars($this->input->post('alamat_dokter', true)),
      'notelp_dokter' => htmlspecialchars($this->input->post('notelp_dokter', true)),
      'email_dokter' => htmlspecialchars($this->input->post('email_dokter', true)),
    ];

    $this->db->insert('dokter', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Dokter",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where = null)
  {
    $data = [
      'nm_dokter' => htmlspecialchars($this->input->post('nm_dokter', true)),
      'jk_dokter' => htmlspecialchars($this->input->post('jk_dokter', true)),
      'tempatlahir_dokter' => htmlspecialchars($this->input->post('tempatlahir_dokter', true)),
      'tanggallahir_dokter' => htmlspecialchars($this->input->post('tanggallahir_dokter', true)),
      'alamat_dokter' => htmlspecialchars($this->input->post('alamat_dokter', true)),
      'notelp_dokter' => htmlspecialchars($this->input->post('notelp_dokter', true)),
      'email_dokter' => htmlspecialchars($this->input->post('email_dokter', true)),
    ];

    $this->db->where('id_dokter', $where);
    $this->db->update('dokter', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Dokter",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where)
  {
    $this->db->delete('dokter', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Dokter",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
