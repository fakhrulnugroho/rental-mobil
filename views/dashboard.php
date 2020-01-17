<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= APP_NAME ?> - <?= $judul ?></title>
	<link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
	<div id="wrapper">
		<?php partial('navbar', $aktif) ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
			<?php partial('topbar') ?>
			<div class="container-fluid">
				<h1 class="h3 mb-4 text-gray-800">Dashboard <?= APP_NAME ?></h1>
				<hr>
				<div class="row">
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Mobil</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?php print_r($mobil->num_rows) ?> Mobil</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-car fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-success shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Pemesan</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pemesan->num_rows ?> Pemesan</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-user fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-info shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Pesanan</div>
										<div class="row no-gutters align-items-center">
											<div class="col-auto">
												<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $pesanan->num_rows ?> Pesanan</div>
											</div>
										</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-receipt fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-warning shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Data Akun</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $akun->num_rows ?> Akun</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-users fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="card shadow">
							<div class="card-header">
								<strong>Akun yang sedang login</strong>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<img src="<?= base_url('uploads/' . $_SESSION['login']['foto']) ?>" alt="<?= $akun->nama ?>" class="img-thumbnail mb-4">
									</div>
									<div class="col-md-9">
										<table class="table table-borderless">
											<tr>
												<td>Nama</td>
												<td>:</td>
												<td><b><?= $_SESSION['login']['nama'] ?></b></td>
											</tr>
											<tr>
												<td>Username</td>
												<td>:</td>
												<td><b><?= $_SESSION['login']['username'] ?></b></td>
											</tr>
											<tr>
												<td>Tanggal & Jam Login</td>
												<td>:</td>
												<td><b><?= $_SESSION['login']['waktu'] ?></b></td>
											</tr>
											<tr>
												<td>Server</td>
												<td>:</td>
												<td><b><?= $_SERVER['SERVER_NAME'] ?></b></td>
											</tr>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<?php partial('footer') ?>
		</div>
	</div>

	<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
	</a>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery/jquery.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/js/sb-admin-2.min.js"></script>
</body>
</html>