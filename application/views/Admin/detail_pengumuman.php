<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <div class="card text-center">
        <div class="card-header">
            Pengumuman
        </div>
        <div class="card-body">
            <h5 class="card-title"><?= $pengumuman['judul'] ?></h5>
            <p class="card-text"><?= $pengumuman['isi_pengumuman'] ?></p>
        </div>
        <div class="card-footer text-muted">
            <?= date('d M Y', $pengumuman['date_created']) ?>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->