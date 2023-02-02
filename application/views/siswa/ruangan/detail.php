
<div class="content">
 <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">
   Data Siswa Ruangan <?= $detailRuangan[0]['nama_ruangan'] ?>
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
         <th class="border-b-2 whitespace-no-wrap">Foto</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Nama Siswa</th>
     <th class="border-b-2 text-center whitespace-no-wrap">NIS</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Email</th>
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
     <td class="text-center border-b"><?= $row['email'] ?></td>
      
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
</div>