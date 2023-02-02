<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
 public function getKelas()
 {
  return $this->db->get('tbl_kelas')->result_array();
 }

 public function getRuanganPage($id, $limit, $start)
 {
  $query = $this->db->where('id_guru', $id);
  $query = $this->db->get('tbl_ruangan', $limit, $start)->result_array();
  return $query;
 }

 public function getRuangan($id)
 {
  $query = $this->db->where('id_guru', $id);
  $query = $this->db->get('tbl_ruangan')->result_array();
  return $query;
 }

  public function getRuanganRow($id)
 {
  $query = $this->db->where('id_ruangan', $id);
  $query = $this->db->get('tbl_ruangan')->row_array();
  return $query;
 }

 public function cariRuangan($key)
 {
return $this->db->select('*')->like('nama_ruangan',$key)->get('tbl_ruangan');
 }

 public function setRuangan()
 {
  $data = [
   'id_guru' => $this->input->post('id_guru', true),
   'id_kelas' => $this->input->post('kelas', true),
   'nama_ruangan' => $this->input->post('nama', true),
   'kode_ruangan' => $this->input->post('kode', true),
   'dibuat' => date('Y-m-d'),
   'keterangan' => $this->input->post('keterangan')
  ];
  $this->db->insert('tbl_ruangan', $data);
 }

 public function updateRuangan()
 {
  $id = $this->input->post('id_ruangan');
  $data = [
   'id_guru' => $this->input->post('id_guru', true),
   'id_kelas' => $this->input->post('kelas', true),
   'nama_ruangan' => $this->input->post('nama', true),
   'kode_ruangan' => $this->input->post('kode', true),
   'dibuat' => date('Y-m-d'),
   'keterangan' => $this->input->post('keterangan')
  ];
  $this->db->where('id_ruangan', $id);
  $this->db->update('tbl_ruangan', $data);
 }

 public function getDetailRuangan($id)
 {
  $this->db->select('*');
  $this->db->from('tbl_siswa');
  $this->db->join('tbl_siswa_ruangan', 'tbl_siswa_ruangan.id_siswa = tbl_siswa.id_siswa');
  $this->db->where('tbl_siswa_ruangan.id_ruangan', $id);
  $query = $this->db->get()->result_array();
  return $query;
 }

public function hapusRuangan($id)
{
   $this->db->where('id_ruangan',$id);
   $this->db->delete('tbl_ruangan');
}

 public function deleteSiswaRuangan($id)
 {
  $this->db->where('id_sr', $id);
  $this->db->delete('tbl_siswa_ruangan');
 }

 public function jumlahRuangan($id)
 {
  return $this->db->get_where('tbl_ruangan', ['id_guru' => $id])->num_rows();
 }

 public function updateSiswaRuangan($status, $id)
 {
  $data = [
   'status' => $status
  ];
  $this->db->where('id_sr', $id);
  $this->db->update('tbl_siswa_ruangan', $data);
 }

 public function getMateri($id)
 {
 $this->db->select('*');
  $this->db->from('tbl_ruangan');
  $this->db->join('tbl_pertemuan', 'tbl_pertemuan.id_ruangan = tbl_ruangan.id_ruangan');
  $this->db->where('tbl_pertemuan.id_guru', $id);
  $query = $this->db->get()->result_array();
  return $query;
 }

public function getMateriRow($idGuru,$id)
 {
 $this->db->select('*');
  $this->db->from('tbl_ruangan');
  $this->db->join('tbl_pertemuan', 'tbl_pertemuan.id_ruangan = tbl_ruangan.id_ruangan');
  $this->db->where('tbl_pertemuan.id_guru', $idGuru);
  $this->db->where('tbl_pertemuan.id_pertemuan', $id);
  $query = $this->db->get()->row_array();
  return $query;
 }

public function cariMateri($key)
{
   if($key == 0){
      return 'data ksoonh';
   }else{
   return $this->db->select('*')->like('id_ruangan',$key)->get('tbl_pertemuan')->result_array();
   }

}

 public function setMateri($file = null)
 {
    $idGuru = $this->input->post('id_guru');
    $absen = $this->input->post('absen',true);
  if($file != null){
   $data = [
'id_ruangan' =>$this->input->post('ruangan',true),
'id_guru' =>$this->input->post('id_guru',true),
'judul_pertemuan' =>$this->input->post('judul',true),
'tanggal_pertemuan' =>$this->input->post('tanggal_pertemuan',true),
'materi' => $this->input->post('materi',true),
'file' => $file,
'status' => 'terkirim',
'status_absen' => $absen
   ];
   $this->db->insert('tbl_pertemuan',$data);
   if($absen == 'Ya'){
   $this->setAbsen($idGuru);
   }
  }else{
      $data = [
'id_ruangan' =>$this->input->post('ruangan',true),
'id_guru' =>$this->input->post('id_guru',true),
'judul_pertemuan' =>$this->input->post('judul',true),
'tanggal_pertemuan' =>$this->input->post('tanggal_pertemuan',true),
'materi' => $this->input->post('materi',true),
'file' => 'tidak ada',
'status' => 'terkirim',
'status_absen' => $absen
   ];
   $this->db->insert('tbl_pertemuan',$data);
  if($absen == 'Ya'){
   $this->setAbsen($idGuru);
   }
  }
 }


 public function updateMateri($file = null)
 {
  $id = $this->input->post('id_pertemuan');
  if($file != null){
   $data = [
'id_ruangan' =>$this->input->post('id_ruangan',true),
'id_guru' =>$this->input->post('id_guru',true),
'judul_pertemuan' =>$this->input->post('judul',true),
'tanggal_pertemuan' =>$this->input->post('tanggal_pertemuan',true),
'materi' => $this->input->post('materi',true),
'file' => $file,
'status' => 'terkirim',
   ];
   $this->db->where('id_pertemuan',$id);
   $this->db->update('tbl_pertemuan',$data);
    if($this->input->post('absen') == 'Ya'){
      $cek = $this->db->get_where('tbl_buku_absen',['id_pertemuan' => $id])->num_rows();
      if($cek > 0){
         // update
         $absen = [
            'id_pertemuan' => $id,
            'id_ruangan' => $this->input->post('id_ruangan'),
            'tanggal' => $this->input->post('tanggal_absen'),
            'jam_mulai' => $this->input->post('jm'),
            'jam_akhir' => $this->input->post('ja')
         ];
         $this->db->where('id_pertemuan',$id);
         $this->db->update('tbl_buku_absen',$absen);
      }else{
         //insert
         $this->db->where('id_pertemuan',$id);
         $this->db->update('tbl_pertemuan',['status_absen' => $this->input->post('absen')]);
         $absen = [
            'id_pertemuan' => $id,
            'id_ruangan' => $this->input->post('id_ruangan'),
            'tanggal' => $this->input->post('tanggal_absen'),
            'jam_mulai' => $this->input->post('jm'),
            'jam_akhir' => $this->input->post('ja')
         ];
         $this->db->insert('tbl_buku_absen',$absen);
      }
   }else{
       $cek = $this->db->get_where('tbl_buku_absen',['id_pertemuan' => $id])->num_rows();
      if($cek > 0){
         // hapus
         $this->db->delete('tbl_buku_absen',['id_pertemuan' => $id]);
         $this->db->where('id_pertemuan',$id);
         $this->db->update('tbl_pertemuan',['status_absen' => $this->input->post('absen')]);
      }else{
         //ga terj
      }
   }
  }else{
      $data = [
'id_ruangan' =>$this->input->post('id_ruangan',true),
'id_guru' =>$this->input->post('id_guru',true),
'judul_pertemuan' =>$this->input->post('judul',true),
'tanggal_pertemuan' =>$this->input->post('tanggal_pertemuan',true),
'materi' => $this->input->post('materi',true),
'file' => $this->input->post('file_lama'),
'status' => 'terkirim',
   ];
  $this->db->where('id_pertemuan',$id);
   $this->db->update('tbl_pertemuan',$data);
    if($this->input->post('absen') == 'Ya'){
      $cek = $this->db->get_where('tbl_buku_absen',['id_pertemuan' => $id])->num_rows();
      if($cek > 0){
         // update
         $absen = [
            'id_pertemuan' => $id,
            'id_ruangan' => $this->input->post('id_ruangan'),
            'tanggal' => $this->input->post('tanggal_absen'),
            'jam_mulai' => $this->input->post('jm'),
            'jam_akhir' => $this->input->post('ja')
         ];
         $this->db->where('id_pertemuan',$id);
         $this->db->update('tbl_buku_absen',$absen);
      }else{
         //insert
         $this->db->where('id_pertemuan',$id);
         $this->db->update('tbl_pertemuan',['status_absen' => $this->input->post('absen')]);
         $absen = [
            'id_pertemuan' => $id,
            'id_ruangan' => $this->input->post('id_ruangan'),
            'tanggal' => $this->input->post('tanggal_absen'),
            'judul_pertemuan' => $this->input->post('judul'),
            'jam_mulai' => $this->input->post('jm'),
            'jam_akhir' => $this->input->post('ja')
         ];
         $this->db->insert('tbl_buku_absen',$absen);
      }
   }else{
       $cek = $this->db->get_where('tbl_buku_absen',['id_pertemuan' => $id])->num_rows();
      if($cek > 0){
         // hapus
         $this->db->delete('tbl_buku_absen',['id_pertemuan' => $id]);
         $this->db->where('id_pertemuan',$id);
         $this->db->update('tbl_pertemuan',['status_absen' => $this->input->post('absen')]);
      }else{
         //ga terj
      }
   }
  }
 }

 public function deleteMateri($id)
 {
  $this->db->where('id_pertemuan',$id);
  $this->db->delete('tbl_pertemuan');
 }




public function getAbsen($id)
{
 $this->db->select('*');
  $this->db->from('tbl_siswa');
  $this->db->join('tbl_absen_siswa', 'tbl_absen_siswa.id_siswa = tbl_siswa.id_siswa');
  $this->db->where('tbl_absen_siswa.id_buku_absen', $id);
  $query = $this->db->get()->result_array();
  return $query;
}

public function getAbsenRow($id)
{
 $this->db->select('*');
  $this->db->from('tbl_siswa');
  $this->db->join('tbl_absen_siswa', 'tbl_absen_siswa.id_siswa = tbl_siswa.id_siswa');
  $this->db->where('tbl_absen_siswa.id_buku_absen', $id);
  $query = $this->db->get()->row_array();
  return $query;
}

public function cariAbsen($key)
{
    return $this->db->select('*')->like('id_ruangan',$key)->get('tbl_buku_absen')->result_array();
}

public function updateStatusAbsenSiswa($id,$radio)
{
   $data = [
      'status' => $radio,
      'keterangan' => 'edit'
   ];
   $this->db->where('id_siswa',$id);
   $this->db->update('tbl_absen_siswa',$data);
}

// TUGAS
public function getTugas($id)
{
   $this->db->select('*');
  $this->db->from('tbl_ruangan');
  $this->db->join('tbl_buku_tugas', 'tbl_buku_tugas.id_ruangan = tbl_ruangan.id_ruangan');
  $this->db->where('tbl_buku_tugas.id_tugas', $id);
  $query = $this->db->get()->row_array();
  return $query;
}

public function getTugasRow($id)
{
   $this->db->select('*');
  $this->db->from('tbl_siswa');
  $this->db->join('tbl_tugas_siswa', 'tbl_tugas_siswa.id_siswa = tbl_siswa.id_siswa');
  $this->db->where('tbl_tugas_siswa.id_tugas', $id);
  $query = $this->db->get()->result_array();
  return $query;
}

public function cariTugas($key)
{
   return $this->db->select('*')->like('id_ruangan',$key)->get('tbl_buku_tugas')->result_array();
}

public function setTugas($file = null)
{
   if($file != null){
      $data = [
      'id_guru' => $this->input->post('id_guru',true),
      'id_ruangan' =>$this->input->post('ruangan',true),
      'judul' => $this->input->post('judul',true),
      'waktu_mulai' => $this->input->post('waktu_mulai',true),
      'waktu_akhir' => $this->input->post('waktu_akhir',true),
       'keterangan' => $this->input->post('keterangan'),
       'file' => $file,
       'status' => 1
      ];
      $this->db->insert('tbl_buku_tugas',$data);
   }else{
       $data = [
      'id_guru' => $this->input->post('id_guru',true),
      'id_ruangan' =>$this->input->post('ruangan',true),
      'judul' => $this->input->post('judul',true),
      'waktu_mulai' => $this->input->post('waktu_mulai',true),
      'waktu_akhir' => $this->input->post('waktu_akhir',true),
       'keterangan' => $this->input->post('keterangan'),
       'file' => 'tidak ada',
       'status' => 1
      ];
      $this->db->insert('tbl_buku_tugas',$data);
   }
}

public function deleteTugas($id)
{
   $this->db->where('id_tugas',$id);
   $this->db->delete('tbl_buku_tugas');
}


 public function updateTugas($file = null)
 {
  $id = $this->input->post('id_tugas');
  if($file != null){
   $data = [
      'id_guru' =>$this->input->post('id_guru',true),
'id_ruangan' =>$this->input->post('id_ruangan',true),
 'judul' => $this->input->post('judul',true),
      'waktu_mulai' => $this->input->post('waktu_mulai',true),
      'waktu_akhir' => $this->input->post('waktu_akhir',true),
'keterangan' => $this->input->post('keterangan',true),
'file' => $file,
'status' => 1,
   ];
   $this->db->where('id_tugas',$id);
   $this->db->update('tbl_buku_tugas',$data);
  }else{
    $data = [
      'id_guru' =>$this->input->post('id_guru',true),
'id_ruangan' =>$this->input->post('id_ruangan',true),
 'judul' => $this->input->post('judul',true),
      'waktu_mulai' => $this->input->post('waktu_mulai',true),
      'waktu_akhir' => $this->input->post('waktu_akhir',true),
'keterangan' => $this->input->post('keterangan',true),
'file' => $this->input->post('file_lama',true),
'status' => 1,
   ];
   $this->db->where('id_tugas',$id);
   $this->db->update('tbl_buku_tugas',$data);
  }
 }
}
