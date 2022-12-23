<aside id="fh5co-hero">
	<div class="flexslider">
		<ul class="slides">
			<li style="background-image: url(<?= base_url() ?>/assets/profile/images/tentang.jpg);">
				<div class="overlay-gradient"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center slider-text">
							<div class="slider-text-inner">
								<h1 class="heading-section">Tentang Kita</h1>
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
			<span>Mengenai Tentang Sekolah Kita</span>
			<h2>SDN IBU DEWI 7</h2>
			<p>Assalaamu’alaikum Wr. Wb.</p>
			<p>Sekolah Dasar Negeri Ibu Dewi 7 merupakan salah satu sekolah dasar yang berada tepat satu lokasi dengan sekolah dasar negeri ibu dewi 3 dimana terdapat 7 ruangan dan 3 toilet diantaranya ruangan kepala sekolah, ruangan guru, dan ruang ajar. sekolah dasar negeri ibu dewi 7 ini sekarang akan menjadi sekolah dasar penggerak dengan kurikulum merdekanya, sekolah dasar tersebut berada  di Cianjur tepatnya di Jl. Siliwangi No. 27, Sawah Gede, Kec. Cianjur, Kabupaten Cianjur, Jawa Barat 43212.</p>
			<p></p>
			<p>Wassalaamu’alaikum Wr. Wb.</p>
		</div>
		<div class="col-md-6">
			<img class="img-responsive" src="<?= base_url() ?>/assets/profile/images/ibudewi.jpg" alt="Bapa Pimpinan">
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
							<span class="fh5co-counter-label">Jumlah Siswa Perempuan</span>
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

<div id="fh5co-course-categories">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Pengalaman dan Fasilitas</h2>
				<p>Dibawah Sini adalah beberapa pengalaman dan fasilitas yang akan anda dapatkan</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-shop"></i>
					</span>
					<div class="desc">
						<h3><a href="#">perpustakaan</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-heart4"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Kebersihan &amp; Kesehatan</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-lab2"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Ruangan</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-photo"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Kesenian </a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-home-outline"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Eskul Pramuka Dll</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 text-center animate-box">
				<div class="services">
					<span class="icon">
						<i class="icon-bubble3"></i>
					</span>
					<div class="desc">
						<h3><a href="#">Wifi Gratis</a></h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
					</div>
				</div>
			
		</div>
	</div>
</div>

