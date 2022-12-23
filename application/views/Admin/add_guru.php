<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="card text-center">
        <div class="card-header">
            <h3>
                GURU
            </h3>
        </div>
        <div class="card-body">

            <?= form_open_multipart('admin/add_guru') ?>

            <div class="form-group row">
                <label for="nama" class="col-sm-12 col-form-label"><strong>--- Nama Guru ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nama" name="nama">
                    <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="pelajaran" class="col-sm-12 col-form-label"><strong>--- Mengajar Pelajaran ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="pelajaran" name="pelajaran">
                    <?= form_error('pelajaran', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="link_fb" class="col-sm-12 col-form-label"><strong>--- Link Facebook ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="link_fb" name="link_fb">
                    <?= form_error('link_fb', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="pesan" class="col-sm-12 col-form-label"><strong>--- Pesan Guru ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="pesan" name="pesan">
                    <?= form_error('pesan', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 mb-3"><strong>--- FOTO GURU ---</strong></div>
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm">

                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_guru" name="foto_guru">
                                <label class="input-group-text" for="foto_guru">Upload</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row float-right">
                <div class="col-sm-9">
                    <button type="submit" onclick="return confirm('Anda akan menambahkan berita?')" class="btn btn-primary">Tambah</button>
                </div>
            </div>

            <div class="form-group row float-right mr-2">
                <div class="col-sm-9">
                    <a href="<?= base_url('admin/berita') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>

            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->