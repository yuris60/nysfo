<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LaporanPasien extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/laporanpasien_model');
    $this->load->model('admin/login_model');
    $this->load->helper('formatrupiah_helper');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Laporan Pasien";
    $data['icon'] = "box";
    $data['menu'] = "Laporan Pasien";

    $data['pasien'] = $this->laporanpasien_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pasien/pasien_laporan_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function exportToPDF()
  {
    $data['title'] = "Laporan Pasien PDF | Nysfo";
    $data['pasien'] = $this->laporanpasien_model->getAll();
    $data['menu'] = "Pasien";

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Pasien";
    $this->pdf->load_view('admin/pasien/pasien_laporan_pdf', $data);
  }

  public function exportToExcel()
  {
    $data['pasien'] = $this->laporanpasien_model->getAll();
    $this->load->view('admin/pasien/pasien_laporan_excel', $data);
  }
}
