
<div class="content">
 <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">
  Tugas <?= $tugas['judul'] ?>
  </h2>
 </div>
 <div class="mt-3">
  <?= $this->session->flashdata('pesan'); ?>
 </div>

 <div class="intro-y datatable-wrapper box p-5 mt-5">
    <form action="<?= base_url('guru/updateTugas') ?>" method="post" enctype="multipart/form-data">
    <h6 class="text-md font-medium text-theme-1">Pengaturan Tugas</h6>
     <input type="hidden" name="id_ruangan" value="<?= $tugas['id_ruangan'] ?>">
      <input type="hidden" name="file_lama" value="<?= $tugas['file'] ?>">
        <input type="hidden" name="id_tugas" value="<?= $tugas['id_tugas'] ?>">
        <input type="hidden" name="id_guru" value="<?= $profiel['id_guru'] ?>">
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
          <div class="col-span-12 sm:col-span-6"> <label>Judul <?= form_error('judul',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="judul tugas" name="judul" value="<?= $tugas['judul'] ?>"> </div>
          <div class="col-span-12 sm:col-span-6"> <label>File <?= form_error('file',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label> <input type="file" class="input w-full border mt-2 flex-1" placeholder="judul tugas" name="file"> </div>
           <div class="col-span-12 sm:col-span-6"> <label>Waktu Mulai <?= form_error('waktu_mulai',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label> <input type="datetime-local" class="input w-full border mt-2 flex-1" placeholder="waktu_mulai" name="waktu_mulai" value="<?= $tugas['waktu_mulai'] ?>"> </div>
             <div class="col-span-12 sm:col-span-6"> <label>Waktu Akhir <?= form_error('waktu_akhir',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label> <input type="datetime-local"" class="input w-full border mt-2 flex-1" placeholder="waktu_akhir" name="waktu_akhir" value="<?= $tugas['waktu_akhir'] ?>"> </div>
             <div class="col-span-12 sm:col-span-6"> <label>Keterangan <?= form_error('keterangan',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label> <textarea name="keterangan" id="editor1" rows="10" cols="80"><?= $tugas['keterangan'] ?></textarea> </div>
           
          <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="submit" class="button w-20 bg-theme-1 text-white -ml-5">Simpan</button> </div>
      </form>
       <div class="px-5 py-3 text-right border-t border-gray-200"> <a href="javascript:;" data-toggle="modal" data-target="#delete-ruangan" class="flex w-32 h-10 rounded-md justify-center items-center bg-theme-6 text-white -ml-5">Hapus Tugas</a> </div>
      </div>
 </div>

 <!-- BEGIN: Datatable -->
 <div class="intro-y datatable-wrapper box p-5 mt-5">
  <h6 class="text-md font-medium text-theme-1">Data Siswa Mengerjakan</h6>
  <div class="text-right mb-3"> <a href="<?= base_url('guru/cetakTugas/').$this->uri->segment(3) ?>" class="button text-white bg-theme-9 shadow-md mr-2 mt-10" target="_blank">Cetak Data</a> </div>
  <table class="table table-report table-report--bordered display datatable w-full">
   <thead>
    <tr>
     <th class="border-b-2 whitespace-no-wrap">No</th>
     <th class="border-b-2 whitespace-no-wrap">Foto</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Nama Siswa</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Nis</th>
     <th class="border-b-2 text-center whitespace-no-wrap">file</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Waktu Kumpul</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php $i = 1;
    foreach ($siswa as $row) : ?>
     <tr>
      <td class="border-b">
       <div class="font-medium whitespace-no-wrap"><?= $i++ ?></div>
      </td>
      <td>
       <div class="intro-x w-10 h-10 image-fit">
        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('public/profiel/') . $row['foto'] ?>">
       </div>
      </td>
      <td class="text-center border-b"><?= $row['nama'] ?></td>
      <td class="text-center border-b"><?= $row['no_induk'] ?></td>
      <td class="text-center border-b">
      <a href="<?= base_url('user/download/tugasKirim/'.$row['file_kirim']) ?>">Download</a>  </td>
      <td class="text-center border-b"><?= $row['waktu_kumpul'] ?></td>
     
      <td class="text-center border-b">
       <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview<?= $row['id_ts'] ?>" class="flex items-center sm:justify-center text-theme-1"> <i data-feather="trash-2" class="w-4 h-4 mr-2"></i>Hapus</a>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
</div>
</div>

<!-- modal delete ruangan -->
<div class="modal" id="delete-ruangan">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Apakah anda yakin?</div>
    <div class="text-gray-600 mt-2">Data akan dihapus secara permanen.</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
    <a href=" <?= base_url('guru/deleteTugas/') . $tugas['id_tugas'] ?>" class=" button w-24 bg-theme-6 text-white">Hapus</a>
   </div>
  </div>

<!-- MODAL DELETE -->
<!-- <?php foreach ($detailRuangan as $row) : ?>
 <div class="modal" id="delete-modal-preview<?= $row['id_sr'] ?>">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Apakah anda yakin?</div>
    <div class="text-gray-600 mt-2">Data akan dihapus secara permanen.</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
    <a href=" <?= base_url('guru/deleteSiswaRuangan/') . $row['id_sr'] . '/' . $row['id_ruangan'] ?>" class=" button w-24 bg-theme-6 text-white">Hapus</a>
   </div>
  </div>
 <?php endforeach; ?> -->




 
<script src="<?= base_url('vendor/temp/') ?>dist/ckeditor/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
  CKEDITOR.replace( 'editor1' ); 
  $('#selectruangan').change(function (){
    if($(this).val() == 0){
      var html ='';
       html +='<p class="" >silahkan cari berdasarkan ruangan</p';
         $("#box").html(html);
    }else{
    $.ajax({
        url:'<?=base_url('guru/cariTugas')?>',
        dataType:'json',
        type: "POST",
        data: {keywoard: $(this).val()},
        success:function(data){
          var html ='';
          for(var i=0; i < data.length;i++){
            html +='<div class="report-box zoom-in mb-3" >';
            html +='<div class="box p-5 " >';
            html +='<a class="text-2xl font-bold leading-8  hover:text-blue-700"  href="tugasDetail/'+data[i].id_tugas+'">'+data[i].judul+'</a>';
            html +='<div class="text-base text-gray-600 mt-1">'+data[i].waktu_mulai+  's/d '+data[i].waktu_akhir+'</div>';
            html +='</div>';
            html +='</div>';
          }
           
          $("#box").html(html);
        }
    });
    }
  })
  </script>