<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Alumni</h6>
        </div>
        <?php if (empty($alumni)) : ?>
            <div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data Alumni Tidak Ada!</div>
        <?php endif ?>
        <?= $this->session->flashdata('message'); ?>
        <div class="row-mt-3 ">
            <a href="<?= base_url(); ?>admin/tambah_alumni" class="btn btn-primary mt-4 ml-4 w-25">Tambah data</a>
            <div class="col-md-4 ml-2 mr-2 mt-4 float-right">
                <form action="" method="post">
                    <div class="input-group ">
                        <input type="text" class="form-control" placeholder="Cari data alumni..." name="keyword" autocomplete="off" autofocus>
                        <input type="submit" class="btn btn-primary" name="submit">
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kelamin</th>
                            <th scope="col">Angkatan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No HP</th>
                            <th scope="col">Pekerjaan</th>
                            <th scope="col" width="9%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($alumni as $a) : ?>
                            <tr>
                                <th scope="row"><?= ++$start ?></th>
                                <td><img style="width: 5rem;" src="<?= base_url('assets/admin/img/data_foto_santri/') . $a['foto_alumni'] ?>" class="card-img-top"></td>
                                <td><?= $a['nama']; ?></td>
                                <td><?= $a['kelamin']; ?></td>
                                <td><?= $a['angkatan']; ?></td>
                                <td><?= $a['alamat']; ?></td>
                                <td><?= $a['no_hp']; ?></td>
                                <td><?= $a['pekerjaan']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/ubah_alumni/<?= $a['id'] ?>" class=" btn btn-sm btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url(); ?>admin/hapus_alumni/<?= $a['id'] ?>" onclick="return confirm('Data akan dihapus?')" class=" btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <h6>Jumlah : <?= $total_rows ?></h6>
                <?= $this->pagination->create_links(); ?>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->