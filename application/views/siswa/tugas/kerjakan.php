
<div class="content">
    <!-- END: Top Bar -->
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Tugas
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"><?= $tugas['judul'] ?></div>
                    <div class="text-gray-600">waktu sisa</div>
                    <!-- Batas waktu dalam timestamp -->
                    <?php
                    $deadline = strtotime($tugas['waktu_akhir']);

                    // Menghitung selisih waktu antara saat ini dan batas waktu
                    $difference = $deadline - time();

                    // Konversi selisih waktu menjadi hari, jam, menit, dan detik
                    $days = floor($difference / (60 * 60 * 24));
                    $hours = floor(($difference - ($days * 60 * 60 * 24)) / (60 * 60));
                    $minutes = floor(($difference - ($days * 60 * 60 * 24) - ($hours * 60 * 60)) / 60);
                    $seconds = floor($difference % 60);

                    // Menampilkan hitungan mundur
                    echo "$days hari, $hours jam, $minutes menit";
                    ?>
                </div>
            </div>
            <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="clock" class="w-4 h-4 mr-2"></i> Waktu Mulai <?= $tugas['waktu_mulai'] ?> </div>
                <div class="truncate sm:whitespace-normal flex items-center"> <i data-feather="clock" class="w-4 h-4 mr-2"></i> Waktu Akhir <?= $tugas['waktu_akhir'] ?> </div>
            </div>
        </div>
        <?php
        date_default_timezone_set('Asia/Makassar'); // Zona Waktu indonesia
       $waktuSekarang = date('Y-m-d H:i:s ');
        if ($waktuSekarang <  $tugas['waktu_mulai'] ||  $waktuSekarang > $tugas['waktu_akhir']) :
        ?>
            <div class="rounded-md px-5 py-4 mb-2 bg-theme-12 text-white">Tugas Belum Dimulai / Telah Lewat</div>
        <?php endif; ?>
    </div>
    <!-- END: Profile Info -->
    <?= $this->session->flashdata('pesan'); ?>
    <div class="intro-y tab-content mt-5">
        <div class="tab-content__pane active" id="dashboard">
            <div class="grid grid-cols-12 gap-6">
                <div class="intro-y box col-span-12 lg:col-span-12">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Halaman Jawaban
                        </h2>
                    </div>
                    <?php
                    $idtugas = $tugas['id_tugas'];
                    $cek = $this->M_siswa->cekTugas($idtugas, $profiel['id_siswa']);
                    if ($cek > 0) { ?>
                        <div class="p-5">
                            <p>sudah dikerjakan</p>
                        </div>
                    <?php } else { ?>
                        <?php
                        if ($waktuSekarang >= $tugas['waktu_mulai'] && $waktuSekarang <= $tugas['waktu_akhir']) :
                        ?>
                            <div class="col-span-12 lg:col-span-4">
                                <div class="intro-y pr-1">
                                    <div class="box p-2">
                                        <div class="pos__tabs nav-tabs justify-center flex"> <a data-toggle="tab" data-target="#ticket" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">Text Daring</a> <a data-toggle="tab" data-target="#details" href="javascript:;" class="flex-1 py-2 rounded-md text-center">File</a> </div>
                                    </div>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-content__pane active" id="ticket">
                                        <div class="pos__ticket box p-2 mt-5">
                                             <form action="" method="post">
                                             <input type="hidden" name="id_siswa" value="<?= $profiel['id_siswa'] ?>">
                                                <input type="hidden" name="id_tugas" value="<?= $tugas['id_tugas'] ?>">
                                            <label for="" class="mb-3">Text</label>
                                            <textarea name="text" id="text" rows="10" cols="80"></textarea>
                                            <button type="submit" class="button w-20 bg-theme-1 text-white my-3">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-content__pane" id="details">
                                        <div class="pos__ticket box p-2 mt-5">
                                             <form method="post" action="<?= base_url('siswa/tugasFile') ?>" enctype="multipart/form-data">
                                                <input type="hidden" name="id_siswa" value="<?= $profiel['id_siswa'] ?>">
                                                <input type="hidden" name="id_tugas" value="<?= $tugas['id_tugas'] ?>">
                                            <label>File</label> <input type="file" class="input w-full border mt-2 flex-1" placeholder="file" name="file">
                                            <button type="submit" class="button w-20 bg-theme-1 text-white my-3">Simpan</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    <?php }  ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('vendor/temp/') ?>dist/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('text');
</script>

<a href=""></a>