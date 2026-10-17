<!DOCTYPE html>
<html lang="en">
	
<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" >
		<meta name="description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
		<meta name="keywords" content="practo clone, doccure, doctor appointment, Practo clone html template, doctor booking template">
		<meta name="author" content="Practo Clone HTML Template - Doctor Booking Template">
		<meta property="og:url" content="https://doccure.dreamstechnologies.com/html/">
		<meta property="og:type" content="website">
		<meta property="og:title" content="Doctors Appointment HTML Website Templates | Doccure">
		<meta property="og:description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
		<meta property="og:image" content="assets/img/preview-banner.jpg">
		<meta name="twitter:card" content="summary_large_image">
		<meta property="twitter:domain" content="https://doccure.dreamstechnologies.com/html/">
		<meta property="twitter:url" content="https://doccure.dreamstechnologies.com/html/">
		<meta name="twitter:title" content="Doctors Appointment HTML Website Templates | Doccure">
		<meta name="twitter:description" content="The responsive professional Doccure template offers many features, like scheduling appointments with  top doctors, clinics, and hospitals via voice, video call & chat.">
		<meta name="twitter:image" content="assets/img/preview-banner.jpg">
		<title>VK medical Centre</title>
		
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="favicon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png"/>

		<!-- Theme Settings Js -->
		<script src="assets/js/theme-script.js" type="236fac5c2470a413e909469a-text/javascript"></script>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Iconsax CSS-->
		<link rel="stylesheet" href="assets/css/iconsax.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="assets/css/feather.css">

		<!-- Fancybox CSS -->	
    	<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.min.css">

	</head>		
	<body><a href="https://doccure.dreamstechnologies.com/cdn-cgi/content?id=nEyfkGXvVojoKCpKH0aJunXyavpD6jWceT4igHGfskE-1779377812.221882-1.0.1.1-2WxAy5XBP_cLKvYp7CeYLOd6dbhkKWhdPYQqDpNQzhw" aria-hidden="true" rel="nofollow noopener" style="display: none !important; visibility: hidden !important"></a>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
					
			
            <?php include('header.php'); ?>
                        
            
			<!-- /Header -->

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container">
					<div class="row align-items-center inner-banner">
						<div class="col-md-12 col-12 text-center">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" aria-label="home"><i class="isax isax-home-15"></i></a></li>
									<li class="breadcrumb-item active">Book a Test</li>
								</ol>
								<h2 class="breadcrumb-title">Book a Test</h2>
							</nav>
						</div>
					</div>
				</div>
				<div class="breadcrumb-bg">
					<img src="assets/img/bg/breadcrumb-bg-01.png" alt="img" class="breadcrumb-bg-01">
					<img src="assets/img/bg/breadcrumb-bg-02.png" alt="img" class="breadcrumb-bg-02">
					<img src="assets/img/bg/breadcrumb-icon.png" alt="img" class="breadcrumb-bg-03">
					<img src="assets/img/bg/breadcrumb-icon.png" alt="img" class="breadcrumb-bg-04">
				</div>
			</div>
			<!-- /Breadcrumb -->

			<!-- Pricing -->
			<section class="pricing-section">
				<div class="container">
					<?php /*?><div class="row">
						<div class="col-md-12 text-center">
							<div class="section-inner-header pricing-inner-header">
								<h2>Our Pricing Plan</h2>
								<div class="plan-choose-info">
									<label class="monthly-plan">Monthly</label>
									<div class="form-check form-switch">
										<input class="form-check-input" type="checkbox" role="switch" checked>
									  </div>
									<label class="yearly-plan">Yearly</label>
								</div>
							</div>
						</div>
					</div><?php */?>
					<div class="row align-items-center justify-content-center">
						
                        <?php
							
							$iCnt = "0"; 
							$query ="select * from `plan` order by id asc";
							$rsquery = mysqli_query(dbcon(),$query);
							while(@$rsdata = mysqli_fetch_object($rsquery))
				            { 
					        $iCnt++;
						?>
                        
                        
                        <div class="col-lg-4 col-md-6">
							<div class="card pricing-card w-100">
								<div class="card-body">
									<div class="pricing-header">
										<div class="pricing-header-info">
											<?php /*?><div class="pricing-icon">
												<span>
													<img src="assets/img/icons/price-icon1.svg" alt="icon">
												</span>
											</div><?php */?>
											<div class="pricing-title">
												<p>For individuals</p>
												<h4><?php echo $rsdata->email; ?></h4>
											</div>
										</div>
									</div>
									<div class="pricing-info">
										<div class="pricing-amount">
											<h2 align="center">₹ <?php echo $rsdata->name; ?> <span></span></h2>
											<h6>What’s included</h6>
										</div>
										<div class="pricing-list">
											<?php echo $rsdata->description; ?>
										</div>
                                        
                                        <div class="pricing-btn">
											<a href="contact.php?id=Anna Nagar&test=<?php echo $rsdata->email; ?>" class="btn btn-primary">Choose Plan</a>
										</div>
										
									</div>
								</div>
							</div>
						</div>
                        
                        <?php } ?>
                        
                        
						<?php /*?><div class="col-lg-4 col-md-6">
							<div class="card pricing-card active w-100">
								<div class="card-body">
									<div class="pricing-header">
										<div class="pricing-header-info">
											<div class="pricing-icon">
												<span>
													<img src="assets/img/icons/price-icon2.svg" alt="icon">
												</span>
											</div>
											<div class="pricing-title">
												<p>For startups</p>
												<h4>Premium</h4>
											</div>
										</div>
										<div>
											<span class="badge">Popular</span>
										</div>
									</div>
									<div class="pricing-info">
										<div class="pricing-amount">
											<h2>$199 <span>/monthly</span></h2>
											<h6>What’s included</h6>
										</div>
										<div class="pricing-list">
											<ul>
												<li>Profile Creation</li>
												<li>Appointment Booking</li>
												<li>Notification Alerts</li>
												<li>Extended Telemedicine Access</li>
												<li>Exclusive Discounts</li>
												<li>Appointment History</li>
												<li>Priority Customer Support</li>
											</ul>
										</div>
										<div class="pricing-btn">
											<a href="contact.php?id=Anna%20Nagar" class="btn btn-primary">Choose Plan</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6">
							<div class="card pricing-card w-100">
								<div class="card-body">
									<div class="pricing-header">
										<div class="pricing-header-info">
											<div class="pricing-icon">
												<span>
													<img src="assets/img/icons/price-icon3.svg" alt="icon">
												</span>
											</div>
											<div class="pricing-title">
												<p>For big companies</p>
												<h4>Enterprise</h4>
											</div>
										</div>
									</div>
									<div class="pricing-info">
										<div class="pricing-amount">
											<h2>$399 <span>/monthly</span></h2>
											<h6>What’s included</h6>
										</div>
										<div class="pricing-list">
											<ul>
												<li>All Basic plan features</li>
												<li>All Premium plan features</li>
												<li>Personalized Health Insights</li>
												<li>Family Account Management</li>
											</ul>
										</div>
										<div class="pricing-btn">
											<a href="login-email.html" class="btn btn-primary">Choose Plan</a>
										</div>
									</div>
								</div>
							</div>
						</div><?php */?>
					</div>
				</div>
			</section>
			<!-- /Pricing -->			

			<!-- Footer Section -->
			
            
            <?php include('footer.php'); ?>