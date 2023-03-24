<div class="content">

  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
      <!-- BEGIN: General Report -->
      <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
          <h2 class="text-lg font-medium mr-auto">
            Data Pertemuan
          </h2>
        </div>
      </div>
      <?php if (is_array($pertemuan)) { ?>
        <?php foreach ($pertemuan as $row) { ?>
          <div class="col-span-12">
            <div class="report-box zoom-in ">
              <div class="box p-5 mt-2">
                <a href="<?= base_url('siswa/detailPertemuan/'.$row['id_pertemuan']) ?>" class="text-2xl font-bold leading-8  hover:text-blue-700"><?= $row['judul_pertemuan'] ?></a>
                <?php if($row['absen'] == 'Ya'){ ?>
                <a  href="<?= base_url('siswa/pertemuanAbsen/'.$row['id_pertemuan']) ?>" class="button w-20 bg-theme-1 text-white rounded-md float-right">Absen</a>
                <?php } ?>
              </div>
            </div>
          </div>
          <?php } ?>
    </div>
  <?php 
      } else { ?>
          <div class="col-span-12 ">
            <div class="report-box zoom-in ">
              <div class="box p-5">
                <?= $pertemuan ?>
              </div>
            </div>
          </div>
  </div>
<?php } ?>
</div>
</div>
</div>

<!-- MODAL ABSEN -->
<div class="modal" id="absen">
  <div class="modal__content">
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Form Edit Materi</h2>
    </div>
</div>