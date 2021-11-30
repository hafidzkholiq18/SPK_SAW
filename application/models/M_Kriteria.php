<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Kriteria extends CI_Model
{
  public function kodeKriteria()
  {
    $query = $this->db->query("select max(kode_kriteria) as max_id from tbl_kriteria");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "C";
    $kode = $char . sprintf("%s", $noUrut);
    return $kode;
  }

  public function getAllKriteria()
  {
    return $this->db->get('tbl_kriteria')->result_array();
  }

  public function addKriteria($data)
  {
    $this->db->insert('tbl_kriteria', $data);
  }

  public function updateKriteria($data)
  {
    $this->db->where('id_kriteria', $data['id_kriteria']);
    $this->db->update('tbl_kriteria', $data);
  }

  public function deleteKriteria($data)
  {
    $this->db->where('id_kriteria', $data['id_kriteria']);
    $this->db->delete('tbl_kriteria', $data);
  }

  public function bobotC1()
  {
    return $this->db->get_where('tbl_kriteria', ['kode_kriteria' => 'C1'])->row_array();
  }
  public function bobotC2()
  {
    return $this->db->get_where('tbl_kriteria', ['kode_kriteria' => 'C2'])->row_array();
  }
  public function bobotC3()
  {
    return $this->db->get_where('tbl_kriteria', ['kode_kriteria' => 'C3'])->row_array();
  }
  public function bobotC4()
  {
    return $this->db->get_where('tbl_kriteria', ['kode_kriteria' => 'C4'])->row_array();
  }
  public function bobotC5()
  {
    return $this->db->get_where('tbl_kriteria', ['kode_kriteria' => 'C5'])->row_array();
  }
}

/* End of file M_Kriteria.php */
