<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/login_model');
  }

  public function pembaruanAplikasi()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Pembaruan Aplikasi";
    $data['icon'] = "info";
    $data['menu'] = "Pembaruan Aplikasi";

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/tentang/pembaruan_aplikasi', $data);
    $this->load->view('admin/templates/footer');
  }
}
