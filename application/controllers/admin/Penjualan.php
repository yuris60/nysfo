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

    $data['pelanggan'] = $this->penjualan_model->getPelangganAll();
    $data['dokter'] = $this->penjualan_model->getDokterAll();

    //validation
    $this->form_validation->set_rules('tgl_penjualan', 'Tanggal Penjualan', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/penjualan/penjualan_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->penjualan_model->simpan();
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Penjualan";
    $data['icon'] = "dolly";
    $data['menu'] = "Penjualan";
    $data['submenu'] = "Perbaharui Data";

    $data['penjualan'] = $this->penjualan_model->getById($where);
    $data['dokter'] = $this->penjualan_model->getAllDokter();

    //validation
    $this->form_validation->set_rules('tgl_penjualan', 'Tanggal Penjualan', 'required|trim');

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
    $where = ['id_penjualan' => $this->uri->segment(4)];
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

  public function pendapatanpdf()
  {
    if ($this->input->post('bulanan')) {
      $where = $this->input->post('bulanan');
      $data['title'] = "Cetak Laporan Pendapatan PDF Bulanan | NBC";
      $data['transaksi'] = $this->transaksi_model->laporanPDFBulanan();
      $data['num_rows'] = count($data['transaksi']);

      if ($data['num_rows'] > 0) { //jika data tersedia, maka
        //load halaman
        $this->load->library('pdf');
        // $this->load->view('transaksi/transaksi_pdf', $data);

        //inisialisasi variabel untuk dompdf
        $paper_size = 'A4';
        $orientation = 'landscape';
        // $html = $this->output->get_output();

        //terapkan ke dompdf
        // $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->setPaper($paper_size, $orientation);
        $this->pdf->filename = "Cetak Laporan Pendapatan PDF Bulanan | NBC";
        $this->pdf->load_view('transaksi/transaksi_pendapatan_berdasarkan_bulanan', $data);


        //Convert to PDF
        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("Laporan Pendapatan", array('Attachment' => 0));
      } else {
        $this->session->set_flashdata('flash', 'Ada');
        redirect('transaksi/pendapatan');
      }
    } else if ($this->input->post('tahunan')) {
      $data['title'] = "Cetak Laporan Pendapatan PDF Tahunan | SIPERUM";
      $data['transaksi'] = $this->penjualan_model->laporanPDFTahunan();
      $data['num_rows'] = count($data['penjualan']);

      if ($data['num_rows'] > 0) { //jika data tersedia, maka
        //load halaman
        $this->load->library('pdf');
        // $this->load->view('penjualan/penjualan_pdf', $data);

        //inisialisasi variabel untuk dompdf
        $paper_size = 'A4';
        $orientation = 'landscape';
        // $html = $this->output->get_output();

        //terapkan ke dompdf
        // $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->setPaper($paper_size, $orientation);
        $this->pdf->filename = "Cetak Laporan Pendapatan PDF Tahunan | SIPERUM";
        $this->pdf->load_view('penjualan/penjualan_pendapatan_berdasarkan_tahunan', $data);


        //Convert to PDF
        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("Laporan Pendapatan", array('Attachment' => 0));
      } else {
        $this->session->set_flashdata('flash', 'Ada');
        redirect('penjualan/pendapatan');
      }
    } else if ($this->input->post('custom_start')) { //custom
      $data['title'] = "Cetak Laporan Pendapatan PDF Custom | NBC";
      $data['penjualan'] = $this->penjualan_model->laporanPDFCustom();
      $data['num_rows'] = count($data['penjualan']);

      if ($data['num_rows'] > 0) { //jika data tersedia, maka
        //load halaman
        $this->load->library('pdf');
        // $this->load->view('penjualan/transaksi_pdf', $data);

        //inisialisasi variabel untuk dompdf
        $paper_size = 'A4';
        $orientation = 'landscape';
        // $html = $this->output->get_output();

        //terapkan ke dompdf
        // $this->pdf->set_option('isRemoteEnabled', TRUE);
        $this->pdf->setPaper($paper_size, $orientation);
        $this->pdf->filename = "Cetak Laporan Pendapatan PDF Custom | NBC";
        $this->pdf->load_view('transaksi/transaksi_pendapatan_berdasarkan_custom', $data);


        //Convert to PDF
        // $this->dompdf->load_html($html);
        // $this->dompdf->render();
        // $this->dompdf->stream("Laporan Pendapatan", array('Attachment' => 0));
      } else {
        $this->session->set_flashdata('flash', 'Ada');
        redirect('transaksi/pendapatan');
      }
    }
  }
}
