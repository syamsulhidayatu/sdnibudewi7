<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="card text-center">
        <div class="card-header">
            Berita
        </div>
        <div class="card-body row">
            <div class="col-sm-6">
                <h5 class="card-title"><?= $berita['judul_berita'] ?></h5>
                <p class="card-text"><?= $berita['isi_berita'] ?></p>
            </div>
            <div class="col-md-6">
                <img class="img-responsive" style="width: 450px;" src="<?= base_url() ?>/assets/profile/images/berita/<?= $berita['foto_berita'] ?>" alt="Bapa Pimpinan">
            </div>
        </div>
        <div class="card-footer text-muted">
            <?= date('d M Y', $berita['date_created']) ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->