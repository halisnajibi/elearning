<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_login();
  }
  public  function ucapan()
  {
    date_default_timezone_set("Asia/Makassar");

    $b = time();
    $hour = date("G", $b);

    if ($hour >= 0 && $hour <= 11) {
      return "Selamat Pagi";
    } elseif ($hour >= 12 && $hour <= 14) {
      return "Selamat Siang ";
    } elseif ($hour >= 15 && $hour <= 17) {
      return "Selamat Sore ";
    } elseif ($hour >= 17 && $hour <= 18) {
      return "Selamat Petang ";
    } elseif ($hour >= 19 && $hour <= 23) {
      return "Selamat Malam ";
    }
  }


  public function alertSukses($pesan)
  {
    return ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Data berhasil ' . $pesan . '</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>';
  }

  public function index()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
    $data['ucapan'] = $this->ucapan();
    $this->load->view('template/header', $data);
    $this->load->view('siswa/index', $data);
    $this->load->view('template/footer',);
  }

  public function ruangan()
  {
    $this->form_validation->set_rules('nama', 'Nama Ruangan', 'required|trim');
    $this->form_validation->set_rules('kode', 'Kode Ruangan', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
      $data['ucapan'] = $this->ucapan();
      $data['ruangan'] = $this->M_siswa->getRuangan($data['profiel']['id_siswa']);
      $data['ruanganSiswa'] = $this->M_siswa->getRuangan($data['profiel']['id_siswa']);
      $data['jumlah'] = $this->M_siswa->hitungRuangan($data['profiel']['id_siswa']);
      $this->load->view('template/header', $data);
      $this->load->view('siswa/ruangan/index', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_siswa->setRuangan();
      $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
      redirect('siswa/ruangan');
    }
  }


  public function detailRuangan($id)
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
    $data['detailRuangan'] = $this->M_siswa->getDetailRuangan($id);
    $data['ucapan'] = $this->ucapan();
    $this->load->view('template/header', $data);
    $this->load->view('siswa/ruangan/detail', $data);
    $this->load->view('template/footer',);
  }

  public function cariRuangan()
  {
    $session_user = $this->session->userdata('id_user');
    $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
    $idSiswa = $data['profiel']['id_siswa'];
    $keywoard = $this->input->post('keywoard');
    $output = '';
    if ($keywoard) {

      $data = $this->M_siswa->getRuanganRow($keywoard, $idSiswa);
      if ($data->num_rows() > 0) {
        foreach ($data->result_array() as $row) {
          $output .= '<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y" >
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <a href="' . base_url('guru/detailRuangan/') . $row['id_sr'] . '" class="text-3xl font-bold leading-8 " id="nama-ruangan">' . $row['nama_ruangan'] . '</a>
                  <div class="text-base text-gray-600 mt-1">' . $row['tanggal_masuk'] . '</div>
                   <a href="' . base_url('siswa/pertemuan/') . $row['id_ruangan'] . '" class="text-base font-medium text-blue-800">Masuk Ruangan</a>
                </div>
              </div>
            </div>';
        }
      } else {
        $output .= '<div class="rounded-md flex items-center w-full h-full px-2 py-2 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-full h-full mr-2"></i>ruangan tidak ada </div>';
      }
    } else {
      $session_user = $this->session->userdata('id_user');
      $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
      $idSiswa = $data['profiel']['id_siswa'];
      $data = $this->M_siswa->getRuangan($idSiswa);
      foreach ($data as $row) {
        $output .= '<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y" >
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <a href="' . base_url('guru/detailRuangan/') . $row['id_sr'] . '" class="text-3xl font-bold leading-8 " id="nama-ruangan">' . $row['nama_ruangan'] . '</a>
                  <div class="text-base text-gray-600 mt-1">' . $row['tanggal_masuk'] . '</div>
                   <a href="' . base_url('siswa/pertemuan/') . $row['id_ruangan'] . '" class="text-base font-medium text-blue-800">Masuk Ruangan</a>
                </div>
              </div>
            </div>';
      }
    }
    echo $output;
  }



  public function pertemuan($idRuangan)
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
    // $data['komentar'] = $this->M_siswa->getKomentar($id);
    $data['pertemuan'] = $this->M_siswa->getPertemuan($idRuangan);
    if ($data['pertemuan'] != null) {
      $data['pertemuan'] = $this->M_siswa->getPertemuan($idRuangan);
    } else {
      $data['pertemuan'] = '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>Pertemuan Masih Kosong</div>';
    }
    $this->load->view('template/header', $data);
    $this->load->view('siswa/pertemuan/index', $data);
    $this->load->view('template/footer',);
  }

  public function detailPertemuan($idPertemuan)
  {
    $id = $this->input->post('id_pertemuan');
    $this->form_validation->set_rules('komentar', 'Komentar', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
      $data['komentar'] = $this->M_siswa->getKomentar($idPertemuan);
      $data['pertemuan'] = $this->M_siswa->getPertemuanRow($idPertemuan);
      $this->load->view('template/header', $data);
      $this->load->view('siswa/pertemuan/detail', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_siswa->setKomentar();
      redirect('siswa/detailPertemuan/' . $id);
    }
  }

  public function balasKomentar()
  {
    $id = $this->input->post('id_pertemuan');
    $this->M_siswa->balasKomentar();
    redirect('siswa/detailPertemuan/' . $id);
  }

  public function rubahSuka()
  {
    $idPertemuan = $this->input->post('idPertemuan');
    $idSiswa = $this->input->post('idSiswa');
    $data = [
      'id_pertemuan' => $idPertemuan,
      'id_siswa' => $idSiswa
    ];
    $this->db->where('id_pertemuan', $idPertemuan);
    $this->db->where('id_siswa', $idSiswa);
    $result = $this->db->get_where('tbl_suka_pertemuan');
    if ($result->num_rows() < 1) {
      $this->db->insert('tbl_suka_pertemuan', $data);
    } else {
      $this->db->delete('tbl_suka_pertemuan', $data);
    }
  }

  public function komentarPertemuan()
  {
    $id = $this->input->post('idruangan');
    $this->form_validation->set_rules('komentar', 'Komenatar', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
      $data['pertemuan'] = $this->M_siswa->getPertemuan($id);
      $data['ucapan'] = $this->ucapan();
      $this->load->view('template/header', $data);
      $this->load->view('siswa/pertemuan/index', $data);
      $this->load->view('template/footer',);
    } else {
      $this->M_siswa->setKomentar();
      redirect('siswa/pertemuan/' . $id);
    }
  }

  public function absen()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
    $data['ruangan'] = $this->M_siswa->getRuangan($data['profiel']['id_siswa']);
    $this->load->view('template/header', $data);
    $this->load->view('siswa/absen/absenSemua', $data);
    $this->load->view('template/footer');
  }

  public function cariAbsenSemua()
  {
    $key = $this->input->post('keywoard');
    $data = $this->M_siswa->cariAbsen($key);
    echo json_encode($data, true);
  }

  public function pertemuanAbsen($idPertemuan)
  {
    $this->form_validation->set_rules('absen', 'Status Absensi', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
      $data['absen'] = $this->M_siswa->getAbsenRow($idPertemuan);
      $data['absenSiswa'] = $this->M_siswa->getAbsenResult($data['profiel']['id_siswa']);
      $this->load->view('template/header', $data);
      $this->load->view('siswa/absen/absen', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_siswa->setAbsen();
      $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
      $this->session->set_flashdata('cekAbsen', 'sudah_absen');
      redirect('siswa/pertemuanAbsen/' . $idPertemuan);
    }
  }

  public function tugas()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
    $data['ruangan'] = $this->M_siswa->getRuangan($data['profiel']['id_siswa']);
    $this->load->view('template/header', $data);
    $this->load->view('siswa/tugas/index', $data);
    $this->load->view('template/footer');
  }

  public function cariTugas()
  {
    $key = $this->input->post('keywoard');
    $data = $this->M_siswa->cariTugas($key);
    echo json_encode($data, true);
  }

  public function tugasDetail($idTugas)
  {
    $this->form_validation->set_rules('komentar', 'Komentar', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
      $data['tugas'] = $this->M_siswa->getTugasRow($idTugas);
      $data['komentar'] = $this->M_siswa->getKomentarTugas($idTugas);
      $this->load->view('template/header', $data);
      $this->load->view('siswa/tugas/detail', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_siswa->setKomentarTugas();
      $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
      redirect('siswa/tugasDetail/' . $idTugas);
    }
  }

  public function balasKomentarTugas()
  {
    $idTugas = $this->input->post('id_tugas');
    $this->form_validation->set_rules('komentar', 'Komentar', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
      $data['tugas'] = $this->M_siswa->getTugasRow($idTugas);
      $data['komentar'] = $this->M_siswa->getKomentarTugas($idTugas);
      $this->load->view('template/header', $data);
      $this->load->view('siswa/tugas/detail', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_siswa->setKomentarTugasBalas();
      $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
      redirect('siswa/tugasDetail/' . $idTugas);
    }
  }

  public function kerjakanTugas($idTugas)
  {
    $this->form_validation->set_rules('text', 'Text', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
      $data['tugas'] = $this->M_siswa->getTugasRow($idTugas);
      $this->load->view('template/header', $data);
      $this->load->view('siswa/tugas/kerjakan', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_siswa->setTugas();
      $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
      redirect('siswa/tugas/');
    }
  }

  public function tugasFile()
  {
    $idTugas = $this->input->post('id_tugas');
    $file = $_FILES['file']['name'];
    if ($file) {
      $config['upload_path'] = './public/tugas_siswa/';
      $config['allowed_types'] = 'docx|pdf|ppt|xlsx';
      $config['max_size']     = '2000';
      $this->load->library('upload', $config);
      //lakukan upload
      if ($this->upload->do_upload('file')) {
        $nama_file = $this->upload->data('file_name');
        $this->M_siswa->tugasFile($nama_file);
        $this->session->set_flashdata('pesan', $this->alertSukses('diubah'));
      redirect('siswa/tugas');
      } else {
        // upload gagal
        $this->session->set_flashdata('pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>' . $this->upload->display_errors() . '</div>');
        redirect('siswa/kerjakanTugas/'.$idTugas);
      }
    }
  }

  public function riwayatTugas ()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_siswa', $session_user);
    $data['riwayat'] = $this->M_siswa->getRiwayatTugas($data['profiel']['id_siswa']);
    $this->load->view('template/header', $data);
    $this->load->view('siswa/tugas/riwayat', $data);
    $this->load->view('template/footer');
  }
}
