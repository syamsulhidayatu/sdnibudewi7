<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <form action="<?= base_url('admin/editrole') ?>" method="POST">
        <input type="hidden" name="id" value="<?= $id_role['id'] ?>">
        <div class="class=" card" style="width: 40%;" class=" m-auto"">
            <div class=" form-group">
            <label for="role">Role :</label>
            <input type="text" class="form-control" id="role" name="role" value="<?= $id_role['role'] ?>">
            <div class="form-text text-danger"><?= form_error('role') ?></div>
        </div>

        <div class="card-body">
            <button type="submit" onclick="return confirm('Data akan diubah?')" class="btn btn-primary float-right">Ubah</button>
            <a href="<?= base_url('admin/role') ?>" class="card-link btn btn-primary float-right mr-3">Kembali</a>
        </div>

    </form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>