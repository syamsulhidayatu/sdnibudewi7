<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>

            <?= form_open_multipart('admin/tambah') ?>

            <div class="form-group row">
                <label for="email" class="col-sm-3 col-form-label">Email pendaftar</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama">
                    <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_panggilan" class="col-sm-3 col-form-label">Nama Panggilan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan">
                </div>
            </div>

            <div class="form-group row">
                <label for="jenis_kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <select class="form-select form-select ml-3" id="jenis_kelamin" name="jenis_kelamin">
                    <option value="putra">Putra</option>
                    <option value="putri">Putri</option>
                </select>
            </div>

            <div class="form-group row">
                <label for="kelas" class="col-sm-3 col-form-label">Kelas :</label>
                <select class="form-select form-select ml-3" id="kelas" name="kelas">
                    <option value="1 Ibtida">1 Ibtida</option>
                    <option value="2 Ibtida">2 Ibtida</option>
                    <option value="3 Ibtida">3 Ibtida</option>
                    <option value="1 Tsanawi">1 Tsanawi</option>
                    <option value="2 Tsanawi">2 Tsanawi</option>
                    <option value="3 Tsanawi">3 Tsanawi</option>
                </select>
            </div>

            <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                    <?= form_error('tempat_lahir', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                    <?= form_error('tanggal_lahir', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat_lengkap" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap">
                    <?= form_error('alamat_lengkap', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="asal_pesantren_sekolah" class="col-sm-3 col-form-label">Asal Pesantren / Sekolah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="asal_pesantren_sekolah" name="asal_pesantren_sekolah">
                </div>
            </div>

            <div class="form-group row">
                <label for="no_hp_santri" class="col-sm-3 col-form-label">No HP Santri</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_hp_santri" name="no_hp_santri">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_wali" class="col-sm-3 col-form-label">Nama Wali </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_wali" name="nama_wali">
                    <?= form_error('nama_wali', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="no_hp_wali" class="col-sm-3 col-form-label">No HP Wali </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali">
                </div>
            </div>

            <div class="form-group row">
                <label for="angkatan" class="col-sm-3 col-form-label">Tahun Ajaran :- Contoh : 2018 / 2019 </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="angkatan" name="angkatan">
                    <?= form_error('angkatan', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">Foto Santri</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm">

                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_santri" name="foto_santri" required>
                                <label class="input-group-text" for="foto_santri">Upload</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">Foto KK santri</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm">

                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_kk_santri" name="foto_kk_santri" required>
                                <label class="input-group-text" for="foto_kk_santri">Upload</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">Foto KTP Wali</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm">

                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_ktp_wali" name="foto_ktp_wali" required ">
                                <label class=" input-group-text" for="foto_ktp_wali">Upload</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row float-right">
                <div class="col-sm-9">
                    <button type="submit" onclick="confirm('Anda akan menambahkan data santri?')" class="btn btn-primary">Tambah</button>
                </div>
            </div>

            <div class="form-group row float-right mr-2">
                <div class="col-sm-9">
                    <a href="<?= base_url('admin') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>


            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->