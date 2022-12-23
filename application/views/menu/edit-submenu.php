<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    <form action="<?= base_url('menu/edit_submenu') ?>" method="POST">
        <input type="hidden" name="id" value="<?= $id_submenu['id'] ?>">
        <div class="class=" card" style="width: 40%;" class=" m-auto"">
            
        <div class=" form-group">
            <label for="title">Title :</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $id_submenu['title'] ?>">
            <div class="form-text text-danger"><?= form_error('title') ?></div>
        </div>

        <div class="form-group">
            <label for="menu_id">Menu :</label>
            <select name="menu_id" id="menu_id" class="form-control">
                <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id'] ?>"><?= $m['menu'] ?></option>
                <?php endforeach ?>
            </select>
        </div>

        <div class=" form-group">
            <label for="url">URL :</label>
            <input type="text" class="form-control" id="url" name="url" value="<?= $id_submenu['url'] ?>">
            <div class="form-text text-danger"><?= form_error('url') ?></div>
        </div>

        <div class=" form-group">
            <label for="icon">Icon :</label>
            <input type="text" class="form-control" id="icon" name="icon" value="<?= $id_submenu['icon'] ?>">
            <div class="form-text text-danger"><?= form_error('icon') ?></div>
        </div>

        <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" checked name="is_active" id="is_active">
                <label class="form-check-label" for="is_active">
                    Active ?
                </label>
            </div>
        </div>

        <div class="card-body">
            <button type="submit" onclick="return confirm('Data akan diubah?')" class="btn btn-primary float-right">Ubah</button>
            <a href="<?= base_url('menu/submenu') ?>" class="card-link btn btn-primary float-right mr-3">Kembali</a>
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