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

<!--	<php
// Ambil email pengguna dari session
$email = $this->session->userdata('email');

// Query ke database untuk mendapatkan role berdasarkan email
$this->db->select('peran');
$this->db->from('dbstaf');
$this->db->where('email', $email); 
$query = $this->db->get();

if ($query->num_rows() > 0) {
    $row = $query->row();
    $role = $row->peran;
} else {
    // Jika email tidak ditemukan dalam tabel 'users', coba cari dalam tabel lain
    $this->db->select('peran');
    $this->db->from('dbpenumum');
    $this->db->where('email', $email);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
        $row = $query->row();
        $role = $row->peran;
    } else {
        // Jika email tidak ditemukan dalam kedua tabel, set default role
        $role = 'default_role';
    }
}

// Periksa role pengguna dan set dashboardLink
if ($role == 'P. umum') {
    $dashboardLink = base_url('Umum_dashboard');
} elseif ($role == 'Staf Perpus') {
    $dashboardLink = base_url('Staf_dashboard');
} else {
    $dashboardLink = base_url('home');
}
?>-->

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
					<li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Staf_dashboard');  ?>">Home</a></li>
                    <li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Buku'); ?>" class="active">Buku</a></li>
                    <!--<li class="menu-item hide-on-mobile"><a href="<php echo site_url('Contact'); ?>">Contact</a></li>-->
                </ul>
				<ul >
					<li class="profil-initial">
						<a class="loginstaf" onclick="toggleProfileMenu()">
							<?php echo $initial; ?>
							<div  class="profile-menu" id="profileMenu">
								<ul class="item-profil">
									<li><a href="<?php echo site_url('profil'); ?>">Profil</a></li>
									<li><a href="<?php echo site_url('Chat'); ?>">Pesan</a></li>
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
		<header >
			<div class="topb-post">
				<div class="container">
                    <div class="card-buku">
						<h1>KOLEKSI BUKU</h1>
					</div>
				</div>
			</div>
		</header>
			<!--End Header-->

			<!--tampilan buku-->
			<div class="upb-post">
				<div class="container">
					<?php foreach ($buku as $item) { ?>
						<div class="buku-item">
							<div class="foto">
								<img src="<?php echo base_url('assets/img/uploads/' . $item->foto); ?>" alt="Foto Buku" >
							</div>
							<div class="info">
								<h3><?php echo $item->judul_buku; ?></h3>
								<!--
								<p>Pengarang: <php echo $item->pengarang; ?></p>
								<p>Penerbit: <php echo $item->penerbit; ?></p>
								<p>Tahun: <php echo $item->tahun; ?></p>-->
							</div>
						</div>
					<?php } ?>
					<!--Bagian tambah buku-->
					<div class="tabbuko">
							<a class="ham" href="<?php echo site_url('AddBuku'); ?>" >
								<div class="circleb">
									<img src="assets/icon/icon _plus_.png" alt="Data arsip">	
								</div>
									<!--<button>
										Data
									</button>-->
							</a>
						</div>
					<!--<div class="book-list">
						<div class="booku-card">
						</div>
					</div>-->
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>



    </body>
								
</html>
