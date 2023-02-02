<div class="content">
 <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">
   Data Absen Siswa 
  </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
   <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#tambah" class="button text-white bg-theme-1 shadow-md mr-2 mt-10">Cetak</a> </div>
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
     <th class="border-b-2 whitespace-no-wrap">Foto</th>
     <th class="border-b-2 whitespace-no-wrap">Nama Siswa</th>
     <th class="border-b-2 whitespace-no-wrap">NIS</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Status</th>
     <th class="border-b-2 text-center whitespace-no-wrap">Waktu Absen</th>
     <th class="border-b-2 text-center whitespace-no-wrap"> Keterangan</th>
      <th class="border-b-2 text-center whitespace-no-wrap"> Aksi</th>
    </tr>
   </thead>
   <tbody>
    <?php $i = 1;
    foreach ($absenSiswa as $row) : ?>
     <tr>
      <td class="border-b">
       <div class="font-medium whitespace-no-wrap"><?= $i++ ?></div>
      </td>
       <td class="border-b">
      <div class="intro-x w-10 h-10 image-fit">
        <img alt="foto siswa" class="rounded-full" src="<?= base_url('public/profiel/') . $row['foto'] ?>">
       </div>
      </td>
     <td class="border-b">
       <div class="font-medium whitespace-no-wrap"><?= $row['nama'] ?></div>
      </td>
      <td class="text-center border-b"><?= $row['no_induk'] ?></td>
      <td class="text-center border-b"><?= $row['status'] ?></td>
        <td class="text-center border-b"><?= $row['waktu_absen'] ?></td>
          <td class="text-center border-b"><?= $row['keterangan'] ?></td>
         <td> <a href="javascript:;" data-toggle="modal" data-target="#edit<?= $row['id_siswa'] ?>" class="flex items-center sm:justify-center text-theme-1"> <i data-feather="edit" class="w-4 h-4 mr-2"></i>Edit</a></td>
     </tr>
    <?php endforeach; ?>
   </tbody>
  </table>
 </div>
</div>
</div>

<?php foreach ($absenSiswa as $row) : ?>
 <div class="modal" id="edit<?=$row['id_siswa']?>">
  <div class="modal__content  modal__content--lg ">
   <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
    <h2 class="font-medium text-base mr-auto">Form Edit Status Absen</h2>
   </div>
<?php 
        $hadir = '';
        $izin = '';
        $sakit ='';
        if($row['status'] == 'hadir'){
         $hadir = 'checked';
        }else if($row['status'] == 'sakit'){
         $sakit ='checked';
        }else{
         $izin ='checked';
        }
        ?>
        <div class="flex flex-col sm:flex-row mt-2">
         <div class="flex items-center text-gray-700 mr-2"> <input type="radio" class="input border mr-2 status-absen" id="radio" name="status_absen" value="hadir" <?= $hadir ?> data-idsiswa="<?= $row['id_siswa'] ?>" data-idbukuabsen="<?= $this->uri->segment(3) ?>" > <label class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Hadir</label> </div>
         <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio" class="input border mr-2 status-absen" id="radio" name="status_absen" value="Izin" <?= $izin ?> data-idsiswa="<?= $row['id_siswa'] ?>" data-idbukuabsen="<?= $this->uri->segment(3) ?>" > <label class="cursor-pointer select-none" for="horizontal-radio-liam-neeson">Izin</label> </div>
         <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio" class="input border mr-2 status-absen" id="radio" name="status_absen" value="sakit" <?= $sakit ?> data-idsiswa="<?= $row['id_siswa'] ?>" data-idbukuabsen="<?= $this->uri->segment(3) ?>" > <label class="cursor-pointer select-none" for="horizontal-radio-daniel-craig">Sakit</label> </div>
       </div>
  </form>
  </div>
 </div>
<?php endforeach; ?>

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<script>
$(".status-absen").change(function () {
            const radioValue = $(".status-absen:checked").val();
            const idSiswa = $(this).data('idsiswa');
            const segement3 = $(this).data('idbukuabsen');
            $.ajax({
        url:'<?=base_url('guru/updateStatusAbsenSiswa')?>',
        dataType:'json',
        type: "POST",
        data: {
         radioValue: radioValue,
         idsiswa:idSiswa
        },
        success: function(){
        document.location.href = "<?=base_url()?>";
        }
            });
    });
</script>
