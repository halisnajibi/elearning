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
        url:'<?=base_url('siswa/cariTugas')?>',
        dataType:'json',
        type: "POST",
        data: {keywoard: $(this).val()},
        success:function(data){
          console.log(data);
          var html ='';
          for(var i=0; i < data.length;i++){
            html += '<a href="riwayatTugas" class="button w-20 bg-theme-1 text-white mt-2 mb-5">Riwayat Tugas</a>'
            html +='<div class="report-box zoom-in mb-3" >';
            html +='<div class="box p-5 " >';
            html +='<a class="text-2xl font-bold leading-8  hover:text-blue-700"  href="tugasDetail/'+data[i].id_tugas+'">'+data[i].judul+'</a>';
      
            html +='</div>';
            html +='</div>';
          }
           
          $("#box").html(html);
        }
    });
    }
  })
  </script>