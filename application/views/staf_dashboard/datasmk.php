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
	
    <?php echo form_open('DataSmk/datasmk'); ?>

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
                    <li class="menu-item hide-on-mobile"><a href="<?php echo site_url('profil'); ?>" >Buku</a></li>
                    <li class="menu-item hide-on-mobile"><a href="<?php echo site_url('Contact'); ?>">Contact</a></li>
                </ul>
				<ul >
					<li class="profil-initial">
						<a class="loginstaf" onclick="toggleProfileMenu()">
							<?php echo $initial; ?>
							<div  class="profile-menu" id="profileMenu">
								<ul>
									<li><a href="<?php echo site_url('profil'); ?>">Profil</a></li>
									<li><a href="#">Pesan</a></li>
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
			<div class="top-post">
				<div class="container">
					<div class="book-list">
						<div class="book-card">
                           
							<!--ini bagian smk-->
							<div class="card-body card-padding-sm">
							<div class="table-responsive"> 
								<div id="DataTables_Table_0_wrapper" class=" dataTables_wrapper">
									<div class="datatable-header">
										<!--ini adalah kolom pencarian isi tabel-->
										<div id="DataTables_Table_0_filter" class="dataTables_filter">
											<label>
												<h3>Data Pendidikan SMK</h3> 
												<!--<input type="search" class="" placeholder="Masukan kata kunci..." aria-controls="DataTables_Table_0" id="searchInput">-->
											</label>
										</div>
										<div class="dt-buttons">   
											<a class="btn btn-info btn-raised btn-sm buttons-print" tabindex="0" aria-controls="DataTables_Table_SMK"title="Cetak PDF" href="javascript:void(0);" onclick="openPrintPreviewSMK()">
												<span>
													<i class=" position-left"><img src="assets/icon/printer.png" alt="icon" width="16px" height="16px"></i>
												</span>
											</a> 
										</div>
									</div>
									<div class="datatable-scroll-wrap">
										<table class="table table-hover table-striped dataTable" id="DataTables_Table_SMK" role="grid"> 
											<thead>
												<tr role="row">
													<th class="text-center sorting_asc" rowspan="2" tabindex="0" aria-controls="DataTables_Table_SMK" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending">No</th>
													<th class="text-center sorting" rowspan="2" tabindex="0" aria-controls="DataTables_Table_SMK" colspan="1" aria-label="Wilayah: activate to sort column ascending">Wilayah</th>
													
													<th class="text-center" colspan="3" rowspan="1">SMK</th>
												</tr>
												<tr role="row">
													<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_SMK" rowspan="1" colspan="1" aria-label="Jml: activate to sort column ascending">Jml</th>
													<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_SMK" rowspan="1" colspan="1" aria-label="N: activate to sort column ascending">N</th>
													<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_SMK" rowspan="1" colspan="1" aria-label="S: activate to sort column ascending">S</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!empty($datasekolah)) { // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
													foreach ($datasekolah as $data) {
													echo "<tr class='data odd' role='row'>
													<td class='sorting_1'>" . $data->no. "</td>
													<td class='tamwil'>" . $data->wilayah. "</td>
													
													<td>" . $data->jmlSmk. "</td>
													<td>" . $data->NSmk. "</td>
													<td>" . $data->SSmk. "</td>
													
												</tr>";}
												} else { // Jika data siswa kosong
												echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
												}
												?>
												
											</tbody>
											<tfoot>
												<tr>
													<td class="text-center" colspan="2" rowspan="1">
														<strong>Total</strong>
													</td>
													
													<td class="text-right" rowspan="1" colspan="1">
														<strong>89</strong>
													</td>
													<td class="text-right" rowspan="1" colspan="1">
														<strong>12</strong>
													</td>
													<td class="text-right" rowspan="1" colspan="1">
														<strong>77</strong>
													</td>
													</td>
												</tr>
											</tfoot>
										</table>
									</div>
									<div class="datatable-footer">

									</div>
								</div>
							</div>
							</div>
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

		<?php echo form_close(); ?>
    </body>
								
</html>
