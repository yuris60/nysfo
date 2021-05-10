<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/user_model');
    $this->load->model('admin/login_model');
  }

  public function index()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "User";
    $data['icon'] = "user";
    $data['menu'] = "User";

    $data['user_db'] = $this->user_model->getAll();

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/user/user_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create()
  {
    $data['user'] = $this->login_model->getSession();
    $data['title'] = "Tambah Data User";
    $data['icon'] = "user";
    $data['menu'] = "User";
    $data['submenu'] = "Tambah Data";

    //validation
    $this->form_validation->set_rules('nm_user', 'Tempat Lahir', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|trim|matches[password]');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/user/user_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->user_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      redirect('admin/user');
    }
  }

  public function delete($where)
  {
    $where = ['id_user' => $this->uri->segment(3)];
    $this->user_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    redirect('admin/user');
  }
}
