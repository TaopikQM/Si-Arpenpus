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
	<?php echo form_open('auth/login'); ?>
	

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
					<li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Staf_dashboard'); ?>" class="active">Home</a></li>
                    <li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Buku'); ?>" >Buku</a></li>
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
			<div class="tops-post">
				<div class="container">
				<h2 class="top-tittel">Grafik Pendidikan di Kota Semarang</h2>
					<div class="book-list">
							<!--tampilan diagram-->
								
						<div class="book-card">
							<div class="top">
								<a href="<?php echo site_url('DataSd'); ?>"><img src="assets/img/diagram/jmlSd.png" alt="data buku" width="360px"></a>
							</div>
							
						</div>
						<div class="book-card">
							<div class="top">
								<a href="<?php echo site_url('DataSmp'); ?>"><img src="assets/img/diagram/jmlSmp.png" alt="data buku" width="360px"></a>
							</div>
							
						</div>
						<div class="book-card">
							<div class="top">
								<a href="<?php echo site_url('DataSma'); ?>"><img src="assets/img/diagram/jmlSma.png" alt="data buku" width="360px"></a>
							</div>
							
						</div>
						<!--
						<div class="book-card">
							<div class="top">
								<a href="<php echo site_url('DataSmk'); ?>" ><img src="assets/img/diagram/jmlSmk.png" alt="data buku" width="500px"></a>
							</div>
						</div>
					<!--akhir tampilan diagram-->

						<div class="book-card">
						</div>
						</div>
					</div>
				</div>
			</div>
		</header>
			<!--End Header-->

			<!--Star Top Post-->


			<div class="ups-post">
			
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
