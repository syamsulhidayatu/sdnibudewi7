<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="card text-center">
        <div class="card-header">
            <h3>
                PENGUMUMAN
            </h3>
        </div>
        <div class="card-body">

            <form action="<?= base_url('admin/add_pengumuman') ?>" method="post">

                <div class="form-group row">
                    <label for="judul" class="col-sm-12 col-form-label"><strong>--- JUDUL PENGUMUMAN ---</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="judul" name="judul">
                        <?= form_error('judul', '<small class="text-danger ">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="isi_pengumuman" class="col-sm-12 col-form-label"><strong>--- ISI PENGUMUMAN ---</strong></label>
                    <div class="col-sm-12">
                        <textarea type="text" class="form-control texteditor" name="isi_pengumuman" id="isi_pengumuman"></textarea>
                        <?= form_error('isi_pengumuman', '<small class="text-danger ">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row float-right">
                    <div class="col-sm-9">
                        <button type="submit" onclick="return confirm('Anda akan menambahkan Berita?')" class="btn btn-primary">Tambah</button>
                    </div>
                </div>

                <div class="form-group row float-right mr-2">
                    <div class="col-sm-9">
                        <a href="<?= base_url('admin/pengumuman') ?>" class="btn btn-primary">Kembali</a>
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