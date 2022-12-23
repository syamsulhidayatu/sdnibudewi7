<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pihak</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Jumlah siswa laki-laki</th>
                            <th scope="col">Jumlah siswa Perempuan</th>
                            <th scope="col">Jumlah Guru</th>
                            <th scope="col">Jumlah Alumni keseluruhan</th>
                            <th scope="col" width="6%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pihak as $p) : ?>
                            <tr>
                                <td><?= $p['jumlah_putra']; ?></td>
                                <td><?= $p['jumlah_putri']; ?></td>
                                <td><?= $p['jumlah_pengurus']; ?></td>
                                <td><?= $p['jumlah_alumni']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/edit_pihak/<?= $p['id'] ?>" class=" btn btn-sm btn-success btn-circle"><i class="fas fa-edit"></i></a>
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