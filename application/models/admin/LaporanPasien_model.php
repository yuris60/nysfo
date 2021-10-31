<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class Laporanpasien_model extends CI_Model
{
  public function getAll()
  {
    $this->db->from('pelanggan');
    $this->db->where('jenis_pelanggan', 'Pasien');
    $this->db->order_by('id_pelanggan', 'desc');
    return $this->db->get()->result_array();
  }
}
