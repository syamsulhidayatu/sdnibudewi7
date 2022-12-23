<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="row">
        <div style="width: 25%;"></div>
        <div class="card" style="width: 50%;" class=" m-auto">
            <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $detail_santri['foto_santri'] ?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?= $detail_santri['nama'] ?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Email Pendaftar = </strong><?= $detail_santri['email_pendaftar'] ?></li>
                <li class="list-group-item"><strong>Nama Panggilan = </strong><?= $detail_santri['nama_panggilan'] ?></li>
                <li class="list-group-item"><strong>Jenis Kelamin = </strong><?= $detail_santri['jenis_kelamin'] ?></li>
                <li class="list-group-item"><strong>Kelas = </strong><?= $detail_santri['kelas'] ?></li>
                <li class="list-group-item"><strong>Tempat lahir = </strong><?= $detail_santri['tempat_lahir'] ?></li>
                <li class="list-group-item"><strong>Tanggal lahir = </strong><?= $detail_santri['tanggal_lahir'] ?></li>
                <li class="list-group-item"><strong>Alamat Lengkap = </strong><?= $detail_santri['alamat_lengkap'] ?></li>
                <li class="list-group-item"><strong>Asal Pesantren / Sekolah = </strong><?= $detail_santri['asal_pesantren_sekolah'] ?></li>
                <li class="list-group-item"><strong>No HP Santri =</strong> <?= $detail_santri['no_hp_santri'] ?></li>
                <li class="list-group-item"><strong>Nama Wali = </strong><?= $detail_santri['nama_wali'] ?></li>
                <li class="list-group-item"><strong>No HP Wali =</strong> <?= $detail_santri['no_hp_wali'] ?></li>
                <li class="list-group-item"><strong>Angkatan =</strong> <?= $detail_santri['angkatan'] ?></li>
            </ul>
            <div class="card-body">
                <a href="<?= base_url('admin') ?>" class="card-link btn btn-primary float-right">Kembali</a>
            </div>
        </div>
    </div>
    <br>
    <h5 class="card-title mt-3 mb-3">Foto Kartu Keluarga (kk) Santri</h5>
    <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $detail_santri['foto_kk_santri'] ?>" class="card-img-top">
    <h5 class="card-title mt-3 mb-3">Foto Kartu Tanda Penduduk (KTP) Santri</h5>
    <img src="<?= base_url('assets/admin/img/data_foto_santri/') . $detail_santri['foto_ktp_wali'] ?>" class="card-img-top">

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->