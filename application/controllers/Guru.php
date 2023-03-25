<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
class Guru extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    cek_login();
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
  public function index()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
    $data['ucapan'] = $this->ucapan();
    $this->load->view('template/header', $data);
    $this->load->view('guru/index', $data);
    $this->load->view('template/footer',);
  }


  public function ruangan()
  {
    $this->form_validation->set_rules('nama', 'Nama Ruangan', 'required|trim');
    $this->form_validation->set_rules('kode','Kode Ruangan','required|trim');
    $this->form_validation->set_rules('kelas','kelas','required|trim');
    $this->form_validation->set_rules('keterangan','Keterangan','trim');
    if($this->form_validation->run() == false){
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
    $data['kelas'] = $this->M_guru->getKelas();
    $idGuru = $data['profiel']['id_guru'];
    // membuat pagination
    $config['total_rows'] = $this->M_guru->jumlahRuangan($idGuru);
    $config['per_page'] = 8;
    $this->pagination->initialize($config);
    $data['start'] = $this->uri->segment(3);
    $data['ruangan'] = $this->M_guru->getRuanganPage($idGuru, $config['per_page'], $data['start']);
    $data['jumlah'] = $this->M_guru->jumlahRuangan($idGuru);
    $this->load->view('template/header', $data);
    $this->load->view('guru/ruangan/index', $data);
    $this->load->view('template/footer');
  }else{
$this->M_guru->setRuangan();
$this->session->set_flashdata('pesan', $this->alertSukses('dibuat'));
redirect('guru/ruangan');
  }
  }

  public function cariRuangan()
  {
    $keywoard = $this->input->post('keywoard');
    $output = '';
    if ($keywoard) {
      $data = $this->M_guru->cariRuangan($keywoard);
      if ($data->num_rows() > 0) {
        foreach ($data->result_array() as $row) {
          $output .= '<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y" >
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <a href="' . base_url('guru/detailRuangan/') . $row['id_ruangan'] . '" class="text-3xl font-bold leading-8 " id="nama-ruangan">' . $row['nama_ruangan'] . '</a>
                  <div class="text-base text-gray-600 mt-1">' . $row['kode_ruangan'] . '</div>
                </div>
              </div>
            </div>';
        }
      } else {
        $output .= '<div class="rounded-md flex items-center w-full h-full px-2 py-2 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-full h-full mr-2"></i>ruangan tidak ada </div>';
      }
    } else {
      $session_user = $this->session->userdata('id_user');
      $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
      $idGuru = $data['profiel']['id_guru'];
      $data = $this->M_guru->getRuangan($idGuru);
      foreach ($data as $row) {
        $output .= '<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y" >
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <a href="' . base_url('guru/detailRuangan/') . $row['id_ruangan'] . '" class="text-3xl font-bold leading-8 " id="nama-ruangan">' . $row['nama_ruangan'] . '</a>
                  <div class="text-base text-gray-600 mt-1">' . $row['kode_ruangan'] . '</div>
                </div>
              </div>
            </div>';
      }
    }
    echo $output;
  }

  public function hapusRuangan($id)
  {
    $this->M_guru->hapusRuangan($id);
    $this->session->set_flashdata('pesan', $this->alertSukses('dihapus'));
    redirect('guru/ruangan');
  }

  public function detailRuangan($idRuangan)
  {
    $this->form_validation->set_rules('nama', 'Nama Ruangan', 'required|trim');
    $this->form_validation->set_rules('kode', 'Kode Ruangan', 'required|trim|min_length[5]');
    $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
      $data['kelas'] = $this->M_guru->getKelas();
      $data['ruangan'] = $this->M_guru->getRuanganRow($idRuangan);
      $data['detailRuangan'] = $this->M_guru->getDetailRuangan($idRuangan);
      $this->load->view('template/header', $data);
      $this->load->view('guru/ruangan/detail', $data);
      $this->load->view('template/footer');
    } else {
      $this->M_guru->updateRuangan();
      $this->session->set_flashdata('pesan', $this->alertSukses('diubah'));
      redirect('guru/detailRuangan/' . $idRuangan);
    }
  }



  public function deleteSiswaRuangan($id, $idRuangan)
  {
    $this->M_guru->deleteSiswaRuangan($id);
    $this->session->set_flashdata('pesan', $this->alertSukses('dihapus'));
    redirect('guru/detailRuangan/' . $idRuangan);
  }

  public function updateStatusRuangan($status, $id, $idRuangan)
  {
    $this->M_guru->updateSiswaRuangan($status, $id);
    $this->session->set_flashdata('pesan', $this->alertSukses('diubah'));
    redirect('guru/detailRuangan/' . $idRuangan);
  }


  // MATERI
  public function materi()
  {
    $this->form_validation->set_rules('judul', 'Judul Pertemuan', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
      $data['kelas'] = $this->M_guru->getKelas();
      $data['materi'] = $this->M_guru->getMateri($data['profiel']['id_guru']);
      $data['ruangan'] = $this->M_guru->getRuangan($data['profiel']['id_guru']);
      $this->load->view('template/header', $data);
      $this->load->view('guru/materi/index', $data);
      $this->load->view('template/footer',);
    } else {
      //jika ada file upload
      $file = $_FILES['file']['name'];
      if ($file) {
        $config['upload_path'] = './public/materi/';
        $config['allowed_types'] = 'docx|pdf|ppt|xlsx';
        $config['max_size']     = '2000';
        $this->load->library('upload', $config);
        //lakukan upload
        if ($this->upload->do_upload('file')) {
          $nama_file = $this->upload->data('file_name');
          $this->M_guru->setMateri($nama_file);
          $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
          redirect('guru/materi');
        } else {
          // upload gagal
          $this->session->set_flashdata('pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>' . $this->upload->display_errors() . '</div>');
          redirect('guru/materi');
        }
      } else {
        // jika tidak ada foto
        $this->M_guru->setMateri();
        $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
        redirect('guru/materi');
      }
    }
  }

  public function cariMateri()
  {
    $keywoard = $this->input->post('keywoard');
    $data = $this->M_guru->cariMateri($keywoard);
    echo json_encode($data);
  }

  public function updateMateri()
  {
    $idPer = $this->input->post('id_pertemuan');
    $this->form_validation->set_rules('judul', 'Judul Pertemuan', 'required|trim');
    if ($this->form_validation->run() == false) {
      $this->materiDetail($idPer);
    } else {
      //jika ada file upload
      $file = $_FILES['file']['name'];
      if ($file) {
        $config['upload_path'] = './public/materi/';
        $config['allowed_types'] = 'docx|pdf|ppt|xlsx';
        $config['max_size']     = '2000';
        $this->load->library('upload', $config);
        //lakukan upload
        if ($this->upload->do_upload('file')) {
          $file_lama = $this->input->post('file_lama');
          if($file_lama != 'tidak ada'){
            unlink(FCPATH . 'public/materi/' . $file_lama);
          }
          $nama_file = $this->upload->data('file_name');
          $this->M_guru->updateMateri($nama_file);
          $this->session->set_flashdata('pesan', $this->alertSukses('diubah'));
          redirect('guru/materiDetail/' . $idPer);
        } else {
          // upload gagal
          $this->session->set_flashdata('pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>' . $this->upload->display_errors() . '</div>');
          redirect('guru/materiDetail/' . $idPer);
        }
      } else {
        // jika tidak ada foto
        $this->M_guru->updateMateri();
        $this->session->set_flashdata('pesan', $this->alertSukses('diubah'));
        redirect('guru/materiDetail/' . $idPer);
      }
    }
  }


  public function hapusMateri($id)
  {
    $this->M_guru->deleteMateri($id);
    $this->session->set_flashdata('pesan', $this->alertSukses('dihapus'));
    redirect('guru/materi');
  }


  public function materiDetail($id)
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
    $data['materi'] = $this->M_guru->getMateriRow($data['profiel']['id_guru'], $id);
    $data['ruangan'] = $this->M_guru->getRuangan($data['profiel']['id_guru']);
    $data['statusAbsen'] = $this->M_guru->getBukuAbsen($id);
    $this->load->view('template/header', $data);
    $this->load->view('guru/materi/detail', $data);
    $this->load->view('template/footer');
  }

  // ABSEN
  public function absen()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
    $data['absen'] = $this->M_guru->getAbsen($data['profiel']['id_guru']);
    $data['ruangan'] = $this->M_guru->getRuangan($data['profiel']['id_guru']);
    $this->load->view('template/header', $data);
    $this->load->view('guru/absen/index', $data);
    $this->load->view('template/footer',);
  }

  public function cariAbsen()
  {
    $keywoard = $this->input->post('keywoard');
    $data = $this->M_guru->cariAbsen($keywoard);
    echo json_encode($data);
  }

  public function absenDetail($idBukuA)
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
    $data['absenSiswa'] = $this->M_guru->getAbsen($idBukuA);
    $data['absenrow'] = $this->M_guru->getAbsenRow($idBukuA);
    $this->load->view('template/header', $data);
    $this->load->view('guru/absen/detail', $data);
    $this->load->view('template/footer',);
  }

  public function updateStatusAbsenSiswa()
  {
    $id_siswa = $this->input->post('idsiswa');
    $radioValue = $this->input->post('radioValue');
    $this->M_guru->updateStatusAbsenSiswa($id_siswa, $radioValue);
    $this->session->set_flashdata('pesan', $this->alertSukses('diubah'));
    redirect('guru/materi');
  }


  public function tugas()
  {
    $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
    if ($this->form_validation->run() == false) {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
      $data['tugas'] = $this->M_guru->getTugas($data['profiel']['id_guru']);
      $data['ruangan'] = $this->M_guru->getRuangan($data['profiel']['id_guru']);
      $this->load->view('template/header', $data);
      $this->load->view('guru/tugas/index', $data);
      $this->load->view('template/footer',);
    } else {
      //jika ada file upload
      $file = $_FILES['file']['name'];
      if ($file) {
        $config['upload_path'] = './public/tugas/';
        $config['allowed_types'] = 'docx|pdf|ppt|xlsx';
        $config['max_size']     = '2000';
        $this->load->library('upload', $config);
        //lakukan upload
        if ($this->upload->do_upload('file')) {
          $nama_file = $this->upload->data('file_name');
          $this->M_guru->setTugas($nama_file);
          $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
          redirect('guru/tugas');
        } else {
          // upload gagal
          $this->session->set_flashdata('pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>' . $this->upload->display_errors() . '</div>');
          redirect('guru/tugas');
        }
      } else {
        // jika tidak ada foto
        $this->M_guru->setTugas();
        $this->session->set_flashdata('pesan', $this->alertSukses('ditambah'));
        redirect('guru/tugas');
      }
    }
  }


  public function cariTugas()
  {
    $key = $this->input->post('keywoard');
    $data = $this->M_guru->cariTugas($key);
    echo json_encode($data, true);
  }

  public function tugasDetail($id)
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_guru', $session_user);
    $data['tugas'] = $this->M_guru->getTugas($id);
    $data['siswa'] = $this->M_guru->getTugasRow($id);
    $this->load->view('template/header', $data);
    $this->load->view('guru/tugas/detail', $data);
    $this->load->view('template/footer',);
  }

  public function deleteTugas($id)
  {
    $this->M_guru->deleteTugas($id);
    $this->session->set_flashdata('pesan', $this->alertSukses('dihapus'));
    redirect('guru/tugas');
  }


  public function updateTugas()
  {
    $this->form_validation->set_rules('judul', 'Judul Pertemuan', 'required|trim');
    $idTugas = $this->input->post('id_tugas');
    if ($this->form_validation->run() == false) {
      $this->tugasDetail($idTugas);
    } else {
      //jika ada file upload
      $file = $_FILES['file']['name'];
      if ($file) {
        $config['upload_path'] = './public/tugas/';
        $config['allowed_types'] = 'docx|pdf|ppt|xlsx';
        $config['max_size']     = '2000';
        $this->load->library('upload', $config);
        //lakukan upload
        if ($this->upload->do_upload('file')) {
          $file_lama = $this->input->post('file_lama');
          unlink(FCPATH . 'public/tugas/' . $file_lama);
          $nama_file = $this->upload->data('file_name');
          $this->M_guru->updateTugas($nama_file);
          $this->session->set_flashdata('pesan', $this->alertSukses('diubah'));
          redirect('guru/tugasDetail/'.$idTugas);
        } else {
          // upload gagal
          $this->session->set_flashdata('pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>' . $this->upload->display_errors() . '</div>');
           redirect('guru/tugasDetail/'.$idTugas);
        }
      } else {
        // jika tidak ada foto
        $this->M_guru->updateTugas();
        $this->session->set_flashdata('pesan', $this->alertSukses('diubah'));
         redirect('guru/tugasDetail/'.$idTugas);
      }
    }
  }


  //cetak
  public function cetakRuangan()
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $profiel =  $this->M_user->getProfiel('tbl_guru', $session_user);
    $data = [
      'cetakRuangan' =>  $this->M_guru->getRuangan($profiel['id_guru'])
    ];
    $html = $this->load->view('guru/ruangan/cetak',$data,true);
    $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML($html);
  $mpdf->Output();
  }

  public function cetakMateri($idRuangan)
  {
    $session_user = $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $profiel =  $this->M_user->getProfiel('tbl_guru', $session_user);
    $data = [
      'cetakMateri' => $this->M_guru->getMateriCetak($idRuangan,$profiel['id_guru'])
    ];
    $html = $this->load->view('guru/materi/cetak',$data,true);
    $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML($html);
  $mpdf->Output();
  }

  public function cetakAbsen($idBA)
  {
    $data = [
      'judulAbsen' => $this->M_guru->getJudulAbsen($idBA),
      'cetakAbsen' => $this->M_guru->getAbsen($idBA)
    ];
    $html = $this->load->view('guru/absen/cetak',$data,true);
    $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML($html);
  $mpdf->Output();
  }

  public function cetakTugas($idBT)
  {
    $data = [
      'judulTugas' => $this->M_guru->getTugas($idBT),
      'cetakTugas' => $this->M_guru->getTugasRow($idBT)
    ];
    $html = $this->load->view('guru/tugas/cetak',$data,true);
    $mpdf = new \Mpdf\Mpdf();
  $mpdf->WriteHTML($html);
  $mpdf->Output();
  }
}
