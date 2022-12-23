<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url(<?= base_url() ?>/assets/profile/images/ibudewi.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-10 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1>Selamat Datang Di Website SD Ibu Dewi VII</h1>
								<h2></h2>
								<p><a class="" href="<?= base_url('/auth') ?>"></a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(<?= base_url() ?>/assets/profile/images/halaman.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1>jika Anda penasaran Silakan Klik Menu-Menu Di Atas</h1>
								<h2></h2>
								<p><a class="" href="<?= base_url('/auth') ?>"></a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li style="background-image: url(<?= base_url() ?>/assets/profile/images/kegiatan.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1>Terima Kasih Telah Mengnjungi Website Kami</h1>
								<h2></h2>
								<p><a class="" href="<?= base_url('/auth') ?>"></a></p>
							</div>
						</div>
					</div>
				</div>
			</li>
		</ul>
	</div>
</aside>

<div id="fh5co-about">
	<div class="container">
		<div class="col-md-6 animate-box">
			<span>Kepla Sekolah SDN Ibu Dewi 7</span>
			<h2>TITA ROSITA S.Pd,M.Pd </h2>
			<p>Assalaamu’alaikum Wr. Wb.</p>
			<p>Puji syukur kami panjatkan ke hadirat Allah SWT yang atas berkat rahmat dan hidayah-Nya kami bisa meluncurkan situs web SDN IBU DEWI 7 ini di Internet. Situs web ini bertujuan untuk memperkenalkan SDN IBU DEWI 7 sebagai lembaga pendidikan dengan memanfaatkan media teknologi internet.</p>
			<p>Dengan adanya situs web ini, kami berharap SDN IBU DEWI INI dapat lebih dikenal di kalangan yang lebih luas. Selain itu melalui situs web ini juga, kami berharap dapat memberi kemudahan bagi para SISWA/SISWI dan orang tuanya untuk mengakses informasi mengenai kegiatan belajar mengajar di SDN IBU DEWI 7 ini dengan cepat & efisien.Akhir kata, kami berharap situs web ini dapat memberikan manfaat positif bagi siapa saja yang mengunjungi situs web kami ini.</p>
			<p>Wassalaamu’alaikum Wr. Wb.</p>
		</div>
		<div class="col-md-6">
			<img class="img-responsive" src="<?= base_url() ?>/assets/profile/images/kepsek.jpeg" alt="Bapa Pimpinan">
		</div>
	</div>
</div>

<div id="fh5co-counter" class="fh5co-counters" style="background-image: url(<?= base_url() ?>/assets/profile/images/img_bg_4.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">

			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<?php foreach ($pihak as $p) : ?>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="<?= $p['jumlah_putra'] ?>" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Jumlah Siswa laki-laki</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="<?= $p['jumlah_putri'] ?>" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Jumlah Siswa perempuan</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="<?= $p['jumlah_pengurus'] ?>" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Jumlah Guru</span>
						</div>
						<div class="col-md-3 col-sm-6 text-center animate-box">
							<span class="icon"><i class="icon-head"></i></span>
							<span class="fh5co-counter js-counter" data-from="0" data-to="<?= $p['jumlah_alumni'] ?>" data-speed="5000" data-refresh-interval="50"></span>
							<span class="fh5co-counter-label">Jumlah Alumni Keseluruhan </span>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="fh5co-gallery" class="fh5co-bg-section">
	<div class="row text-center">
		<h2><span>BANGUNAN DAN KELAS</span></h2>
	</div>
	<div class="row">
		<div class="col-md-3 col-padded">
			<a href="#" class="gallery" style="background-image: url(<?= base_url() ?>/assets/profile/images/halaman.jpg);"></a>
		</div>
		<div class="col-md-3 col-padded">
			<a href="#" class="gallery" style="background-image: url(<?= base_url() ?>/assets/profile/images/ibudewi.jpg);"></a>
		</div>
		<div class="col-md-3 col-padded">
			<a href="#" class="gallery" style="background-image: url(<?= base_url() ?>/assets/profile/images/tentang.jpg);"></a>
		</div>
		<div class="col-md-3 col-padded">
			<a href="#" class="gallery" style="background-image: url(<?= base_url() ?>/assets/profile/images/kontak.jpg);"></a>
		</div>
	</div>
</div>