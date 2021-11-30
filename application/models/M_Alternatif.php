<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Alternatif extends CI_Model
{
  public function kodeAlternatif()
  {
    $query = $this->db->query("select max(kode_alternatif) as max_id from tbl_alternatif");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "A";
    $kode = $char . sprintf("%s", $noUrut);
    return $kode;
  }

  public function getDataAlternatif()
  {
    return $this->db->get('tbl_alternatif')->result_array();
  }

  public function addAlternatif($data_alternatif)
  {
    $this->db->insert('tbl_alternatif', $data_alternatif);
  }

  public function addIdAlternatif($data_id_alternatif)
  {
    $this->db->insert('tbl_nilai', $data_id_alternatif);
    $this->db->insert('tbl_kecocokan', $data_id_alternatif);
  }

  public function updateAlternatif($data_alternatif)
  {
    $this->db->where('id_alternatif', $data_alternatif['id_alternatif']);
    $this->db->update('tbl_alternatif', $data_alternatif);
  }

  public function deleteAlternatif($data_alternatif)
  {
    $this->deleteKecocokanAlternatif($data_alternatif);
    $this->deleteNilaiAlternatif($data_alternatif);
    $this->db->where('id_alternatif', $data_alternatif['id_alternatif']);
    $this->db->delete('tbl_alternatif', $data_alternatif);
  }

  // Hapus data alternatif pada tabel penilaian dan kecocokan
  public function deleteNilaiAlternatif($data_alternatif)
  {
    $this->db->where('id_alternatif', $data_alternatif['id_alternatif']);
    $this->db->delete('tbl_nilai', $data_alternatif);
  }
  public function deleteKecocokanAlternatif($data_alternatif)
  {
    $this->db->where('id_alternatif', $data_alternatif['id_alternatif']);
    $this->db->delete('tbl_kecocokan', $data_alternatif);
  }
}

/* End of file M_Alternatif.php */
