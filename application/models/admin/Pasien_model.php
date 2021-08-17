<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class Pasien_model extends CI_Model
{
  public function getAll()
  {
    $this->db->from('pelanggan');
    $this->db->where('jenis_pelanggan', 'Pasien');
    return $this->db->get()->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('pelanggan', ["id_pelanggan" => $where])->row_array();
  }

  public function getKey($where)
  {
    $this->db->select('*');
    $this->db->from('penjualan');
    $this->db->join('pelanggan', 'penjualan.id_pelanggan = penjualan.id_pelanggan');
    $this->db->where('pelanggan.id_pelanggan', $where);
    return $this->db->get()->row_array();
    // return $this->db->get_where('penjualan', ["id_penjualan" => $where])->row_array();
  }

  public function getJoinTreatment($where)
  {
    // return $this->db->get_where('detail_penjualan', ["id_penjualan" => $where])->result_array();

    $this->db->select('*');
    $this->db->from('detail_penjualan');
    $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = penjualan.id_pelanggan');
    $this->db->join('detail_treatment', 'detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment');
    $this->db->join('treatment', 'treatment.id_treatment = detail_treatment.id_treatment');
    $this->db->where('pelanggan.id_pelanggan', $where);
    $this->db->order_by('tgl_penjualan', 'desc');
    return $this->db->get()->result_array();
  }

  public function getJoinProduct($where)
  {
    // return $this->db->get_where('detail_penjualan', ["id_penjualan" => $where])->result_array();

    $this->db->select('*');
    $this->db->from('detail_penjualan');
    $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = penjualan.id_pelanggan');
    $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
    $this->db->where('pelanggan.id_pelanggan', $where);
    $this->db->order_by('tgl_penjualan', 'desc');
    return $this->db->get()->result_array();
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
      'jenis_pelanggan' => "Pasien",
    ];

    $this->db->insert('pelanggan', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Pasien",
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
      'tabel' => "Pasien",
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
      'tabel' => "Pasien",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
