<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Admin_model extends CI_Model
{
  public function getAll()
  {
    return $this->db->get('admin')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('admin', ["id_admin" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'nm_admin' => htmlspecialchars($this->input->post('nm_admin', true)),
      'username' => htmlspecialchars($this->input->post('username', true)),
      'password' => htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT)),
      'akses' => htmlspecialchars($this->input->post('akses', true)),
    ];

    $this->db->insert('admin', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Admin",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  // public function update($where = null)
  // {
  //   $data = [
  //     'nm_admin' => htmlspecialchars($this->input->post('nm_admin', true)),
  //     'username' => htmlspecialchars($this->input->post('username', true)),
  //     'password' => htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT)),
  //     'akses' => htmlspecialchars($this->input->post('akses', true)),
  //   ];

  //   $this->db->where('id_user', $where);
  //   $this->db->update('user', $data);
  // }

  public function delete($where)
  {
    $this->db->delete('admin', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Admin",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
