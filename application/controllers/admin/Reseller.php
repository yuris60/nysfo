<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reseller extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/reseller_model');
    $this->load->model('admin/login_model');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Reseller";
    $data['icon'] = "user";
    $data['menu'] = "Reseller";

    $data['reseller'] = $this->reseller_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/reseller/reseller_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Reseller";
    $data['icon'] = "user";
    $data['menu'] = "Reseller";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Reseller', 'required|trim');
    $this->form_validation->set_rules('jk_pelanggan', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('umur_pelanggan', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_pelanggan', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_pelanggan', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/reseller/reseller_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->reseller_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/reseller');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(3);
    $data['title'] = "Perbaharui Data Reseller";
    $data['icon'] = "user";
    $data['menu'] = "Reseller";
    $data['submenu'] = "Perbaharui Data";

    $data['reseller'] = $this->reseller_model->getById($where);

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Reseller', 'required|trim');
    $this->form_validation->set_rules('jk_pelanggan', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('umur_pelanggan', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_pelanggan', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_pelanggan', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/reseller/reseller_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->reseller_model->update($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/reseller');
    }
  }

  public function delete($where)
  {
    $where = ['id_pelanggan' => $this->uri->segment(3)];
    $this->reseller_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/reseller');
  }

  public function laporan()
  {
    $data['title'] = "Reseller";
    $data['icon'] = "user";
    $data['menu'] = "Reseller";

    $data['reseller'] = $this->reseller_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/reseller/reseller_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Reseller PDF | NBC";
    $data['reseller'] = $this->reseller_model->getAll();

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Reseller";
    $this->pdf->load_view('admin/reseller/reseller_pdf', $data);
  }
}
