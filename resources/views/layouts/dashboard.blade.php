
<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/smb.png" type="image/png" />
	<!--plugins-->
	<link href="themes/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="themes/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="themes/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="themes/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="themes/css/pace.min.css" rel="stylesheet" />
	<link href="themes/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<script src="themes/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="themes/css/bootstrap.min.css" rel="stylesheet">
	<link href="themes/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="themes/css/app.css" rel="stylesheet">
	<link href="themes/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="themes/css/semi-dark.css" />
	<link href="assets/css/iziToast.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<title>SMB</title>
	@livewireStyles

</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('layouts.sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('layouts.header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				{{$slot}}

			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2023. Touts droits réservés.</p>
		</footer>
	</div>
	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
	<script src="themes/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="themes/js/jquery.min.js"></script>
	<script src="themes/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="themes/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="themes/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="themes/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="themes/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="themes/plugins/chartjs/js/Chart.min.js"></script>
	<script src="themes/js/index.js"></script>
	<!--app JS-->
	<script src="themes/js/app.js"></script>
	<script src="themes/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="themes/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="assets/js/iziToast.min.js"></script>

	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	@yield('js')

	@livewireScripts

</body>

</html>