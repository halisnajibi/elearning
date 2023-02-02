<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_auth extends CI_Model
{
 public function login()
 {
  $username = $this->input->post('username');
  return $this->db->get_where('tbl_user', ['username' => $username])->row_array();
 }
}
