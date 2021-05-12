<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/agen_model');
    $this->load->model('admin/login_model');
    $this->load->helper('waktulalu');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Agen";
    $data['icon'] = "user";
    $data['menu'] = "Agen";

    $data['agen'] = $this->agen_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/agen/agen_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Agen";
    $data['icon'] = "user";
    $data['menu'] = "Agen";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Agen', 'required|trim');
    $this->form_validation->set_rules('jk_pelanggan', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('umur_pelanggan', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_pelanggan', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_pelanggan', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/agen/agen_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->agen_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/agen');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Agen";
    $data['icon'] = "user";
    $data['menu'] = "Agen";
    $data['submenu'] = "Perbaharui Data";

    $data['agen'] = $this->agen_model->getById($where);

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Agen', 'required|trim');
    $this->form_validation->set_rules('jk_pelanggan', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('umur_pelanggan', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_pelanggan', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_pelanggan', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/agen/agen_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->agen_model->update($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/agen');
    }
  }

  public function delete($where)
  {
    $where = ['id_pelanggan' => $this->uri->segment(4)];
    $this->agen_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/agen');
  }

  public function laporan()
  {
    $data['title'] = "Agen";
    $data['icon'] = "user";
    $data['menu'] = "Agen";

    $data['agen'] = $this->agen_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/agen/agen_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Agen PDF | NBC";
    $data['agen'] = $this->agen_model->getAll();

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Agen";
    $this->pdf->load_view('admin/agen/agen_pdf', $data);
  }
}
