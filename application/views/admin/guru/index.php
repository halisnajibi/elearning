<div class="content">
 <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">
   Data User Guru
  </h2>

 </div>
 <?= $this->session->flashdata('login'); ?>
 <?= $this->session->flashdata('pesan'); ?>
 <!-- BEGIN: Datatable -->
 <div class="intro-y datatable-wrapper box p-5 mt-5">
  <table class="table table-report table-report--bordered display datatable w-full">
   <thead>
    <tr>
     <th class="border-b-2 whitespace-no-wrap">No</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Nama</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Username</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Status Akun</th>
    </tr>
   </thead>
   <tbody>
    <?php $i = 1;
    foreach ($userguru as $row) : ?>
     <tr>
      <td class="border-b">
       <div class="font-medium whitespace-no-wrap"><?= $i++ ?></div>
      </td>
      <td class="text-center border-b"><?= $row['nama'] ?></td>
      <td class="text-center border-b"><?= $row['username'] ?></td>
      <?php if ($row['status'] == '1') : ?>
       <td class="w-40 border-b">
        <a href="<?= base_url('user/updateUser/guru/0/') . $row['id_user'] ?>" class="flex items-center sm:justify-center text-theme-7"> <i data-feather="check-square" class="w-4 h-4 mr-2"></i>Aktif</a>
       </td>
      <?php else : ?>
       <td class="w-40 border-b">
        <a href="<?= base_url('user/updateUser/guru/1/') . $row['id_user'] ?>" class="flex items-center sm:justify-center text-theme-6"> <i data-feather="x" class="w-4 h-4 mr-2"></i>Tidak Aktif</a>
       </td>
      <?php endif; ?>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
</div>