<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/penjualan_model');
    $this->load->model('admin/login_model');
    $this->load->helper('tglindo');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Penjualan";
    $data['icon'] = "dolly";
    $data['menu'] = "Penjualan";

    $data['penjualan'] = $this->penjualan_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/penjualan/penjualan_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Penjualan";
    $data['icon'] = "dolly";
    $data['menu'] = "Penjualan";
    $data['submenu'] = "Tambah Data";

    $data['member'] = $this->penjualan_model->getMemberAll();
    $data['dokter'] = $this->penjualan_model->getDokterAll();

    //validation
    $this->form_validation->set_rules('tgl_penjualan', 'Tanggal Pembelian', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/penjualan/penjualan_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      if ($this->input->post('id_pelanggan2') != "") { //jika memilih member
        $this->penjualan_model->simpan();
      } elseif ($this->input->post('nama') != "") { //jika memilih non member
        $this->penjualan_model->simpan2();
      }
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/penjualan');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(3);
    $data['title'] = "Perbaharui Data Penjualan";
    $data['icon'] = "dolly";
    $data['menu'] = "Penjualan";
    $data['submenu'] = "Perbaharui Data";

    $data['penjualan'] = $this->penjualan_model->getById($where);

    //validation
    $this->form_validation->set_rules('tgl_pembelian', 'Tanggal Pembelian', 'required|trim');
    $this->form_validation->set_rules('nm_supplier', 'Nama Supplier', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/penjualan/penjualan_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->penjualan_model->update($where);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/penjualan');
    }
  }

  public function delete($where)
  {
    $where = ['id_penjualan' => $this->uri->segment(3)];
    $this->penjualan_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/penjualan');
  }

  public function view_data()
  {
    if (isset($_POST['cari'])) {
      $data['hasil'] = $this->penjualan_model->view_data($this->input->post('id_pelanggan'))->row_array();
      $this->load->view('admin/penjualan/penjualan_view_member', $data);
    } else {
      echo "Silahkan Cek koneksi internet Anda!";
    }
  }
}
