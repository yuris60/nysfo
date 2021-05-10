<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/member_model');
    $this->load->model('admin/login_model');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Member";
    $data['icon'] = "user";
    $data['menu'] = "Member";

    $data['member'] = $this->member_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/member/member_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Member";
    $data['icon'] = "user";
    $data['menu'] = "Member";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Member', 'required|trim');
    $this->form_validation->set_rules('jk_pelanggan', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('umur_pelanggan', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_pelanggan', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_pelanggan', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/member/member_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->member_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/member');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Member";
    $data['icon'] = "user";
    $data['menu'] = "Member";
    $data['submenu'] = "Perbaharui Data";

    $data['member'] = $this->member_model->getById($where);

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Member', 'required|trim');
    $this->form_validation->set_rules('jk_pelanggan', 'Jenis Kelamin', 'required|trim');
    $this->form_validation->set_rules('umur_pelanggan', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('alamat_pelanggan', 'Alamat', 'required|trim');
    $this->form_validation->set_rules('notelp_pelanggan', 'No Telepon', 'required|trim');
    $this->form_validation->set_rules('email_pelanggan', 'Email', 'required|trim|valid_email');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/member/member_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->member_model->update($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/member');
    }
  }

  public function delete($where)
  {
    $where = ['id_pelanggan' => $this->uri->segment(4)];
    $this->member_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/member');
  }

  public function laporan()
  {
    $data['title'] = "Member";
    $data['icon'] = "user";
    $data['menu'] = "Member";

    $data['member'] = $this->member_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/member/member_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Member PDF | NBC";
    $data['member'] = $this->member_model->getAll();

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Member";
    $this->pdf->load_view('admin/member/member_pdf', $data);
  }
}
