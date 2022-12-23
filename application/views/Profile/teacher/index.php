<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url(<?= base_url() ?>/assets/profile/images/guru.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1 class="heading-section">Guru Pengajar</h1>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>

<div id="fh5co-staff">
	<div class="container">
		<div class="row">
			<?php foreach ($guru as $g) : ?>
				<div class="col-md-3 animate-box text-center">
					<div class="staff">
						<div class="staff-img" style="background-image: url(<?= base_url('/assets/profile/images/guru/') . $g['foto_guru'] ?>);">
							<ul class="fh5co-social">
								<li><a href="<?= $g['link_fb'] ?>"><i class="icon-facebook2"></i></a></li>
							</ul>
						</div>
						<span>Mengajar <?= $g['pelajaran'] ?></span>
						<h3><?= $g['nama'] ?></h3>
						<p><?= $g['pesan'] ?></p>
					</div>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</div>