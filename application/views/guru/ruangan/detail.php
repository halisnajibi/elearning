
<div class="content">
 <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">
  Ruangan <?= $ruangan['nama_ruangan'] ?>
  </h2>
 </div>
 <div class="mt-3">
  <?= $this->session->flashdata('pesan'); ?>
 </div>

 <div class="intro-y datatable-wrapper box p-5 mt-5">
    <form action="" method="post">
    <h6 class="text-md font-medium text-theme-1">Pengaturan Ruangan</h6>
        <input type="hidden" name="id_ruangan" value="<?= $ruangan['id_ruangan'] ?>">
        <input type="hidden" name="id_guru" value="<?= $profiel['id_guru'] ?>">
        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
          <div class="col-span-12 sm:col-span-6"> <label>Nama Ruangan <?= form_error('nama',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?> </label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="nama ruangan" name="nama" readonly value="<?= $ruangan['nama_ruangan'] ?>"> </div>
          <div class="col-span-12 sm:col-span-6"> <label>Kode Ruangan <?= form_error('kode',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="kode ruangan" name="kode" value="<?= $ruangan['kode_ruangan'] ?>"> </div>
          <div class="col-span-12 sm:col-span-6"> <label>Kelas</label> <select class="input w-full border mt-2 flex-1" name="kelas">
              <?php foreach ($kelas as $k) : ?>
                <?php if ($ruangan['id_kelas'] == $k['id_kelas']) : ?>
                  <option value="<?= $k['id_kelas'] ?>" <?= "selected" ?>><?= $k['nama_kelas'] ?></option>
                <?php else : ?>
                  <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
                <?php endif; ?>
              <?php endforeach; ?>
            </select> </div>
          <div class="col-span-12 sm:col-span-6"> <label>Keterangan <?= form_error('kode',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="keterangan" name="keterangan" value="<?= $ruangan['keterangan'] ?>"> </div>
          <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="submit" class="button w-20 bg-theme-1 text-white -ml-5">Simpan</button> </div>
      </form>
       <div class="px-5 py-3 text-right border-t border-gray-200"> <a href="javascript:;" data-toggle="modal" data-target="#delete-ruangan" class="flex w-32 h-10 rounded-md justify-center items-center bg-theme-6 text-white -ml-5">Hapus Ruangan</a> </div>
      </div>
 </div>

 <!-- BEGIN: Datatable -->
 <h6 class="text-md font-medium text-theme-1">Data Siswa Gabung Ruangan</h6>
 <div class="intro-y datatable-wrapper box p-5 mt-5">
  <table class="table table-report table-report--bordered display datatable w-full">
   <thead>
    <tr>
     <th class="border-b-2 whitespace-no-wrap">No</th>
     <th class="border-b-2 whitespace-no-wrap">Foto</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Nama Siswa</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Nis</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Jenis Kelamin</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Tanggal Masuk</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php $i = 1;
    foreach ($detailRuangan as $row) : ?>
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
      <td class="text-center border-b"><?= $row['jk'] ?></td>
      <td class="text-center border-b"><?= $row['tanggal_masuk'] . ' ' . $row['tanggal_lahir'] ?></td>
      <?php if ($row['status'] == '1') : ?>
       <td class="w-40 border-b">
        <a href="<?= base_url('guru/updateStatusRuangan/0/') . $row['id_sr'] . '/' . $row['id_ruangan'] ?>" class="flex items-center sm:justify-center text-theme-7"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i>Aktif</a>
       </td>
      <?php else : ?>
       <td class="w-40 border-b">
        <a href="<?= base_url('guru/updateStatusRuangan/0/') . $row['id_sr'] . '/' . $row['id_ruangan']  ?>" class="flex items-center sm:justify-center text-theme-6"> <i data-feather="x" class="w-4 h-4 mr-2"></i>Tidak Aktif</a>
       </td>
      <?php endif; ?>
      <td class="text-center border-b">
       <a href="javascript:;" data-toggle="modal" data-target="#delete-modal-preview<?= $row['id_sr'] ?>" class="flex items-center sm:justify-center text-theme-1"> <i data-feather="trash-2" class="w-4 h-4 mr-2"></i>Hapus</a>
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
    <a href=" <?= base_url('guru/hapusRuangan/') . $ruangan['id_ruangan'] ?>" class=" button w-24 bg-theme-6 text-white">Hapus</a>
   </div>
  </div>

<!-- MODAL DELETE -->
<?php foreach ($detailRuangan as $row) : ?>
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
 <?php endforeach; ?>