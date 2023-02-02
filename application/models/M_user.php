<?php

class M_user extends CI_Model
{

 public function getProfiel($table, $id)
 {
  if ($table == 'tbl_admin' or $table == 'admin' or $table == 'Admin') {
   return $this->db->get_where('tbl_admin', ['id_user' => $id])->row_array();
  } else if ($table == 'tbl_siswa' or $table == 'siswa' or $table == 'Siswa') {
   return $this->db->get_where('tbl_siswa', ['id_user' => $id])->row_array();
  } else if($table == 'tbl_guru' or $table == 'guru' or $table == 'Guru') {
   return $this->db->get_where('tbl_guru', ['id_user' => $id])->row_array();
  }
 }

 public function getUser($table, $level)
 {
  $this->db->select('*');
  $this->db->from('tbl_user');
  $this->db->join($table, $table . '.id_user = tbl_user.id_user');
  $this->db->where('level', $level);
  $query = $this->db->get()->result_array();
  return $query;
 }

 public function getUserRow($id)
 {
  return $this->db->get_where('tbl_user', ['id_user' => $id])->row_array();
 }

 public function updateUser($level, $status, $id)
 {
  $data = [
   'status' => $status
  ];
  $this->db->where('id_user', $id);
  $this->db->update('tbl_user', $data);
 }

 public function updateProfiel($level, $file = null)
 {
  $id = $this->input->post('id_user');
  if ($level === 'Admin') {
   if ($file != null) {
    $data = [
     'no_induk' => $this->input->post('no_induk', true),
     'nama' => $this->input->post('nama', true),
     'jk' => $this->input->post('jk', true),
     'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
     'tempat_lahir' => $this->input->post('tempat_lahir', true),
     'email' => $this->input->post('email', true),
     'telepon' => $this->input->post('telepon', true),
     'alamat' => $this->input->post('alamat', true),
     'foto' => $file
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_admin', $data);
   } else {
    $data = [
     'no_induk' => $this->input->post('no_induk', true),
     'nama' => $this->input->post('nama', true),
     'jk' => $this->input->post('jk', true),
     'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
     'tempat_lahir' => $this->input->post('tempat_lahir', true),
     'email' => $this->input->post('email', true),
     'telepon' => $this->input->post('telepon', true),
     'alamat' => $this->input->post('alamat', true),
     'foto' =>
     $this->input->post('foto', true),
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_admin', $data);
   }
  }elseif($level === 'Guru'){
   if ($file != null) {
    $data = [
     'no_induk' => $this->input->post('no_induk', true),
     'nama' => $this->input->post('nama', true),
     'jk' => $this->input->post('jk', true),
     'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
     'tempat_lahir' => $this->input->post('tempat_lahir', true),
     'email' => $this->input->post('email', true),
     'telepon' => $this->input->post('telepon', true),
     'alamat' => $this->input->post('alamat', true),
     'foto' => $file
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_guru', $data);
   } else {
    $data = [
     'no_induk' => $this->input->post('no_induk', true),
     'nama' => $this->input->post('nama', true),
     'jk' => $this->input->post('jk', true),
     'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
     'tempat_lahir' => $this->input->post('tempat_lahir', true),
     'email' => $this->input->post('email', true),
     'telepon' => $this->input->post('telepon', true),
     'alamat' => $this->input->post('alamat', true),
     'foto' =>
     $this->input->post('foto', true),
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_guru', $data);
   }
  }else{
   if ($file != null) {
    $data = [
          'no_induk' => $this->input->post('no_induk', true),'nama' => $this->input->post('nama', true),
     'jk' => $this->input->post('jk'),
     'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
     'tempat_lahir' => $this->input->post('tempat_lahir', true),
     'email' => $this->input->post('email', true),
     'telepon' => $this->input->post('telepon', true),
     'alamat' => $this->input->post('alamat', true),
     'foto' => $file
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_siswa', $data);
   } else {
    $data = [
     'no_induk' => $this->input->post('no_induk', true),
     'nama' => $this->input->post('nama', true),
     'jk' => $this->input->post('jk'),
     'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
     'tempat_lahir' => $this->input->post('tempat_lahir', true),
     'email' => $this->input->post('email', true),
     'telepon' => $this->input->post('telepon', true),
     'alamat' => $this->input->post('alamat', true),
     'foto' =>
     $this->input->post('foto', true),
    ];
    $this->db->where('id_user', $id);
    $this->db->update('tbl_siswa', $data);
   }
  }
 }
}
