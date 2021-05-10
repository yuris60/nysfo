<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/admin_model');
    $this->load->model('admin/login_model');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Admin";
    $data['icon'] = "user-circle";
    $data['menu'] = "Admin";

    $data['admin'] = $this->admin_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/admin/admin_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data Admin";
    $data['icon'] = "user-circle";
    $data['menu'] = "Admin";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_admin', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|trim|matches[password]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/admin/admin_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->admin_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/admin');
    }
  }

  public function delete($where)
  {
    $where = ['id_admin' => $this->uri->segment(4)];
    $this->admin_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/admin');
  }
}
