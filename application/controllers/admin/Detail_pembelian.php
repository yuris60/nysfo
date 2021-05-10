<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_pembelian extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/detail_pembelian_model');
    $this->load->model('admin/login_model');
    $this->load->helper('tglindo');
  }

  public function read($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Detail Pembelian";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Pembelian";
    $data['submenu'] = "Detail Pembelian";

    $data['pembelian'] = $this->detail_pembelian_model->getKey($where);
    $data['detail_pembelian'] = $this->detail_pembelian_model->getAll($where);

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/detail_pembelian/detail_pembelian_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Tambah Data Detail Pembelian";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Pembelian";
    $data['submenu'] = "Detail Pembelian";
    $data['subsubmenu'] = "Tambah Data";

    $data['produk'] = $this->detail_pembelian_model->getAllProduk();
    $data['pembelian'] = $this->detail_pembelian_model->getKey($where);
    $data['detail_pembelian'] = $this->detail_pembelian_model->getAll($where);

    //validation
    $this->form_validation->set_rules('id_produk', 'Jenis Produk', 'required|trim');
    $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim|is_numeric');
    $this->form_validation->set_rules('qty_beli', 'Qty Beli', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_pembelian/detail_pembelian_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_pembelian_model->simpan();
      $this->detail_pembelian_model->tambahStok();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/pembelian');
      // redirect('detail_pembelian/read/' . $data['pembelian'][$where]);

    }
  }

  public function update($where, $where2)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $where2 = $this->uri->segment(5);

    $data['title'] = "Perbaharui Data Detail Pembelian";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Pembelian";
    $data['submenu'] = "Detail Pembelian";
    $data['subsubmenu'] = "Perbaharui Data";

    $data['pembelian'] = $this->detail_pembelian_model->getKey($where);
    $data['detail_pembelian'] = $this->detail_pembelian_model->getById($where, $where2)->row_array();


    $data['produk'] = $this->detail_pembelian_model->getAllProduk();
    $data['pembelian'] = $this->detail_pembelian_model->getKey($where);
    $data['detail_pembelian'] = $this->detail_pembelian_model->getById($where, $where2)->row_array();

    //validation
    $this->form_validation->set_rules('id_produk', 'Jenis Produk', 'required|trim');
    $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim|is_numeric');
    $this->form_validation->set_rules('qty_beli', 'Qty Beli', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_pembelian/detail_pembelian_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_pembelian_model->kurangiStok();
      $this->detail_pembelian_model->tambahStok();
      $this->detail_pembelian_model->update($where2);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/pembelian');
      // redirect('detail_pembelian/read/' . $data['pembelian'] . "/" . $where2);
    }
  }

  public function delete($where, $where2)
  {
    $where = $this->uri->segment(4);
    $where2 = $this->uri->segment(5);
    $where3 = ['id_detailpembelian' => $where];
    $this->detail_pembelian_model->delete($where3);
    $this->detail_pembelian_model->kurangiStok2($where, $where2);
    $this->session->set_flashdata('flash', 'dihapus');
    // redirect('detail_pembelian/read/' . $data['pembelian'] . "/" . $where2);
    redirect('admin/pembelian');
  }
}
