
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Makhfuz</title>

		<link rel="stylesheet" href="assets/css/vendor/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/vendor/ionicons.css">
        <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css">
        <link rel="stylesheet" href="assets/css/vendor/jquery-ui.min.css">

        <!-- Plugin CSS -->
        <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
        <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
        <link rel="stylesheet" href="assets/css/plugins/nice-select.css">
        <link rel="stylesheet" href="assets/css/plugins/venobox.min.css">
        <link rel="stylesheet" href="assets/css/plugins/jquery.lineProgressbar.css">
        <link rel="stylesheet" href="assets/css/plugins/aos.min.css">

        <!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
        @livewireStyles
    </head>
	<body>
		<!-- HEADER -->
		
			<!-- MAIN HEADER -->
			@include('layouts.mainheader')
		<div class="offcanvas-overlay"></div>
        {{$slot}}
		

		<!-- FOOTER -->
		@include('layouts.footer')
		<!-- /FOOTER -->
<!-- Global Vendor, plugins JS -->
<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="assets/js/vendor/bootstrap.min.js"></script>
<script src="assets/js/vendor/jquery-ui.min.js"></script>

<!--Plugins JS-->
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/material-scrolltop.js"></script>
<script src="assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="assets/js/plugins/jquery.zoom.min.js"></script>
<script src="assets/js/plugins/venobox.min.js"></script>
<script src="assets/js/plugins/jquery.waypoints.js"></script>
<script src="assets/js/plugins/jquery.lineProgressbar.js"></script>
<script src="assets/js/plugins/aos.min.js"></script>
<script src="assets/js/plugins/jquery.instagramFeed.js"></script>
<script src="assets/js/plugins/ajax-mail.js"></script>

<!-- Use the minified version files listed below for better performance and remove the files listed above -->
<!-- <script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script> -->

<!-- Main JS -->
<script src="assets/js/main.js"></script>

        @livewireScripts
	</body>
</html>
