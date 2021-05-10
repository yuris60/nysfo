<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class Beranda_model extends CI_Model
{
  public function getPenjualan()
  {
    $this->db->select('*');
    $this->db->from('penjualan');
    // $this->db->join('dokter', 'penjualan.id_dokter = dokter.id_dokter');
    $this->db->order_by('tgl_penjualan', 'DESC');
    $this->db->order_by('id_penjualan', 'DESC');
    $this->db->limit(10);
    return $this->db->get()->result_array();
  }

  public function jumlahDokter()
  {
    return $this->db->get('dokter')->num_rows();
  }

  public function jumlahMember()
  {
    $this->db->from('pelanggan');
    $this->db->where('level_pelanggan', 'Member');
    return $this->db->get()->num_rows();
  }

  public function jumlahProduk()
  {
    return $this->db->get('produk')->num_rows();
  }

  public function jumlahTreatment()
  {
    return $this->db->get('detail_treatment')->num_rows();
  }

  public function jumlahPendapatanHariIni()
  {
    $hariini = date("Y-m-d");
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('penjualan.tgl_penjualan', $hariini);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPengunjungHariIni()
  {
    $hariini = date("Y-m-d");
    $this->db->from('penjualan');
    $this->db->where('tgl_penjualan', $hariini);
    return $this->db->get()->num_rows();
  }

  public function jumlahPenjualanBarangHariIni()
  {
    $hariini = date("Y-m-d");
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('penjualan.tgl_penjualan', $hariini);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentHariIni()
  {
    $hariini = date("Y-m-d");
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('penjualan.tgl_penjualan', $hariini);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPengunjungWanitaHariIni()
  {
    $hariini = date("Y-m-d");
    $this->db->from('penjualan');
    $this->db->where('tgl_penjualan', $hariini);
    $this->db->where('penjualan.jk', 'P');
    return $this->db->get()->num_rows();
  }

  public function jumlahPengunjungPriaHariIni()
  {
    $hariini = date("Y-m-d");
    $this->db->from('penjualan');
    $this->db->where('tgl_penjualan', $hariini);
    $this->db->where('penjualan.jk', 'L');
    return $this->db->get()->num_rows();
  }

  public function jumlahPengunjung()
  {
    $this->db->from('penjualan');
    return $this->db->get()->num_rows();
  }

  public function jumlahPengunjungWanita()
  {
    $this->db->from('penjualan');
    $this->db->where('penjualan.jk', 'P');
    return $this->db->get()->num_rows();
  }

  public function jumlahPengunjungPria()
  {
    $this->db->from('penjualan');
    $this->db->where('penjualan.jk', 'L');
    return $this->db->get()->num_rows();
  }


  // Penjualan Barang
  public function jumlahPenjualanBarangJanuari()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=01');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanBarangFebruari()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=02');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanBarangMaret()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=03');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanBarangApril()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=04');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPenjualanBarangMei()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=05');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPenjualanBarangJuni()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=06');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPenjualanBarangJuli()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=07');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPenjualanBarangAgustus()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=08');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPenjualanBarangSeptember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=09');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPenjualanBarangOktober()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=10');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPenjualanBarangNovember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=11');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPenjualanBarangDesember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_produk');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=12');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }


  // Penjualan Treatment
  public function jumlahPenjualanTreatmentJanuari()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=01');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentFebruari()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=02');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentMaret()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=03');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentApril()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=04');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentMei()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=05');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentJuni()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=06');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentJuli()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=07');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentAgustus()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=08');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentSeptember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=09');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentOktober()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=10');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentNovember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=11');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPenjualanTreatmentDesember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.qty_treatment');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=12');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }


  // Jumlah Pendapatan
  public function jumlahPendapatanJanuari()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=01');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanFebruari()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=02');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanMaret()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=03');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanApril()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=04');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
  public function jumlahPendapatanMei()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=05');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanJuni()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=06');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanJuli()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=07');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanAgustus()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=08');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanSeptember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=09');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanOktober()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=10');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanNovember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=11');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }

  public function jumlahPendapatanDesember()
  {
    $tahun = date('Y');
    $this->db->select_sum('detail_penjualan.total_penjualan');
    $this->db->join('penjualan', 'detail_penjualan.id_penjualan = penjualan.id_penjualan');
    $this->db->where('MONTH(penjualan.tgl_penjualan)=12');
    $this->db->where('YEAR(penjualan.tgl_penjualan)=', $tahun);
    return $query = $this->db->get('detail_penjualan')->row();
  }
}
