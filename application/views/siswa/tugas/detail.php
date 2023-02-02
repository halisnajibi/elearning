<?= $this->session->flashdata('pesan'); ?>
<div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Detail Tugas <?= $tugas['judul'] ?>
        </h2>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5">
        <!-- BEGIN: Blog Layout -->
        <div class="intro-y blog col-span-12 md:col-span-12 box">
            <div class="blog__preview image-fit">
                <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="<?= base_url('public/sampul materi/') ?>/ehud-neuhaus-esCc1qx6TVw-unsplash (1).jpg">
                <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                    <div class="w-10 h-10 flex-none image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('public/profiel/') . $tugas['foto'] ?>">
                    </div>
                    <div class="ml-3 text-white mr-auto">
                        <a href="" class="font-medium"><?= $tugas['nama']  ?></a>
                        <div class="text-xs"><?= $tugas['waktu_mulai'] ?> S/D <?= $tugas['waktu_akhir'] ?></div>
                    </div>
                </div>
                <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="blog__category px-2 py-1 rounded">nama mapel</span>
                    <p class="block font-medium text-xl mt-3"><?= $tugas['judul'] ?></p>
                </div>
            </div>
            <div class="p-5 text-gray-700"><?= $tugas['keterangan'] ?></div>
            <div class="flex items-center px-5 py-3 border-t border-gray-200">
                <?php if ($tugas['file'] != 'tidak ada') : ?>
                    <a href="<?= base_url('user/download/tugas/') . $tugas['file'] ?>" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download Materi"> <i data-feather="share" class="w-3 h-3"></i> </a>
                <?php endif; ?>
            </div>
            <a  href="<?= base_url('siswa/kerjakanTugas/'.$tugas['id_tugas']) ?>" class="button w-20 bg-theme-1 text-white my-3 ml-3 ">Kerjakan</a>
            <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                <div class="w-full flex text-gray-600 text-xs sm:text-sm">
                    <div class="mr-2"> Komen: <span class="font-medium">154</span> </div>
                    <div class="mr-2"> Melihat: <span class="font-medium">47k</span> </div>
                    <div class="ml-auto"> Suka: <span class="font-medium">23k</span> </div>
                </div>
                <div class="w-full flex items-center mt-3">
                    <div class="w-8 h-8 flex-none image-fit mr-3">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="<?= base_url('public/profiel/') . $profiel['foto'] ?>">
                    </div>
                    <div class="flex-1 relative text-gray-700">
                        <form action="" method="post">
                            <input type="hidden" name="foto" value="<?= $profiel['foto'] ?>">
                            <input type="hidden" name="nama" value="<?= $profiel['nama'] ?>">
                            <input type="hidden" name="id_tugas" value="<?= $tugas['id_tugas'] ?>">
                            <input type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="Komentar..." name="komentar">
                            <button type="submit" name="dsad"> <i data-feather="send" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i> </button>

                        </form>
                    </div>
                </div>
                <?php foreach ($komentar as $row) : ?>
                    <div class="w-full">
                        <div class="intro-x  box relative flex items-center p-5 ">
                            <div class="w-12 h-12 flex-none image-fit mr-1">
                                <img alt="foto profiel" class="rounded-full" src="<?= base_url('public/profiel/') . $row['foto'] ?>">
                                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                            </div>
                            <div class="ml-2 overflow-hidden">
                                <div class="flex items-center">
                                    <p class="font-medium"><?= $row['nama'] ?></p>
                                    <div class="text-xs text-gray-500 ml-auto"><?= $row['dibuat'] ?></div>
                                </div>
                                <div class="w-full truncate text-gray-600"><?= $row['komentar'] ?></div>
                                <a href="javascript:;" data-toggle="modal" data-target="#komentar<?= $row['id_km'] ?>" class="text-xs px-2 rounded-full bg-theme-1 text-white mr-1 mt-1 py-1">Balas</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php foreach ($komentar as $k) : ?>
    <div class="modal" id="komentar<?= $k['id_km'] ?>">
        <div class="modal__content">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto">Form Balas Komentar</h2>
            </div>
            <form action="<?= base_url('siswa/balasKomentarTugas') ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="foto" value="<?= $profiel['foto'] ?>">
                            <input type="hidden" name="nama" value="<?= $profiel['nama'] ?>">
                            <input type="hidden" name="id_tugas" value="<?= $tugas['id_tugas'] ?>">
                <div class="col-span-12 sm:col-span-6 p-2"> <label>Komentar <?= form_error('komentar',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?> </label> <input type="text" class="input w-full border mt-2 flex-1" placeholder="komentar" name="komentar">
                   
                </div> <button type="submit" class="button w-20 bg-theme-1 text-white mt-3">Simpan</button>
            </from>

        </div>
    <?php endforeach; ?>