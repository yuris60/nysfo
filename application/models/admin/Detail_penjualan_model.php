<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Detail_penjualan_model extends CI_Model
{
  public function getAll($where)
  {
    $this->db->select('*');
    $this->db->from('detail_penjualan');
    $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
    $this->db->join('produk', 'produk.id_produk = detail_penjualan.id_produk');
    $this->db->join('detail_treatment', 'detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment');
    $this->db->join('treatment', 'treatment.id_treatment = detail_treatment.id_treatment');
    $this->db->where('detail_penjualan.id_penjualan', $where);
    return $this->db->get()->result_array();
  }

  public function getAllStruk($where)
  {
    $this->db->select('*');
    $this->db->from('detail_penjualan');
    $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
    $this->db->where('detail_penjualan.id_penjualan', $where);
    return $this->db->get();
  }


  public function getJoinTreatment($where)
  {
    // return $this->db->get_where('detail_penjualan', ["id_penjualan" => $where])->result_array();

    $this->db->select('*');
    $this->db->from('detail_penjualan');
    $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
    $this->db->join('detail_treatment', 'detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment');
    $this->db->join('treatment', 'treatment.id_treatment = detail_treatment.id_treatment');
    $this->db->where('detail_penjualan.id_penjualan', $where);
    return $this->db->get()->result_array();
  }

  public function getJoinProduct($where)
  {
    // return $this->db->get_where('detail_penjualan', ["id_penjualan" => $where])->result_array();

    $this->db->select('*');
    $this->db->from('detail_penjualan');
    $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
    $this->db->join('produk', 'detail_penjualan.id_produk = produk.id_produk');
    $this->db->where('detail_penjualan.id_penjualan', $where);
    return $this->db->get()->result_array();
  }

  public function getAllProduk()
  {
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->order_by('jns_produk', 'ASC');
    return $this->db->get()->result_array();
  }

  public function getAllTreatment()
  {
    $this->db->select('*');
    $this->db->from('treatment');
    $this->db->join('detail_treatment', 'treatment.id_treatment = detail_treatment.id_treatment');
    // $this->db->order_by('treatment.id_treatment', 'ASC');
    $this->db->order_by('treatment.jns_treatment', 'ASC');
    $this->db->order_by('detail_treatment.nm_treatment', 'ASC');
    return $this->db->get()->result_array();
  }

  public function getById($where, $where2)
  {
    $this->db->select('*');
    $this->db->from('detail_penjualan');
    $this->db->join('penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
    $this->db->where('penjualan.id_penjualan', $where);
    $this->db->where('detail_penjualan.id_detailpenjualan', $where2);
    return $this->db->get();

    // $this->db->where('detail_penjualan', ["id_detailpenjualan" => $where2]);
    // return $this->db->where('penjualan', ["id_penjualan" => $where])->row_array();
  }

  public function getKey($where)
  {
    return $this->db->get_where('penjualan', ["id_penjualan" => $where])->row_array();
  }

  public function kurangiStokProdukCreate()
  {
    $this->db->select('stok');
    $this->db->from('produk');
    $this->db->where('id_produk', $this->input->post('id_produk'));
    $db = $this->db->get()->row_array();
    $stok = $db['stok'];
    $stokbaru = $stok - $this->input->post('qty_produk');
    // $this->db->next();

    $this->db->where('id_produk', $this->input->post('id_produk'));
    $this->db->update('produk', ['stok' => $stokbaru]);
  }

  public function tambahStokProdukDelete($where2, $where4)
  {
    $this->db->select('stok');
    $this->db->from('produk');
    $this->db->where('id_produk', $where2);
    $db = $this->db->get()->row_array();
    $stok = $db['stok'];
    $stokbaru = $stok + $where4;
    // $this->db->next();

    $this->db->where('id_produk', $where2);
    $this->db->update('produk', ['stok' => $stokbaru]);
  }

  public function sumTotalPembayaran($where)
  {
    $this->db->select_sum('total_penjualan');
    $this->db->where('id_penjualan', $where);
    return $this->db->get('detail_penjualan')->row_array();
  }

  public function simpan($where)
  {
    //Kondisi pemisahan penyimpanan antara treatment & produk
    if ($this->input->post('id_detailtreatment') != 0) { //jika simpan treatment maka hitung jumlah harga treatment
      $this->db->select('harga_treatment');
      $this->db->from('detail_treatment');
      $this->db->where('id_detailtreatment', $this->input->post('id_detailtreatment'));
      $db = $this->db->get()->row_array();
      $harga_treatment = $db['harga_treatment'];
      $qty = $this->input->post('qty_treatment');
      $total_penjualan = $harga_treatment * $qty;
    } elseif ($this->input->post('id_produk') != 0) { //jika simpan produk maka hitung jumlah harga produk
      $this->db->select('harga_produk, stok');
      $this->db->from('produk');
      $this->db->where('id_produk', $this->input->post('id_produk'));
      $db = $this->db->get()->row_array();
      $harga_produk = $db['harga_produk'];
      $qty_produk = $this->input->post('qty_produk');
      $total_penjualan = $harga_produk * $qty_produk;

      $stok = $db['stok'];
      if ($stok < $this->input->post('qty_produk')) {
        $this->session->set_flashdata('flash-data-stok-kurang', 'penjualan');
        redirect('admin/penjualan');
      }
    }

    $data = [
      'id_penjualan' => $where,
      'id_detailtreatment' => htmlspecialchars($this->input->post('id_detailtreatment', true)),
      'id_produk' => htmlspecialchars($this->input->post('id_produk', true)),
      'qty_treatment' => htmlspecialchars($this->input->post('qty_treatment', true)),
      'qty_produk' => htmlspecialchars($this->input->post('qty_produk', true)),
      'total_penjualan' => $total_penjualan
    ];

    $this->db->insert('detail_penjualan', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Detail Penjualan",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function update($where2)
  {
    $data = [
      'id_penjualan' => htmlspecialchars($this->input->post('id_penjualan', true)),
      'id_produk' => htmlspecialchars($this->input->post('id_produk', true)),
      'harga_beli' => htmlspecialchars($this->input->post('harga_beli', true)),
      'qty_beli' => htmlspecialchars($this->input->post('qty_beli', true)),
    ];

    $this->db->where('id_detailpenjualan', $where2);
    $this->db->update('detail_penjualan', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Detail Penjualan",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function deleteProduk($where3)
  {
    $this->db->delete('detail_penjualan', $where3);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(6),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Detail Penjualan",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function deleteTreatment($where3)
  {
    $this->db->delete('detail_penjualan', $where3);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Detail Penjualan",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }
}
