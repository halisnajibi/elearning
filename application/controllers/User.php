<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
   public function profiel($level)
   {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel($level, $session_user);
      $this->load->view('template/header', $data);
      $this->load->view('profiel', $data);
      $this->load->view('template/footer',);
   }

   public function updateProfiel()
   {
     $this->__uAdmin();
   $this->__uGuru();
     $this->__uSiswa();
   }

   private function __uAdmin(){
       $level = $this->input->post('level');
      if ($level === 'Admin') {
         $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
         $this->form_validation->set_rules('no_induk', 'Nis/Nip', 'required|trim');
         if ($this->form_validation->run() == false) {
            $session_user = $this->session->userdata('id_user');
            $session_level = $this->session->userdata('level');
            $data['level'] = $session_level;
            $data['profiel'] = $this->M_user->getProfiel($level, $session_user);
            $this->load->view('template/header', $data);
            $this->load->view('profiel', $data);
            $this->load->view('template/footer',);
         } else {
            //jika ada file upload
            $foto = $_FILES['file']['name'];
            if ($foto) {
               $config['upload_path'] = './public/profiel/';
               $config['allowed_types'] = 'jpeg|jpg|png';
               $config['max_size']     = '1000';
               $this->load->library('upload', $config);
               //lakukan upload
               if ($this->upload->do_upload('file')) {
                  $new_image = $this->upload->data('file_name');
                  $this->M_user->updateProfiel($level, $new_image);
                  $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Data sudah diedit</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
                  redirect('user/profiel/admin');
               } else {
                  $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Gagal!</div>
       <div class="text-gray-600 mt-2">' . $this->upload->display_errors()  . '</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
                  redirect('user/profiel/admin');
               }
            } else {
               // tidak ada dile upload
               $this->M_user->updateProfiel($level);
               $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Data sudah diedit</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
               redirect('user/profiel/admin');
            }
         }
      }
   }

    private function __uGuru(){
       $level = $this->input->post('level');
      if ($level === 'Guru') {
         $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
         $this->form_validation->set_rules('no_induk', 'Nis/Nip', 'required|trim');
         if ($this->form_validation->run() == false) {
            $session_user = $this->session->userdata('id_user');
            $session_level = $this->session->userdata('level');
            $data['level'] = $session_level;
            $data['profiel'] = $this->M_user->getProfiel($level, $session_user);
            $this->load->view('template/header', $data);
            $this->load->view('profiel', $data);
            $this->load->view('template/footer',);
         } else {
            //jika ada file upload
            $foto = $_FILES['file']['name'];
            if ($foto) {
               $config['upload_path'] = './public/profiel/';
               $config['allowed_types'] = 'jpeg|jpg|png';
               $config['max_size']     = '1000';
               $this->load->library('upload', $config);
               //lakukan upload
               if ($this->upload->do_upload('file')) {
                  $new_image = $this->upload->data('file_name');
                  $this->M_user->updateProfiel($level, $new_image);
                  $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Data sudah diedit</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
                  redirect('user/profiel/guru');
               } else {
                  $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Gagal!</div>
       <div class="text-gray-600 mt-2">' . $this->upload->display_errors()  . '</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
                  redirect('user/profiel/guru');
               }
            } else {
               // tidak ada dile upload
               $this->M_user->updateProfiel($level);
               $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Data sudah diedit</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
               redirect('user/profiel/guru');
            }
         }
      }
   }

    private function __uSiswa(){
       $level = $this->input->post('level');
      if ($level === 'Siswa') {
         $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
         $this->form_validation->set_rules('no_induk', 'Nis/Nip', 'required|trim');
         if ($this->form_validation->run() == false) {
            $session_user = $this->session->userdata('id_user');
            $session_level = $this->session->userdata('level');
            $data['level'] = $session_level;
            $data['profiel'] = $this->M_user->getProfiel($level, $session_user);
            $this->load->view('template/header', $data);
            $this->load->view('profiel', $data);
            $this->load->view('template/footer',);
         } else {
            //jika ada file upload
            $foto = $_FILES['file']['name'];
            if ($foto) {
               $config['upload_path'] = './public/profiel/';
               $config['allowed_types'] = 'jpeg|jpg|png';
               $config['max_size']     = '1000';
               $this->load->library('upload', $config);
               //lakukan upload
               if ($this->upload->do_upload('file')) {
                  $new_image = $this->upload->data('file_name');
                  $this->M_user->updateProfiel($level, $new_image);
                  $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Data sudah diedit</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
                  redirect('user/profiel/siswa');
               } else {
                  $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Gagal!</div>
       <div class="text-gray-600 mt-2">' . $this->upload->display_errors()  . '</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
                  redirect('user/profiel/siswa');
               }
            } else {
               // tidak ada dile upload
               $this->M_user->updateProfiel($level);
               $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Data sudah diedit</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
               redirect('user/profiel/siswa');
            }
         }
      }
   }

   public function updateUser($level, $status, $id)
   {
      if ($level === 'guru') {
         $this->M_user->updateUser($level, $status, $id);
         $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Status akun sudah dirubah</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
         redirect('admin/user/guru');
      } else {
         $this->M_user->updateUser($level, $status, $id);
         $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Status akun sudah dirubah</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
         redirect('admin/user/siswa');
      }
   }


   public function updatePassword()
   {
    $this->__passwordAdminU();
    $this->__passwordGuruU();
   }

   private function __passwordAdminU(){
        $level = $this->input->post('level');
      if ($level == 'Admin') {
         $this->form_validation->set_rules('pl', 'Password Lama', 'required|trim');
         $this->form_validation->set_rules('pb', 'Password Baru', 'required|trim|min_length[5]|matches[kp]');
         $this->form_validation->set_rules('kp', 'Konfirmasi Password', 'required|trim|min_length[5]|matches[pb]');
         if ($this->form_validation->run() == false) {
            $session_user = $this->session->userdata('id_user');
            $session_level = $this->session->userdata('level');
            $data['level'] = $session_level;
            $data['profiel'] = $this->M_user->getProfiel($level, $session_user);
            $this->load->view('template/header', $data);
            $this->load->view('profiel', $data);
            $this->load->view('template/footer',);
         } else {
            $session_user = $this->session->userdata('id_user');
            $data['user'] = $this->M_user->getUserRow($session_user);
            //   cek apakah pw lama dari db dan pw baru sama
            $pl = $this->input->post('pl');
            $pb = $this->input->post('pb');
            if (!password_verify($pl, $data['user']['password'])) {
               $this->session->set_flashdata('pwUpdate', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Passwod Lama tidak sesuai </div>
      ');
               redirect('user/profiel/' . $level);
            } else if ($pl == $pb) {
               // cek apakah pl dan pb sama
               $this->session->set_flashdata('pwUpdate', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Passwod Baru tidak boleh sama dengan password lama</div>
      ');
               redirect('user/profiel/' . $level);
            } else {
               //passwod sudah ok
               $password_hash = password_hash($pb, PASSWORD_DEFAULT);
               $this->db->set('password', $password_hash);
               $this->db->where('id_user', $this->session->userdata('id_user'));
               $this->db->update('tbl_user');
               $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Password akun sudah dirubah</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
               redirect('user/profiel/' . $level);
            }
         }
      }
   }

    private function __passwordGuruU(){
        $level = $this->input->post('level');
      if ($level == 'Guru') {
         $this->form_validation->set_rules('pl', 'Password Lama', 'required|trim');
         $this->form_validation->set_rules('pb', 'Password Baru', 'required|trim|min_length[5]|matches[kp]');
         $this->form_validation->set_rules('kp', 'Konfirmasi Password', 'required|trim|min_length[5]|matches[pb]');
         if ($this->form_validation->run() == false) {
            $session_user = $this->session->userdata('id_user');
            $session_level = $this->session->userdata('level');
            $data['level'] = $session_level;
            $data['profiel'] = $this->M_user->getProfiel($level, $session_user);
            $this->load->view('template/header', $data);
            $this->load->view('profiel', $data);
            $this->load->view('template/footer',);
         } else {
            $session_user = $this->session->userdata('id_user');
            $data['user'] = $this->M_user->getUserRow($session_user);
            //   cek apakah pw lama dari db dan pw baru sama
            $pl = $this->input->post('pl');
            $pb = $this->input->post('pb');
            if (!password_verify($pl, $data['user']['password'])) {
               $this->session->set_flashdata('pwUpdate', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Passwod Lama tidak sesuai </div>
      ');
               redirect('user/profiel/' . $level);
            } else if ($pl == $pb) {
               // cek apakah pl dan pb sama
               $this->session->set_flashdata('pwUpdate', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Passwod Baru tidak boleh sama dengan password lama</div>
      ');
               redirect('user/profiel/' . $level);
            } else {
               //passwod sudah ok
               $password_hash = password_hash($pb, PASSWORD_DEFAULT);
               $this->db->set('password', $password_hash);
               $this->db->where('id_user', $this->session->userdata('id_user'));
               $this->db->update('tbl_user');
               $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Password akun sudah dirubah</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
               redirect('user/profiel/' . $level);
            }
         }
      }
   }


   // GURU
   public function guru()
   {
      $session_user = $this->session->userdata('id_user');
      $session_level = $this->session->userdata('level');
      $data['level'] = $session_level;
      $data['profiel'] = $this->M_user->getProfiel('guru', $session_user);
      $this->load->view('template/header', $data);
      $this->load->view('guru/index', $data);
      $this->load->view('template/footer',);
   }

   
  public function download($status,$namaFile)
  {
    if($status === 'materi'){
     $this->load->helper('download');
  force_download("public/materi/$namaFile", NULL);
  }else if($status === 'tugas'){
 $this->load->helper('download');
  force_download("public/tugas/$namaFile", NULL);
  }else{
   $this->load->helper('download');
   force_download("public/tugas_siswa/$namaFile", NULL);
  }
  }
}
