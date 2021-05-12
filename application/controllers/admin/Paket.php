<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/paket_model');
    $this->load->model('admin/login_model');
    $this->load->helper('formatrupiah_helper');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Paket";
    $data['icon'] = "archive";
    $data['menu'] = "Paket";

    $data['paket'] = $this->paket_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/paket/paket_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Paket";
    $data['icon'] = "archive";
    $data['menu'] = "Paket";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_paket', 'Nama Paket', 'required|trim');
    $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/paket/paket_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->paket_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/paket');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Paket";
    $data['icon'] = "archive";
    $data['menu'] = "Paket";
    $data['submenu'] = "Perbaharui Data";

    $data['paket'] = $this->paket_model->getById($where);

    //validation
    $this->form_validation->set_rules('nm_paket', 'Jenis paket', 'required|trim');
    $this->form_validation->set_rules('harga_paket', 'Harga Paket', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/paket/paket_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->paket_model->update($where);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/paket');
    }
  }

  public function delete($where)
  {
    $where = ['id_paket' => $this->uri->segment(4)];
    $this->paket_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/paket');
  }

  public function laporan()
  {
    $data['title'] = "Paket";
    $data['icon'] = "archive";
    $data['menu'] = "Paket";

    $data['paket'] = $this->paket_model->getJoin();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/paket/paket_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan paket PDF | NBC";
    $data['paket'] = $this->paket_model->getJoin();
    $data['menu'] = "Paket";

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan paket";
    $this->pdf->load_view('admin/paket/paket_pdf', $data);
  }
}
