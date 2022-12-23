<aside id="fh5co-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(<?= base_url() ?>/assets/profile/images/acara.jpg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center slider-text">
                            <div class="slider-text-inner">
                                <h1 class="heading-section">Acara Sekolah</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<div id="fh5co-course">
    <div class="container">
        <div class="row animate-box">
            <div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
                <h2>Acara Sekolah SDN Ibu Dewi 7</h2>
                <p>Dibawah sini adalah semua acara mengenai sekolah SDN Ibu Dewi 7</p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($berita as $b) : ?>
                <div class="col-lg-4 col-md-4">
                    <div class="fh5co-blog animate-box">
                        <a href="<?= base_url('Profile/berita/' . $b['id']); ?>" class="blog-img-holder" style="background-image: url(<?= base_url('/assets/profile/images/berita/') . $b['foto_berita'] ?>);"></a>
                        <div class="blog-text">
                            <h3><a href="<?= base_url('Profile/berita/' . $b['id']); ?>"><?= $b['judul_berita'] ?></a></h3>
                            <span class="posted_on"><?= date('d M Y', $b['date_created']) ?>.</span>
                            <p><?= substr($b['isi_berita'], '0', '250') ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>