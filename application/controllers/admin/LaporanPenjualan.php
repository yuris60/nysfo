<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporanpenjualan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/laporanpenjualan_model');
    $this->load->model('admin/login_model');
    $this->load->helper('tglindo');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Laporan Penjualan";
    $data['icon'] = "dolly";
    $data['menu'] = "Laporan Penjualan";

    $data['penjualan'] = $this->laporanpenjualan_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/penjualan/penjualan_laporan', $data);
    $this->load->view('admin/templates/footer');
  }

  public function penjualanProduk()
  {
    if (isset($_POST["pdf"])) {
      if ($this->input->post('bulanan')) {
        $where = $this->input->post('bulanan');
        $data['title'] = "Cetak Laporan Penjualan Produk Bulan " . date('M Y', strtotime($where));
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanProdukBulanan();
        $data['num_rows'] = count($data['penjualan']);
        $data['periode_bulanan'] = $this->input->post('bulanan');

        if ($data['num_rows'] > 0) { //jika data tersedia, maka
          //load halaman
          $this->load->library('pdf');

          //inisialisasi variabel untuk dompdf
          $paper_size = 'A4';
          $orientation = 'portrait';

          //terapkan ke dompdf
          $this->pdf->setPaper($paper_size, $orientation);
          $this->pdf->filename = "Cetak Laporan Penjualan Produk Bulan " . date('M Y', strtotime($where));
          $this->pdf->load_view('admin/penjualan/penjualan_laporan_penjualanproduk_pdf', $data);
        } else {
          $this->session->set_flashdata('flash', 'Ada');
          redirect('admin/laporanpenjualan');
        }
      } else if ($this->input->post('tahunan')) {
        $pilihan = $this->input->post('tahunan');
        $data['title'] = "Cetak Laporan Penjualan Produk Tahun " . date('Y', strtotime($pilihan));
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanProdukTahunan($pilihan);
        $data['num_rows'] = count($data['penjualan']);
        $data['periode_tahunan'] = $pilihan;

        if ($data['num_rows'] > 0) { //jika data tersedia, maka
          //load halaman
          $this->load->library('pdf');

          //inisialisasi variabel untuk dompdf
          $paper_size = 'A4';
          $orientation = 'portrait';

          //terapkan ke dompdf
          $this->pdf->setPaper($paper_size, $orientation);
          $this->pdf->filename = "Cetak Laporan Penjualan Produk Tahun " . date('Y', strtotime($pilihan));
          $this->pdf->load_view('admin/penjualan/penjualan_laporan_penjualanproduk_pdf', $data);
        } else {
          $this->session->set_flashdata('flash', 'Ada');
          redirect('admin/laporanpenjualan');
        }
      } else if ($this->input->post('custom_start')) { //custom
        $custom_start = $this->input->post('custom_start');
        $custom_end = $this->input->post('custom_end');
        $data['title'] = "Cetak Laporan Penjualan Produk Tanggal " . date('d M Y', strtotime($custom_start)) . " - " . date('d M Y', strtotime($custom_end));
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanProdukCustom();
        $data['num_rows'] = count($data['penjualan']);
        $data['custom_start'] = $this->input->post('custom_start');
        $data['custom_end'] = $this->input->post('custom_end');

        if ($data['num_rows'] > 0) { //jika data tersedia, maka
          //load halaman
          $this->load->library('pdf');

          //inisialisasi variabel untuk dompdf
          $paper_size = 'A4';
          $orientation = 'portrait';
          $this->pdf->setPaper($paper_size, $orientation);
          $this->pdf->filename = "Cetak Laporan Penjualan Produk Tanggal " . date('d M Y', strtotime($custom_start)) . " - " . date('d M Y', strtotime($custom_end));
          $this->pdf->load_view('admin/penjualan/penjualan_laporan_penjualanproduk_pdf', $data);
        } else {
          $this->session->set_flashdata('flash', 'Ada');
          redirect('admin/laporanpenjualan');
        }
      }
    } else if (isset($_POST['excel'])) { //jika klik tombol excel
      if ($this->input->post('bulanan')) {
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentBulanan();
        $this->load->view('admin/penjualan/penjualan_laporan_penjualantreatment_excel', $data);
      } else if ($this->input->post('tahunan')) {
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentTahunan();
        $this->load->view('admin/penjualan/penjualan_laporan_penjualantreatment_excel', $data);
      } else if ($this->input->post('custom_start')) { //custom
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentCustom();
        $this->load->view('admin/penjualan/penjualan_laporan_penjualantreatment_excel', $data);
      }
    }
  }

  public function penjualanTreatment()
  {
    if (isset($_POST["pdf"])) {
      if ($this->input->post('bulanan')) {
        $where = $this->input->post('bulanan');
        $data['title'] = "Cetak Laporan Penjualan Treatment Bulan " . date('M Y', strtotime($where));
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentBulanan();
        $data['num_rows'] = count($data['penjualan']);
        $data['periode_bulanan'] = $this->input->post('bulanan');

        if ($data['num_rows'] > 0) { //jika data tersedia, maka
          //load halaman
          $this->load->library('pdf');

          //inisialisasi variabel untuk dompdf
          $paper_size = 'A4';
          $orientation = 'portrait';

          //terapkan ke dompdf
          $this->pdf->setPaper($paper_size, $orientation);
          $this->pdf->filename = "Cetak Laporan Penjualan Treatment Bulan " . date('M Y', strtotime($where));
          $this->pdf->load_view('admin/penjualan/penjualan_laporan_penjualantreatment_pdf', $data);
        } else {
          $this->session->set_flashdata('flash', 'Ada');
          redirect('admin/laporanpenjualan');
        }
      } else if ($this->input->post('tahunan')) {
        $where = $this->input->post('tahunan');
        $data['title'] = "Cetak Laporan Penjualan Treatment Tahun " . date('Y', strtotime($where));
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentTahunan();
        $data['num_rows'] = count($data['penjualan']);
        $data['periode_tahunan'] = $this->input->post('tahunan');

        if ($data['num_rows'] > 0) { //jika data tersedia, maka
          //load halaman
          $this->load->library('pdf');

          //inisialisasi variabel untuk dompdf
          $paper_size = 'A4';
          $orientation = 'portrait';

          //terapkan ke dompdf
          $this->pdf->setPaper($paper_size, $orientation);
          $this->pdf->filename = "Cetak Laporan Penjualan Treatment Tahun " . date('Y', strtotime($where));
          $this->pdf->load_view('admin/penjualan/penjualan_laporan_penjualantreatment_pdf', $data);
        } else {
          $this->session->set_flashdata('flash', 'Ada');
          redirect('admin/laporanpenjualan');
        }
      } else if ($this->input->post('custom_start')) { //custom
        $custom_start = $this->input->post('custom_start');
        $custom_end = $this->input->post('custom_end');
        $data['title'] = "Cetak Laporan Penjualan Treatment Tanggal " . date('d M Y', strtotime($custom_start)) . " - " . date('d M Y', strtotime($custom_end));
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentCustom();
        $data['num_rows'] = count($data['penjualan']);
        $data['custom_start'] = $this->input->post('custom_start');
        $data['custom_end'] = $this->input->post('custom_end');

        if ($data['num_rows'] > 0) { //jika data tersedia, maka
          //load halaman
          $this->load->library('pdf');

          //inisialisasi variabel untuk dompdf
          $paper_size = 'A4';
          $orientation = 'portrait';
          $this->pdf->setPaper($paper_size, $orientation);
          $this->pdf->filename = "Cetak Laporan Penjualan Treatment Tanggal " . date('d M Y', strtotime($custom_start)) . " - " . date('d M Y', strtotime($custom_end));
          $this->pdf->load_view('admin/penjualan/penjualan_laporan_penjualantreatment_pdf', $data);
        } else {
          $this->session->set_flashdata('flash', 'Ada');
          redirect('admin/laporanpenjualan');
        }
      }
    } else if (isset($_POST['excel'])) { //jika klik tombol excel
      if ($this->input->post('bulanan')) {
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentBulanan();
        $this->load->view('admin/penjualan/penjualan_laporan_penjualantreatment_excel', $data);
      } else if ($this->input->post('tahunan')) {
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentTahunan();
        $this->load->view('admin/penjualan/penjualan_laporan_penjualantreatment_excel', $data);
      } else if ($this->input->post('custom_start')) { //custom
        $data['penjualan'] = $this->laporanpenjualan_model->penjualanTreatmentCustom();
        $this->load->view('admin/penjualan/penjualan_laporan_penjualantreatment_excel', $data);
      }
    }
  }
}
