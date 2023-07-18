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
		<!--Star Header-->
        <header>
		<div class="tabbook">
							<a class="ham" href="<?php echo site_url('Umum_dashboard'); ?>">
							<img src="assets/icon/icon _arrow ios back_.png" alt="kembali" >	
						
							</a>
						</div>
            <div class="container">
            </div>
        </header>
        <!--End Header-->

        <!--Star Top Post-->
        <div class="toppro-post">
            <div class="container">
				<center>
					<div class="room-cardpro">
						<?php echo form_open('profil/profil_umum'); ?>
							<!-- profil.php -->
						<div class="profil-container">
							<center>
								<div class="top-pro">
									<div class="profil-picture"> 
										<?php echo strtoupper(substr($profil_umum['nama'], 0, 1)); ?>
									</div>
								</div>
							</center>
							<div class="profile-name">
								<h1><?php echo $profil_umum['nama']; ?></h1>
							</div>
							<div class="profile-info">
								<p>Email		: <?php echo $profil_umum['email']; ?></p>
								
							</div>
							<div class="profille-buttons">
								<!--<button>Edit Profil</button>
								<button>Keluar</button>-->
							</div>
								<!-- tambahkan informasi profil lainnya yang ingin ditampilkan -->
						</div>
					</div>
				</center>
                <div class="room-list">
                    
				</div>
				
			</div>
        </div>
        <!--End  Top Post-->
	
		
		<!-- FOOTER -->
        <footer>
            <div class="container">
                <a href="staf_dashboard" class="brand">SI-ARPENPUS</a>
                <p>Copyright &copy;2023. All Right Reserved</p>
            </div>
        </footer>
        <!-- FOOTER -->

		<script src="assets/js/script4.js"></script>
		<?php echo form_close(); ?>
    </body>
</html>
