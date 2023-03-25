<?php
defined('BASEPATH') or exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';
class Admin extends CI_Controller
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
  public function index()
  {
    $session_user =  $this->session->userdata('id_user');
    $session_level = $this->session->userdata('level');
    $data['level'] = $session_level;
    $data['profiel'] = $this->M_user->getProfiel('tbl_admin', $session_user);
    $data['ucapan'] = $this->ucapan();
    // $data['jumlahUser'] = $this->M_admin->getJumlahData('tbl_user');
    // $data['jumlahMapel'] = $this->M_admin->getJumlahData('tbl_mapel');
    $this->load->view('template/header', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('template/footer',);
  }
  public function user($level)
  {
    if ($level == 'guru') {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_admin', $session_user);
      $data['userguru'] = $this->M_user->getUser('tbl_guru', 'guru');
      $this->load->view('template/header', $data);
      $this->load->view('admin/guru/index', $data);
      $this->load->view('template/footer',);
    } else {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('tbl_admin', $session_user);
      $data['usersiswa'] = $this->M_user->getUser('tbl_siswa', 'siswa');
      $this->load->view('template/header', $data);
      $this->load->view('admin/siswa/index', $data);
      $this->load->view('template/footer',);
    }
  }
  public function master($level)
  {
    if ($level == 'guru') {
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
      $this->form_validation->set_rules('nip', 'Nip', 'required|trim');
      if ($this->form_validation->run() == false) {
        $session_user = $this->session->userdata('id_user');
        $session_level = $this->session->userdata('level');
        $data['level'] = $session_level;
        $data['profiel'] = $this->M_user->getProfiel('tbl_admin', $session_user);
        $data['master'] = $this->M_admin->getMaster('tbl_guru');
        $this->load->view('template/header', $data);
        $this->load->view('admin/guru/master', $data);
        $this->load->view('template/footer',);
      } else {
        $this->M_admin->setMaster('tbl_guru');
        $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data baru sudah ditambahkan</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
        redirect('admin/master/guru');
      }
    } else if ($level === 'siswa') {
      $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
      $this->form_validation->set_rules('nis', 'Nis', 'required|trim');
      if ($this->form_validation->run() == false) {
        $session_user = $this->session->userdata('id_user');
        $session_level = $this->session->userdata('level');
        $data['level'] = $session_level;
        $data['profiel'] = $this->M_user->getProfiel('tbl_admin', $session_user);
        $data['master'] = $this->M_admin->getMaster('tbl_siswa');
        $this->load->view('template/header', $data);
        $this->load->view('admin/siswa/master', $data);
        $this->load->view('template/footer');
      } else {
        $this->M_admin->setMaster('tbl_siswa');
        $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data baru sudah ditambahkan</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
        redirect('admin/master/siswa');
      }
    } else {
      $this->form_validation->set_rules('kd_mapel', 'Kode Mata Pelajaran', 'required|trim');
      $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required|trim');
      if ($this->form_validation->run() == false) {
        $session_user = $this->session->userdata('id_user');
        $session_level = $this->session->userdata('level');
        $data['level'] = $session_level;
        $data['profiel'] = $this->M_user->getProfiel('tbl_admin', $session_user);
        $data['master'] = $this->M_admin->getMaster('tbl_mapel');
        $this->load->view('template/header', $data);
        $this->load->view('admin/mapel/master', $data);
        $this->load->view('template/footer');
      } else {
        $this->M_admin->setMaster('tbl_mapel');
        $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data baru sudah ditambahkan</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
        redirect('admin/master/mapel');
      }
    }
  }

  public function deleteMaster($table, $id)
  {
    if ($table === 'guru') {
      $this->M_admin->deleteMaster('tbl_guru', $id);
      $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data sudah dihapus</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
      redirect('admin/master/guru');
    } else if ($table == 'siswa') {
      $this->M_admin->deleteMaster('tbl_siswa', $id);
      $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data sudah dihapus</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
      redirect('admin/master/siswa');
    } else {
      $this->M_admin->deleteMaster('tbl_mapel', $id);
      $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data sudah dihapus</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
      redirect('admin/master/mapel');
    }
  }

  public function updateMaster($level)
  {
    if ($level == 'guru') {
      $this->M_admin->updateMaster('tbl_guru');
      $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data sudah diedit</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
      redirect('admin/master/guru');
    } else if ($level == 'siswa') {
      $this->M_admin->updateMaster('tbl_siswa');
      $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data sudah diedit</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
      redirect('admin/master/siswa');
    } else {
      $this->M_admin->updateMaster('tbl_mapel');
      $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Data sudah diedit</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
      redirect('admin/master/mapel');
    }
  }


//cetak
public function cetakGuru()
{
  $data = [
    'cetakGuru' =>  $this->M_user->getUser('tbl_guru', 'guru')
  ];
  $html = $this->load->view('admin/guru/cetak',$data,true);
  $mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
}

public function cetakSiswa()
{
  $data = [
    'cetakSiswa' => $this->M_admin->getMaster('tbl_siswa')
  ];
  $html = $this->load->view('admin/siswa/cetak',$data,true);
  $mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
}

public function cetakMapel()
{
  $data = [
    'cetakmapel' =>  $this->M_admin->getMaster('tbl_mapel')
  ];
  $html = $this->load->view('admin/mapel/cetak',$data,true);
  $mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();
}



}
