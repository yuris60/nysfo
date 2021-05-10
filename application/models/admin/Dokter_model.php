<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

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
  }

  public function delete($where)
  {
    $this->db->delete('dokter', $where);
  }
}
