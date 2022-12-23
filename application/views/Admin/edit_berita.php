<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="card text-center">
        <div class="card-header">
            <h3>
                BERITA
            </h3>
        </div>
        <div class="card-body">

            <?= form_open_multipart('admin/edit_berita') ?>

            <input type="hidden" id="id" name="id" value="<?= $berita['id'] ?>">
            <input type="hidden" id="ft_berita" name="ft_berita" value="<?= $berita['foto_berita'] ?>">

            <div class="form-group row">
                <label for="judul_berita" class="col-sm-12 col-form-label"><strong>--- JUDUL BERITA ---</strong></label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?= $berita['judul_berita'] ?>">
                    <?= form_error('judul_berita', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 mb-3"><strong>--- FOTO BERITA ---</strong></div>
                <div class="col-sm-3 mb-3"></div>
                <img class="col-sm-6 img-responsive mb-3" style="width: 450px;" src="<?= base_url() ?>/assets/profile/images/berita/<?= $berita['foto_berita'] ?>">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm">

                            <div class="input-group ">
                                <input type="file" class="form-control" id="foto_berita" name="foto_berita">
                                <label class="input-group-text" for="foto_berita">Upload</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="isi_berita" class="col-sm-12 col-form-label"><strong>--- ISI BERITA ---</strong></label>
                <div class="col-sm-12">
                    <textarea type="text" class="form-control texteditor" name="isi_berita" id="isi_berita"><?= $berita['isi_berita'] ?></textarea>
                    <?= form_error('isi_berita', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row float-right">
                <div class="col-sm-9">
                    <button type="submit" onclick="return confirm('Anda akan mengubah Berita?')" class="btn btn-primary">ubah</button>
                </div>
            </div>

            <div class="form-group row float-right mr-2">
                <div class="col-sm-9">
                    <a href="<?= base_url('admin/berita') ?>" class="btn btn-primary">Kembali</a>
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