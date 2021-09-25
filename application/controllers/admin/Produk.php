<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/produk_model');
    $this->load->model('admin/login_model');
    $this->load->helper('formatrupiah_helper');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Produk";
    $data['icon'] = "box";
    $data['menu'] = "Produk";

    $data['produk'] = $this->produk_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/produk/produk_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Produk";
    $data['icon'] = "box";
    $data['menu'] = "Produk";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('jns_produk', 'Jenis Produk', 'required|trim');
    $this->form_validation->set_rules('stok', 'Stok Ready', 'required|trim|is_numeric');
    $this->form_validation->set_rules('stok_gudang', 'Stok Gudang', 'required|trim|is_numeric');
    $this->form_validation->set_rules('harga_produk', 'Harga', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/produk/produk_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->produk_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/produk');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Produk";
    $data['icon'] = "box";
    $data['menu'] = "Produk";
    $data['submenu'] = "Perbaharui Data";

    $data['produk'] = $this->produk_model->getById($where);

    //validation
    $this->form_validation->set_rules('jns_produk', 'Jenis Produk', 'required|trim');
    $this->form_validation->set_rules('harga_produk', 'Harga', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/produk/produk_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->produk_model->update($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/produk');
    }
  }

  public function addstokready($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Produk";
    $data['icon'] = "box";
    $data['menu'] = "Produk";
    $data['submenu'] = "Tambah Stok Ready";

    $data['produk'] = $this->produk_model->getById($where);

    //validation
    $this->form_validation->set_rules('jns_produk', 'Jenis Produk', 'required|trim');
    $this->form_validation->set_rules('harga_produk', 'Harga', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/produk/produk_add_stokready', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->produk_model->addStokready($where);
      // $this->produk_model->reduceStokGudang($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/produk');
    }
  }

  public function addstokgudang($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Produk";
    $data['icon'] = "box";
    $data['menu'] = "Produk";
    $data['submenu'] = "Tambah Stok Gudang";

    $data['produk'] = $this->produk_model->getById($where);

    //validation
    $this->form_validation->set_rules('stok_gudang', 'Stok Gudang', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/produk/produk_add_stokgudang', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->produk_model->addStokGudang($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/produk');
    }
  }

  public function delete($where)
  {
    $where = ['id_produk' => $this->uri->segment(4)];
    $this->produk_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/produk');
  }

  public function laporan()
  {
    $data['title'] = "Produk";
    $data['icon'] = "user";
    $data['menu'] = "Produk";

    $data['produk'] = $this->produk_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/produk/produk_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Produk PDF | NBC";
    $data['produk'] = $this->produk_model->getAll();
    $data['menu'] = "Produk";

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Produk";
    $this->pdf->load_view('admin/produk/produk_pdf', $data);
  }
}
