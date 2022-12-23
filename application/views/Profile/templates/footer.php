<footer id="fh4co-footer" role="contentinfo" style="background-image: url(<?= base_url() ?>/assets/profile/images/img_bg_4.jpg);">
	<div class="overlay"></div>
	<div class="container">
		
	</div>
</footer>
</div>

<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="<?= base_url() ?>/assets/profile/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="<?= base_url() ?>/assets/profile/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="<?= base_url() ?>/assets/profile/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="<?= base_url() ?>/assets/profile/js/jquery.waypoints.min.js"></script>
<!-- Stellar Parallax -->
<script src="<?= base_url() ?>/assets/profile/js/jquery.stellar.min.js"></script>
<!-- Carousel -->
<script src="<?= base_url() ?>/assets/profile/js/owl.carousel.min.js"></script>
<!-- Flexslider -->
<script src="<?= base_url() ?>/assets/profile/js/jquery.flexslider-min.js"></script>
<!-- countTo -->
<script src="<?= base_url() ?>/assets/profile/js/jquery.countTo.js"></script>
<!-- Magnific Popup -->
<script src="<?= base_url() ?>/assets/profile/js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url() ?>/assets/profile/js/magnific-popup-options.js"></script>
<!-- Count Down -->
<script src="<?= base_url() ?>/assets/profile/js/simplyCountdown.js"></script>
<!-- Main -->
<script src="<?= base_url() ?>/assets/profile/js/main.js"></script>
<script>
	var d = new Date(new Date().getTime() + 1000 * 120 * 120 * 2000);

	// default example
	simplyCountdown('.simply-countdown-one', {
		year: d.getFullYear(),
		month: d.getMonth() + 1,
		day: d.getDate()
	});

	//jQuery example
	$('#simply-countdown-losange').simplyCountdown({
		year: d.getFullYear(),
		month: d.getMonth() + 1,
		day: d.getDate(),
		enableUtc: false
	});
</script>
</body>

</html>