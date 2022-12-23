<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>

            <?= form_open_multipart('admin/ubah') ?>
            <input type="hidden" id="ft_santri" name="ft_santri" value="<?= $detail_santri['foto_santri'] ?>">
            <input type="hidden" id="ft_kk_santri" name="ft_kk_santri" value="<?= $detail_santri['foto_kk_santri'] ?>">
            <input type="hidden" id="ft_ktp_wali" name="ft_ktp_wali" value="<?= $detail_santri['foto_ktp_wali'] ?>">
            <input type="hidden" id="id" name="id" value="<?= $detail_santri['id'] ?>">

            <div class="form-group row">
                <label for="email_pendaftar" class="col-sm-3 col-form-label">Email Pendaftar</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="email_pendaftar" name="email_pendaftar" value="<?= $detail_santri['email_pendaftar'] ?>" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $detail_santri['nama'] ?>">
                    <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_panggilan" class="col-sm-3 col-form-label">Nama Panggilan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="<?= $detail_santri['nama_panggilan'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="kelamin" class="col-sm-3 col-form-label">Kelamin</label>
                <select class="form-select form-select ml-3" id="kelamin" name="kelamin">
                    <?php foreach ($kelamin as $k) : ?>
                        <?php if ($k == $detail_santri['kelamin']) : ?>
                            <option value="<?= $k ?>" selected><?= $k ?></option>
                        <?php else : ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group row">
                <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                <select class="form-select form-select ml-3" id="kelas" name="kelas">
                    <?php foreach ($kelas as $k) : ?>
                        <?php if ($k == $detail_santri['kelas']) : ?>
                            <option value="<?= $k ?>" selected><?= $k ?></option>
                        <?php else : ?>
                            <option value="<?= $k ?>"><?= $k ?></option>
                        <?php endif ?>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="form-group row">
                <label for="tempat_lahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $detail_santri['tempat_lahir'] ?>">
                    <?= form_error('tempat_lahir', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $detail_santri['tanggal_lahir'] ?>">
                    <?= form_error('tanggal_lahir', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class=" form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $detail_santri['alamat_lengkap'] ?>">
                    <?= form_error('alamat', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="asal_pesantren_sekolah" class="col-sm-3 col-form-label">Asal Pesantren atau Sekolah</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="asal_pesantren_sekolah" name="asal_pesantren_sekolah" value="<?= $detail_santri['asal_pesantren_sekolah'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="no_hp_santri" class="col-sm-3 col-form-label">No HP Santri</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_hp_santri" name="no_hp_santri" value="<?= $detail_santri['no_hp_santri'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="nama_wali" class="col-sm-3 col-form-label">Nama Wali</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_wali" name="nama_wali" value="<?= $detail_santri['nama_wali'] ?>">
                    <?= form_error('nama_wali', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="no_hp_wali" class="col-sm-3 col-form-label">No HP Wali</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_hp_wali" name="no_hp_wali" value="<?= $detail_santri['no_hp_wali'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="angkatan" class="col-sm-3 col-form-label">Angkatan :- Contoh : 2018 / 2019 </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?= $detail_santri['angkatan'] ?>">
                    <?= form_error('angkatan', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class=" form-group row">
                <div class="col-sm-3">Foto Santri</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $detail_santri['foto_santri'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_santri" name="foto_santri">
                                <label class=" input-group-text" for="foto_santri">Upload</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" form-group row">
                <div class="col-sm-3">Foto KK Santri</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $detail_santri['foto_kk_santri'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_kk_santri" name="foto_kk_santri">
                                <label class=" input-group-text" for="foto_kk_santri">Upload</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" form-group row">
                <div class="col-sm-3">Foto KTP Wali</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $detail_santri['foto_ktp_wali'] ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_ktp_wali" name="foto_ktp_wali">
                                <label class=" input-group-text" for="foto_ktp_wali">Upload</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row float-right">
                <div class="col-sm-9">
                    <button type="submit" onclick="confirm('Data akan diedit?')" class="btn btn-primary">Edit</button>
                </div>
            </div>
            <a href="<?= base_url('admin') ?>" class="btn btn-primary float-right mr-2">kembali</a>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->