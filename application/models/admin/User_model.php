<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class user_model extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('user')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('user', ["id_user" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'password' => htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT)),
      'akses' => htmlspecialchars($this->input->post('akses', true)),
    ];

    $this->db->insert('user', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "User",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where = null)
  {
    $data = [
      'nm_user' => htmlspecialchars($this->input->post('nm_user', true)),
      'jk_user' => htmlspecialchars($this->input->post('jk_user', true)),
      'umur_user' => htmlspecialchars($this->input->post('umur_user', true)),
      'alamat_user' => htmlspecialchars($this->input->post('alamat_user', true)),
      'notelp_user' => htmlspecialchars($this->input->post('notelp_user', true)),
      'email_user' => htmlspecialchars($this->input->post('email_user', true)),
    ];

    $this->db->where('id_user', $where);
    $this->db->update('user', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "User",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where)
  {
    $this->db->delete('user', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "User",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
