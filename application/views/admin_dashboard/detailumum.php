<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>SI-ARPENPUS</title>
	<link rel="stylesheet" href="assets/css/style4.css">
	<style>
		.btn-danger {
			background-color: #dc3545 !important;
		}

		/* Tambahkan gaya untuk garis dan warna header tabel */
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			border: 1px solid #ddd;
			padding: 8px;
			text-align: left;
		}

		.data td:nth-child(n+3) {
			text-align: left;
		}

		th {
			background-color: #f2f2f2;
			text-align: left;
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
	<header>
		<div class="tabbook">
			<a class="ham" href="<?php echo site_url('Admin_dashboard'); ?>">
				<img src="assets/icon/icon _arrow ios back_.png" alt="kembali">

			</a>
		</div>
		<div class="topb-post">
			<div class="container">
				<div class="card-buku">
					<h1>DATA PENGUNJUNG</h1>
				</div>
			</div>
		</div>
	</header>
	<!--End Header-->

	<!--tampilan buku-->
	<div class="upb-post">
		<div class="container">
			<!--data umum-->
			<div class="card-body card-padding-sm">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class=" dataTables_wrapper">
						<div class="datatable-header">
							<!--ini adalah kolom pencarian isi tabel-->
							<div id="DataTables_Table_0_filter" class="dataTables_filter">
								<label>
									<div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
										<br>
										<span>Show:</span>
										<select id="dataTable_length" class="custom-select custom-select-sm form-control form-control-sm">
											<option value="10">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
										</select>
									</div>
									<!--<input type="search" class="" placeholder="Masukan kata kunci..." aria-controls="DataTables_Table_0" id="searchInput">-->
								</label>
							</div>
						</div>
						<div class="datatable-scroll-wrap">
							<table class="table table-hover table-striped dataTable" id="DataTables_Table_SMA" role="grid">
								<thead>
									<tr role="row">
										<th class="text-center sorting_asc" rowspan="2" tabindex="0" aria-controls="DataTables_Table" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending">No</th>
										<th class="text-center sorting" rowspan="2" tabindex="0" aria-controls="DataTables_Table" colspan="1" aria-label="Wilayah: activate to sort column ascending">Nama</th>

										<!--<th class="text-center" colspan="3" rowspan="1">SMA</th>-->
									</tr>
									<tr role="row">

										<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table" rowspan="1" colspan="1" aria-label="Judul: activate to sort column ascending">Email</th>
										<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table" rowspan="1" colspan="1" aria-label="P: activate to sort column ascending">Pass</th>
										<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table" rowspan="1" colspan="1" aria-label="Tahun: activate to sort column ascending">Peran</th>
										<th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
									</tr>
								</thead>
								<tbody>

									<?php
									if (!empty($dbpenumum)) { ?><!--// Jika data siswa tidak sama dengan kosong, artinya jika data siswa ada-->
										<?php foreach ($dbpenumum as $item) { ?>
											<tr class='data odd' role='row'>
												<td class='sorting_1'><?php echo $item->id; ?></td>

												<td><?php echo  $item->nama; ?></td>
												<td> <?php echo $item->email; ?></td>
												<td><?php echo $item->password; ?></td>
												<td><?php echo  $item->peran; ?></td>
												<td>
													<button class='btn btn-danger' onclick='deleteDataUmum(<?php echo $item->id; ?>)'>Hapus</button>
												</td>
											</tr>
										<?php } ?>
									<?php } else { ?> <!--Jika data siswa kosong-->
										<tr>
											<td align='center' colspan='7'>Data Tidak Ada</td>
										</tr>
									<?php } ?>

									<!--menghitung data-->
									<?php
									$totalData = count($dbpenumum); // Menghitung jumlah data
									if (!empty($dbpenumum)) {
										$index = 1;
										foreach ($dbstaf as $item) {
											// Tampilkan data staf seperti sebelumnya
										}
									} else {
										echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
									}
									?>

								</tbody>
								<tfoot>
									<tr>
									<tr>
										<td colspan="7" align="right"><strong>Total Data: <?php echo $totalData; ?></strong></td>
									</tr>
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
	<script src=" https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#dataTable').DataTable({
				"lengthMenu": [10, 20, 30],
				"pageLength": 10 // Jumlah data yang ditampilkan secara default
			});
		});

		function deleteData(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteData'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataPend(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataPend'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataStaf(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataStaf'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataUmum(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataUmum'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataAdmin(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataAdmin'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}

		function deleteDataChat(id) {
			if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
				$.ajax({
					url: "<?php echo base_url('Admin_dashboard/deleteDataAdmin'); ?>",
					type: "POST",
					data: {
						id: id
					},
					success: function(response) {
						// Tampilkan pesan atau lakukan tindakan lainnya setelah penghapusan berhasil
						alert(response);
						// Refresh halaman atau perbarui tampilan tabel
						location.reload();
					},
					error: function() {
						// Tampilkan pesan atau lakukan tindakan lainnya jika terjadi kesalahan
						alert("Terjadi kesalahan saat menghapus data");
					}
				});
			}
		}
	</script>


</body>

</html>