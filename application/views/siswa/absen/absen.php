<?= $this->session->flashdata('pesan'); ?>
<div class="content">
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Absen
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">Tanggal Absensi</div>
                    <div class="text-gray-600"><?= $absen['tanggal'] ?></div>
                </div>
            </div>
            <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="clock" class="w-4 h-4 mr-2"></i> Jam Mulai <?= $absen['jam_mulai'] ?> </div>
                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="clock" class="w-4 h-4 mr-2"></i> Jam Akhir <?= $absen['jam_akhir'] ?> </div>
            </div>
        </div>
        <?php 
        date_default_timezone_set('Asia/Makassar'); // Zona Waktu indonesia
        $tanggalSekarang = date('Y-m-d');
        $jamSekarang = date('H:i:s ');
        if($absen['tanggal'] < $tanggalSekarang || $absen['tanggal'] > $tanggalSekarang ):
        ?>
        <div class="rounded-md px-5 py-4 mb-2 bg-theme-12 text-white">Absensi Belum Dimulai / Telah Lewat</div>
        <?php endif; ?>
    </div>
    <!-- END: Profile Info -->
    <div class="intro-y tab-content mt-5">
        <div class="tab-content__pane active" id="dashboard">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Status Absensi
                        </h2>
                    </div>
                    <?php  
                    $idBuku = $absen['id_buku_absen'];
                    $cek = $this->M_siswa->cekAbsen($idBuku,$profiel['id_siswa']);
                    if($cek > 0){?>
                    <div class="p-5">
                        <p>sudah absen</p>
                    </div>
                    <?php }else{?>
                    <?php
                     if($absen['tanggal'] == $tanggalSekarang):
                        if($jamSekarang >= $absen['jam_mulai'] && $jamSekarang<= $absen['jam_akhir'] ):  
                     ?>
                    <div class="p-5">
                         <form action="" method="post">
                            <input type="hidden" name="id_siswa" value="<?= $profiel['id_siswa'] ?>">
                            <input type="hidden" name="id_buku_absen" value="<?= $absen['id_buku_absen'] ?>">
                        <div> <label>Silahkan Melakukan Absensi</label>
                            <div class="flex items-center text-gray-700 mt-2"> <input type="radio" class="input border mr-2" id="vertical-radio-chris-evans" name="absen" value="hadir"> <label class="cursor-pointer select-none" for="vertical-radio-chris-evans">Hadir</label> </div>
                            <div class="flex items-center text-gray-700 mt-2"> <input type="radio" class="input border mr-2" id="vertical-radio-liam-neeson" name="absen" value="izin"> <label class="cursor-pointer select-none" for="vertical-radio-liam-neeson">Izin</label> </div>
                            <div class="flex items-center text-gray-700 mt-2"> <input type="radio" class="input border mr-2" id="vertical-radio-daniel-craig" name="absen" value="sakit"> <label class="cursor-pointer select-none" for="vertical-radio-daniel-craig">Sakit</label> </div>
                            <button type="submit" name="simpan" class="button w-20 bg-theme-1 text-white rounded-md mt-4">Simpan</button>
                        </div>
                        </form>
                    </div>
                    <?php endif ?>
                    <?php endif ?>
                    <?php }  ?>
                </div>
                <div class="intro-y box col-span-12 lg:col-span-6">
                <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Riwayat Absensi
                        </h2>
                    </div>
                    <div class="p-5">
                        <?php foreach($absenSiswa as $as): ?>
                        <div class="flex flex-col sm:flex-row mt-3">
                            <div class="mr-auto">
                                <a href="" class="font-medium"><?= $as['waktu_absen'] ?></a>
                                <div class="text-gray-600 mt-1"><?= $as['keterangan'] ?></div>
                            </div>
                            <div class="flex">
                                <div class="text-center">
                                    <div class="font-medium"><?= $as['status'] ?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>