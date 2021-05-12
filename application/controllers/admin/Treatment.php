<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/treatment_model');
    $this->load->model('admin/login_model');
    $this->load->helper('formatrupiah_helper');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Treatment";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Treatment";

    $data['treatment'] = $this->treatment_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/treatment/treatment_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Treatment";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Treatment";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('jns_treatment', 'Jenis Treatment', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/treatment/treatment_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->treatment_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('treatment');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Treatment";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Treatment";
    $data['submenu'] = "Perbaharui Data";

    $data['treatment'] = $this->treatment_model->getById($where);

    //validation
    $this->form_validation->set_rules('jns_treatment', 'Jenis Treatment', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/treatment/treatment_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->treatment_model->update($where);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/treatment');
    }
  }

  public function delete($where)
  {
    $where = ['id_treatment' => $this->uri->segment(4)];
    $this->treatment_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/treatment');
  }

  public function laporan()
  {
    $data['title'] = "Treatment";
    $data['icon'] = "user";
    $data['menu'] = "Treatment";

    $data['treatment'] = $this->treatment_model->getJoin();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/treatment/treatment_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Treatment PDF | NBC";
    $data['treatment'] = $this->treatment_model->getJoin();
    $data['menu'] = "Treatment";

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Treatment";
    $this->pdf->load_view('admin/treatment/treatment_pdf', $data);
  }
}
