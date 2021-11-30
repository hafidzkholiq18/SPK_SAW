<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('M_User');
  }


  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');


    if ($this->form_validation->run() == FALSE) {
      # code...
      $data['title'] = 'Halaman Login';
      $this->load->view('auth/login', $data);
    } else {
      $this->aksi_login();
    }
  }

  public function registrasi()
  {
    $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
    $this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'trim|required|matches[password]');


    if ($this->form_validation->run() == FALSE) {
      $data['title'] = 'Halaman Registrasi';
      $this->load->view('auth/registrasi', $data);
    } else {
      $this->aksi_registrasi();
    }
  }

  private function aksi_registrasi()
  {
    $nama = $this->input->post('nama_lengkap');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $data_registrasi = [
      'nama_user' => $nama,
      'email' => $email,
      'password' => password_hash($password, PASSWORD_DEFAULT)
    ];
    $this->M_User->registrasi($data_registrasi);
    $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">Registrasi Sukses</div>');
    redirect('auth');
  }

  private function aksi_login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
    if ($user) {
      if (password_verify($password, $user['password'])) {
        $data_session = [
          'nama' => $user['nama_user'],
          'email' => $user['email']
        ];
        $this->session->set_userdata($data_session);
        redirect('Admin');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login gagal, password salah</div>');
        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login gagal, User tidak ditemukan</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('email');
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Anda berhasil logout!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('auth');
  }
}

/* End of file Auth.php */
