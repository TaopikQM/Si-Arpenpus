<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SI-ARPENPUS</title>
		<link rel="stylesheet" href="assets/css/style4.css">
         <style>
            #map {
                height: 400px;
                width: 100%;
            }
        </style>
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
					<li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Umum_dashboard'); ?>" >Home</a></li>
                   
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
						<h1>KONTAK KAMI</h1>
					</div>
				</div>
			</div>
		</header>
			<!--End Header-->

        <!--Star Top Post-->
        <div class="cont-post">
            <div class="container">
                <!--inibagian icon contact-->
                <center>
                    <div class="cont-list">
						<div class="tabhome">
							<a class="ham" href="#">
								<div class="circle">
									<img src="assets/icon/gedung.png" alt="Data arsip" width="60px" height="60px">	
								</div>
									<!--<button>
										Data
									</button>-->
							</a>
						</div>
						<div class="tabhome">
							<a class="ham" href="#">
								<div class="circle">
									<img src="assets/icon/jam.png" alt="Data arsip" width="60px" height="60px">	
								</div>
									<!--<button>
										Data
									</button>-->
							</a>
						</div>
						<div class="tabhome">
							<a class="ham"  href="#">
								<div class="circle">
									<img src="assets/icon/contact.png" alt="Data arsip" width="60px" height="60px">	
								</div>
									<!--<button>
										Data
									</button>-->
							</a>
						</div>
                       
                    </div>
                </center>
                <!--ini bagian kotak bawah icon-->
                <center>
                    <div class="cont-list">
                        <div class="book-card">
                            <div class="tabinfo">
                                <p>Alamat Kantor : </p>
                                <br/>
                                <p>Jl. Prof. Sudarto No. 116, </p>
                                <p>Kel.Sumurboto, Kec. Banyumanik, </p>
                                <p>Kota Semarang, Jawa Tengah </p>
                                <p>50269</p>
                            </div>
                        </div>
                        <div class="book-card">
                            <div class="tabinfo">
                                <p>Jam Kerja : </p>
                                <br/>
                                <p>Senin - Kamis : 8:00 - 16:00</p>
                                <p>Jumat : 8:00 - 14:00</p>
                            </div>
                        </div>
                        <div class="book-card">
                            <div class="tabinfo">
                                <p>Phone and Fax</p>
                                <br/>
                                <p>Telepon : 024 7466215</p>
                                <p>Email    : dinas_arpus@semarangkota.go.id</p>
                                <p>Whatsapp : +6281222233860</p>
                            </div>
                        </div>     
                    </div>
                </center>
            </div>
        </div>
        <!--End Top Post-->

        <!--Stat Maps-->
        <div class="tammaps">
            <!--bagian maps-->
            <h1>Google Maps</h1>
            <div id="map"></div>
        </div>
        <!--End Maps-->

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
        <!---ini bagian script maps-->
        <script>
            function initMap() {
                var semarang = {lat: -7.0585917, lng: 110.4118208}; // Koordinat Kota Semarang
                var semarang2 = {lat: -7.0002854, lng: 110.425060}; // Koordinat Kota Semarang
                var semarang3 = {lat: -6.978138, lng: 110.422474}; // Koordinat Kota Semarang

                var map = new google.maps.Map(document.getElementById('map'), {
                    center: semarang,semarang2,semarang3,
                    zoom: 10
                });

                var marker = new google.maps.Marker({
                    position: semarang,
                    map: map,
                    title: 'Dinas Kearsipan Dan Perpustakaan Kota Semarang'
                });
                var marker = new google.maps.Marker({
                    position: semarang2,
                    map: map,
                    title: 'Perpustakaan Provinsi Jawa Tengah'
                });
                var marker = new google.maps.Marker({
                    position: semarang3,
                    map: map,
                    title: 'Perpustakaan SMP Negeri 36 Semarang'
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmdGdBaC7RfenXqlKztdnkaqcYV_NfAes&callback=initMap" async defer></script>
            <!--ini bagian cadangan tampilan maps
            <script src="http://maps.googleapis.com/maps/api/js"></script>
        <script>// fungsi initialize untuk mempersiapkan peta
        function initialize() {
        var propertiPeta = {
            center: new google.maps.LatLng(-6.966667, 110.416664), // Koordinat Kota Semarang
                        zoom: 13,
            mapTypeId:google.maps.MapTypeId.ROADMAP
        };
        
        var peta = new google.maps.Map(document.getElementById("googleMap"), propertiPeta);
        }

        // event jendela di-load  
        google.maps.event.addDomListener(window, 'load', initialize);
        </script>-->
        

		<?php echo form_close(); ?>
    </body>
								
</html>
