<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokter extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/dokter_model');
    $this->load->model('admin/login_model');
    $this->load->helper('tglindo');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Dokter";
    $data['icon'] = "user-md";
    $data['menu'] = "Dokter";

    $data['dokter'] = $this->dokter_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/dokter/dokter_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Dokter";
    $data['icon'] = "user-md";
    $data['menu'] = "Dokter";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_dokter', 'Nama Dokter', 'required|trim');
    $this->form_validation->set_rules('jk_dokter', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('tempatlahir_dokter', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('tanggallahir_dokter', 'Tanggal Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_dokter', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_dokter', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_dokter', 'Email Lahir', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/dokter/dokter_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->dokter_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/dokter');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Dokter";
    $data['icon'] = "user-md";
    $data['menu'] = "Dokter";
    $data['submenu'] = "Perbaharui Data";

    $data['dokter'] = $this->dokter_model->getById($where);

    //validation
    $this->form_validation->set_rules('nm_dokter', 'Nama Dokter', 'required|trim');
    $this->form_validation->set_rules('jk_dokter', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('tempatlahir_dokter', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('tanggallahir_dokter', 'Tanggal Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_dokter', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_dokter', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_dokter', 'Email Lahir', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/dokter/dokter_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->dokter_model->update($where);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/dokter');
    }
  }

  public function delete($where)
  {
    $where = ['id_dokter' => $this->uri->segment(4)];
    $this->dokter_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/dokter');
  }

  public function laporan()
  {
    $data['title'] = "Dokter";
    $data['icon'] = "user";
    $data['menu'] = "Dokter";

    $data['dokter'] = $this->dokter_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/dokter/dokter_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Dokter PDF | NBC";
    $data['dokter'] = $this->dokter_model->getAll();
    $data['menu'] = "Dokter";

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Dokter";
    $this->pdf->load_view('admin/dokter/dokter_pdf', $data);
  }
}
