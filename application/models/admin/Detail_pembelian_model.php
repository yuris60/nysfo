<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Detail_pembelian_model extends CI_Model
{
  public function getAll($where)
  {
    return $this->db->get_where('detail_pembelian', ["id_pembelian" => $where])->result_array();
  }

  public function getAllProduk()
  {
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->order_by('jns_produk', 'ASC');
    return $this->db->get()->result_array();
  }

  public function getById($where, $where2)
  {
    $this->db->select('*');
    $this->db->from('detail_pembelian');
    $this->db->join('pembelian', 'pembelian.id_pembelian = detail_pembelian.id_pembelian');
    $this->db->where('pembelian.id_pembelian', $where);
    $this->db->where('detail_pembelian.id_detailpembelian', $where2);
    return $this->db->get();

    // $this->db->where('detail_pembelian', ["id_detailpembelian" => $where2]);
    // return $this->db->where('pembelian', ["id_pembelian" => $where])->row_array();
  }

  public function getKey($where)
  {
    return $this->db->get_where('pembelian', ["id_pembelian" => $where])->row_array();
  }

  public function tambahStok()
  {
    $this->db->select('stok');
    $this->db->from('produk');
    $this->db->where('id_produk', $this->input->post('id_produk'));
    $db = $this->db->get()->row_array();
    $stok = $db['stok'];
    $stokbaru = $stok + $this->input->post('qty_beli');
    // $this->db->next();

    $this->db->where('id_produk', $this->input->post('id_produk'));
    $this->db->update('produk', ['stok' => $stokbaru]);
  }

  public function kurangiStok()
  {
    $this->db->select('stok');
    $this->db->from('produk');
    $this->db->where('id_produk', $this->input->post('id_produk'));
    $db = $this->db->get()->row_array();
    $stok = $db['stok'];
    $stokbaru = $stok - $this->input->post('qty_beli_awal');
    // $this->db->next();

    $this->db->where('id_produk', $this->input->post('id_produk'));
    $this->db->update('produk', ['stok' => $stokbaru]);
  }

  public function kurangiStok2($where, $where2)
  {
    $this->db->select('stok');
    $this->db->from('produk');
    $this->db->where('id_produk', $where);
    $db = $this->db->get()->row_array();
    $stok = $db['stok'];
    $stokbaru = $stok - $where2;
    // $this->db->next();

    $this->db->where('id_produk', $where);
    $this->db->update('produk', ['stok' => $stokbaru]);
  }

  public function simpan()
  {
    $data = [
      'id_pembelian' => htmlspecialchars($this->input->post('id_pembelian', true)),
      'id_produk' => htmlspecialchars($this->input->post('id_produk', true)),
      'harga_beli' => htmlspecialchars($this->input->post('harga_beli', true)),
      'qty_beli' => htmlspecialchars($this->input->post('qty_beli', true)),
    ];

    $this->db->insert('detail_pembelian', $data);
  }

  public function update($where2)
  {
    $data = [
      'id_pembelian' => htmlspecialchars($this->input->post('id_pembelian', true)),
      'id_produk' => htmlspecialchars($this->input->post('id_produk', true)),
      'harga_beli' => htmlspecialchars($this->input->post('harga_beli', true)),
      'qty_beli' => htmlspecialchars($this->input->post('qty_beli', true)),
    ];

    $this->db->where('id_detailpembelian', $where2);
    $this->db->update('detail_pembelian', $data);
  }

  public function delete($where3)
  {
    $this->db->delete('detail_pembelian', $where3);
  }
}
