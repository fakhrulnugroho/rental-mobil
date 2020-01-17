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
	<link href="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
	<div id="wrapper">
	<?php partial('navbar', $aktif) ?>
	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">
		<div id="content">
		<?php partial('topbar') ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12">
						<div class="clearfix">
							<div class="float-left">
								<h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
							</div>
							<!-- <div class="float-right">
								<a href="" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
							</div> -->
						</div>
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="card shadow">
							<div class="card-header">
								<h6 class="m-0 font-weight-bold text-primary"><?= $judul ?> - <?= $pesanan->nama_pemesan ?></h6>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4">
										Nama Pemesan <br>
										Tanggal Pinjam <br>
										Tanggal Kembali <br>
										Mobil <br>
										Perjalanan <br>
										Total Harga <br>
										Jenis Bayar <br>
									</div>
									<div class="col-sm-1">
										: <br>
										: <br>
										: <br>
										: <br>
										: <br>
										: <br>
										: <br>
									</div>
									<div class="col-sm-6">
										<strong><?= $pesanan->nama_pemesan ?></strong><br>
										<strong><?= $pesanan->tgl_pinjam ?></strong><br>
										<strong><?= $pesanan->tgl_kembali ?></strong><br>
										<strong><?= $pesanan->nama_mobil ?></strong><br>
										<strong><?= $pesanan->asal ?> - <?= $pesanan->tujuan ?></strong><br>
										<strong>Rp. <?= number_format($pesanan->harga, 2, ',', '.') ?></strong><br>
										<strong><?= $pesanan->jenis_bayar ?></strong><br>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col">
										<a href="<?= base_url('pesanan/ubah/' . $pesanan->id) ?>" class="btn btn-sm btn-info"><i class="fa fa-pen"></i> Ubah</a>
         								<a href="<?= base_url('pesanan/hapus/' . $pesanan->id) ?>" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')"><i class="fa fa-trash"></i> Hapus</a>
										<a href="<?= base_url('pesanan') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
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

	<script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
  	<script src="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url('sb-admin-2/') ?>/js/demo/datatables-demo.js"></script>
</body>

</html>
