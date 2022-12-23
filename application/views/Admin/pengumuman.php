<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Pengumuman</h6>
        </div>
        <?php if (empty($pengumuman)) : ?>
            <div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data Tidak Ada!</div>
        <?php endif ?>
        <div class="row-mt-3 ">
            <a href="<?= base_url(); ?>admin/add_pengumuman" class="btn btn-primary mt-4 ml-4 w-25">Tambah data</a>
            <div class="col-md-4 ml-2 mr-2 mt-4 float-right">
                <form action="" method="post">
                    <div class="input-group ">
                        <input type="text" class="form-control" placeholder="Cari data ..." name="keyword" autocomplete="off" autofocus>
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
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal </th>
                            <th scope="col">Pengumuman</th>
                            <th scope="col" width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $start = 0;
                        foreach ($pengumuman as $p) : ?>
                            <tr>
                                <th scope="row"><?= ++$start ?></th>
                                <td><?= $p['judul']; ?></td>
                                <td><?= date('d M Y', $p['date_created']); ?></td>
                                <td><?= substr($p['isi_pengumuman'], 0, 35) . '...'; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/edit_pengumuman/<?= $p['id'] ?>" class=" btn btn-sm btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url(); ?>admin/delete_pengumuman/<?= $p['id'] ?>" onclick="return confirm('Data akan dihapus?')" class=" btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                    <a href="<?= base_url(); ?>admin/detail_pengumuman/<?= $p['id'] ?>" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
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