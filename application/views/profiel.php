<?= $this->session->flashdata('pesan') ?>
<div class="content">
  <div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Profile
    </h2>
  </div>
  <div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
      <div class="intro-y box mt-5">
        <?= $this->session->flashdata('pwUpdate') ?>
        <div class="flex items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">
            Password
          </h2>
        </div>
        <form action="<?= base_url('user/updatePassword') ?>" method="post">
          <input type="hidden" name="level" value="<?= $level ?>">

          <div class="p-5">
            <div class="mt-3">
              <label>Password Lama <?= form_error('pl',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label>
              <input type="password" class="input w-full border mt-2" name="pl">
            </div>
            <div class="mt-3">
              <label>Password Baru <?= form_error('pb',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label>
              <input type="password" class="input w-full border mt-2" name="pb">
            </div>
            <div class="mt-3">
              <label>Konfirmasi Password <?= form_error('kp',  '<span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-red-600">', '</span') ?></label>
              <input type="password" class="input w-full border mt-2" name="kp">
            </div>
            <button type="submit" class="button bg-theme-1 text-white mt-4">Simpan</button>
          </div>
        </form>
      </div>
    </div>
    <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
      <!-- BEGIN: Display Information -->
      <div class="intro-y box lg:mt-5">
        <div class="flex items-center p-5 border-b border-gray-200">
          <h2 class="font-medium text-base mr-auto">
            Data Pribadi
          </h2>
        </div>
        <form action="<?= base_url('user/updateProfiel') ?>" method="post" enctype="multipart/form-data">
          <div class="p-5">
            <div class="grid grid-cols-12 gap-5">
              <div class="col-span-12 xl:col-span-4">
                <div class="border border-gray-200 rounded-md p-5">
                  <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                    <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="<?= base_url('public/profiel/') . $profiel['foto'] ?>">

                  </div>
                  <div class="w-40 mx-auto cursor-pointer relative mt-5">

                    <button type="button" class="button w-full bg-theme-1 text-white">Upload Foto</button>
                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0" name="file">
                  </div>
                </div>
              </div>
              <div class="col-span-12 xl:col-span-8">
                <?php if ($level === 'Admin') : ?>
                  <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-6">
                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $level ?>" name="level">
                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['id_user'] ?>" name="id_user">

                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['foto'] ?>" name="foto">
                      <div>
                        <label>Email</label>
                        <input type="text" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['email'] ?>" name="email">
                      </div>
                      <div class="mt-3">
                        <label>Nama</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['nama'] ?>" name="nama">
                      </div>
                      <div class="mt-3">
                        <label>Nip</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['nip'] ?>" name="nip">
                      </div>
                      <div class="mt-3">
                        <label>Jenis Kelamin</label>
                        <select class="input w-full border mt-2" name="jk">
                          <?php if ($profiel['jk'] == 'laki-laki') : ?>
                            <option value="laki-laki" <?= 'selected' ?>>Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                          <?php else : ?>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan" <?= 'selected' ?>>Perempuan</option>
                          <?php endif; ?>
                        </select>
                      </div>

                    </div>
                    <div class="col-span-12 xl:col-span-6">
                      <div>
                        <label>Tempat Lahir</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['tempat_lahir'] ?>" name="tempat_lahir">
                      </div>
                      <div class="mt-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="input w-full border mt-2" value="<?= $profiel['tanggal_lahir'] ?>" name="tanggal_lahir">
                      </div>
                      <div class="mt-3">
                        <label>Telepon</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['telepon'] ?>" name="telepon">
                      </div>
                      <div class="mt-3">
                        <label>Alamat</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['alamat'] ?>" name="alamat">
                      </div>
                    </div>
                    <button type="submit" class="button w-50 bg-theme-1 text-white ml-auto ">Simpan</button>
                  </div>
                <?php elseif ($level == 'guru') : ?>
                  <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-6">
                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $level ?>" name="level">
                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['id_user'] ?>" name="id_user">

                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['foto'] ?>" name="foto">
                      <div>
                        <label>Email</label>
                        <input type="text" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['email'] ?>" name="email">
                      </div>
                      <div class="mt-3">
                        <label>Nama</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['nama'] ?>" name="nama">
                      </div>
                      <div class="mt-3">
                        <label>Nip</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['nip'] ?>" name="nip">
                      </div>
                      <div class="mt-3">
                        <label>Jenis Kelamin</label>
                        <select class="input w-full border mt-2" name="jk">
                          <?php if ($profiel['jk'] == 'laki-laki') : ?>
                            <option value="laki-laki" <?= 'selected' ?>>Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                          <?php else : ?>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan" <?= 'selected' ?>>Perempuan</option>
                          <?php endif; ?>
                        </select>
                      </div>

                    </div>
                    <div class="col-span-12 xl:col-span-6">
                      <div>
                        <label>Tempat Lahir</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['tempat_lahir'] ?>" name="tempat_lahir">
                      </div>
                      <div class="mt-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="input w-full border mt-2" value="<?= $profiel['tanggal_lahir'] ?>" name="tanggal_lahir">
                      </div>
                      <div class="mt-3">
                        <label>Telepon</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['telepon'] ?>" name="telepon">
                      </div>
                      <div class="mt-3">
                        <label>Alamat</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['alamat'] ?>" name="alamat">
                      </div>
                    </div>
                    <button type="submit" class="button w-50 bg-theme-1 text-white ml-auto ">Simpan</button>
                  </div>
                <?php else : ?>
                  <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 xl:col-span-6">
                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $level ?>" name="level">
                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['id_user'] ?>" name="id_user">

                      <input type="hidden" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['foto'] ?>" name="foto">
                      <div>
                        <label>Email</label>
                        <input type="text" class="input w-full border bg-gray-100 mt-2" value="<?= $profiel['email'] ?>" name="email">
                      </div>
                      <div class="mt-3">
                        <label>Nama</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['nama'] ?>" name="nama">
                      </div>
                      <div class="mt-3">
                        <label>Nis</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['nis'] ?>" name="nis">
                      </div>
                      <div class="mt-3">
                        <label>Jenis Kelamin</label>
                        <select class="input w-full border mt-2" name="jk">
                          <?php if ($profiel['jk'] == 'laki-laki') : ?>
                            <option value="laki-laki" <?= 'selected' ?>>Laki-Laki</option>
                            <option value="perempuan">Perempuan</option>
                          <?php else : ?>
                            <option value="laki-laki">Laki-Laki</option>
                            <option value="perempuan" <?= 'selected' ?>>Perempuan</option>
                          <?php endif; ?>
                        </select>
                      </div>

                    </div>
                    <div class="col-span-12 xl:col-span-6">
                      <div>
                        <label>Tempat Lahir</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['tempat_lahir'] ?>" name="tempat_lahir">
                      </div>
                      <div class="mt-3">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="input w-full border mt-2" value="<?= $profiel['tanggal_lahir'] ?>" name="tanggal_lahir">
                      </div>
                      <div class="mt-3">
                        <label>Telepon</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['telepon'] ?>" name="telepon">
                      </div>
                      <div class="mt-3">
                        <label>Alamat</label>
                        <input type="text" class="input w-full border mt-2" value="<?= $profiel['alamat'] ?>" name="alamat">
                      </div>
                    </div>
                    <button type="submit" class="button w-50 bg-theme-1 text-white ml-auto ">Simpan</button>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

</body>

</html>