<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_treatment extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('admin/detail_treatment_model');
    $this->load->model('admin/login_model');
    $this->load->helper('formatrupiah_helper');
    $this->load->library('user_agent');
  }

  public function read($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Detail Treatment";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Treatment";
    $data['submenu'] = "Detail Treatment";

    $data['treatment'] = $this->detail_treatment_model->getKey($where);
    $data['detail_treatment'] = $this->detail_treatment_model->getAll($where);

    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/navbar');
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/detail_treatment/detail_treatment_index', $data);
    $this->load->view('admin/templates/footer');
  }

  public function create($where)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);

    $data['title'] = "Tambah Data Detail Treatment";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Treatment";
    $data['submenu'] = "Detail Treatment";
    $data['subsubmenu'] = "Tambah Data";

    $data['treatment'] = $this->detail_treatment_model->getKey($where);
    $data['detail_treatment'] = $this->detail_treatment_model->getAll($where);

    //validation
    $this->form_validation->set_rules('nm_treatment', 'Jenis Treatment', 'required|trim');
    $this->form_validation->set_rules('harga_treatment', 'Harga', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_treatment/detail_treatment_create', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_treatment_model->simpan();
      $this->session->set_flashdata('flash', 'ditambahkan');
      $referred_from = $this->session->userdata('detail_treatment');
      redirect($referred_from, 'refresh');
      // redirect('detail_treatment/read/' . $data['treatment'][$where]);

    }
  }

  public function update($where, $where2)
  {
    $data['user'] = $this->login_model->getSession();
    $where = $this->uri->segment(4);
    $where2 = $this->uri->segment(5);

    $data['title'] = "Tambah Data Detail Treatment";
    $data['icon'] = "stethoscope";
    $data['menu'] = "Treatment";
    $data['submenu'] = "Detail Treatment";
    $data['subsubmenu'] = "Tambah Data";

    $data['treatment'] = $this->detail_treatment_model->getKey($where);
    $data['detail_treatment'] = $this->detail_treatment_model->getById($where, $where2)->row_array();

    //validation
    $this->form_validation->set_rules('nm_treatment', 'Jenis Treatment', 'required|trim');
    $this->form_validation->set_rules('harga_treatment', 'Harga', 'required|trim|is_numeric');

    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/navbar');
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/detail_treatment/detail_treatment_update', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $this->detail_treatment_model->update($where2);
      $this->session->set_flashdata('flash', 'diperbaharui');
      $referred_from = $this->session->userdata('detail_treatment');
      redirect($referred_from, 'refresh');
      // redirect('detail_treatment/read/' . $data['treatment'] . "/" . $where2);
    }
  }

  public function delete($where)
  {
    $where = ['id_detailtreatment' => $this->uri->segment(4)];
    $this->detail_treatment_model->delete($where);
    $this->session->set_flashdata('flash', 'dihapus');
    // redirect('detail_treatment/read/' . $data['treatment'] . "/" . $where2);
    $referred_from = $this->session->userdata('detail_treatment');
    redirect($referred_from, 'refresh');
  }
}
