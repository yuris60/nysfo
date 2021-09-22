<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pasien extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/pasien_model');
    $this->load->model('admin/login_model');
    $this->load->helper('tglindo_helper');
    $this->load->helper('formatrupiah');
    $this->load->library('upload');
    $this->load->library('user_agent');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";

    $data['pasien'] = $this->pasien_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pasien/pasien_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function history($where)
  {
    $where = $this->uri->segment(4);
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Riwayat Penjualan Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";
    $data['submenu'] = "Riwayat Penjualan Pasien";

    $data['pasien'] = $this->pasien_model->getAll();
    $data['penjualan'] = $this->pasien_model->getKey($where);
    $data['join_treatment'] = $this->pasien_model->getJoinTreatment($where);
    $data['join_produk'] = $this->pasien_model->getJoinProduct($where);

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pasien/pasien_riwayat', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Pasien', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/pasien/pasien_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->pasien_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/pasien');
    }
  }

  public function update($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Perbaharui Data Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";
    $data['submenu'] = "Perbaharui Data";

    $data['pasien'] = $this->pasien_model->getById($where);

    //validation
    $this->form_validation->set_rules('nm_pelanggan', 'Nama Pasien', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/pasien/pasien_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->pasien_model->update($where);
      $this->session->set_flashdata('flash', 'diperbaharui');
      redirect('admin/pasien');
    }
  }

  public function wajah($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $data['title'] = "Lihat Wajah Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";
    $data['submenu'] = "Lihat Wajah Pasien";

    $data['pasien'] = $this->pasien_model->getById($where);

    //validation
    // $this->form_validation->set_rules('nm_pelanggan', 'Nama Pasien', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/pasien/pasien_wajah', $data);
      $this->load->view('admin/templates/footer');
    } else {
      // $this->pasien_model->upload_wajah_before($where);
      $this->session->set_flashdata('flash', 'disimpan');
      redirect('admin/pasien');
    }
  }

  public function upload_wajah_before($where)
  {
    $where = $this->uri->segment(4);
    $namafile = $where . "_sebelum";
    $config['upload_path'] = './assets/img/pelanggan/'; //path folder
    $config['allowed_types'] = 'jpg|png|jpeg|'; //type yang dapat diakses bisa anda sesuaikan
    // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
    $config['file_name'] = $namafile;

    // $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if(!empty($_FILES['fotosebelum']['name']))
    {
        if ($this->upload->do_upload('fotosebelum'))
            {
                $gbr = $this->upload->data();
                // $gbr = array('upload_data' => $this->upload->data());
                $where2= $gbr['file_name']; //Mengambil file name dari gambar yang diupload
                // echo "Upload Berhasil <br>" . $gambar;
                $this->pasien_model->simpan_wajah_before($where, $where2);
                $this->session->set_flashdata('flash', 'disimpan');
                $referred_from = $this->session->userdata('pasien_wajah'); 
                redirect($referred_from, 'refresh');
                // $this->upload->;
            }else{
                echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp";
            }
                  
        }else{
            echo "Gagal, gambar belum di pilih";
    }          
  }

  public function upload_wajah_after($where)
  {
    $where = $this->uri->segment(4);
    $namafile = $where . "_sesudah";
    $config['upload_path'] = './assets/img/pelanggan/'; //path folder
    $config['allowed_types'] = 'jpg|png|jpeg|'; //type yang dapat diakses bisa anda sesuaikan
    // $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
    $config['file_name'] = $namafile;

    // $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if(!empty($_FILES['fotosesudah']['name']))
    {
        if ($this->upload->do_upload('fotosesudah'))
            {
                $gbr = $this->upload->data();
                // $gbr = array('upload_data' => $this->upload->data());
                $where2= $gbr['file_name']; //Mengambil file name dari gambar yang diupload
                // echo "Upload Berhasil <br>" . $gambar;
                $this->pasien_model->simpan_wajah_after($where, $where2);
                $this->session->set_flashdata('flash', 'disimpan');
                $referred_from = $this->session->userdata('pasien_wajah'); 
                redirect($referred_from, 'refresh');
                // $this->upload->;
            }else{
                echo "Gambar Gagal Upload. Gambar harus bertipe gif|jpg|png|jpeg|bmp";
            }
                  
        }else{
            echo "Gagal, gambar belum di pilih";
    }          
  }

  public function delete($where)
  {
    $where = ['id_pelanggan' => $this->uri->segment(4)];
    $this->pasien_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/pasien');
  }

  public function laporan()
  {
    $data['title'] = "Pasien";
    $data['icon'] = "user";
    $data['menu'] = "Pasien";

    $data['pasien'] = $this->pasien_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/pasien/pasien_pdf', $data);
    $this->load->view('admin/templates/footer');
  }

  public function laporanPDFAll()
  {
    $data['title'] = "Cetak Laporan Pasien PDF | NBC";
    $data['pasien'] = $this->pasien_model->getAll();

    //load halaman
    $this->load->library('pdf');

    //inisialisasi variabel untuk dompdf
    $paper_size = 'A4';
    $orientation = 'portrait';

    // $orientation = 'landscape';
    $this->pdf->setPaper($paper_size, $orientation);
    $this->pdf->filename = "Laporan Pasien";
    $this->pdf->load_view('admin/pasien/pasien_pdf', $data);
  }
}
