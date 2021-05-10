<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwaldokter extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/jadwaldokter_model');
    $this->load->model('admin/login_model');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Jadwal Dokter";
    $data['icon'] = "clock";
    $data['menu'] = "Jadwal Dokter";

    $data['jadwaldokter'] = $this->jadwaldokter_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/jadwaldokter/jadwaldokter_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Dokter";
    $data['icon'] = "clock";
    $data['menu'] = "Jadwal Dokter";
    $data['submenu'] = "Tambah Data";

    $data['dokter'] = $this->jadwaldokter_model->getAllDokter();

    //validation
    $this->form_validation->set_rules('id_dokter', 'Dokter', 'required|trim');
    $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
    $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim');
    $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/jadwaldokter/jadwaldokter_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->jadwaldokter_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/jadwaldokter');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(3);
    $data['title'] = "Perbaharui Data Jadwal Dokter";
    $data['icon'] = "clock";
    $data['menu'] = "Jadwal Dokter";
    $data['submenu'] = "Perbaharui Data";

    $data['dokter'] = $this->jadwaldokter_model->getAllDokter()->result_array();
    $data['jadwaldokter'] = $this->jadwaldokter_model->getById($where)->row_array();

    //validation
    $this->form_validation->set_rules('id_dokter', 'Dokter', 'required|trim');
    $this->form_validation->set_rules('hari', 'Hari', 'required|trim');
    $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'required|trim');
    $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/jadwaldokter/jadwaldokter_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->jadwaldokter_model->update($where);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/jadwaldokter');
    }
  }

  public function delete($where)
  {
    $where = ['id_jadwaldokter' => $this->uri->segment(4)];
    $this->jadwaldokter_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/jadwaldokter');
  }

  public function laporan()
  {
    $data['title'] = "Jadwal Dokter";
    $data['icon'] = "user";
    $data['menu'] = "Jadwal Dokter";

    $data['jadwaldokter'] = $this->jadwaldokter_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/jadwaldokter/jadwaldokter_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Jadwal Dokter PDF | NBC";
    $data['jadwaldokter'] = $this->jadwaldokter_model->getAll();
    $data['menu'] = "Jadwal Dokter";

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Jadwal Dokter";
    $this->pdf->load_view('admin/jadwaldokter/jadwaldokter_pdf', $data);
  }
}
