<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/edit') ?>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama sekolah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="email" value="Kepala Sekolah SDN IBU DEWI 7">
                </div> 
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="email" value="TITA ROSITA S.Pd,M.Pd" >
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Sambutan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="Assalamualaikum wr.wb. Puji syukur kami panjatkan ke hadirat Allah SWT yang atas berkat rahmat dan hidayah-Nya kami bisa meluncurkan situs web SDN IBU DEWI 7 ini di Internet. Situs web ini bertujuan untuk memperkenalkan SDN IBU DEWI 7 sebagai lembaga pendidikan dengan memanfaatkan media teknologi interne">
                    <?= form_error('name', '<small class="text-danger ">', '</small>'); ?>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-2">Picture</div>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                           
                        </div>
                        <div class="col-sm-9">

                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="image" name="image">
                                <label class="input-group-text" for="image">Upload</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row float-right">
                    <div class="col-sm-9">
                        <button type="submit" onclick="return confirm('Anda akan mengubah kepsek?')" class="btn btn-primary">edit</button>
                    </div>
                </div>
            </form>
            <div class="card-footer text-muted">
        </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->