<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notifikasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/notifikasi_model');
    $this->load->model('admin/login_model');
    $this->load->helper('waktulalu');
  }
}
