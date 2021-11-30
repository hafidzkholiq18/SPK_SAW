<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
  public function registrasi($data_registrasi)
  {
    $this->db->insert('tbl_user', $data_registrasi);
  }
}

/* End of file M_User.php */
