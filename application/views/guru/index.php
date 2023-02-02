<?= $this->session->flashdata('login') ?>
<div class="content">
 <div class="grid grid-cols-12 gap-6">
  <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
   <!-- BEGIN: General Report -->
   <div class="col-span-12 mt-8">
    <div class="intro-y flex items-center h-10">
     <h2 class="text-lg font-medium truncate mr-5">
      <?= $ucapan ?> <?= $profiel['nama'] ?>
     </h2>
     <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data </a>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
     <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
      <div class="report-box zoom-in">
       <div class="box p-5">
        <div class="flex">
         <i data-feather="users" class="report-box__icon text-theme-10"></i>
        </div>
        <?php $query = $this->db->query('SELECT * FROM tbl_user'); ?>
        <div class="text-3xl font-bold leading-8 mt-6"><?= $query->num_rows(); ?></div>
        <div class="text-base text-gray-600 mt-1">User</div>
       </div>
      </div>
     </div>
     <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
      <div class="report-box zoom-in">
       <div class="box p-5">
        <div class="flex">
         <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
        </div>
        <?php $query = $this->db->query('SELECT * FROM tbl_mapel'); ?>
        <div class="text-3xl font-bold leading-8 mt-6"><?= $query->num_rows(); ?></div>
        <div class="text-base text-gray-600 mt-1">Mata Pelajaran</div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <!-- END: General Report -->
  </div>
 </div>
</div>