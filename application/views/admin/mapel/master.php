<div class="content">
 <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">
   Data Master Guru
  </h2>
  <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
   <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class="button text-white bg-theme-1 shadow-md mr-2 mt-10">Tambah Data</a> </div>
   <div class="text-center"> <a href="<?= base_url('admin/cetakMapel') ?>" class="button text-white bg-theme-9 shadow-md mr-2 mt-10">Cetak Data</a></div>
   <div class="dropdown relative ml-auto sm:ml-0">
    <button class="dropdown-toggle button px-2 box text-gray-700">
     <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
    </button>
    <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
     <div class="dropdown-box__content box p-2">
      <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-plus" class="w-4 h-4 mr-2"></i> Import Excel </a>
     </div>
    </div>
   </div>
  </div>
 </div>
 <div class="mt-3">
  <?= $this->session->flashdata('pesan'); ?>
 </div>
 <!-- BEGIN: Datatable -->
 <div class="intro-y datatable-wrapper box p-5 mt-5">
  <table class="table table-report table-report--bordered display datatable w-full">
   <thead>
    <tr>
     <th class="border-b-2 whitespace-no-wrap">No</th>
     <th class="border-b-2 whitespace-no-wrap">Kode</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Mata Pelajaran</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php $i = 1;
    foreach ($master as $row) : ?>
     <tr>
      <td class="border-b">
       <div class="font-medium whitespace-no-wrap"><?= $i++ ?></div>
      </td>
      <td class="text-center border-b"><?= $row['kd_mapel'] ?></td>
      <td class="text-center border-b"><?= $row['nama_mapel'] ?></td>
      <td class="text-center border-b">
       <a href="javascript:;" data-toggle="modal" data-target="#edit-modal-preview<?= $row['id_mapel'] ?>" class="flex items-center sm:justify-center text-theme-1"> <i data-feather="edit" class="w-4 h-4 mr-2"></i>Edit</a>
       <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview<?= $row['id_mapel'] ?>" class="flex items-center sm:justify-center text-theme-1"> <i data-feather="trash-2" class="w-4 h-4 mr-2"></i>Hapus</a>
      </td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
</div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal" id="header-footer-modal-preview">
 <div class="modal__content">
  <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
   <h2 class="font-medium text-base mr-auto">Form Tambah</h2>
  </div>
  <form action="" method="post">
   <input type="hidden" name="level" value="Mapel">
   <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
    <div class="col-span-12 sm:col-span-6"> <label>Kode Mapel <?= form_error('kd_mapel',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?> </label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="kode mapel" name="kd_mapel"> </div>
    <div class="col-span-12 sm:col-span-6"> <label>Nama Mata Pelajaran</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="nama mata pelajaran" name="nama_mapel"> </div>

   </div>
   <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button> </div>
  </form>
 </div>
</div>

<!-- MODAL  edit -->
<?php foreach ($master as $row) : ?>
 <div class="modal" id="edit-modal-preview<?= $row['id_mapel'] ?>">
  <div class="modal__content">
   <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">Form Edit</h2>
   </div>
   <form action="<?= base_url('admin/updateMaster/mapel') ?>" method="post">
    <input type="hidden" name="level" value="Mapel">
    <input type="hidden" name="id_mapel" value="<?= $row['id_mapel'] ?>">
    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
     <div class="col-span-12 sm:col-span-6"> <label>Kode Mata Pelajaran <?= form_error('kd_mapel',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?> </label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="Kode Mapel" name="kd_mapel" value="<?= $row['kd_mapel'] ?>"> </div>
     <div class="col-span-12 sm:col-span-6"> <label>Nama Mata Pelajaran</label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="nama mata pelajaran" name="nama_mapel" value="<?= $row['nama_mapel'] ?>"> </div>

    </div>
    <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button> </div>
   </form>
  </div>
 </div>
<?php endforeach; ?>

<!-- MODAL DELETE -->
<?php foreach ($master as $row) : ?>
 <div class="modal" id="delete-modal-preview<?= $row['id_mapel'] ?>">
  <div class="modal__content">
   <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
    <div class="text-3xl mt-5">Apakah anda yakin?</div>
    <div class="text-gray-600 mt-2">Data akan dihapus secara permanen.</div>
   </div>
   <div class="px-5 pb-8 text-center"> <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
    <a href=" <?= base_url('admin/deleteMaster/mapel/') . $row['id_mapel'] ?>" class=" button w-24 bg-theme-6 text-white">Hapus</a>
   </div>
  </div>
 <?php endforeach; ?>