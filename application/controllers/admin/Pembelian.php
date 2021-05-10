<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/pembelian_model');
    $this->load->model('admin/login_model');
    $this->load->helper('tglindo');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Pembelian";
    $data['icon'] = "dolly";
    $data['menu'] = "Pembelian";

    $data['pembelian'] = $this->pembelian_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pembelian/pembelian_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Pembelian";
    $data['icon'] = "dolly";
    $data['menu'] = "Pembelian";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('tgl_pembelian', 'Tanggal Pembelian', 'required|trim');
    $this->form_validation->set_rules('nm_supplier', 'Nama Supplier', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/pembelian/pembelian_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->pembelian_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/pembelian');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(3);
    $data['title'] = "Perbaharui Data Pembelian";
    $data['icon'] = "dolly";
    $data['menu'] = "Pembelian";
    $data['submenu'] = "Perbaharui Data";

    $data['pembelian'] = $this->pembelian_model->getById($where);

    //validation
    $this->form_validation->set_rules('tgl_pembelian', 'Tanggal Pembelian', 'required|trim');
    $this->form_validation->set_rules('nm_supplier', 'Nama Supplier', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/pembelian/pembelian_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->pembelian_model->update($where);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/pembelian');
    }
  }

  public function delete($where)
  {
    $where = ['id_pembelian' => $this->uri->segment(3)];
    $this->pembelian_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/pembelian');
  }
}
