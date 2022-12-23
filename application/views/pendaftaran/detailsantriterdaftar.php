<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="card" style="width: 50%;" class=" m-auto">
        <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $santriterdaftar['foto_santri'] ?>" class="card-img-top">
        <div class="card-body">
            <h5 class="card-title"><?= $santriterdaftar['nama'] ?></h5>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Email Pendaftar = </strong><?= $santriterdaftar['email_pendaftar'] ?></li>
            <li class="list-group-item"><strong>Nama Panggilan = </strong><?= $santriterdaftar['nama_panggilan'] ?></li>
            <li class="list-group-item"><strong>Jenis Kelamin = </strong><?= $santriterdaftar['jenis_kelamin'] ?></li>
            <li class="list-group-item"><strong>Tempat lahir = </strong><?= $santriterdaftar['tempat_lahir'] ?></li>
            <li class="list-group-item"><strong>Tanggal lahir = </strong><?= $santriterdaftar['tanggal_lahir'] ?></li>
            <li class="list-group-item"><strong>Alamat Lengkap = </strong><?= $santriterdaftar['alamat_lengkap'] ?></li>
            <li class="list-group-item"><strong>Asal Pesantren / Sekolah = </strong><?= $santriterdaftar['asal_pesantren_sekolah'] ?></li>
            <li class="list-group-item"><strong>No HP Santri =</strong> <?= $santriterdaftar['no_hp_santri'] ?></li>
            <li class="list-group-item"><strong>Nama Wali = </strong><?= $santriterdaftar['nama_wali'] ?></li>
            <li class="list-group-item"><strong>No HP Wali =</strong> <?= $santriterdaftar['no_hp_wali'] ?></li>
            <li class="list-group-item"><strong>Angkatan =</strong> <?= $santriterdaftar['angkatan'] ?></li>
            <li class="list-group-item"><img style="width: 30%;" src="<?= base_url('assets/admin/img/data_foto_santri/') . $santriterdaftar['foto_kk_santri'] ?>" class="card-img-top"></li>
            <li class="list-group-item"><img style="width: 30%;" src="<?= base_url('assets/admin/img/data_foto_santri/') . $santriterdaftar['foto_ktp_wali'] ?>" class="card-img-top"></li>
        </ul>
        <div class="card-body">
            <a href="<?= base_url('pendaftaran/santriterdaftar') ?>" class="card-link btn btn-primary float-right">Kembali</a>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->