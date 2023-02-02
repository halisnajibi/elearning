<?= $this->session->flashdata('pesan'); ?>
<div class="content">

  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
      <!-- BEGIN: General Report -->
      <div class="col-span-12 mt-8">
        <div class="intro-y flex items-center h-10">
          <h2 class="text-lg font-medium mr-auto">
            Data Ruangan
          </h2>
          <p class="font-medium text-lg mr-3">jumlah ruangan <?= $jumlah ?></p>
          <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="text-center"> <a href="javascript:;" data-toggle="modal" data-target="#tambahruangan" class="button text-white bg-theme-1 shadow-md mr-2 mt-10">Gabung Ruangan</a> </div>
          </div>
          <div class="search hidden sm:block mt-1">
            <form action="<?= base_url('guru/ruangan') ?>" method="post">
              <input type="text" class="search__input input placeholder-theme-13" placeholder="Search..." name="cari" autocomplete="off" id="cari">
              <i data-feather="search" class="search__icon"></i>
          </div>
          <input type="submit" class="tombol-cari" name="submit"></input>
          </form>
        </div>
        <div class="grid grid-cols-12 gap-6 mt-5" id="card-ruangan">
          <?php foreach ($ruanganSiswa as $r) : ?>
            <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
              <div class="report-box zoom-in">
                <div class="box p-5">
                  <a href="<?= base_url('siswa/detailRuangan/' . $r['id_sr']) ?>" class="text-2xl font-bold leading-8 " id="nama-ruangan"><?= $r['nama_ruangan'] ?></a>
                  <div class="text-base text-gray-600 mt-1"><?= $r['tanggal_masuk'] ?></div>
                  <a href="<?= base_url('siswa/pertemuan/') . $r['id_ruangan'] ?>" class="text-base font-medium text-blue-800">Masuk Ruangan</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

  <div class="pagination mt-20">
    <?= $this->pagination->create_links(); ?>
  </div>
</div>
<!-- MODAL TAMBAH RUANGAN -->
<div class="modal" id="tambahruangan">
  <div class="modal__content">
    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
      <h2 class="font-medium text-base mr-auto">Form Join Ruangan</h2>
    </div>
    <form action="" method="post">
      <input type="hidden" name="id_siswa" value="<?= $profiel['id_siswa'] ?>">
      <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
        <div class="col-span-12 sm:col-span-6"> <label>Nama Ruangan <?= form_error('nama',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?> </label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="nama ruangan" name="nama"> </div>
        <div class="col-span-12 sm:col-span-6"> <label>Kode Ruangan <?= form_error('kode',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="kode ruangan" name="kode"> </div>
        <div class="px-5 py-3 text-right border-t border-gray-200"> <button type="submit" class="button w-20 bg-theme-1 text-white">Simpan</button> </div>
    </form>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
  $('#cari').keyup(function(e) {
    $.ajax({
      url: "<?= base_url('siswa/cariRuangan') ?>",
      dataType: 'html',
      type: "POST",
      data: {
        keywoard: $(this).val()
      },
      success: function(data) {
        $('#card-ruangan').html(data);

      }
    });
  });
</script>