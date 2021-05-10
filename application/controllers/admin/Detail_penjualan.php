<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_penjualan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/detail_penjualan_model');
    $this->load->model('admin/login_model');
    $this->load->helper('tglindo');
    $this->load->helper('formatrupiah');
    $this->load->helper('terbilang');
  }

  public function read($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Detail Penjualan";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Penjualan";
    $data['submenu'] = "Detail Penjualan";

    $data['penjualan'] = $this->detail_penjualan_model->getKey($where);
    // $data['detail_penjualan'] = $this->detail_penjualan_model->getAll($where);
    $data['join_treatment'] = $this->detail_penjualan_model->getJoinTreatment($where);
    $data['join_produk'] = $this->detail_penjualan_model->getJoinProduct($where);
    $data['sum'] = $this->detail_penjualan_model->sumTotalPembayaran($where);

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/detail_penjualan/detail_penjualan_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function createTreatment($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Tambah Data Detail Penjualan Treatment";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Penjualan";
    $data['submenu'] = "Detail Penjualan";
    $data['subsubmenu'] = "Tambah Data";

    $data['treatment'] = $this->detail_penjualan_model->getAllTreatment();
    $data['penjualan'] = $this->detail_penjualan_model->getKey($where);
    $data['detail_penjualan'] = $this->detail_penjualan_model->getAll($where);

    //validation
    $this->form_validation->set_rules('id_detailtreatment', 'Jenis Treatment', 'required|trim');
    $this->form_validation->set_rules('qty_treatment', 'Qty', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_penjualan/detail_penjualan_create_treatment', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_penjualan_model->simpan($where);
      $this->session->set_flashdata('flash', 'ditambahkan');
      // redirect('admin/penjualan/' . $where);
      redirect('admin/detail_penjualan/read/' . $where);
      // header("location:javascript://history.go(-2)");

      // redirect('detail_penjualan/read/' . $data['penjualan'][$where]);

    }
  }

  public function createProduk($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Tambah Data Detail Penjualan Produk";
    $data['icon'] = "box";
    $data['menu'] = "Penjualan";
    $data['submenu'] = "Detail Penjualan";
    $data['subsubmenu'] = "Tambah Data";

    $data['produk'] = $this->detail_penjualan_model->getAllProduk();
    $data['penjualan'] = $this->detail_penjualan_model->getKey($where);
    $data['detail_penjualan'] = $this->detail_penjualan_model->getAll($where);

    //validation
    $this->form_validation->set_rules('id_produk', 'Produk', 'required|trim');
    $this->form_validation->set_rules('qty_produk', 'Qty', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_penjualan/detail_penjualan_create_produk', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_penjualan_model->simpan($where);
      $this->detail_penjualan_model->kurangiStokProdukCreate();
      $this->session->set_flashdata('flash', 'ditambahkan');
      // redirect('admin/penjualan');
      redirect('admin/detail_penjualan/read/' . $where);
      // redirect('detail_penjualan/read/' . $data['penjualan'][$where]);

    }
  }

  public function deleteProduk($where, $where2)
  {
    $where = $this->uri->segment(4); //id_detailpenjualan
    $where2 = $this->uri->segment(5); //id_produk
    $where3 = ['id_detailpenjualan' => $where]; //id_detailpenjualan
    $where4 = $this->uri->segment(6); //qty_penjualan
    $this->detail_penjualan_model->delete($where3);
    $this->detail_penjualan_model->tambahStokProdukDelete($where2, $where4);
    $this->session->set_flashdata('flash', 'dihapus');
    // redirect('detail_penjualan/read/' . $data['penjualan'] . "/" . $where2);
    // redirect('admin/penjualan');
    redirect('admin/detail_penjualan/read/' . $where);
  }

  public function deleteTreatment($where)
  {
    $where = $this->uri->segment(4); //id_detailpenjualan
    $where3 = ['id_detailpenjualan' => $where]; //id_detailpenjualan
    $this->detail_penjualan_model->delete($where3);
    $this->session->set_flashdata('flash', 'dihapus');
    // redirect('detail_penjualan/read/' . $data['penjualan'] . "/" . $where2);
    // redirect('admin/penjualan');
    redirect('admin/detail_penjualan/read/' . $where);
  }

  public function update($where, $where2)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $where2 = $this->uri->segment(5);

    $data['title'] = "Perbaharui Data Detail Penjualan";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Penjualan";
    $data['submenu'] = "Detail Penjualan";
    $data['subsubmenu'] = "Perbaharui Data";

    $data['penjualan'] = $this->detail_penjualan_model->getKey($where);
    $data['detail_penjualan'] = $this->detail_penjualan_model->getById($where, $where2)->row_array();


    $data['produk'] = $this->detail_penjualan_model->getAllProduk();
    $data['penjualan'] = $this->detail_penjualan_model->getKey($where);
    $data['detail_penjualan'] = $this->detail_penjualan_model->getById($where, $where2)->row_array();

    //validation
    $this->form_validation->set_rules('id_produk', 'Jenis Produk', 'required|trim');
    $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required|trim|is_numeric');
    $this->form_validation->set_rules('qty_beli', 'Qty Beli', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_penjualan/detail_penjualan_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_penjualan_model->kurangiStok();
      $this->detail_penjualan_model->tambahStok();
      $this->detail_penjualan_model->update($where2);
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/penjualan');
      // redirect('detail_penjualan/read/' . $data['penjualan'] . "/" . $where2);
    }
  }

  public function cetakStruk($where)
  {
    $where = $this->uri->segment(4);
    $data['title'] = "Cetak Struk";
    $data['penjualanall'] = $this->detail_penjualan_model->getAllStruk($where)->result_array();
    $data['penjualanallbyid'] = $this->detail_penjualan_model->getAllStruk($where)->row_array();
    $data['penjualanproduk'] = $this->detail_penjualan_model->getJoinProduct($where);
    $data['penjualantreatment'] = $this->detail_penjualan_model->getJoinTreatment($where);
    $data['sum'] = $this->detail_penjualan_model->sumTotalPembayaran($where);

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A5';
    $orientation = 'landscape';

    //terapkan ke dompdf
    // $this->pdf->set_option('isRemoteEnabled', TRUE);
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Struk Transaksi";
    $this->pdf->load_view('admin/detail_penjualan/cetakstruk_landscape', $data);
  }
}
