<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Jadwaldokter_model extends CI_Model
{
  public function getAll()
  {
    // return $this->db->get('jadwal_dokter')->result_array();
    $this->db->select('*');
    $this->db->from('jadwal_dokter');
    $this->db->join('dokter', 'jadwal_dokter.id_dokter = dokter.id_dokter');
    return $this->db->get()->result_array();
  }

  public function getAllDokter()
  {
    $this->db->select('*');
    $this->db->from('dokter');
    $this->db->order_by('nm_dokter', 'ASC');
    return $this->db->get()->result_array();
  }

  public function getById($where)
  {
    $this->db->select('*');
    $this->db->from('jadwal_dokter');
    $this->db->join('dokter', 'jadwal_dokter.id_dokter = dokter.id_dokter');
    $this->db->where('id_jadwaldokter', $where);
    return $this->db->get();
  }

  public function simpan()
  {
    $data = [
      'id_dokter' => htmlspecialchars($this->input->post('id_dokter', true)),
      'hari' => htmlspecialchars($this->input->post('hari', true)),
      'jam_mulai' => htmlspecialchars($this->input->post('jam_mulai', true)),
      'jam_selesai' => htmlspecialchars($this->input->post('jam_selesai', true)),
    ];

    $this->db->insert('jadwal_dokter', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Jadwal Dokter",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where = null)
  {
    $data = [
      'id_dokter' => htmlspecialchars($this->input->post('id_dokter', true)),
      'hari' => htmlspecialchars($this->input->post('hari', true)),
      'jam_mulai' => htmlspecialchars($this->input->post('jam_mulai', true)),
      'jam_selesai' => htmlspecialchars($this->input->post('jam_selesai', true)),
    ];

    $this->db->where('id_jadwaldokter', $where);
    $this->db->update('jadwal_dokter', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Jadwal Dokter",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where)
  {
    $this->db->delete('jadwal_dokter', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Jadwal Dokter",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
