<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Penilaian extends CI_Model
{
  public function getDataPenilaian()
  {
    $this->db->select('alternatif.*,nilai.*');
    $this->db->from('tbl_nilai nilai');
    $this->db->join('tbl_alternatif alternatif', 'nilai.id_alternatif = alternatif.id_alternatif', 'left');
    return $this->db->get()->result_array();
  }

  public function getDataKecocokan()
  {
    $this->db->select('alternatif.*,kecocokan.*');
    $this->db->from('tbl_kecocokan kecocokan');
    $this->db->join('tbl_alternatif alternatif', 'kecocokan.id_alternatif = alternatif.id_alternatif', 'left');
    return $this->db->get()->result_array();
  }

  public function PenilaianAlternatif()
  {
    // Ambil data penilaian dan id alternatif
    $id_nilai = $this->input->post('id_nilai');
    $id_alternatif = $this->input->post('id_alternatif');
    $K1 = $this->input->post('K1');
    $K2 = $this->input->post('K2');
    $K3 = $this->input->post('K3');
    $K4 = $this->input->post('K4');
    $K5 = $this->input->post('K5');

    // Update data penilaian alternatif
    $data_penilaian = [
      'id_nilai' => $id_nilai,
      'C1' => $K1,
      'C2' => $K2,
      'C3' => $K3,
      'C4' => $K4,
      'C5' => $K5
    ];
    $this->db->where('id_nilai', $data_penilaian['id_nilai']);
    $this->db->update('tbl_nilai', $data_penilaian);

    // Buat rating kecocokan penilaian alternatif berdasarkan rating kecocokan yang aad di excel
    $KecocokanKriteria1 = $this->KecocokanKriteria1($K1);
    $KecocokanKriteria2 = $this->KecocokanKriteria2($K2);
    $KecocokanKriteria3 = $this->KecocokanKriteria3($K3);
    $KecocokanKriteria4 = $this->KecocokanKriteria4($K4);
    $KecocokanKriteria5 = $this->KecocokanKriteria5($K5);
    $data_kecocokan = [
      'id_alternatif' => $id_alternatif,
      'K1' => $KecocokanKriteria1,
      'K2' => $KecocokanKriteria2,
      'K3' => $KecocokanKriteria3,
      'K4' => $KecocokanKriteria4,
      'K5' => $KecocokanKriteria5,
    ];
    $this->db->where('id_alternatif', $data_kecocokan['id_alternatif']);
    $this->db->update('tbl_kecocokan', $data_kecocokan);
  }

  // Konversi nilai alternatif ke rating kecocokan
  // Kriteria Modal awal
  private function KecocokanKriteria1($K1)
  {
    if ($K1 <= 2500000) {
      $KecocokanK1 = 3;
    } elseif ($K1 <= 3500000) {
      $KecocokanK1 = 2;
    } else {
      $KecocokanK1 = 1;
    }
    return $KecocokanK1;
  }
  // Kriteria Biaya operasional
  private function KecocokanKriteria2($K2)
  {
    if ($K2 <= 6500000) {
      $KecocokanK2 = 3;
    } elseif ($K2 <= 11500000) {
      $KecocokanK2 = 2;
    } else {
      $KecocokanK2 = 1;
    }
    return $KecocokanK2;
  }
  // Kriteria Keuntungan
  private function KecocokanKriteria3($K3)
  {
    if ($K3 <= 3200000) {
      $KecocokanK3 = 1;
    } elseif ($K3 <= 4200000) {
      $KecocokanK3 = 2;
    } else {
      $KecocokanK3 = 3;
    }
    return $KecocokanK3;
  }
  // Kriteria Pesaing
  private function KecocokanKriteria4($K4)
  {
    if ($K4 <= 2) {
      $KecocokanK4 = 3;
    } elseif ($K4 <= 4) {
      $KecocokanK4 = 2;
    } else {
      $KecocokanK4 = 1;
    }
    return $KecocokanK4;
  }
  // Kriteria Peminat
  private function KecocokanKriteria5($K5)
  {
    if ($K5 <= 40) {
      $KecocokanK5 = 1;
    } elseif ($K5 <= 60) {
      $KecocokanK5 = 2;
    } else {
      $KecocokanK5 = 3;
    }
    return $KecocokanK5;
  }

  // Cek jenis kriterianya (Benefit/Cost)
  public function cekKriteria1($data_kriteria)
  {
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[0];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
  }
  public function cekKriteria2($data_kriteria)
  {
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[1];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
    // check($data_kriteria1);
  }
  public function cekKriteria3($data_kriteria)
  {
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[2];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
    // check($data_kriteria1);
  }
  public function cekKriteria4($data_kriteria)
  {
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[3];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
    // check($data_kriteria1);
  }
  public function cekKriteria5($data_kriteria)
  {
    if ($data_kriteria) {
      $data_kriteria1 = $data_kriteria[4];
      if ($data_kriteria1['jenis_kriteria'] == 'Benefit') {
        $jenis = "Benefit";
      } else {
        $jenis = "Cost";
      }
      return $jenis;
    }
    // check($data_kriteria1);
  }

  // Ambil nilai tertinggi/rendah kriteria 1
  public function MaxK1()
  {
    $queryMaxC1 = "SELECT MAX(`K1`) AS `K1`
                    FROM `tbl_kecocokan`
     ";
    return $this->db->query($queryMaxC1)->row_array();
  }
  public function MinK1()
  {
    $queryMinC1 = "SELECT MIN(`K1`) AS `K1`
                    FROM `tbl_kecocokan`
     ";
    return $this->db->query($queryMinC1)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 2
  public function MaxK2()
  {
    $queryMaxC2 = "SELECT MAX(`K2`) AS `K2`
                    FROM `tbl_kecocokan`
     ";
    return $this->db->query($queryMaxC2)->row_array();
  }
  public function MinK2()
  {
    $queryMinC2 = "SELECT MIN(`K2`) AS `K2`
                    FROM `tbl_kecocokan`
     ";
    return $this->db->query($queryMinC2)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 3
  public function MaxK3()
  {
    $queryMaxC3 = "SELECT MAX(`K3`) AS `K3`
                     FROM `tbl_kecocokan`
      ";
    return $this->db->query($queryMaxC3)->row_array();
  }
  public function MinK3()
  {
    $queryMinC3 = "SELECT MIN(`K3`) AS `K3`
                     FROM `tbl_kecocokan`
      ";
    return $this->db->query($queryMinC3)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 4
  public function MaxK4()
  {
    $queryMaxC4 = "SELECT MAX(`K4`) AS `K4`
                      FROM `tbl_kecocokan`
       ";
    return $this->db->query($queryMaxC4)->row_array();
  }
  public function MinK4()
  {
    $queryMinC4 = "SELECT MIN(`K4`) AS `K4`
                      FROM `tbl_kecocokan`
       ";
    return $this->db->query($queryMinC4)->row_array();
  }
  // Ambil nilai tertinggi/rendah kriteria 5
  public function MaxK5()
  {
    $queryMaxC5 = "SELECT MAX(`K5`) AS `K5`
                      FROM `tbl_kecocokan`
       ";
    return $this->db->query($queryMaxC5)->row_array();
  }
  public function MinK5()
  {
    $queryMinC5 = "SELECT MIN(`K5`) AS `K5`
                      FROM `tbl_kecocokan`
       ";
    return $this->db->query($queryMinC5)->row_array();
  }

  // Masukkan hasil saw ke tabel ranking
  public function addPerankingan($data)
  {
    $this->db->truncate('tbl_ranking');
    $this->db->insert_batch('tbl_ranking', $data);
  }

  public function getDataPerankingan()
  {
    $this->db->select('rank.*,a.nama_alternatif');
    $this->db->from('tbl_ranking rank');
    $this->db->join('tbl_alternatif a', 'rank.id_alternatif = a.id_alternatif', 'left');
    $this->db->order_by('rank.total_nilai', 'desc');
    return $this->db->get()->result_array();
  }
}

/* End of file M_Penilaian.php */
