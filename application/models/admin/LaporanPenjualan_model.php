<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

date_default_timezone_set('Asia/Jakarta');

class laporanpenjualan_model extends CI_Model
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

  public function getJoin()
  {
    $this->db->select('*');
    $this->db->from('penjualan');
    $this->db->join('detail_penjualan', 'penjualan.id_penjualan = detail_penjualan.id_penjualan');
    $this->db->order_by('penjualan.tgl_penjualan', 'ASC');
    return $this->db->get()->result_array();
  }

  public function getPelangganAll()
  {
    $this->db->from('pelanggan');
    $this->db->order_by('nm_pelanggan', 'desc');
    return $this->db->get()->result_array();
  }

  public function getDokterAll()
  {
    return $this->db->get('dokter')->result_array();
  }

  public function getById($where)
  {
    // return $this->db->get_where('penjualan', ["id_penjualan" => $where])->row_array();
    $this->db->select('*');
    $this->db->from('penjualan');
    $this->db->join('pelanggan', 'penjualan.id_pelanggan = pelanggan.id_pelanggan');
    $this->db->order_by('tgl_penjualan', 'DESC');
    $this->db->order_by('id_penjualan', 'DESC');
    $this->db->where('id_penjualan', $where);
    return $this->db->get()->row_array();
  }

  public function getAllDokter()
  {
    $this->db->select('*');
    $this->db->from('dokter');
    $this->db->order_by('nm_dokter', 'ASC');
    return $this->db->get()->result_array();
  }

  public function penjualanProdukBulanan($data = null, $where = null)
  {
    $pilihan = $this->input->post('bulanan');
    $sql = "SELECT produk.id_produk, produk.jns_produk,
      (
        Select SUM(detail_penjualan.qty_produk)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as qty
    FROM produk
    LEFT JOIN detail_penjualan USING(id_produk)
    GROUP BY id_produk
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function penjualanProdukTahunan($data = null, $where = null)
  {
    $pilihan = $this->input->post('tahunan');
    $sql = "SELECT produk.id_produk, produk.jns_produk, 
      (
        Select SUM(detail_penjualan.qty_produk)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as qty
    FROM produk
    LEFT JOIN detail_penjualan USING(id_produk)
    GROUP BY id_produk
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function penjualanProdukCustom($data = null, $where = null)
  {
    $custom_start = $this->input->post('custom_start');
    $custom_end = $this->input->post('custom_end');
    $sql = "SELECT produk.id_produk, produk.jns_produk, 
      (
        Select SUM(detail_penjualan.qty_produk)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as qty
    FROM produk
    LEFT JOIN detail_penjualan USING(id_produk)
    GROUP BY id_produk
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function penjualanTreatmentBulanan($data = null, $where = null)
  {
    $pilihan = $this->input->post('bulanan');
    $sql = "SELECT detail_treatment.id_detailtreatment, detail_treatment.nm_treatment, treatment.jns_treatment,
      (
        Select SUM(detail_penjualan.qty_treatment)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as qty
      FROM detail_treatment
    LEFT JOIN detail_penjualan USING(id_detailtreatment)
    JOIN treatment WHERE detail_treatment.id_treatment = treatment.id_treatment
    GROUP BY id_detailtreatment
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function penjualanTreatmentTahunan($data = null, $where = null)
  {
    $pilihan = $this->input->post('tahunan');
    $sql = "SELECT detail_treatment.id_detailtreatment, detail_treatment.nm_treatment, treatment.jns_treatment,
      (
        Select SUM(detail_penjualan.qty_treatment)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as qty
      FROM detail_treatment
    LEFT JOIN detail_penjualan USING(id_detailtreatment)
    JOIN treatment WHERE detail_treatment.id_treatment = treatment.id_treatment
    GROUP BY id_detailtreatment
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function penjualanTreatmentCustom($data = null, $where = null)
  {
    $custom_start = $this->input->post('custom_start');
    $custom_end = $this->input->post('custom_end');
    $sql = "SELECT detail_treatment.id_detailtreatment, detail_treatment.nm_treatment, treatment.jns_treatment,
      (
        Select SUM(detail_penjualan.qty_treatment)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as qty
      FROM detail_treatment
    LEFT JOIN detail_penjualan USING(id_detailtreatment)
    JOIN treatment WHERE detail_treatment.id_treatment = treatment.id_treatment
    GROUP BY id_detailtreatment
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function keuanganBulananTreatment($data = null, $where = null)
  {
    $pilihan = $this->input->post('bulanan');
    $sql = "SELECT detail_treatment.id_detailtreatment, detail_treatment.nm_treatment, treatment.jns_treatment, detail_treatment.harga_treatment,
      (
        Select SUM(detail_penjualan.qty_treatment)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as qty,
      (
        Select SUM(detail_penjualan.total)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as total,
      (
        Select SUM(detail_penjualan.diskon)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as diskon,
      (
        Select SUM(detail_penjualan.subtotal)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as subtotal
      FROM detail_treatment
    LEFT JOIN detail_penjualan USING(id_detailtreatment)
    JOIN treatment WHERE detail_treatment.id_treatment = treatment.id_treatment
    GROUP BY id_detailtreatment
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function keuanganBulananProduk($data = null, $where = null)
  {
    $pilihan = $this->input->post('bulanan');
    $sql = "SELECT produk.id_produk, produk.jns_produk, harga_produk,
      (
        Select SUM(detail_penjualan.qty_produk)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as qty,
      (
        Select SUM(detail_penjualan.total)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as total,
      (
        Select SUM(detail_penjualan.diskon)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as diskon,
      (
        Select SUM(detail_penjualan.subtotal)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as subtotal
      FROM produk
    LEFT JOIN detail_penjualan USING(id_produk)
    GROUP BY id_produk
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function keuanganTahunanTreatment($data = null, $where = null)
  {
    $pilihan = $this->input->post('tahunan');
    $sql = "SELECT detail_treatment.id_detailtreatment, detail_treatment.nm_treatment, treatment.jns_treatment, detail_treatment.harga_treatment,
      (
        Select SUM(detail_penjualan.qty_treatment)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as qty,
      (
        Select SUM(detail_penjualan.total)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as total,
      (
        Select SUM(detail_penjualan.diskon)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as diskon,
      (
        Select SUM(detail_penjualan.subtotal)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as subtotal
      FROM detail_treatment
    LEFT JOIN detail_penjualan USING(id_detailtreatment)
    JOIN treatment WHERE detail_treatment.id_treatment = treatment.id_treatment
    GROUP BY id_detailtreatment
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function keuanganTahunanProduk($data = null, $where = null)
  {
    $pilihan = $this->input->post('tahunan');
    $sql = "SELECT produk.id_produk, produk.jns_produk, harga_produk,
      (
        Select SUM(detail_penjualan.qty_produk)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as qty,
      (
        Select SUM(detail_penjualan.total)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as total,
      (
        Select SUM(detail_penjualan.diskon)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as diskon,
      (
        Select SUM(detail_penjualan.subtotal)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan LIKE '$pilihan%'
      ) as subtotal
      FROM produk
    LEFT JOIN detail_penjualan USING(id_produk)
    GROUP BY id_produk
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function keuanganCustomTreatment($data = null, $where = null)
  {
    $custom_start = $this->input->post('custom_start');
    $custom_end = $this->input->post('custom_end');
    $sql = "SELECT detail_treatment.id_detailtreatment, detail_treatment.nm_treatment, treatment.jns_treatment, detail_treatment.harga_treatment,
      (
        Select SUM(detail_penjualan.qty_treatment)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as qty,
      (
        Select SUM(detail_penjualan.total)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as total,
      (
        Select SUM(detail_penjualan.diskon)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as diskon,
      (
        Select SUM(detail_penjualan.subtotal)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as subtotal
      FROM detail_treatment
    LEFT JOIN detail_penjualan USING(id_detailtreatment)
    JOIN treatment WHERE detail_treatment.id_treatment = treatment.id_treatment
    GROUP BY id_detailtreatment
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function keuanganCustomProduk($data = null, $where = null)
  {
    $custom_start = $this->input->post('custom_start');
    $custom_end = $this->input->post('custom_end');
    $sql = "SELECT produk.id_produk, produk.jns_produk, harga_produk,
      (
        Select SUM(detail_penjualan.qty_produk)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as qty,
      (
        Select SUM(detail_penjualan.total)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as total,
      (
        Select SUM(detail_penjualan.diskon)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as diskon,
      (
        Select SUM(detail_penjualan.subtotal)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_produk = produk.id_produk
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as subtotal
      FROM produk
    LEFT JOIN detail_penjualan USING(id_produk)
    GROUP BY id_produk
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }

  public function keuanganCustom($data = null, $where = null)
  {
    $custom_start = $this->input->post('custom_start');
    $custom_end = $this->input->post('custom_end');
    $sql = "SELECT detail_treatment.id_detailtreatment, detail_treatment.nm_treatment, treatment.jns_treatment,
      (
        Select SUM(detail_penjualan.qty_treatment)
        FROM detail_penjualan
        JOIN penjualan ON detail_penjualan.id_penjualan = penjualan.id_penjualan
        WHERE detail_penjualan.id_detailtreatment = detail_treatment.id_detailtreatment
        AND penjualan.tgl_penjualan BETWEEN '$custom_start' AND '$custom_end'
      ) as qty
      FROM detail_treatment
    LEFT JOIN detail_penjualan USING(id_detailtreatment)
    JOIN treatment WHERE detail_treatment.id_treatment = treatment.id_treatment
    GROUP BY id_detailtreatment
    ORDER BY qty DESC";
    return $this->db->query($sql)->result_array();
  }
}
