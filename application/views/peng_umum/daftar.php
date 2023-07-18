
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <title>Register - Staf</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/vendors/css/vendor.bundle.base.css">
    <!-- Layout styles -->
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style4.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<style>
           
		.auth .auth-form-light {
			background: #888CFB;
			opacity: 71%;
			border-radius: 20px;
			color: black;
		}
		.btn-gradient-primary {
			background: -webkit-gradient(linear, left top, right top, from(#da8cff), to(#9a55ff));
			background: linear-gradient(to right, #2E215B, #2E215B);
			opacity: 75%;
		}
		.btn-lg, .btn-group-lg > .btn {
		
			border-radius: 30rem;
		}
		.text-primary, .list-wrapper .completed .remove {
			color: white !important;
		}
		.btn-light {
		--bs-btn-color: white;
		--bs-btn-bg: #2E215B;
		--bs-btn-border-color: none;
		opacity: 75%;
		}
		.btn-secondary {
			--bs-btn-color: #fff;
			--bs-btn-bg: #2E215B;
		}
		.masuk a {
			margin: 10px; /* Tambahkan nilai sesuai dengan jarak yang diinginkan */
			text-decoration: none;
		}
		.masuk{
			padding-bottom: 10px;
		}
    </style>
	<!-- End layout styles -->
</head>

<body>
	<?php echo validation_errors('<p style="color:red;">', '</p>'); ?>
    <?php echo form_open('auth/daftar'); ?>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
							<div class="masuk">
								<center>
									<a href="<?php echo site_url('auth/register'); ?>">
										<button type="button" class="btn btn-light">Staf</button>
									</a>
									<a href="<?php echo site_url('auth/daftar'); ?>">
										<button type="button" class="btn btn-secondary">Umum</button>
									</a>
                                    <a href="<?php echo site_url('auth/admin'); ?>">
										<button type="button" class="btn btn-light">Admin</button>
									</a>
								</center>
							</div>
							<div>
                                <h2 align="center">REGISTER</h2>
                            </div>
                            <form action="" method="POST" class="pt-3">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" placeholder="Nama" name="nama" value="<?php echo set_value('nama'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" placeholder="Pass" name="password" required>
									<?php echo form_error('password'); ?>
								</div>
                                <div class="mt-3">
                                    <button type="submit" name="kirim" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Create</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> Already registered? <a  href="<?php echo site_url('auth/login'); ?>" class="text-primary">Sign In</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="https://www.bootstrapdash.com/demo/purple-admin-free/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="https://www.bootstrapdash.com/demo/purple-admin-free/assets/js/off-canvas.js"></script>
    <script src="https://www.bootstrapdash.com/demo/purple-admin-free/assets/js/hoverable-collapse.js"></script>
    <script src="https://www.bootstrapdash.com/demo/purple-admin-free/assets/js/misc.js"></script>
    <!-- endinject -->
	<?php echo form_close(); ?>
</body>

</html>
