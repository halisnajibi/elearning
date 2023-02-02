<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    //      public function __construct()
    //  {
    //   parent::__construct();
    //   cek_auth();
    //  }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/index');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $pass = $this->input->post('password');
        $query = $this->M_auth->login();
        if ($query !== null) {
            //cek password
            if (password_verify($pass, $query['password'])) {
                //password cocok
                $data = [
                    'id_user' => $query['id_user'],
                    'level' => $query['level']
                ];
                $this->session->set_userdata($data);
                if ($query['status'] == 1) {
                    if ($query['level'] == 'Admin') {
                        $this->session->set_flashdata('login', ' <div class="modal" id="myModal">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Berhasil!</div>
    <div class="text-gray-600 mt-2">Selamat datang di elearning</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
  </div>
 </div>');
                        redirect('admin');
                    } else if ($query['level'] == 'Guru') {
                        $this->session->set_flashdata('login', '<div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Selamat datang di elearning</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
                        redirect('guru');
                    } else {
                        $this->session->set_flashdata('pesan', ' <div class="modal" id="myModal">
     <div class="modal__content">
      <div class="p-5 text-center"> <i data-feather="check-circle" class="w-16 h-16 text-theme-9 mx-auto mt-3"></i>
       <div class="text-3xl mt-5">Berhasil!</div>
       <div class="text-gray-600 mt-2">Selamat datang di elearning</div>
      </div>
      <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 bg-theme-1 text-white">Ok</button> </div>
     </div>
    </div>');
                        redirect('siswa');
                    }
                } else {
                    //akun tidak aktif
                    $this->session->set_flashdata('pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Akun tidak aktif </div>
      ');
                    redirect('auth');
                }
            } else {
                // password salah
                $this->session->set_flashdata('pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i>Password salah</div>');
                redirect('auth');
            }
        } else {
            // akun tidak ada
            $this->session->set_flashdata('pesan', '<div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-6 text-white"> <i data-feather="alert-circle" class="w-6 h-6 mr-2"></i> Akun tidak terdaftar </div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $keys = ['id_user', 'level'];
        $this->session->unset_userdata($keys);
        redirect('auth');
    }
}
