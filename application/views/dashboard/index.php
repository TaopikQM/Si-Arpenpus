<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SI-ARPENPUS</title>
	<link rel="stylesheet" href="assets/css/style4.css">
</head>

<body>
	<!--Star Navbar-->
	<nav>
		<div class="connavDash">
			<a class="brand">SI-ARPENPUS</a>
			<ul class="nav-menu">

				<li class="login"><a href="<?php echo site_url('auth/login'); ?>">Login</a></li>
				<li class="signup"><a href="<?php echo site_url('auth/register'); ?>">Signup</a></li>
			</ul>
		</div>
	</nav>
	<!--End Navbar-->

	<!--Star Header-->
	<header>
		<div>
			<img src="assets/img/Bg_dash.png" width="1347">
		</div>
	</header>
	<!--End Header-->

	<!--BUTTON PENGALIHAN-->
	<div class="button-post">
		<div class="container">
			<div class="button-list">
				<center>
					<div class="tabhome">
						<a class="ham" href="<?php echo site_url('auth/login'); ?>">
							<div class="circle">
								<img src="assets/icon/folder2.png" alt="Data arsip" width="60px" height="60px">
							</div>
							<!--<button>
										Data
									</button>-->
						</a>
					</div>
					<div class="tabhome">
						<a class="ham" href="<?php echo site_url('auth/login'); ?>">
							<div class="circle">
								<img src="assets/icon/bxs_contact.png" alt="contact" width="60px" height="60px">
							</div>
							<!--<button>
										Data
									</button>-->
						</a>
					</div>
					<div class="tabhome">
						<a class="ham" href="<?php echo site_url('auth/login'); ?>">
							<div class="circle">
								<img src="assets/icon/bxs_book.png" alt="Data Buku" width="60px" height="60px">
							</div>
							<!--<button>
										Data
									</button>-->
						</a>
					</div>
				</center>
			</div>
		</div>
	</div>

	<!--Star Top Post-->
	<div class="top-post">
		<div class="container">
			<div class="titletop">
				<p>Best Book</p>
			</div>

			<!--  <div class="book-list">
                    
					<div class="book-card">
                        <div class="top">
                            <a href="<php echo site_url('auth/login'); ?>" target="_blank"><img src="assets/img/diagram/jmlSd.png" alt="data buku" width="500px"></a>
                        </div>
						
                    </div>
                    <div class="book-card">
                        <div class="top">
						<a href="<php echo site_url('auth/login'); ?>" target="_blank"><img src="assets/img/diagram/jmlSmp.png" alt="data buku" width="500px"></a>
                    </div>
						
                    </div>
                    <div class="book-card">
                        <div class="top">
							<a href="<php echo site_url('auth/login'); ?>" target="_blank"><img src="assets/img/diagram/jmlSma.png" alt="data buku" width="500px"></a>
                        </div>
						
                    </div>
                    <div class="book-card">
                        <div class="top">
							<a href="<php echo site_url('auth/login'); ?>" target="_blank"><img src="assets/img/diagram/jmlSmk.png" alt="data buku" width="500px"></a>
                        </div>
                    </div>
                    
-->
			<?php
			$counter = 0; // Inisialisasi counter
			foreach ($buku as $item) {
				if ($counter < 4) { // Hanya menampilkan 3 buku
			?>

					<div class="buku-item">
						<div class="foto">
							<img src="<?php echo base_url('assets/img/uploads/' . $item->foto); ?>" alt="Foto Buku">
						</div>
						<div class="info">
							<h3><?php echo $item->judul_buku; ?></h3>
							<!--
                            <p>Pengarang: <php echo $item->pengarang; ?></p>
                            <p>Penerbit: <php echo $item->penerbit; ?></p>
                            <p>Tahun: <php echo $item->tahun; ?></p>-->
						</div>
					</div>
			<?php
					$counter++; // Meningkatkan counter setiap kali buku ditampilkan
				} else {
					break; // Menghentikan loop setelah 3 buku ditampilkan
				}
			} ?>
		</div>
	</div>
	<div class="buku-container">


	</div>

	<!--bagian penjelasan-->
	<div class="top-arti">
		<div class="container">
			<div class="book-arti">
				<div class="tulisan-arsip">
					<h3>KEARSIPAN</h3>
					<p>
						adalah hal-hal yang berkenaan dengan arsip. Arsip adalah
						rekaman kegiatan atau peristiwa dalam berbagai bentuk
						dan media sesuai dengan perkembangan teknologi informasi
						dan komunikasi yang dibuat dan diterima oleh lembaga negara,
						pemerintahan daerah, lembaga pendidikan, perusahaan, organisasi
						politik, organisasi kemasyarakatan, dan perseorangan dalam pelaksanaan
						kehidupan bermasyarakat berbangsa dan bernegara.(UU No. 43 Tahun 2009)
						Arsip daerah adalah lembaga kearsipan berbentuk satuan kerja perangkat
						daerah yang melaksanakan tugas pemerintahan di bidang kearsipan pemerintahan
						kota yang berkedudukan di kota.
					</p>
				</div>
				<div class="tulisan-perpus">
					<h3>PERPUSTAKAAN</h3>
					<p>
						adalah hal-hal yang berkenaan dengan arsip. Arsip adalah
						rekaman kegiatan atau peristiwa dalam berbagai bentuk
						dan media sesuai dengan perkembangan teknologi informasi
						dan komunikasi yang dibuat dan diterima oleh lembaga negara,
						pemerintahan daerah, lembaga pendidikan, perusahaan, organisasi
						politik, organisasi kemasyarakatan, dan perseorangan dalam pelaksanaan
						kehidupan bermasyarakat berbangsa dan bernegara.(UU No. 43 Tahun 2009)
						Arsip daerah adalah lembaga kearsipan berbentuk satuan kerja perangkat
						daerah yang melaksanakan tugas pemerintahan di bidang kearsipan pemerintahan
						kota yang berkedudukan di kota.
					</p>
				</div>
			</div>
		</div>

	</div>

	</div>
	<!--bagian bawah tampilan-->
	<div class="end-post">
		<div class="foto-end">
			<img src="assets/img/akhirgam.png">
		</div>
		<div class="container">
			<div class="end-list">
				<h3>DINAS PERPUSTAKAAN DAN ARSIP KOTA SEMARANG</h3>
				<div class="box-foot">
					<div class="media-foot">
						<h4>Ikuti Kami di Sosial Media</h4>
						<div class="icon-media">
							<img src="assets/icon/ic_outline-email.png">
							<a href="dinas_arpus@semarangkota.go.id">dinas_arpus@semarangkota.go.id</a>
						</div>
						<div class="icon-media">
							<img src="assets/icon/mdi_instagram.png">
							<a href="https://www.instagram.com/dinasarpus_semarang/">dinasarpus_semarang</a>
						</div>
						<div class="icon-media">
							<img src="assets/icon/ic_baseline-whatsapp.png">
							<a href="https://api.whatsapp.com/send?phone=6281222233860&text=Halo%20Dinas%20Arpus%20Kota%20Semarang,%20saya%20mau%20bertanya">+6281222233860</a>
						</div>
					</div>
				</div>
				<!-- <div class="card">
							<div class="card-body">
								<div class="col-10">
									<h1>Form Entry Buku</h1>
									<form action="<php echo site_url('insBuku/insBuku'); ?>" method="post" enctype="multipart/form-data">
										<div class="mb-3">
											<label for="l4" class="form-label">Gambar</label>
											<input type="file" class="form-control" id="foto" name="foto">
										</div>	
										<div class="mb-3">
											<label for="l1" class="form-label">Judul Buku</label>
											<input type="text" class="form-control" id="judul_buku" name="jBuku" placeholder="Judul Buku" required>
										</div>
										<div class="mb-3">
											<label for="l2" class="form-label">Pengarang</label>
											<input type="text" class="form-control" id="pengarang" name="tpengarang" placeholder="Nama Pengarang">
										</div>
										<div class="mb-3">
											<label for="l3" class="form-label">Penerbit</label>
											<input type="text" class="form-control" id="penerbit" name="tpenerbit" placeholder="Penerbit" required>
										</div>
										
										<div class="mb-3">
											<label for="l5" class="form-label">Tahun Buku</label>
											<input type="text" class="form-control" id="tahun" name="tbuku" placeholder="Tahun Buku" required>
										</div>
										<div class="mb-3">
											<button class="btn-tambuku" type="submit">Simpan</button>
											<!--<button class="btn-tamexit" type="exit">close</button>
										</div>
									</form>
								</div>
							</div>
						</div>-->
			</div>
		</div>
	</div>
	<!--End  Top Post-->

	<!-- FOOTER -->
	<footer>
		<div class="container">
			<a href="#" class="brand">SI-ARPENPUS</a>
			<p>Copyright &copy;2023. All Right Reserved</p>
		</div>
	</footer>
	<!-- FOOTER -->

	<script src="assets/js/script4.js"></script>

</body>

</html>