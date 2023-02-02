  <?= $this->session->flashdata('pesan'); ?>
<div class="content">
   <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
                    <h2 class="text-lg font-medium mr-auto">
                        Detail Materi
                    </h2>
                </div>
                <div class="intro-y grid grid-cols-12 gap-6 mt-5">
                    <!-- BEGIN: Blog Layout -->
                    <div class="intro-y blog col-span-12 md:col-span-12 box">
                        <div class="blog__preview image-fit">
                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="<?= base_url('public/sampul materi/') ?>/ehud-neuhaus-esCc1qx6TVw-unsplash (1).jpg">
                            <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                                <div class="w-10 h-10 flex-none image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('public/profiel/').$profiel['foto'] ?>">
                                </div>
                                <div class="ml-3 text-white mr-auto">
                                    <a href="" class="font-medium"><?= $profiel['nama']  ?></a> 
                                    <div class="text-xs"><?= $materi['tanggal_pertemuan'] ?></div>
                                </div>
                                <div class="dropdown relative ml-3">
                                    <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                                    <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a  href="javascript:;" data-toggle="modal" data-target="#edit" class="flex  items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> Edit Materi </a>
                                            <a href="javascript:;" data-toggle="modal" data-target="#delete-materi" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Hapus Materi </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="blog__category px-2 py-1 rounded">nama mapel</span> <p class="block font-medium text-xl mt-3"><?= $materi['judul_pertemuan'] ?></p> </div>
                        </div>
                        <div class="p-5 text-gray-700"><?= $materi['materi'] ?></div>
                        <div class="flex items-center px-5 py-3 border-t border-gray-200">
                         <?php if($materi['file'] != 'tidak ada'): ?>
                            <a href="<?= base_url('user/download/materi/').$materi['file'] ?>" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download Materi"> <i data-feather="share" class="w-3 h-3"></i> </a>
                            <?php endif; ?>
                        </div>
                        <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                            <div class="w-full flex text-gray-600 text-xs sm:text-sm">
                                <div class="mr-2"> Komen: <span class="font-medium">154</span> </div>
                                <div class="mr-2"> Melihat: <span class="font-medium">47k</span> </div>
                                <div class="ml-auto"> Suka: <span class="font-medium">23k</span> </div>
                            </div>
                            <div class="w-full flex items-center mt-3">
                                <div class="w-8 h-8 flex-none image-fit mr-3">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('public/profiel/').$profiel['foto'] ?>">
                                </div>
                                <div class="flex-1 relative text-gray-700">
                                    <input type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="Post a comment...">
                                    <i data-feather="smile" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>

<!-- modal edit -->
<div class="modal" id="edit">
  <div class="modal__content modal__content--xl">
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Form Edit Materi</h2>
    </div>
    <form action="<?= base_url('guru/updateMateri') ?>" method="post"  enctype="multipart/form-data">
    <input type="text" name="id_pertemuan"  value="<?= $materi['id_pertemuan'] ?>">
        <input type="text" name="file_lama"  value="<?= $materi['file'] ?>">
          <input type="text" name="id_ruangan"  value="<?= $materi['id_ruangan'] ?>">
      <input type="hidden" name="id_guru" value="<?= $profiel['id_guru'] ?>">
        <input type="hidden" name="id_materi" value="<?= $materi['id_pertemuan'] ?>">
      <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
        <div class="col-span-12 sm:col-span-6"> <label>Judul Pertemuan <?= form_error('judul',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?> </label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="judul materi" name="judul" value="<?=$materi['judul_pertemuan']?>"> </div>
        <div class="col-span-12 sm:col-span-6"> <label >Tanggal Pertemuan</label> <input type="date" class="input w-full border mt-2 flex-1" placeholder="kode ruangan" name="tanggal_pertemuan" value="<?=$materi['tanggal_pertemuan']?>"> </div>
             <div class="col-span-12"><label for="">Materi</label>
     <textarea name="materi" id="materi" rows="10" cols="80"><?= $materi['materi'] ?></textarea>
     </div>
   <div class="col-span-12 mb-2">
       <label>File <?= form_error('file',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?> </label> <input type="file" class="input w-full border mt-2 flex-1" placeholder="file materi" name="file"">
   </div>
   <div class="col-span-12 mb-3">
    <?php if($materi['status_absen'] == 'Ya') :?>
    <div class="mt-3"> <label>Status Absen</label>
     <div class="flex flex-col sm:flex-row mt-2">
         <div class="flex items-center text-gray-700 mr-2"> <input type="radio" class="input border mr-2" id="horizontal-radio-chris-evans" checked name="absen" value="Ya"  onclick="displayResult(this.value)" > <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Ya</label> </div>
         <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio" class="input border mr-2" id="horizontal-radio-liam-neeson" name="absen" value="Tidak"  onclick="displayResult(this.value)"> <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">Tidak</label> </div>
     </div>
    </div>
    <?php else: ?>
    <div class="mt-3"> <label>Status Absen</label>
     <div class="flex flex-col sm:flex-row mt-2">
         <div class="flex items-center text-gray-700 mr-2"> <input type="radio" class="input border mr-2" id="horizontal-radio-chris-evans" name="absen" value="Ya"  onclick="displayResult(this.value)"> <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Ya</label> </div>
         <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio" class="input border mr-2" id="horizontal-radio-liam-neeson" name="absen" checked value="Tidak"  onclick="displayResult(this.value)"> <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">Tidak</label> </div>
     </div>
    </div>
     <?php endif; ?>
     <?php if($materi['status_absen'] == 'Ya'): ?>
    <div class="hilang mt-3" id="setting-absen">
      <label>Tanggal Absen</label> <input type="date" class="input w-full border mt-2 flex-1" placeholder="tanggal_absen" name="tanggal_absen" value="<?= $statusAbsen['tanggal'] ?>" >
      <label>Jam Mulai</label> <input type="time" class="input w-full border mt-2 flex-1" placeholder="tanggal_absen" value="<?= $statusAbsen['jam_mulai'] ?>" name="jm">
      <label>Jam Akhir</label> <input type="time" class="input w-full border mt-2 flex-1" placeholder="tanggal_absen" name="ja" value="<?= $statusAbsen['jam_akhir'] ?>">
    </div>
    <?php else: ?>
      <div class="hilang mt-3" id="setting-absen">
      <label>Tanggal Absen</label> <input type="date" class="input w-full border mt-2 flex-1" placeholder="tanggal_absen" name="tanggal_absen">
      <label>Jam Mulai</label> <input type="time" class="input w-full border mt-2 flex-1" placeholder="tanggal_absen" name="jm">
      <label>Jam Akhir</label> <input type="time" class="input w-full border mt-2 flex-1" placeholder="tanggal_absen" name="ja">
    </div>
    <?php endif; ?>
        <button type="submit" class="button w-20 bg-theme-1 text-white mt-3">Simpan</button> </div>
    </form>
  </div>
</div>

<!-- modal hapus -->
<div class="modal" id="delete-materi">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Apakah anda yakin?</div>
    <div class="text-gray-600 mt-2">Data akan dihapus secara permanen.</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
    <a href=" <?= base_url('guru/hapusMateri/') . $materi['id_pertemuan'] ?>" class=" button w-24 bg-theme-6 text-white">Hapus</a>
   </div>
  </div>

<script src="<?= base_url('vendor/temp/') ?>dist/ckeditor/ckeditor.js"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
   CKEDITOR.replace( 'materi' ); 
   const radioValue = $("input[name='absen']:checked").val();
    if(radioValue == 'Ya'){
    $('#setting-absen').removeClass('hilang');
  $('#setting-absen').addClass("muncul");
  }else{
   $('#setting-absen').removeClass('muncul');
  $('#setting-absen').addClass("hilang");
  }
   

 
</script>

