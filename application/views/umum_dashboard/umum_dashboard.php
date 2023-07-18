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
	<?php echo form_open('detail_buku'); ?>
	

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
					<li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Umum_dashboard'); ?>" class="active">Home</a></li>
                    
                    <li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Contact'); ?>">Kontak</a></li>
                </ul>
				<ul >
					<li class="profil-initial">
						<a class="loginstaf" onclick="toggleProfileMenu()">
							<?php echo $initial; ?>
							<div  class="profile-menu" id="profileMenu">
								<ul class="item-profil">
									<li><a href="<?php echo site_url('profil'); ?>">Profil</a></li>
									
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

			<!--Star Top Post-->


			<div class="up-post">
				<div class="container">
					<div class="book-list">
						<div class="book-card">
						<?php foreach ($buku as $item) { ?>
							<div class="buku-item">
								<div class="foto">
									<a href="<?php echo base_url('Detail_buku/' . $item->id); ?>">
										<img src="<?php echo base_url('assets/img/uploads/' . $item->foto); ?>" alt="Foto Buku" >
									</a>
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
						</div>
						
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>



		<?php echo form_close(); ?>
    </body>
								
</html>
