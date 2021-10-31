<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanProduk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/laporanproduk_model');
    $this->load->model('admin/login_model');
    $this->load->helper('formatrupiah_helper');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Laporan Produk";
    $data['icon'] = "box";
    $data['menu'] = "Laporan Produk";

    $data['produk'] = $this->laporanproduk_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/produk/produk_laporan_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function exportToPDF()
  {
    $data['title'] = "Laporan Produk PDF | Nysfo";
    $data['produk'] = $this->laporanproduk_model->getAll();
    $data['menu'] = "Produk";

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Produk";
    $this->pdf->load_view('admin/produk/produk_laporan_pdf', $data);
  }

  public function exportToExcel()
  {
    $data['produk'] = $this->laporanproduk_model->getAll();
    $this->load->view('admin/produk/produk_laporan_excel', $data);
  }
}
