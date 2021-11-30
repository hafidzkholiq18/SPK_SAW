<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Load Dependencies
    $this->load->model('M_Alternatif');
  }

  // List all your items
  public function index()
  {
    $data = [
      'title' => 'Data Alternatif',
      'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
      'kode_alternatif' => $this->M_Alternatif->kodeAlternatif(),
      'data_alternatif' => $this->M_Alternatif->getDataAlternatif(),
      'content' => 'admin/alternatif'
    ];
    $this->load->view('templates/wrapper', $data);
  }

  // Add a new item
  public function add()
  {
    $kode_alternatif = $this->input->post('kode_alternatif');
    $nama_alternatif = $this->input->post('nama_alternatif');
    $data_alternatif = [
      'kode_alternatif' => $kode_alternatif,
      'nama_alternatif' => $nama_alternatif
    ];
    $this->M_Alternatif->addAlternatif($data_alternatif);
    $id_alternatif = $this->db->insert_id();
    $data_id_alternatif = ['id_alternatif' => $id_alternatif];
    $this->M_Alternatif->addIdAlternatif($data_id_alternatif);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-primary alert-dismissible fade show" role="alert">
        Data Alternatif berhasil <strong>Ditambahkan</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Alternatif');
  }

  //Update one item
  public function update($id)
  {
    $id_alternatif = $id;
    $nama_alternatif = $this->input->post('nama_alternatif');
    $data_alternatif = [
      'id_alternatif' => $id_alternatif,
      'nama_alternatif' => $nama_alternatif
    ];
    $this->M_Alternatif->updateAlternatif($data_alternatif);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Alternatif berhasil <strong>Diubah</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Alternatif');
  }

  //Delete one item
  public function delete($id)
  {
    $data_alternatif = ['id_alternatif' => $id];
    $this->M_Alternatif->deleteAlternatif($data_alternatif);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data alternatif berhasil <strong>Dihapus</strong>.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Alternatif');
  }
}

/* End of file Alternatif.php */
