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

            <?= form_open_multipart('admin/edit_guru') ?>

            <input type="hidden" id="id" name="id" value="<?= $guru['id'] ?>">
            <input type="hidden" id="ft_guru" name="ft_guru" value="<?= $guru['foto_guru'] ?>">

            <div class="form-group row">
                <label for="nama" class="col-sm-12 col-form-label"><strong>--- Nama Guru ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $guru['nama'] ?>">
                    <?= form_error('nama', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="pelajaran" class="col-sm-12 col-form-label"><strong>--- Guru Mengajari ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="pelajaran" name="pelajaran" value="<?= $guru['pelajaran'] ?>">
                    <?= form_error('pelajaran', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <label for="pesan" class="col-sm-12 col-form-label"><strong>--- Pesan ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="pesan" name="pesan" value="<?= $guru['pesan'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="link_fb" class="col-sm-12 col-form-label"><strong>--- Link FB ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="link_fb" name="link_fb" value="<?= $guru['link_fb'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 mb-3"><strong>--- FOTO GURU ---</strong></div>
                <div class="col-sm-3 mb-3"></div>
                <img class="col-sm-6 img-responsive mb-3" style="width: 450px;" src="<?= base_url() ?>/assets/profile/images/guru/<?= $guru['foto_guru'] ?>">
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
                    <button type="submit" onclick="return confirm('Anda akan mengubah Data Guru?')" class="btn btn-primary">ubah</button>
                </div>
            </div>

            <div class="form-group row float-right mr-2">
                <div class="col-sm-9">
                    <a href="<?= base_url('admin/guru') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>

            </form>

        </div>
        <div class="card-footer text-muted">
            <?= date('d M Y', time()) ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->