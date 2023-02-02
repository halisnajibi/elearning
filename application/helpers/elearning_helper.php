<?php
function cek_login()
{
 $ci = get_instance();
 //cek login atau belum
 if (!$ci->session->userdata('id_user')) {
  redirect('auth');
 }
}

function cek_auth()
{
 $ci = get_instance();
 //cek jika sudah login siapa level ya
 if ($ci->session->userdata('level') == 'Siswa') {
  redirect('siswa');
 }else if($ci->session->userdata('level') == 'Guru'){
  redirect('guru');
 }else if($ci->session->userdata('level') == 'Admin'){
 redirect('admin');
 }else{
  redirect('auth');
 }
}

function cek_suka($idPertemuan,$idSiswa){
 $ci = get_instance();
 $ci->db->where('id_pertemuan',$idPertemuan);
 $ci->db->where('id_siswa',$idSiswa);
 $result = $ci->db->get('tbl_suka_pertemuan');
 if($result->num_rows() > 0){
  return "suka";
 }
}

 

 function jumlahSuka($id){
  $ci = get_instance();
  if($ci->db->get_where('tbl_suka_pertemuan',['id_pertemuan' => $id])->num_rows()  > 0){
   return $ci->db->get_where('tbl_suka_pertemuan',['id_pertemuan' => $id])->num_rows();
  }else{
   return '0';
  }

 }

