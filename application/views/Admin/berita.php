<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Berita</h6>
        </div>
        <?php if (empty($berita)) : ?>
            <div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data Tidak Ada!</div>
        <?php endif ?>
        <div class="row-mt-3 ">
            <a href="<?= base_url(); ?>admin/add_berita" class="btn btn-primary mt-4 ml-4 w-25">Tambah data</a>
            <div class="col-md-4 ml-2 mr-2 mt-4 float-right">
                <form action="" method="post">
                    <div class="input-group ">
                        <input type="text" class="form-control" placeholder="Cari data berita..." name="keyword" autocomplete="off" autofocus>
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
                            <th scope="col">Judul</th>
                            <th scope="col">Tanggal </th>
                            <th scope="col">Pengumuman</th>
                            <th scope="col" width="12%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $start = 0;
                        foreach ($berita as $b) : ?>
                            <tr>
                                <th scope="row"><?= ++$start ?></th>
                                <td><img style="width: 5rem;" src="<?= base_url('assets/profile/images/berita/') . $b['foto_berita'] ?>" class="card-img-top"></td>
                                <td><?= $b['judul_berita']; ?></td>
                                <td><?= date('d M Y', $b['date_created']); ?></td>
                                <td><?= substr($b['isi_berita'], 0, 35) . '...'; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/edit_berita/<?= $b['id'] ?>" class=" btn btn-sm btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url(); ?>admin/delete_berita/<?= $b['id'] ?>" onclick="return confirm('Data akan dihapus?')" class=" btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                    <a href="<?= base_url(); ?>admin/detail_berita/<?= $b['id'] ?>" class="btn btn-sm btn-info btn-circle"><i class="fas fa-info"></i></a>
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