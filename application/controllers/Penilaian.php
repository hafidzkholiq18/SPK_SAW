<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penilaian extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('M_Kriteria');
    $this->load->model('M_Penilaian');
  }


  public function index()
  {
    $data = [
      'title' => 'Penilaian Alternatif',
      'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
      'kriteria' => $this->M_Kriteria->getAllKriteria(),
      'data_penilaian' => $this->M_Penilaian->getDataPenilaian(),
      'content' => 'penilaian/index'
    ];
    $this->load->view('templates/wrapper', $data);
  }

  public function aksi_penilaian_alternatif()
  {
    // Buat fungsi penilaian alternatif dan kecocokannya.
    $this->M_Penilaian->PenilaianAlternatif();
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Penilaian berhasil dilakukan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Penilaian');
  }

  public function Rating_Kecocokan()
  {
    $data = [
      'title' => 'Hasil Rating Kecocokan',
      'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
      'kriteria' => $this->M_Kriteria->getAllKriteria(),
      'hasil_kecocokan' => $this->M_Penilaian->getDataKecocokan(),
      'content' => 'penilaian/kecocokan'
    ];
    $this->load->view('templates/wrapper', $data);
  }

  public function Normalisasi()
  {
    $data_kriteria = $this->M_Kriteria->getAllKriteria();
    $data = [
      'title' => 'Hasil Normalisasi',
      'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
      'kriteria' => $data_kriteria,
      'rating_kecocokan' => $this->M_Penilaian->getDataKecocokan(),
      'jKriteria1' => $this->M_Penilaian->cekKriteria1($data_kriteria),
      'jKriteria2' => $this->M_Penilaian->cekKriteria2($data_kriteria),
      'jKriteria3' => $this->M_Penilaian->cekKriteria3($data_kriteria),
      'jKriteria4' => $this->M_Penilaian->cekKriteria4($data_kriteria),
      'jKriteria5' => $this->M_Penilaian->cekKriteria5($data_kriteria),
      'MaxC1' => $this->M_Penilaian->MaxK1(),
      'MinC1' => $this->M_Penilaian->MinK1(),
      'MaxC2' => $this->M_Penilaian->MaxK2(),
      'MinC2' => $this->M_Penilaian->MinK2(),
      'MaxC3' => $this->M_Penilaian->MaxK3(),
      'MinC3' => $this->M_Penilaian->MinK3(),
      'MaxC4' => $this->M_Penilaian->MaxK4(),
      'MinC4' => $this->M_Penilaian->MinK4(),
      'MaxC5' => $this->M_Penilaian->MaxK5(),
      'MinC5' => $this->M_Penilaian->MinK5(),
      'content' => 'penilaian/normalisasi'
    ];
    // var_dump($data['rating_kecocokan']);
    // die;
    $this->load->view('templates/wrapper', $data);
  }

  public function Hasil_SAW()
  {
    $data_kriteria = $this->M_Kriteria->getAllKriteria();
    $data = [
      'title' => 'Hasil Normalisasi',
      'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
      'kriteria' => $data_kriteria,
      'rating_kecocokan' => $this->M_Penilaian->getDataKecocokan(),
      'jKriteria1' => $this->M_Penilaian->cekKriteria1($data_kriteria),
      'jKriteria2' => $this->M_Penilaian->cekKriteria2($data_kriteria),
      'jKriteria3' => $this->M_Penilaian->cekKriteria3($data_kriteria),
      'jKriteria4' => $this->M_Penilaian->cekKriteria4($data_kriteria),
      'jKriteria5' => $this->M_Penilaian->cekKriteria5($data_kriteria),
      'MaxC1' => $this->M_Penilaian->MaxK1(),
      'MinC1' => $this->M_Penilaian->MinK1(),
      'MaxC2' => $this->M_Penilaian->MaxK2(),
      'MinC2' => $this->M_Penilaian->MinK2(),
      'MaxC3' => $this->M_Penilaian->MaxK3(),
      'MinC3' => $this->M_Penilaian->MinK3(),
      'MaxC4' => $this->M_Penilaian->MaxK4(),
      'MinC4' => $this->M_Penilaian->MinK4(),
      'MaxC5' => $this->M_Penilaian->MaxK5(),
      'MinC5' => $this->M_Penilaian->MinK5(),
      'bobotC1' => $this->M_Kriteria->bobotC1(),
      'bobotC2' => $this->M_Kriteria->bobotC2(),
      'bobotC3' => $this->M_Kriteria->bobotC3(),
      'bobotC4' => $this->M_Kriteria->bobotC4(),
      'bobotC5' => $this->M_Kriteria->bobotC5(),
      'content' => 'penilaian/hasil_saw'
    ];
    $this->load->view('templates/wrapper', $data);
  }

  public function aksi_perankingan()
  {
    $id_alternatif = $this->input->post('id_alternatif');
    $total_nilai = $this->input->post('total_nilai');
    foreach ($total_nilai as $keys => $values) {
      foreach ($id_alternatif as $key => $value) {
        # code...
        $data[$key]['id_alternatif'] = $value;
        $data[$keys]['total_nilai'] = $values;
      }
    }
    $this->M_Penilaian->addPerankingan($data);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Perankingan berhasil dilakukan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>'
    );
    redirect('Penilaian/tampil_ranking');
  }

  public function tampil_ranking()
  {
    $data = [
      'title' => 'Hasil Perankingan',
      'user' => $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array(),
      'perankingan' => $this->M_Penilaian->getDataPerankingan(),
      'content' => 'penilaian/perankingan'
    ];
    $this->load->view('templates/wrapper', $data);
  }
}

/* End of file Penilaian.php */
