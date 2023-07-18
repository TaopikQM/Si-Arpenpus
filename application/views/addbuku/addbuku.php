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
        <!--<nav>
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
                    <li class="menu-item hide-on-mobile"><a href="<?php echo site_url('AddBuku'); ?>" class="active">Buku</a></li>
                    <li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Contact'); ?>">Contact</a></li>
                </ul>
				<ul >
					<li class="profil-initial">
						<a class="loginstaf" onclick="toggleProfileMenu()">
							<php echo $initial; ?>
							<div  class="profile-menu" id="profileMenu">
								<ul class="item-profil">
									<li><a href="<php echo site_url('profil'); ?>">Profil</a></li>
									<li><a href="#">Pesan</a></li>
									<li><a href="<php echo site_url('auth/logout'); ?>">Logout</a></li>
								</ul>	
							</div>
						</a>
					</li>
				</ul>
				
            </div>
        </nav>-->
        <!--End Navbar-->

		 <!--Star Header-->
		<header >
		<div class="tabbook">
							<a class="ham" href="<?php echo site_url('Buku'); ?>">
							<img src="assets/icon/icon _arrow ios back_.png" alt="kembali" >	
								
						
									<!--<button>
										Data
									</button>-->
							</a>
						</div>
			<div class="topad-post">
				<div class="container">
                    <div class="card-bodyadd">
                        <div class="col-10">
                            <h1>Form Entry Buku</h1>
                            <form action="<?php echo site_url('insBuku/insBuku'); ?>" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="l4" class="form-label">Cover Buku</label>
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
                                    <label for="l5" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="tdeskripsi" placeholder="Deskripsi" style="height: 150px;" required></textarea>
								</div>
                                <div class="mb-3">
									<div class="button-container">
										<a href="<?php echo site_url('auth/logout'); ?>">
											<button class="btn-tamexit" type="exit">close</button>
										</a>
										<button class="btn-tambuku" type="submit">Simpan</button>
									</div>
                                </div>
                            </form>
                        </div>
					</div>
				</div>
			</div>
		</header>
			<!--End Header-->

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
