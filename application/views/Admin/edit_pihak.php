<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="card text-center">
        <div class="card-header">
            <h3>
                PIHAK
            </h3>
        </div>
        <div class="card-body">

            <form action="<?= base_url('admin/edit_pihak') ?>" method="post">

                <input type="hidden" id="id" name="id" value="<?= $pihak['id'] ?>">

                <div class="form-group row">
                    <label for="jumlah_putra" class="col-sm-12 col-form-label"><strong>--- Jumlah siswa ---</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="jumlah_putra" name="jumlah_putra" value="<?= $pihak['jumlah_putra'] ?>">
                        <?= form_error('jumlah_putra', '<small class="text-danger ">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jumlah_putri" class="col-sm-12 col-form-label"><strong>--- Jumlah siswi ---</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="jumlah_putri" name="jumlah_putri" value="<?= $pihak['jumlah_putri'] ?>">
                        <?= form_error('jumlah_putri', '<small class="text-danger ">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jumlah_pengurus" class="col-sm-12 col-form-label"><strong>--- Jumlah Guru ---</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="jumlah_pengurus" name="jumlah_pengurus" value="<?= $pihak['jumlah_pengurus'] ?>">
                        <?= form_error('jumlah_pengurus', '<small class="text-danger ">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="jumlah_alumni" class="col-sm-12 col-form-label"><strong>--- Jumlah Alumni ---</strong></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="jumlah_alumni" name="jumlah_alumni" value="<?= $pihak['jumlah_alumni'] ?>">
                        <?= form_error('jumlah_alumni', '<small class="text-danger ">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row float-right">
                    <div class="col-sm-9">
                        <button type="submit" onclick="return confirm('Anda akan mengubah Data Pihak?')" class="btn btn-primary">ubah</button>
                    </div>
                </div>

                <div class="form-group row float-right mr-2">
                    <div class="col-sm-9">
                        <a href="<?= base_url('admin/pihak') ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </div>

            </form>

        </div>
        <div class="card-footer text-muted">
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->