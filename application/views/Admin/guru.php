<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Guru</h6>
        </div>
        <?php if (empty($guru)) : ?>
            <div class="alert alert-success ml-4 mt-3 w-25 " role="alert">Data Guru Tidak Ada!</div>
        <?php endif ?>
        <div class="row-mt-3 ">
            <a href="<?= base_url(); ?>admin/add_guru" class="btn btn-primary mt-4 ml-4 w-25">Tambah data</a>
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
                            <th scope="col">Nama</th>
                            <th scope="col">Pelajaran </th>
                            <th scope="col">Pesan</th>
                            <th scope="col">Link FB</th>
                            <th scope="col" width="9%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $start = 0;
                        foreach ($guru as $g) : ?>
                            <tr>
                                <th scope="row"><?= ++$start ?></th>
                                <td><img style="width: 5rem;" src="<?= base_url('assets/profile/images/guru/') . $g['foto_guru'] ?>" class="card-img-top"></td>
                                <td><?= $g['nama']; ?></td>
                                <td><?= $g['pelajaran']; ?></td>
                                <td><?= $g['pesan']; ?></td>
                                <td><?= $g['link_fb']; ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>admin/edit_guru/<?= $g['id'] ?>" class=" btn btn-sm btn-success btn-circle"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url(); ?>admin/delete_guru/<?= $g['id'] ?>" onclick="return confirm('Data akan dihapus?')" class=" btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
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