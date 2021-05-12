<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Member_model extends CI_Model
{
  public function getAll()
  {
    $this->db->from('pelanggan');
    $this->db->where('level_pelanggan', 'Member');
    return $this->db->get()->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('pelanggan', ["id_pelanggan" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'nm_pelanggan' => htmlspecialchars($this->input->post('nm_pelanggan', true)),
      'jk_pelanggan' => htmlspecialchars($this->input->post('jk_pelanggan', true)),
      'umur_pelanggan' => htmlspecialchars($this->input->post('umur_pelanggan', true)),
      'alamat_pelanggan' => htmlspecialchars($this->input->post('alamat_pelanggan', true)),
      'notelp_pelanggan' => htmlspecialchars($this->input->post('notelp_pelanggan', true)),
      'email_pelanggan' => htmlspecialchars($this->input->post('email_pelanggan', true)),
      'level_pelanggan' => "Member",
    ];

    $this->db->insert('pelanggan', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Member",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where = null)
  {
    $data = [
      'nm_pelanggan' => htmlspecialchars($this->input->post('nm_pelanggan', true)),
      'jk_pelanggan' => htmlspecialchars($this->input->post('jk_pelanggan', true)),
      'umur_pelanggan' => htmlspecialchars($this->input->post('umur_pelanggan', true)),
      'alamat_pelanggan' => htmlspecialchars($this->input->post('alamat_pelanggan', true)),
      'notelp_pelanggan' => htmlspecialchars($this->input->post('notelp_pelanggan', true)),
      'email_pelanggan' => htmlspecialchars($this->input->post('email_pelanggan', true)),
    ];

    $this->db->where('id_pelanggan', $where);
    $this->db->update('pelanggan', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Member",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where)
  {
    $this->db->delete('pelanggan', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Member",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
