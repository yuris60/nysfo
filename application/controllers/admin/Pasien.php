<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/pasien_model');
    $this->load->model('admin/login_model');
    $this->load->helper('tglindo_helper');
    $this->load->helper('formatrupiah');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";

    $data['pasien'] = $this->pasien_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pasien/pasien_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function history($where)
  {
    $where = $this->uri->segment(4);
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Riwayat Penjualan Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";
    $data['submenu'] = "Riwayat Penjualan";

    $data['pasien'] = $this->pasien_model->getAll();
    $data['penjualan'] = $this->pasien_model->getKey($where);
    $data['join_treatment'] = $this->pasien_model->getJoinTreatment($where);
    $data['join_produk'] = $this->pasien_model->getJoinProduct($where);

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pasien/pasien_riwayat', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Pasien', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/pasien/pasien_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->pasien_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/pasien');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";
    $data['submenu'] = "Perbaharui Data";

    $data['Pasien'] = $this->Pasien_model->getById($where);

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Pasien', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/pasien/pasien_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->pasien_model->update($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/pasien');
    }
  }

  public function delete($where)
  {
    $where = ['id_pelanggan' => $this->uri->segment(4)];
    $this->pasien_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/pasien');
  }

  public function laporan()
  {
    $data['title'] = "Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";

    $data['pasien'] = $this->pasien_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pasien/pasien_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Pasien PDF | NBC";
    $data['pasien'] = $this->pasien_model->getAll();

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Pasien";
    $this->pdf->load_view('admin/pasien/pasien_pdf', $data);
  }
}
