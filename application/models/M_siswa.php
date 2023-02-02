<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{
  public function getRuangan($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_ruangan');
    $this->db->join('tbl_siswa_ruangan', 'tbl_siswa_ruangan.id_ruangan = tbl_ruangan.id_ruangan');
    $this->db->where('tbl_siswa_ruangan.id_siswa', $id);
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function setRuangan()
  {
    $nama = $this->input->post('nama');
    $result = $this->db->get_where('tbl_ruangan', ['nama_ruangan' => $nama])->row_array();
    $data = [
      'id_ruangan' => $result['id_ruangan'],
      'id_siswa' => $this->input->post('id_siswa', true),
      'tanggal_masuk' => date('Y-m-d'),
      'status' => 1
    ];
    $this->db->insert('tbl_siswa_ruangan', $data);
  }

  public function getRuanganRow($key, $id)
  {

    $this->db->select('*');
    $this->db->from('tbl_siswa_ruangan');
    $this->db->join('tbl_ruangan', 'tbl_siswa_ruangan.id_ruangan = tbl_ruangan.id_ruangan');
    $this->db->like('tbl_ruangan.nama_ruangan', $key);
    $this->db->where('tbl_siswa_ruangan.id_siswa', $id);
    $query = $this->db->get();
    return $query;
  }
  public function cekKode($kode)
  {
    return $this->db->get_where('tbl_ruangan', ['kode_ruangan' => $kode])->row_array();
  }

  public function getDetailRuangan($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_siswa_ruangan');
    $this->db->join('tbl_siswa', 'tbl_siswa_ruangan.id_siswa = tbl_siswa.id_siswa');
    $this->db->join('tbl_ruangan', 'tbl_siswa_ruangan.id_ruangan = tbl_ruangan.id_ruangan');
    $this->db->where('tbl_siswa_ruangan.id_sr', $id);
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function hitungRuangan($id)
  {
    return $this->db->get_where('tbl_siswa_ruangan', ['id_siswa' => $id])->num_rows();
  }

  public function getPertemuan($id)
  {
    $this->db->select('*');
    $this->db->from('tbl_pertemuan');
    // $this->db->join('tbl_buku_absen', 'tbl_buku_absen.id_pertemuan = tbl_pertemuan.id_pertemuan');
    $this->db->where('tbl_pertemuan.id_ruangan', $id);
    $query = $this->db->get()->num_rows();
    if ($query > 0) {
      $this->db->select('*');
      $this->db->from('tbl_pertemuan');
      //$this->db->join('tbl_buku_absen', 'tbl_buku_absen.id_pertemuan = tbl_pertemuan.id_pertemuan');
      $this->db->where('tbl_pertemuan.id_ruangan', $id);
      $query = $this->db->get()->result_array();
      return $query;
    } else {
      return $query;
    }
  }

public function getPertemuanRow($id)
{
  $this->db->select('*');
  $this->db->from('tbl_guru');
  $this->db->join('tbl_pertemuan', 'tbl_pertemuan.id_guru = tbl_guru.id_guru');
  $this->db->where('tbl_pertemuan.id_pertemuan', $id);
  $query = $this->db->get()->row_array();
  return $query;
}

  public function getKomentar($id)
  {
    return $this->db->get_where('tbl_komentar_materi', ['id_pertemuan' => $id])->result_array();
  }

  public function setKomentar()
  {
    $data = [
      'id_pertemuan' => $this->input->post('id_pertemuan'),
      'komentar' => $this->input->post('komentar', true),
      'dibuat' => date("Y-m-d H:i:s"),
      'status' => 'terkirim',
      'id_parent' => 0,
      'nama' => $this->input->post('nama'),
      'foto' => $this->input->post('foto'),
    ];
    $this->db->insert('tbl_komentar_materi', $data);
  }

  public function balasKomentar()
  {
    $data = [
      'id_pertemuan' => $this->input->post('id_pertemuan'),
      'komentar' => $this->input->post('komentar', true),
      'dibuat' => date("Y-m-d H:i:s"),
      'status' => 'terkirim',
      'id_parent' => $this->input->post('id_pertemuan'),
      'nama' => $this->input->post('nama'),
      'foto' => $this->input->post('foto'),
    ];
    $this->db->insert('tbl_komentar_materi', $data);
  }

public function getAbsenRow($id)
{
  return $this->db->get_where('tbl_buku_absen',['id_pertemuan' => $id])->row_array();
}

public function setAbsen()
{
  $data = [
    'id_buku_absen' => $this->input->post('id_buku_absen'),
    'id_siswa' => $this->input->post('id_siswa'),
    'status' => $this->input->post('absen'),
    'waktu_absen' => date("Y-m-d H:i:s"),
    'keterangan' => 'berhasil'
  ];
  $this->db->insert('tbl_absen_siswa',$data);
}

public function getAbsenResult($idSiswa)
{
   return $this->db->get_where('tbl_absen_siswa',['id_siswa' => $idSiswa])->result_array();
}

public function cekAbsen($idBuku,$idSiswa)
{
 return $this->db->get_where('tbl_absen_siswa',['id_buku_absen' => $idBuku,'id_siswa' => $idSiswa])->num_rows();
}

public function cariAbsen($key)
{
  $this->db->select('*');
  $this->db->from('tbl_absen_siswa');
  $this->db->join('tbl_buku_absen', 'tbl_absen_siswa.id_buku_absen = tbl_buku_absen.id_buku_absen');
  $this->db->where('tbl_buku_absen.id_ruangan', $key);
  $query = $this->db->get()->result_array();
  return $query;
}

public function cariTugas($key)
{
  $this->db->select('*');
  $this->db->from('tbl_buku_tugas');
  $this->db->join('tbl_guru', 'tbl_buku_tugas.id_guru = tbl_guru.id_guru');
  $this->db->where('tbl_buku_tugas.id_ruangan', $key);
  $query = $this->db->get()->result_array();
  return $query;
}

public function getTugasRow($id)
{
  $this->db->select('*');
  $this->db->from('tbl_buku_tugas');
  $this->db->join('tbl_guru', 'tbl_buku_tugas.id_guru = tbl_guru.id_guru');
  $this->db->where('tbl_buku_tugas.id_tugas', $id);
  $query = $this->db->get()->row_array();
  return $query;
}

public function getKomentarTugas($id)
{
  return $this->db->get_where('tbl_komentar_tugas',['id_tugas' => $id])->result_array();
}

public function setKomentarTugas()
{
  $data = [
    'id_tugas' => $this->input->post('id_tugas'),
    'komentar' => $this->input->post('komentar', true),
    'dibuat' => date("Y-m-d H:i:s"),
    'status' => 'terkirim',
    'id_parent' => 0,
    'nama' => $this->input->post('nama'),
    'foto' => $this->input->post('foto'),
  ];
  $this->db->insert('tbl_komentar_tugas', $data);
}

public function setKomentarTugasBalas ()
{
  $data = [
    'id_tugas' => $this->input->post('id_tugas'),
    'komentar' => $this->input->post('komentar', true),
    'dibuat' => date("Y-m-d H:i:s"),
    'status' => 'terkirim',
    'id_parent' => $this->input->post('id_tugas'),
    'nama' => $this->input->post('nama'),
    'foto' => $this->input->post('foto'),
  ];
  $this->db->insert('tbl_komentar_tugas', $data);
}

public function cekTugas($idtugas,$idSiswa)
{
  return $this->db->get_where('tbl_tugas_siswa',['id_tugas' => $idtugas,'id_siswa' => $idSiswa])->num_rows();
}

public function setTugas()
{
  $data = [
    'id_tugas' => $this->input->post('id_tugas'),
    'id_siswa' => $this->input->post('id_siswa'),
    'waktu_kumpul' =>date("Y-m-d H:i:s"),
    'file_kirim' => 'tidak ada',
    'essay' => $this->input->post('text')
  ];
  $this->db->insert('tbl_tugas_siswa',$data);
}

public function tugasFile($file)
{
  $data = [
    'id_tugas' => $this->input->post('id_tugas'),
    'id_siswa' => $this->input->post('id_siswa'),
    'waktu_kumpul' =>date("Y-m-d H:i:s"),
    'file_kirim' => $file,
    'essay' => 'kosong'
  ];
  $this->db->insert('tbl_tugas_siswa',$data);
}

public function getRiwayatTugas($idSiswa)
{
  $this->db->select('*');
  $this->db->from('tbl_tugas_siswa');
  $this->db->join('tbl_buku_tugas', 'tbl_tugas_siswa.id_tugas = tbl_buku_tugas.id_tugas');
  $this->db->where('tbl_tugas_siswa.id_siswa', $idSiswa);
  $query = $this->db->get()->result_array();
  return $query;
}

}
