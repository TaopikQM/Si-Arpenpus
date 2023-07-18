<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, intial-scale=1">
	<title>Login SI-ARPENPUS</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/vendors/mdi/css/materialdesignicons.min.css">
	<link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/vendors/css/vendor.bundle.base.css">
	<!-- Layout styles -->
	<link rel="stylesheet" href="https://www.bootstrapdash.com/demo/purple-admin-free/assets/css/style.css">
	<!-- End layout styles -->
	<style>
		.auth .auth-form-light {
			background: #888CFB;
			opacity: 71%;
			border-radius: 20px;
			color: black;
		}

		.btn-gradient-primary {
			opacity: 75%;
			background: linear-gradient(to right, #2E215B, #2E215B);
		}

		.btn-lg,
		.btn-group-lg>.btn {

			border-radius: 30rem;
		}

		.text-primary,
		.list-wrapper .completed .remove {
			color: white !important;
		}

		.error-msg {
			color: red;
		}
	</style>
</head>

<body>
	
	<?php echo form_open('auth/login'); ?>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper">
			<div class="content-wrapper d-flex align-items-center auth">
				<div class="row flex-grow">
					<div class="col-lg-4 mx-auto">
						<div class="auth-form-light text-left p-5">

							<div class="brand-logo">
								<h2 align="center">LOGIN</h2>
							</div>
							<!-- <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Log in to continue.</h6>-->
							<form action="" method="POST" class="pt-3">

								<!--<php if ($this->session->flashdata('error_msg')): ?>
                                <div class="error-msg">
                                    <php echo $this->session->flashdata('error_msg'); ?>
                                </div>-->

								<div class="form-group">
									<input type="email" class="form-control form-control-lg" placeholder="E-mail" name="email" required>
								</div>
								<div class="form-group">
									<input type="password" class="form-control form-control-lg" placeholder="Password" name="password" required>
								</div>
								<div class="mt-3">
									<button type="submit" name="kirim" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">LOG IN</button>
								</div>
								<div class="text-center mt-4 font-weight-light"> Belum punya akun? <a href="<?php echo site_url('auth/register'); ?>" class="text-primary">Daftar</a></div>
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