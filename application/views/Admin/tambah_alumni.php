<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>

            <?= form_open_multipart('admin/tambah_alumni') ?>

            <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama">
                    <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="kelamin" class="col-sm-3 col-form-label">Kelamin</label>
                <select class="form-select form-select ml-3" id="kelamin" name="kelamin">
                    <option value="putra">Putra</option>
                    <option value="putri">Putri</option>
                </select>
            </div>

            <div class="form-group row">
                <label for="angkatan" class="col-sm-3 col-form-label">Angkatan :- Contoh : 2018 / 2019 </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="angkatan" name="angkatan">
                    <?= form_error('angkatan', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat Lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="alamat" name="alamat">
                    <?= form_error('alamat', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="no_hp" class="col-sm-3 col-form-label">No HP </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="no_hp" name="no_hp">
                </div>
            </div>

            <div class="form-group row">
                <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-3">Foto Alumni</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm">

                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_alumni" name="foto_alumni">
                                <label class="input-group-text" for="foto_alumni">Upload</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row float-right">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>


            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->