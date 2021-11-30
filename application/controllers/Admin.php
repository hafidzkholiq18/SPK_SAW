<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

  public function index()
  {
    $data = [
      'title' => 'Halaman Admin',
      'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
      'content' => 'admin/dashboard'
    ];
    $this->load->view('templates/wrapper', $data);
  }
}

/* End of file Admin.php */
