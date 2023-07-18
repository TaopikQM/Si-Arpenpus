<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SI-ARPENPUS</title>
	<link rel="stylesheet" href="assets/css/style4.css">
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: sans-serif;
		}

		a {
			text-decoration: none;
		}

		li {
			list-style: none;
		}

		body {
			background: #f7f7f8;
			margin: 0;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 0 1rem;
			height: 100%;
			width: 100%;
		}
		/*Star Navbar*/
nav{
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 64px;
    transition: all .3s ease;
    z-index: 999;
}
nav .container{
	display: flex;
    align-items: center;
    grid-gap: 64px;
}

nav.active {
    background: #0097A7;
}


nav.active .brand {
    color: #f8f8f8;
}

nav .brand {
    font-size: 28px;
    font-weight: 600;
    display: flex;
    align-items: center;
    color: #0097A7;
    grid-gap: 8px;
}
		/*Star Header*/
header{
	margin-top: 60px;
	margin-bottom: 0px;
	margin-left: 0px;
	margin-right: 0px;
    text-align: center;
}

/* FOOTER */
footer {
	margin-top: -30px;
    background: #341E81;
    top: 0;
    left: 0;
    width: 100%;
    height: 58px;
}

footer .container{
    display: flex;
    align-items: center;
    grid-gap: 45px;
}

footer .brand {
    position: relative;
    font-size: 20px;
    font-weight: 200;
    display: flex;
    color: white;
	transition: all 0.3s ease; /* Efek transisi saat perubahan ukuran */

}

.box-foot{
	background: #0097A7;
	opacity: 56%;
	width: 673px;
	height: 251px;
	color: white;
	border-radius: 20px;
}

footer .container p {
    position: relative;
    padding-left: 700px;
    color: white;
	text-align: center; /* Mengatur teks menjadi rata tengah */
    transition: all 0.3s ease; /* Efek transisi saat perubahan ukuran */


}

.media-foot {
    margin: 40px;
	color: white;
}
.icon-media{
	padding-top: 12px;
	padding-bottom: 12px;
	display: flex;
	align-items: center;
}

.icon-media a{
	padding-left: 20px;
	font-size: 20px;
	color: white;
}

@media screen and (max-width: 768px) {
    footer .brand {
        font-size: 14px; /* Ukuran tulisan saat tampilan mobile */
        padding-left: 0; /* Menghapus padding kiri saat tampilan mobile */
    }
	footer p {
        text-align: left; /* Mengatur teks kembali menjadi rata kiri saat tampilan mobile */
    }
}
/* FOOTER */
.tabbook {
	position: absolute;
	top: 10px;
	left: 10px;
  }
  .up-post{
    margin-top: 25px;
	background: rgb(255, 255, 255);
	margin-bottom: 100px;
}
/*etingan untuk detail buku*/
.detail-buku {
	display: flex;
	align-items: center;
}

.fotoo {
	margin-right: 10px; /* Jarak antara foto dan info */
}

.infoo {
	text-align: left;
	padding-left: 20px;
}

.judul{
	margin-bottom: 140px;
    font-size: 50px;
    font-weight: bold;
}



.ket p {
	padding-top:10px;
	padding-bottom:20px;
	font-weight: bold;
	font-size: 20px;
}
.desk{
	padding-top:10px;
	text-align:justify;
}
.desk h4{
	padding-bottom:10px;
}

.fotoo {
	height: 500px;
	padding-top: 20px;
	overflow: hidden;
  }
  
  .fotoo img {
	width: 100%;
	height: 100%;
	object-fit: contain;
  }
	</style>
</head>

<body>
	<?php echo form_open('Detail_buku'); ?>

	<nav>
            <div class="container"> 
				
				<a class="brand" href="<?php echo site_url('Umum_dashboard'); ?>">SI-ARPENPUS</a>
				
				
            </div>
        </nav>

	<!--Star Header-->
	<header>
		<div class="tabbook">
			
		<div class="container">
			<!--ini bagian grafik di staf-->

		</div>
	</header>
	<!--End Header-->

	<!--Star Top Post-->
	<div class="up-post">
		<div class="container">
				<div class="detail-buku">
					<div class="fotoo">
						<img src="<?php echo base_url('assets/img/uploads/' . $detail_buku->foto); ?>" alt="Foto Buku">
					</div>
					<div class="infoo">
						<div class="judul">
							<p><?php echo $detail_buku->judul_buku; ?></p>
						</div>
  						<div class="ket" >
							<p>Pengarang: <?php echo $detail_buku->pengarang; ?></p>
							<p>Penerbit: <?php echo $detail_buku->penerbit; ?></p>
							<p>Tahun: <?php echo $detail_buku->tahun; ?></p>
						
						</div>
					</div>
					
				</div>
				<div class="desk" >
					<h4>Deskripsi :</h4>
  					<p><?php echo $detail_buku->deskripsi; ?></p>
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



	<?php echo form_close(); ?>
</body>

</html>