<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distributor extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/distributor_model');
    $this->load->model('admin/login_model');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Distributor";
    $data['icon'] = "user";
    $data['menu'] = "Distributor";

    $data['distributor'] = $this->distributor_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/distributor/distributor_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Distributor";
    $data['icon'] = "user";
    $data['menu'] = "Distributor";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Distributor', 'required|trim');
    $this->form_validation->set_rules('jk_pelanggan', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('umur_pelanggan', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_pelanggan', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_pelanggan', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/distributor/distributor_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->distributor_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/distributor');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Distributor";
    $data['icon'] = "user";
    $data['menu'] = "Distributor";
    $data['submenu'] = "Perbaharui Data";

    $data['distributor'] = $this->distributor_model->getById($where);

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama distributor', 'required|trim');
    $this->form_validation->set_rules('jk_pelanggan', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('umur_pelanggan', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_pelanggan', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_pelanggan', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/distributor/distributor_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->distributor_model->update($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/distributor');
    }
  }

  public function delete($where)
  {
    $where = ['id_pelanggan' => $this->uri->segment(4)];
    $this->distributor_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/distributor');
  }

  public function laporan()
  {
    $data['title'] = "Distributor";
    $data['icon'] = "user";
    $data['menu'] = "Distributor";

    $data['distributor'] = $this->distributor_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/distributor/distributor_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Distributor PDF | NBC";
    $data['distributor'] = $this->distributor_model->getAll();

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Distributor";
    $this->pdf->load_view('admin/distributor/distributor_pdf', $data);
  }
}
