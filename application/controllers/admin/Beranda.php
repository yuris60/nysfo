<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/beranda_model');
    $this->load->model('admin/login_model');
  }
  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Beranda";
    $data['menu'] = "Beranda";
    $data['icon'] = "home";

    $data['penjualan'] = $this->beranda_model->getPenjualan();
    $data['jumlahdokter'] = $this->beranda_model->jumlahDokter();
    $data['jumlahmember'] = $this->beranda_model->jumlahMember();
    $data['jumlahproduk'] = $this->beranda_model->jumlahProduk();
    $data['jumlahtreatment'] = $this->beranda_model->jumlahTreatment();

    $data['jumlahpengunjunghariini'] = $this->beranda_model->jumlahPengunjungHariIni();
    $data['jumlahpenjualanbaranghariini'] = $this->beranda_model->jumlahPenjualanBarangHariIni();
    $data['jumlahpendapatanhariini'] = $this->beranda_model->jumlahPendapatanHariIni();
    $data['jumlahpenjualantreatmenthariini'] = $this->beranda_model->jumlahPenjualanTreatmentHariIni();
    $data['jumlahpengunjungwanitahariini'] = $this->beranda_model->jumlahPengunjungWanitaHariIni();
    $data['jumlahpengunjungpriahariini'] = $this->beranda_model->jumlahPengunjungPriaHariIni();


    $data['jumlahpengunjung'] = $this->beranda_model->jumlahPengunjung();
    $data['jumlahpengunjungwanita'] = $this->beranda_model->jumlahPengunjungWanita();
    $data['jumlahpengunjungpria'] = $this->beranda_model->jumlahPengunjungPria();

    // penjualan barang
    $data['jumlahpenjualanbarangjanuari'] = $this->beranda_model->jumlahPenjualanBarangJanuari();
    $data['jumlahpenjualanbarangfebruari'] = $this->beranda_model->jumlahPenjualanBarangFebruari();
    $data['jumlahpenjualanbarangmaret'] = $this->beranda_model->jumlahPenjualanBarangMaret();
    $data['jumlahpenjualanbarangapril'] = $this->beranda_model->jumlahPenjualanBarangApril();
    $data['jumlahpenjualanbarangmei'] = $this->beranda_model->jumlahPenjualanBarangMei();
    $data['jumlahpenjualanbarangjuni'] = $this->beranda_model->jumlahPenjualanBarangJuni();
    $data['jumlahpenjualanbarangjuli'] = $this->beranda_model->jumlahPenjualanBarangJuli();
    $data['jumlahpenjualanbarangagustus'] = $this->beranda_model->jumlahPenjualanBarangAgustus();
    $data['jumlahpenjualanbarangseptember'] = $this->beranda_model->jumlahPenjualanBarangSeptember();
    $data['jumlahpenjualanbarangoktober'] = $this->beranda_model->jumlahPenjualanBarangOktober();
    $data['jumlahpenjualanbarangnovember'] = $this->beranda_model->jumlahPenjualanBarangNovember();
    $data['jumlahpenjualanbarangdesember'] = $this->beranda_model->jumlahPenjualanBarangDesember();

    // penjualan treatment
    $data['jumlahpenjualantreatmentjanuari'] = $this->beranda_model->jumlahPenjualanTreatmentJanuari();
    $data['jumlahpenjualantreatmentfebruari'] = $this->beranda_model->jumlahPenjualanTreatmentFebruari();
    $data['jumlahpenjualantreatmentmaret'] = $this->beranda_model->jumlahPenjualanTreatmentMaret();
    $data['jumlahpenjualantreatmentapril'] = $this->beranda_model->jumlahPenjualanTreatmentApril();
    $data['jumlahpenjualantreatmentmei'] = $this->beranda_model->jumlahPenjualanTreatmentMei();
    $data['jumlahpenjualantreatmentjuni'] = $this->beranda_model->jumlahPenjualanTreatmentJuni();
    $data['jumlahpenjualantreatmentjuli'] = $this->beranda_model->jumlahPenjualanTreatmentJuli();
    $data['jumlahpenjualantreatmentagustus'] = $this->beranda_model->jumlahPenjualanTreatmentAgustus();
    $data['jumlahpenjualantreatmentseptember'] = $this->beranda_model->jumlahPenjualanTreatmentSeptember();
    $data['jumlahpenjualantreatmentoktober'] = $this->beranda_model->jumlahPenjualanTreatmentOktober();
    $data['jumlahpenjualantreatmentnovember'] = $this->beranda_model->jumlahPenjualanTreatmentNovember();
    $data['jumlahpenjualantreatmentdesember'] = $this->beranda_model->jumlahPenjualanTreatmentDesember();

    // jumlah pendapatan
    $data['jumlahpendapatanjanuari'] = $this->beranda_model->jumlahPendapatanJanuari();
    $data['jumlahpendapatanfebruari'] = $this->beranda_model->jumlahPendapatanFebruari();
    $data['jumlahpendapatanmaret'] = $this->beranda_model->jumlahPendapatanMaret();
    $data['jumlahpendapatanapril'] = $this->beranda_model->jumlahPendapatanApril();
    $data['jumlahpendapatanmei'] = $this->beranda_model->jumlahPendapatanMei();
    $data['jumlahpendapatanjuni'] = $this->beranda_model->jumlahPendapatanJuni();
    $data['jumlahpendapatanjuli'] = $this->beranda_model->jumlahPendapatanJuli();
    $data['jumlahpendapatanagustus'] = $this->beranda_model->jumlahPendapatanAgustus();
    $data['jumlahpendapatanseptember'] = $this->beranda_model->jumlahPendapatanSeptember();
    $data['jumlahpendapatanoktober'] = $this->beranda_model->jumlahPendapatanOktober();
    $data['jumlahpendapatannovember'] = $this->beranda_model->jumlahPendapatanNovember();
    $data['jumlahpendapatandesember'] = $this->beranda_model->jumlahPendapatanDesember();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/beranda', $data);
    $this->load->view('admin/templates/footer_beranda', $data);
  }
}
