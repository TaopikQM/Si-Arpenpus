<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SI-ARPENPUS</title>
	<link rel="stylesheet" href="assets/css/style4.css">
	<style>
		.btn-danger {
			color: #fff;
			background-color: #d9534f;
			border-color: #d43f3a;
		}

		.btn {
			display: inline-block;
			margin-bottom: 0;
			font-weight: 400;
			text-align: center;
			white-space: nowrap;
			vertical-align: middle;
			-ms-touch-action: manipulation;
			touch-action: manipulation;
			cursor: pointer;
			background-image: none;
			border: 1px solid transparent;
			padding: 6px 12px;
			font-size: 14px;
			line-height: 1.42857143;
			border-radius: 4px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		.row {
			display: -ms-flexbox;
			display: flex;
			-ms-flex-wrap: wrap;
			flex-wrap: wrap;
			margin-right: -7.5px;
			margin-left: -7.5px;
		}

		.col-6 {
			-ms-flex: 0 0 50%;
			flex: 0 0 30%;
			max-width: 50%;
		}

		.bg-infob,
		.bg-infob>a {
			color: #fff !important;
		}

		.bg-info {
			background-color: #0097A7 !important;
			opacity: 75%;
		}

		.small-box-footer {
			background-color: #0097A7 !important;
			opacity: 75%;
		}

		.small-box {
			border-radius: 0.25rem;
			box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
			display: block;
			margin-bottom: 20px;
			position: relative;

		}

		.bg-info,
		.bg-info>a {
			color: #fff !important;
		}

		.small-box .icon {
			color: rgba(0, 0, 0, .15);
			z-index: 0;
			padding-left: 50%;
			padding-top: 10px;
			padding-bottom: 10px;
			padding-right: 10px;
		}

		.small-box .icnon {
			color: rgba(0, 0, 0, .15);
			z-index: 0;
			padding-left: 34%;
			padding-top: 10px;
			padding-bottom: 10px;
			padding-right: 10px;
		}

		.inner {
			padding-top: 20px;
			padding-left: 10px;
		}
		.inner h1{
			padding-bottom:30px;
		}

		.small-box>.small-box-footer {
			background-color: rgba(0, 0, 0, .1);
			color: rgba(255, 255, 255, .8);
			display: block;
			padding: 3px 0;
			position: relative;
			text-align: center;
			text-decoration: none;
			z-index: 10;

		}


		.bg-success,
		.bg-success>a {
			color: #fff !important;
		}

		.bg-infob {
			background-color: #6359CC !important;
			opacity: 75%;
		}

		.small-box {
			border-radius: 0.25rem;
			box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
			display: block;
			margin-bottom: 20px;
			position: relative;
			display: flex;
		}

		.bg-success {
			background-color: #28a745 !important;
		}

		.row {
			padding-top: 30px;
		}
	</style>


</head>

<body>
	<!--<div class="container">
		<div class="box">
			<h2>Admin</h2>
			<p> Admin</p>
		</div>
		<div class="box">
			<h2>Staf</h2>
			<p>Staf</p>
		</div>
	</div>
	-->

	<!--Star Navbar-->
	<nav>
		<div class="container">

			<a class="brand">SI-ARPENPUS</a>
			<input type="checkbox" id="navbar-toggle">
			<label for="navbar-toggle" class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
			</label>
			<ul class="nav-menu hide-on-desktop">
				<li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Admin_dashboard'); ?>" class="active">Home</a></li>
				<li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Detailstaf'); ?>">Staf</a></li>
				<li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Detailumum'); ?>">Pengunjung</a></li>
			</ul>
			<ul>
				<li class="profil-initial">
					<a class="loginstaf" onclick="toggleProfileMenu()">
						<?php echo $initial; ?>
						<div class="profile-menu" id="profileMenu">
							<ul class="item-profil">
								<li><a href="<?php echo site_url('Adminprofil'); ?>">Profil</a></li>
								
								<li><a href="<?php echo site_url('auth/logout'); ?>">Logout</a></li>
							</ul>
						</div>
					</a>
				</li>
			</ul>

		</div>
	</nav>
	<!--End Navbar-->

	<!--Star Header-->
	<header>
		
		<div class="topad-post">
			<div class="container">
				<div class="row">
					<!--<php $tampil = mysqli_query($koneksi, "select * from karyawan order by nik desc");
					$total = mysqli_num_rows($tampil);
					?>-->

					<div class="col-lg-3 col-6">
						<a href="Detailstaf">
							<div class="small-box bg-info">
								<div class="inner">
									<h1><?php echo $totalData; ?></h1>
									<p>Staf</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag">
										<img src="assets/icon/Vector.png">
									</i>
								</div>

							</div>
						</a>
					</div>


					<div class="col-lg-3 col-6">
						<a href="Detailumum">
							<div class="small-box bg-infob">
								<div class="inner">
									<h1><?php echo $totalDataU; ?></h1>
									<p>Pengunjung</p>
								</div>
								<div class="icnon">
									<i class="ion ion-bag">
										<img src="assets/icon/profile2user.png" width="95px">
									</i>
								</div>

							</div>
						</a>
					</div>


					<!--<php $tampil1 = mysqli_query($koneksi, "select * from jabatan order by id_jabatan desc");
					$total1 = mysqli_num_rows($tampil1);
					?>-->



				</div>
			</div>
	</header>
	<!--End Header-->

	<!--Star Top Post-->


	<div class="up-post">
		<div class="container">
			<div class="book-list">

			</div>
		</div>
	</div>

	<!-- FOOTER -->
	<footer>
		<div class="container">
			<a href="#" class="brand">SI-ARPENPUS</a>
			<p>Copyright &copy;2023. All Right Reserved</p>
		</div>
	</footer>
	<!-- FOOTER -->

	<script src="assets/js/script4.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js""></script>
		<script src=" https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
	<script>
		function deleteData(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteData'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataPend(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataPend'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataStaf(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataStaf'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataUmum(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataUmum'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataAdmin(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataAdmin'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataChat(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataAdmin'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}
	</script>
</body>

</html>