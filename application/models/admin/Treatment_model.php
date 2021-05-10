<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

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
  }

  public function update($where = null)
  {
    $data = [
      'jns_treatment' => htmlspecialchars($this->input->post('jns_treatment', true)),
    ];

    $this->db->where('id_treatment', $where);
    $this->db->update('treatment', $data);
  }

  public function delete($where)
  {
    $this->db->delete('treatment', $where);
  }
}
