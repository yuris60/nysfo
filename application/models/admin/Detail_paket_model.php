<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Detail_paket_model extends CI_Model
{
  public function getAll($where)
  {
    $this->db->select('*');
    $this->db->from('detail_paket');
    $this->db->join('paket', 'paket.id_paket = detail_paket.id_paket');
    $this->db->join('produk', 'produk.id_produk = detail_paket.id_produk');
    $this->db->where('paket.id_paket', $where);
    return $this->db->get()->result_array();
  }


  public function getById($where, $where2)
  {
    $this->db->select('*');
    $this->db->from('detail_paket');
    $this->db->join('paket', 'paket.id_paket = detail_paket.id_paket');
    $this->db->where('paket.id_paket', $where);
    $this->db->where('detail_paket.id_detailpaket', $where2);
    return $this->db->get();

    // $this->db->where('detail_paket', ["id_detailpaket" => $where2]);
    // return $this->db->where('paket', ["id_paket" => $where])->row_array();
  }

  public function getKey($where)
  {
    return $this->db->get_where('paket', ["id_paket" => $where])->row_array();
  }

  public function getProduk()
  {
    return $this->db->get('produk')->result_array();
  }

  public function simpan()
  {
    $data = [
      'id_paket' => htmlspecialchars($this->input->post('id_paket', true)),
      'id_produk' => htmlspecialchars($this->input->post('id_produk', true)),
    ];

    $this->db->insert('detail_paket', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Detail Paket",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where2)
  {
    $data = [
      'nm_paket' => htmlspecialchars($this->input->post('nm_paket', true)),
      'harga' => htmlspecialchars($this->input->post('harga', true)),
    ];

    $this->db->where('id_detailpaket', $where2);
    $this->db->update('detail_paket', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Detail Paket",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where2)
  {
    $this->db->delete('detail_paket', $where2);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Detail Paket",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
