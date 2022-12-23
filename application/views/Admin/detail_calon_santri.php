<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="row">
        <div style="width: 25%;"></div>
        <div class="card" style="width: 50%;" class=" m-auto">
            <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $pendaftar['foto_santri'] ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $pendaftar['nama'] ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Email Pendaftar = </strong><?= $pendaftar['email_pendaftar'] ?></li>
                <li class="list-group-item"><strong>Nama Panggilan = </strong><?= $pendaftar['nama_panggilan'] ?></li>
                <li class="list-group-item"><strong>Jenis Kelamin = </strong><?= $pendaftar['jenis_kelamin'] ?></li>
                <li class="list-group-item"><strong>Tempat lahir = </strong><?= $pendaftar['tempat_lahir'] ?></li>
                <li class="list-group-item"><strong>Tanggal lahir = </strong><?= $pendaftar['tanggal_lahir'] ?></li>
                <li class="list-group-item"><strong>Alamat Lengkap = </strong><?= $pendaftar['alamat_lengkap'] ?></li>
                <li class="list-group-item"><strong>Asal Pesantren / Sekolah = </strong><?= $pendaftar['asal_pesantren_sekolah'] ?></li>
                <li class="list-group-item"><strong>No HP Santri =</strong> <?= $pendaftar['no_hp_santri'] ?></li>
                <li class="list-group-item"><strong>Nama Wali = </strong><?= $pendaftar['nama_wali'] ?></li>
                <li class="list-group-item"><strong>No HP Wali =</strong> <?= $pendaftar['no_hp_wali'] ?></li>
                <li class="list-group-item"><strong>Angkatan =</strong> <?= $pendaftar['angkatan'] ?></li>
            </ul>
            <div class="card-body">
                <a href="<?= base_url('admin/listpendaftar') ?>" class="card-link btn btn-primary float-right">Kembali</a>
            </div>
        </div>
    </div>
    <br>
    <h5 class="card-title mt-3 mb-3">Foto Kartu Keluarga (kk) Santri</h5>
    <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $pendaftar['foto_kk_santri'] ?>" class="card-img-top">
    <h5 class="card-title mt-3 mb-3">Foto Kartu Tanda Penduduk (KTP) Santri</h5>
    <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $pendaftar['foto_ktp_wali'] ?>" class="card-img-top">

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->