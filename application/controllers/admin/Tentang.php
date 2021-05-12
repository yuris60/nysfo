<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/login_model');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tentang Aplikasi";
    $data['icon'] = "info";
    $data['menu'] = "Tentang Aplikasi";

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/tentang/tentang_index', $data);
    $this->load->view('admin/templates/footer');
  }
}
