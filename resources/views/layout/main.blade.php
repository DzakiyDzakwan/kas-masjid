<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Masjid Darul Ilmi UMK</title>
	<link rel="icon" href="{{asset('dist/img/masjid.jpg')}}">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
	<!-- Select2 -->
	<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	@yield('style')
	<!-- Alert -->
	<script src="{{asset('plugins/alert.js')}}"></script>
</head>

<body class="hold-transition sidebar-mini">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		@include('components.navbar')
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		@include('components.sidebar')

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			</section>

			<!-- Main content -->
			<section class="content">
				<!-- /. WEB DINAMIS DISINI ############################################################################### -->
				<div class="container-fluid">
          @yield('content')

				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				Masjid Darul 'Ilmi Universitas Muria Kudus
			</div>
			Copyright &copy;
			<a target="_blank" href="https://www.facebook.com/radenmas.brono">
				<strong> elseif software house</strong>
			</a>
			All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- Select2 -->
	<script src="{{asset('plugins/select2/js/select2.full.min.js')}}"></script>
	<!-- DataTables -->
	<script src="{{asset('plugins/datatables/jquery.dataTables.js')}}"></script>
	<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('dist/js/demo.js')}}"></script>
	<!-- page script -->
	<script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script>

	<script>
		$(function() {
			//Initialize Select2 Elements
			$('.select2').select2()

			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			})
		})
	</script>

	@yield('script')

</body>

</html>