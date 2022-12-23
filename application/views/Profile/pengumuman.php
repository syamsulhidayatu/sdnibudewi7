<aside id="fh5co-hero">
    <div class="flexslider">
        <ul class="slides">
            <li style="background-image: url(<?= base_url() ?>/assets/profile/images/p.jpeg);">
                <div class="overlay-gradient"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-center slider-text">
                            <div class="slider-text-inner">
                                <h1 class="heading-section">PENGUMUMAN</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</aside>

<center>
    <div id="fh5co-about">
        <div class="container">
            <div class="col-md-3"></div>
            <div class="col-md-6 animate-box">
                <span>PENGURUS PONDOK PESANTREN AL - INTIQOL</span>
                <h2><?= $pengumuman['judul'] ?> </h2>
                <p>Assalaamu’alaikum Wr. Wb.</p>

                <p><?= $pengumuman['isi_pengumuman'] ?> </p>

                <p>Wassalaamu’alaikum Wr. Wb.</p>
            </div>
        </div>
    </div>
</center>