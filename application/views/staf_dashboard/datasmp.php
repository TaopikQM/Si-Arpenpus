<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SI-ARPENPUS</title>
		<link rel="stylesheet" href="assets/css/style4.css">
        
		<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			border: 1px solid #ddd;
			padding: 8px;
			
		}

		.data td:nth-child(n+3) {
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}

		tr:hover {
			background-color: #ddd;
		}
	</style>

		</head>

    <body>

		 <!--Star Header-->
		<header >
        <div class="tabbook">
							<a class="ham" href="<?php echo site_url('Staf_dashboard'); ?>">
							<img src="assets/icon/icon _arrow ios back_.png" alt="kembali" >	
								
						
									<!--<button>
										Data
									</button>-->
							</a>
						</div>
			<div class="topb-post">
				<div class="container">
                    <div class="card-buku">
						<h1>DATA PENDIDIKAN SMP</h1>
					</div>
				</div>
			</div>
		</header>
			<!--End Header-->

			<!--tampilan buku-->
			<div class="upb-post">
				<div class="container">
					
							<!--iniBagian Smp-->
							<div class="card-body card-padding-sm">
							<div class="table-responsive"> 
								<div id="DataTables_Table_0_wrapper" class=" dataTables_wrapper">
									<div class="datatable-header">
										<!--ini adalah kolom pencarian isi tabel-->
										<div id="DataTables_Table_0_filter" class="dataTables_filter">
											<label>
												<!--<input type="search" class="" placeholder="Masukan kata kunci..." aria-controls="DataTables_Table_0" id="searchInput">-->
											</label>
										</div>
										
										<div class="dt-buttons"> 
											<a class="btn btn-info btn-raised btn-sm buttons-print" tabindex="0" aria-controls="DataTables_Table_SMP"title="Unduh PDF" href="assets/pdf/SI-ARPENPUS_DataSmp.pdf" download="SI-ARPENPUS_DataSmp.pdf">
												<span>
													UNDUH
													<!--<i class=" position-left"><img src="assets/icon/printer.png" alt="icon" width="16px" height="16px"></i>-->
												</span>
											</a> 
										</div>
									</div>
									<div class="datatable-scroll-wrap">
										<table class="table table-hover table-striped dataTable" id="DataTables_Table_SMP" role="grid"> 
											<thead>
												<tr role="row">
													<th class="text-center sorting_asc" rowspan="2" tabindex="0" aria-controls="DataTables_Table_SMP" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending">No</th>
													<th class="text-center sorting" rowspan="2" tabindex="0" aria-controls="DataTables_Table_SMP" colspan="1" aria-label="Wilayah: activate to sort column ascending">Wilayah</th>
													
													<th class="text-center" colspan="3" rowspan="1">SMP</th>
												</tr>
												<tr role="row">
													
													<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_SMP" rowspan="1" colspan="1" aria-label="Jml: activate to sort column ascending">Jml</th>
													<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_SMP" rowspan="1" colspan="1" aria-label="N: activate to sort column ascending">N</th>
													<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_SMP" rowspan="1" colspan="1" aria-label="S: activate to sort column ascending">S</th>
												</tr>
											</thead>
											<tbody>
												<?php
												if (!empty($datasekolah)) { // Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada
													foreach ($datasekolah as $data) {
													echo "<tr class='data odd' role='row'>
													<td class='sorting_1'>" . $data->no. "</td>
													<td class='tamwil'>" . $data->wilayah. "</td>
													
													<td>" . $data->jmlSmp. "</td>
													<td>" . $data->NSmp. "</td>
													<td>" . $data->SSmp. "</td>
													
												</tr>";}
												} else { // Jika data siswa kosong
												echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
												}
												?>
												
											</tbody>
											<tfoot>
												<tr>
													<th class="text-center" colspan="2" rowspan="1">
														<strong>Total</strong>
													</th>
													
													<td class="text-right" rowspan="1" colspan="1">
														<strong>200</strong>
													</td>
													<td class="text-right" rowspan="1" colspan="1">
														<strong>46</strong>
													</td>
													<td class="text-right" rowspan="1" colspan="1">
														<strong>154</strong>
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
