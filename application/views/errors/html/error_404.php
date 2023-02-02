<!DOCTYPE html>

<html lang="en">
<!-- BEGIN: Head -->

<head>
	<meta charset="utf-8">
	<link href="<?= base_url('vendor/temp/') ?>dist/images/logo.svg" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
	<meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="LEFT4CODE">
	<title>Error Page - Midone - Tailwind HTML Admin Template</title>
	<!-- BEGIN: CSS Assets-->
	<link rel="stylesheet" href="<?= base_url('vendor/temp/') ?>dist/css/app.css" />
	<!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="app">
	<div class="container">
		<!-- BEGIN: Error Page -->
		<div class="error-page flex flex-col lg:flex-row items-center justify-center h-screen text-center lg:text-left">
			<div class="-intro-x lg:mr-20">
				<img alt="Midone Tailwind HTML Admin Template" class="h-48 lg:h-auto" src="<?= base_url('vendor/temp/') ?>dist/images/error-illustration.svg">
			</div>
			<div class="text-white mt-10 lg:mt-0">
				<div class="intro-x text-6xl font-medium">404</div>
				<div class="intro-x text-xl lg:text-3xl font-medium">Oops. Halaman Kosong.</div>
				<div class="intro-x text-lg mt-3 mb-10">
					Anda mungkin salah mengetik alamat atau halaman mungkin telah dipindahkan.</div>
				<a href="<?= base_url() ?>" class="intro-x button button--lg border border-white mt-20">Kembali</a>
			</div>
		</div>
		<!-- END: Error Page -->
	</div>
	<!-- BEGIN: JS Assets-->
	<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=[" your-google-map-api"]&libraries=places"></script>
	<script src="<?= base_url('vendor/temp/') ?>dist/js/app.js"></script>
	<!-- END: JS Assets-->
</body>

</html>