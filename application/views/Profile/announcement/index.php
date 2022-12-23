<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url(<?= base_url() ?>/assets/profile/images/pengumuman.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1 class="heading-section">Pengumuman</h1>
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
				<h2>Pengumuman Sekolah SDN IBU DEWI 7</h2>
				<p>Dibawah sini adalah semua pengumuman mengenai sekolah SDN IBU DEWI 7</p>
			</div>
		</div>
		<div class="row">
			<div class="row row-padded-mb">
				<?php foreach ($pengumuman as $p) : ?>
					<div class="col-md-4 animate-box">
						<div class="fh5co-event">
							<div class="date text-center"><span><?= date('d', $p['date_created']) ?><br><?= date('M', $p['date_created']) ?>.</span></div>
							<h3><a href="<?= base_url('Profile/pengumuman/' . $p['id']); ?>"><?= $p['judul'] ?></a></h3>
							<p><?= substr($p['isi_pengumuman'], '0', '200') ?></p>
							<p><a href="<?= base_url('Profile/pengumuman/' . $p['id']); ?>">Terus Baca </a></p>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>