<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class Penjualan_model extends CI_Model
{
  public function getAll()
  {
    $this->db->select('*');
    $this->db->from('penjualan');
    $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan');
    $this->db->order_by('tgl_penjualan', 'DESC');
    $this->db->order_by('id_penjualan', 'DESC');
    return $this->db->get()->result_array();
  }

  public function getPelangganAll()
  {
    $this->db->from('pelanggan');
    return $this->db->get()->result_array();
  }

  public function getDokterAll()
  {
    return $this->db->get('dokter')->result_array();
  }

  public function getById($where)
  {
    return $this->db->get_where('penjualan', ["id_penjualan" => $where])->row_array();
  }

  public function simpan()
  {
    $data = [
      'id_pelanggan' => htmlspecialchars($this->input->post('id_pelanggan', true)),
      'tgl_penjualan' => htmlspecialchars($this->input->post('tgl_penjualan', true)),
      'id_dokter' => htmlspecialchars($this->input->post('id_dokter', true)),
      'nm_beautician' => htmlspecialchars($this->input->post('nm_beautician', true)),
    ];

    $this->db->insert('penjualan', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Menyimpan Data",
      'tabel' => "Penjualan",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  // public function simpan2()
  // {
  //   $data = [
  //     'nama' => htmlspecialchars($this->input->post('nama', true)),
  //     'jk' => htmlspecialchars($this->input->post('jk', true)),
  //     'alamat' => htmlspecialchars($this->input->post('alamat', true)),
  //     'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
  //     'tgl_penjualan' => htmlspecialchars($this->input->post('tgl_penjualan', true)),
  //     'id_dokter' => htmlspecialchars($this->input->post('id_dokter', true)),
  //     'nm_beautician' => htmlspecialchars($this->input->post('nm_beautician', true)),
  //   ];

  //   $this->db->insert('penjualan', $data);

  //   //simpan notifikasi
  //   $datanotifikasi = [
  //     'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
  //     'notifikasi' => "Menyimpan Data",
  //     'tabel' => "Penjualan",
  //     'waktu_simpan' => date('Y-m-d H:i:s')
  //   ];
  //   $this->db->insert('notifikasi', $datanotifikasi);
  // }

  public function update($where = null)
  {
    $data = [
      'tgl_penjualan' => htmlspecialchars($this->input->post('tgl_penjualan', true)),
      'nm_supplier' => htmlspecialchars($this->input->post('nm_supplier', true)),
    ];

    $this->db->where('id_penjualan', $where);
    $this->db->update('penjualan', $data);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => htmlspecialchars($this->input->post('id_admin', true)),
      'notifikasi' => "Memperbaharui Data",
      'tabel' => "Penjualan",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function delete($where)
  {
    $this->db->delete('penjualan', $where);

    //simpan notifikasi
    $datanotifikasi = [
      'id_admin' => $this->uri->segment(5),
      'notifikasi' => "Menghapus Data",
      'tabel' => "Penjualan",
      'waktu_simpan' => date('Y-m-d H:i:s')
    ];
    $this->db->insert('notifikasi', $datanotifikasi);
  }

  public function view_data($id)
  {
    // $this->db->join('tbl_kota', "tbl_kota.id_kota=tbl_data.id_kota");
    return $this->db->get_where('pelanggan', "pelanggan.id_pelanggan='$id'");
  }

  public function laporanPDFBulanan($data = null, $where = null)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('customer', 'customer.kodecustomer=transaksi.kodecustomer');
    $this->db->join('rumah', 'transaksi.koderumah=rumah.koderumah');
    $this->db->join('pengguna', 'transaksi.kodepengguna=pengguna.kodepengguna');
    $this->db->like('tanggaltransaksi', $this->input->post('bulanan'), 'after');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function laporanPDFTahunan($data = null, $where = null)
  {
    $this->db->select('*');
    $this->db->from('transaksi');
    $this->db->join('customer', 'customer.kodecustomer=transaksi.kodecustomer');
    $this->db->join('rumah', 'transaksi.koderumah=rumah.koderumah');
    $this->db->join('pengguna', 'transaksi.kodepengguna=pengguna.kodepengguna');
    $this->db->like('tanggaltransaksi', $this->input->post('tahunan'), 'after');
    $query = $this->db->get();
    return $query->result_array();
  }

  public function laporanPDFCustom($data = null, $where = null)
  {
    $custom_start = $this->input->post('custom_start');
    $custom_end = $this->input->post('custom_end');
    return $this->db->query("SELECT * FROM transaksi JOIN customer ON transaksi.kodecustomer = customer.kodecustomer JOIN rumah ON rumah.koderumah = transaksi.koderumah JOIN pengguna ON pengguna.kodepengguna = transaksi.kodepengguna WHERE tanggaltransaksi BETWEEN '$custom_start' AND '$custom_end'")->result_array();
  }
}
