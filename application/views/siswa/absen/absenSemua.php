<div class="content">
 <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
  <h2 class="text-lg font-medium mr-auto">
   Data Absen Berdasarkan Ruangan
  </h2>
  <select class="input w-1/2 border mt-2 flex-1 mx-2" name="ruangan" id="selectruangan">
 <option value="0">-- Pilih --</option>
 <?php foreach($ruangan as $k): ?>
<option value="<?= $k['id_ruangan'] ?>"><?= $k['nama_ruangan'] ?></option>
<?php endforeach; ?>
 </select> 
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

<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
  $('#selectruangan').change(function (){
    if($(this).val() == 0){
      var html ='';
       html +='<p class="" >silahkan cari berdasarkan ruangan</p';
         $("#box").html(html);
    }else{
    $.ajax({
        url:'<?=base_url('siswa/cariAbsenSemua')?>',
        dataType:'json',
        type: "POST",
        data: {keywoard: $(this).val()},
        success:function(data){
          var html ='';
            html +='<div class="overflow-x-auto">';
            html +='<button type="submit" class="button w-20 bg-theme-1 text-white my-3">Cetak</button>'
            html +='<table class="table">';
            html +='<thead>';
            html +=' <tr>'
            html +='<th class="border border-b-2 whitespace-no-wrap">Tanggal Pertemuan</th>'
            html +='<th class="border border-b-2 whitespace-no-wrap">Waktu Absensi</th>'
            html +='<th class="border border-b-2 whitespace-no-wrap">Status</th>'
            html +='<th class="border border-b-2 whitespace-no-wrap">keterangan</th>'
            html +=' </tr>'
            html +=' </thead>';
            html +='<tbody>'
            for(var i=0; i < data.length;i++){
            html +='<tr class="hover:bg-gray-200">'
            html +='<td class="border">'+data[i].tanggal+'</td>'
            html +='<td class="border">'+data[i].waktu_absen+'</td>'
            html +='<td class="border">'+data[i].status+'</td>'
            html +='<td class="border">'+data[i].keterangan+'</td>'
            html +='</tr>'
        }
            html +='</tbody>'
            html +='</table>';
            html +='</div>';
          $("#box").html(html);
        }
    });
    }
  })
  </script>