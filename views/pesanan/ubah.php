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
								<h1 class="h3 mb-4 text-gray-800">Ubah Pesanan</h1>
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
					<div class="col-sm-6">
						<div class="card shadow">
							<div class="card-header">
								<h6 class="m-0 font-weight-bold text-primary">Ubah Data</h6>
							</div>
							<div class="card-body">
								<form method="POST" action="<?= base_url('pesanan/proses_ubah/' . $pesanan->id) ?>" enctype="multipart/form-data">
								  	<div class="form-group">
								  		<label for="id_pemesan">Nama Pemesan</label>
								  		<input type="text" disabled="disabled" class="form-control" value="<?= $pemesan->nama ?>">
								  	</div>

								  	<div class="form-group">
								  		<label for="id_mobil">Mobil</label>
								  		<input type="text" disabled="disabled" class="form-control" value="<?= $mobil->nama ?>">
								  	</div>

									<div class="form-group">
								  		<label for="id_perjalanan">Perjalanan</label>
								  		<input type="text" disabled="disabled" class="form-control" value="<?= $perjalanan->asal . ' - ' . $perjalanan->tujuan ?>">
								  	</div>

								  	<div class="row">
								  		<div class="col-md-6">
								  			<div class="form-group">
										  		<label for="id_jenis_bayar">Jenis Bayar</label>
										  		<input type="text" disabled="disabled" class="form-control" value="<?= $jenis_bayar->jenis_bayar ?>">
										  	</div>
								  		</div>
								  		<div class="col-md-6">
								  			<div class="form-group">
										  		<label for="harga">Harga</label>
										  		<input type="number" name="harga" id="harga" value="<?= $pesanan->harga ?>" placeholder="ketik" required="required" autocomplete="off" class="form-control">
										  	</div>
								  		</div>
								  	</div>
									
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
										  		<label for="tgl_pinjam">Tanggal Pinjam</label>
										  		<input type="date" value="<?= $pesanan->tgl_pinjam ?>" disabled="disabled" name="tgl_pinjam" id="tgl_pinjam" required="required" autocomplete="off" class="form-control">
										  	</div>
									  	</div>
										<div class="col-md-6">
											<div class="form-group">
										  		<label for="tgl_kembali">Tanggal Kembali</label>
										  		<input type="date" name="tgl_kembali" value="<?= $pesanan->tgl_kembali ?>" id="tgl_kembali" required="required" autocomplete="off" class="form-control">
										  	</div>
									  	</div>
									</div>
								  	<div class="form-group">
										<button type="submit" class="btn btn-sm btn-success" name="ubah"><i class="fa fa-pen"></i> Ubah</button>
										<button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Batal</button>
										<a href="index.php" class="btn btn-sm btn-secondary"><i class="fa fa-reply"></i> Kembali</a>
								  	</div>
								</form>
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
