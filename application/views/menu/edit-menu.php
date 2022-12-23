<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <form action="<?= base_url('menu/editmenu') ?>" method="POST">
        <input type="hidden" name="id" value="<?= $id_menu['id'] ?>">
        <div class="class=" card" style="width: 40%;" class=" m-auto"">
            <div class=" form-group">
            <label for="menu">Menu :</label>
            <input type="text" class="form-control" id="menu" name="menu" value="<?= $id_menu['menu'] ?>">
            <div class="form-text text-danger"><?= form_error('menu') ?></div>
        </div>

        <div class="card-body">
            <button type="submit" onclick="return confirm('Data akan diubah?')" class="btn btn-primary float-right">Ubah</button>
            <a href="<?= base_url('menu') ?>" class="card-link btn btn-primary float-right mr-3">Kembali</a>
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