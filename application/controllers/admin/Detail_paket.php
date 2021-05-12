<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_paket extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/detail_paket_model');
    $this->load->model('admin/login_model');
    $this->load->helper('formatrupiah_helper');
  }

  public function read($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Detail Paket";
    $data['icon'] = "archive";
    $data['menu'] = "Paket";
    $data['submenu'] = "Detail Paket";

    $data['paket'] = $this->detail_paket_model->getKey($where);
    $data['detail_paket'] = $this->detail_paket_model->getAll($where);

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/detail_paket/detail_paket_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Tambah Data Detail Paket";
    $data['icon'] = "archive";
    $data['menu'] = "Paket";
    $data['submenu'] = "Detail Paket";
    $data['subsubmenu'] = "Tambah Data";

    $data['paket'] = $this->detail_paket_model->getKey($where);
    $data['produk'] = $this->detail_paket_model->getProduk();
    $data['detail_paket'] = $this->detail_paket_model->getAll($where);

    //validation
    $this->form_validation->set_rules('id_produk', 'Nama Produk', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_paket/detail_paket_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_paket_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/detail_paket/read/' . $where);
      // redirect('detail_paket/read/' . $data['paket'][$where]);

    }
  }

  public function update($where, $where2)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $where2 = $this->uri->segment(5);

    $data['title'] = "Tambah Data Detail Paket";
    $data['icon'] = "archive";
    $data['menu'] = "Paket";
    $data['submenu'] = "Detail Paket";
    $data['subsubmenu'] = "Tambah Data";

    $data['paket'] = $this->detail_paket_model->getKey($where);
    $data['detail_paket'] = $this->detail_paket_model->getById($where, $where2)->row_array();

    //validation
    $this->form_validation->set_rules('nm_paket', 'Jenis Paket', 'required|trim');
    $this->form_validation->set_rules('harga', 'Harga', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_paket/detail_paket_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_paket_model->update($where2);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/paket');
      // redirect('detail_paket/read/' . $data['paket'] . "/" . $where2);
    }
  }

  public function delete($where)
  {
    $where = ['id_detailpaket' => $this->uri->segment(4)];
    $this->detail_paket_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    // redirect('detail_paket/read/' . $data['paket'] . "/" . $where2);
    redirect('admin/paket');
  }
}
