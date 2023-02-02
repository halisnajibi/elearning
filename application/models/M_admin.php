<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
 public function getMaster($table)
 {
  return $this->db->get($table)->result_array();
 }
 public function setMaster($table)
 {
  $level = $this->input->post('level');
  if ($level === 'Guru') {
   $nip = $this->input->post('nip');
   // insert tbl_user
   $user = [
    'username' => $this->input->post('nip'),
    'password' => password_hash($nip, PASSWORD_DEFAULT),
    'level' => $level,
    'status' => 1
   ];
   $this->db->insert('tbl_user', $user);

   // insert tbl_guru
   $rowUser = $this->db->get_where('tbl_user', ['username' => $nip])->row_array();
   $id_user = $rowUser['id_user'];
   $data = [
    'no_induk' => $nip,
    'nama' => $this->input->post('nama', true),
    'jk' => $this->input->post('jk', true),
    'email' => $this->input->post('email', true),
    'telepon' => $this->input->post('telepon', true),
    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
    'tempat_lahir' => $this->input->post('tempat_lahir', true),
    'alamat' => $this->input->post('alamat', true),
    'foto' => 'default.png',
    'id_user' => $id_user
   ];
   $this->db->insert($table, $data);
  } else if ($level == 'Siswa') {
   $nis = $this->input->post('nis');
   // insert tbl_user
   $user = [
    'username' => $this->input->post('nis'),
    'password' => password_hash($nis, PASSWORD_DEFAULT),
    'level' => $level,
    'status' => 1
   ];
   $this->db->insert('tbl_user', $user);
   // insert tbl_guru
   $rowUser = $this->db->get_where('tbl_user', ['username' => $nis])->row_array();
   $id_user = $rowUser['id_user'];
   $data = [
    'no_induk' => $nis,
    'nama' => $this->input->post('nama', true),
    'jk' => $this->input->post('jk', true),
    'email' => $this->input->post('email', true),
    'telepon' => $this->input->post('telepon', true),
    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
    'tempat_lahir' => $this->input->post('tempat_lahir', true),
    'alamat' => $this->input->post('alamat', true),
    'foto' => 'default.png',
    'id_user' => $id_user
   ];
   $this->db->insert($table, $data);
  } else {
   $data = [
    'kd_mapel' => $this->input->post('kd_mapel', true),
    'nama_mapel' => $this->input->post('nama_mapel', true)
   ];
   $this->db->insert($table, $data);
  }
 }

 public function deleteMaster($table, $id)
 {
  if ($table == 'tbl_mapel') {
   $this->db->delete($table, ['id_mapel' => $id]);
  } else {
   $this->db->delete($table, ['id_user' => $id]);
   $this->db->delete('tbl_user', ['id_user' => $id]);
  }
 }

 public function updateMaster($table)
 {
  if ($table == 'tbl_guru') {
   $id = $this->input->post('id_guru');
   $data = [
    'no_induk' => $this->input->post('nip', true),
    'nama' => $this->input->post('nama', true),
    'jk' => $this->input->post('jk', true),
    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
    'tempat_lahir' => $this->input->post('tempat_lahir', true),
    'email' => $this->input->post('email', true),
    'telepon' => $this->input->post('telepon', true),
    'alamat' => $this->input->post('alamat', true),
   ];
   $this->db->where('id_guru', $id);
   $this->db->update($table, $data);
  } else if ($table == 'tbl_siswa') {
   $id = $this->input->post('id_siswa');
   $data = [
    'no_induk' => $this->input->post('nis', true),
    'nama' => $this->input->post('nama', true),
    'jk' => $this->input->post('jk', true),
    'tanggal_lahir' => $this->input->post('tanggal_lahir', true),
    'tempat_lahir' => $this->input->post('tempat_lahir', true),
    'email' => $this->input->post('email', true),
    'telepon' => $this->input->post('telepon', true),
    'alamat' => $this->input->post('alamat', true),
   ];
   $this->db->where('id_siswa', $id);
   $this->db->update($table, $data);
  } else {
   $data = [
    'kd_mapel' => $this->input->post('kd_mapel', true),
    'nama_mapel' => $this->input->post('nama_mapel', true)
   ];
   $id = $this->input->post('id_mapel');
   $this->db->where('id_mapel', $id);
   $this->db->update($table, $data);
  }
 }

 // public function getJumlahData($table)
 // {
 //  $query = $this->db->num_rows($table);
 //  return $query;
 // }
}
