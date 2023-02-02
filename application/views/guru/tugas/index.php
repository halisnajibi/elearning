<div class="content">
 <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">
   Data Tugas Berdasarkan Ruangan
  </h2>
  <select class="input w-1/2 border mt-2 flex-1 mx-2" name="ruangan" id="selectruangan">
 <option value="0">-- Pilih --</option>
 <?php foreach($ruangan as $k): ?>
<option value="<?= $k['id_ruangan'] ?>"><?= $k['nama_ruangan'] ?></option>
<?php endforeach; ?>
 </select> 
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
   <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#tambah" class="button text-white bg-theme-1 shadow-md mr-2 mt-10">Tambah Tugas</a> </div>
  </div>
 </div>
 
 <div class="mt-3">
  <?= $this->session->flashdata('pesan'); ?>
 </div>
 <!-- BEGIN: Datatable -->

  <div class="mb-5" id="card-ruangan">
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y " id="box">
              <p>silahkan cari berdasarkan ruangan</p>
              </div>
            </div>
        </div>
 </div>
</div>

<!-- MODAL TAMBAH -->

<div class="modal" id="tambah">
 <div class="modal__content modal__content--xl p-10">
  <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
   <h2 class="font-medium text-base mr-auto">Form Tambah</h2>
  </div>
  <form action="" method="post"  enctype="multipart/form-data">
   <input type="hidden" name="id_guru" value="<?= $profiel['id_guru'] ?>">
   <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-12 sm:col-span-6"> <label>Judul <?= form_error('judul',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?> </label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="judul" name="judul">
   </div>
    <div class="col-span-12 sm:col-span-6"> <label>Nama Ruangan</label> <select class="select2 w-full border mt-2 flex-1" name="ruangan">
     <option value="">-- Pilih --</option>
     <?php foreach($ruangan as $r) :?>
      <option value="<?= $r['id_ruangan'] ?>"><?= $r['nama_ruangan'] ?></option>
      <?php endforeach; ?>
     </select> 
    </div>
    <div class="col-span-12 sm:col-span-6">
       <label>Waktu Mulai</label> <input type="datetime-local" class="input w-full border mt-2 flex-1" placeholder="tanggal_pertemuan" name="waktu_mulai">
   </div>
    <div class="col-span-12 sm:col-span-6">
       <label>Waktu Akhir</label> <input type="datetime-local" class="input w-full border mt-2 flex-1" placeholder="tanggal_pertemuan" name="waktu_akhir">
   </div>
    <div class="col-span-12 sm:col-span-12"> 
      <label>File</label> <input type="file" class="input w-full border mt-2 flex-1" placeholder="file" name="file"> 
    </div>
    
    <div class="col-span-12"><label for="">Keterangan</label>
     <textarea name="keterangan" id="editor1" rows="10" cols="80"></textarea>
   </div>
  </div>

<div class="px-5 py-3 text-right border-t border-gray-200">
      <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button>
  </div>
  </form>
  </div>
</div>




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
          console.log(data);
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