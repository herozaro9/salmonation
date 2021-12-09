<!DOCTYPE html>
<html class="no-js" lang="id">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Salmonation - Authorized</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/icon.png">
	<meta name="title" content="Salmonation - Authorized">
	<meta name="description"
	content="Salmonation ECOSYSTEM">
	<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
	<meta name="keywords"
	content="Salmonation, blockchain, salmonchain, Salmonation indonesia">

	<meta property="og:type" content="website">
	<meta property="og:url" content="<?php echo base_url(); ?>">
	<meta property="og:title" content="Salmonation - Authorized">
	<meta property="og:description"
	content="Salmonation ECOSYSTEM">
	<meta property="og:image" content="<?php echo base_url(); ?>assets/images/icon.png">
	<meta property="og:image:alt" content="Salmonation ECOSYSTEM">

	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="<?php echo base_url(); ?>">
	<meta property="twitter:title" content="Salmonation - Authorized">
	<meta property="twitter:description"
	content="Salmonation ECOSYSTEM">
	<meta property="twitter:image" content="<?php echo base_url(); ?>assets/images/icon.png">
	<meta property="fb:app_id" content="" />
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/icon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fontawesome-all.min.css">
	<!-- Flaticon CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/font/flaticon.css">
	<!-- Google Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,500,700&amp;display=swap" rel="stylesheet">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/aos.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
</head>
<body>
	<div id="loader">
		<img loading="lazy" src="<?php echo base_url(); ?>/assets/img/loader.gif" alt="">
	</div>
	<section class="fxt-template-animation fxt-otp-layout1">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-xl-5 col-lg-5 col-sm-9 col-12 fxt-bg-color bg-white">
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="fxt-content">
									<div class="fxt-header">
										<a href="#" class="fxt-logo"><img loading="lazy" src="<?php echo base_url(); ?>assets/images/salmon.svg" alt="Logo"></a>
									</div>
									<div class="fxt-form">
										<form method="POST" id="authform">
											<div class="fxt-transformY-50 fxt-transition-delay-1">
												<label for="">E-mail</label>
												<div class="fxt-form-row">
													<input type="mail" class="fxt-form-col otp-input form-control" required="required" placeholder="example@salmonation.com" id="email" >
												</div>
											</div>
											<div class="fxt-transformY-50 fxt-transition-delay-1">
												<label for="">Password</label>
												<div class="fxt-form-row">
													<input type="password" class="fxt-form-col otp-input form-control" required="required" placeholder="**********" id="password" >
												</div>
											</div>
											<div class="fxt-form-btn fxt-transformY-50 fxt-transition-delay-4">
												<button type="submit" class="fxt-btn-fill" id="submitbtn">Login</button>
											</div>
										</form>
									</div>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- jquery-->
	<script src="<?php echo base_url(); ?>assets/js/jquery-3.5.0.min.js"></script>
	<!-- Popper js -->
	<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
	<!-- Bootstrap js -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<!-- Imagesloaded js -->
	<script src="<?php echo base_url(); ?>assets/js/imagesloaded.pkgd.min.js"></script>
	<!-- Validator js -->
	<script src="<?php echo base_url(); ?>assets/js/validator.min.js"></script>
	<!-- Custom Js -->
	<script src="<?php echo base_url(); ?>assets/js/aos.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/auth.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-VD2BC0KPYG"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-VD2BC0KPYG');
	</script>
</body>
</html>