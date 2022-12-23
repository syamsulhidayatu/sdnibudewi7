<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Calon Santri</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto Santri</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelamin</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Tempat Lahir</th>
                            <th scope="col">Nama Wali</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($santriterdaftar as $st) : ?> <tr>
                                <th scope="row">
                                    <?= $i++ ?>
                                </th>
                                <td><img style="width: 5rem;" src="<?= base_url('assets/admin/img/data_foto_santri/') . $st['foto_santri'] ?>" class="card-img-top"></td>
                                <td><?= $st['nama']; ?></td>
                                <td><?= $st['jenis_kelamin']; ?></td>
                                <td><?= $st['angkatan']; ?></td>
                                <td><?= $st['tempat_lahir']; ?></td>
                                <td><?= $st['nama_wali']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>pendaftaran/detailsantriterdaftar/<?= $st['id'] ?>" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->