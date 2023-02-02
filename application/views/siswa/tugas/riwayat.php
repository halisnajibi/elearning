<div class="content">
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Data Tugas Sudah Dikerjakan
        </h2>
    </div>
    <div class="intro-y datatable-wrapper box p-5 mt-5">
        <table class="table table-report table-report--bordered display datatable w-full">
            <thead>
                <tr>
                    <th class="border-b-2 whitespace-no-wrap">No</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Judul Tugas</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Waktu Mulai</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Tanggal Kirim</th>
                    <th class="border-b-2 text-center whitespace-no-wrap">Jawaban</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach($riwayat as $row): ?>
                <tr>
                    <td class="border-b"><?= $i++ ?></td>
                    <td class="border-b"><?= $row['judul'] ?></td>
                    <td class="border-b"><?= $row['waktu_mulai'] ?></td>
                    <td class="border-b"><?= $row['waktu_kumpul'] ?></td>
                    <td class="border-b">
                        <?php if($row['file_kirim'] == 'tidak ada'){ ?>
                            <?= $row['essay'] ?>
                            <?php  }else{?>
                                <a href="<?= base_url('user/download/tugasKirim/'.$row['file_kirim']) ?>">Download</a>
                            <?php } ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>