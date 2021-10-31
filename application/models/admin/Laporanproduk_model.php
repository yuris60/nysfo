<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class Laporanproduk_model extends CI_Model
{
  public function getAll()
  {
    // return $this->db->get('produk')->result_array();
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->order_by('stok', 'DESC');
    return $this->db->get()->result_array();
  }
}
