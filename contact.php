<!DOCTYPE html> 
<html lang="en">
	
<head>
		
		<meta charset="utf-8">
		<title>VK Medical Centre - Chennai</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		      <meta name="google-site-verification" content="mIIe5_lA0bHp00CTbbBgSpg_x90y3hMtIm9CTxMrnjQ">
<meta name="description" content="Looking for a Diagnostic Centre in Chennai? Get X-ray, ECG, Ultrasound and Full-body tests with secure Home sample collection and fast digital reporting.">
<meta name="robots" content="max-image-preview:large">
<meta name="generator" content="All in One SEO (AIOSEO) 4.9.1.1">
<meta property="og:locale" content="en_US">
<meta property="og:site_name" content="VK Medical Centre - Diagnostic Service Centre in Chennai">
<meta property="og:type" content="website">
<meta property="og:title" content="VK Medical Centre- Chennai&#039;s Best Diagnostic Centre">
<meta property="og:description" content="Looking for a Diagnostic Centre in Chennai? Get X-ray, ECG, Ultrasound and Full-body tests with secure Home sample collection and fast digital reporting.">
<meta property="og:url" content="https://vkmedicalcentre.com/">
<meta property="og:image" content="https://vkmedicalcentre.com/favicon.png">
<meta property="og:image:secure_url" content="https://vkmedicalcentre.com/favicon.png">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="VK Medical Centre- Chennai&#039;s Best Diagnostic Centre">
<meta name="twitter:description" content="Looking for a Diagnostic Centre in Chennai? Get X-ray, ECG, Ultrasound and Full-body tests with secure Home sample collection and fast digital reporting.">
<meta name="twitter:image" content="https://vkmedicalcentre.com/favicon.png">
<meta name="generator" content="Elementor 3.33.5; features: e_font_icon_svg, additional_custom_breakpoints; settings: css_print_method-external, google_font-enabled, font_display-swap">
<meta name="msapplication-TileImage" content="https://vkmedicalcentre.com/favicon.png">

 
		
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="favicon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png"/>

		<!-- Theme Settings Js -->
		<script src="assets/js/theme-script.js" type="985af241c58a4536ebfcc9bb-text/javascript"></script>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Iconsax CSS-->
		<link rel="stylesheet" href="assets/css/iconsax.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="assets/css/feather.css">
		
		<!-- Daterangepikcer CSS -->
		<link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
		
		<!-- Fancybox CSS -->	
    	<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.min.css">
	
	</head>
	<body><a href="https://doccure.dreamstechnologies.com/cdn-cgi/content?id=tPweszXax.gsB2rPv4pBiO5ZYb6gp8M110PhDoOiz0I-1779377810.7934446-1.0.1.1-wyTZ49R488X.5ViQpLHWfY3GL2kNtgnmhA3eTqyk6mE" aria-hidden="true" rel="nofollow noopener" style="display: none !important; visibility: hidden !important"></a>

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
									<li class="breadcrumb-item"><a href="index.php" aria-label="Home"><i class="isax isax-home-15"></i></a></li>
									<li class="breadcrumb-item active">Contact Us</li>
								</ol>
								<h2 class="breadcrumb-title">Contact Us</h2>
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
			
            
            <?php
			
			
			if(@$_REQUEST['id']=="") { $vid = "Anna Nagar"; } else  { $vid = $_REQUEST['id']; }
			
			
				$queryc ="select * from `contact` where `name`='$vid'";
				$rsqueryc = mysqli_query(dbcon(),$queryc);
				@$rsdatac = mysqli_fetch_object($rsqueryc);
			?>            
			<!-- Contact Us -->
			<section class="contact-section">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-12">
							<div class="section-inner-header contact-inner-header">
								<h6>Get in touch</h6>
								<h2>Have Any Question?</h2>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="isax isax-location5"></i>
									</div>
									<div class="contact-details">
										<h4>Address</h4>
										<p><?php echo $rsdatac->description; ?></p>
									</div>
								</div>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="isax isax-call5"></i>
									</div>
									<div class="contact-details">
										<h4>Phone Number</h4>
										<p><?php echo $rsdatac->phone; ?></p>
									</div>
								</div>
							</div>
							<div class="card contact-card">
								<div class="card-body">
									<div class="contact-icon">
										<i class="isax isax-sms5"></i>
									</div>
									<div class="contact-details">
										<h4>Email Address</h4>
										<p><?php echo $rsdatac->email; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-7 col-md-12 d-flex">
							<div class="card contact-form-card w-100">
								<div class="card-body">
                                
                                <?php
						
						
						if(@$_REQUEST['act']=="suc") { 
						
						?><div align="center" style="color:#00CC66"><b>Form Updated Successfully</b></div>
                        <?php } ?>
                                
									<form action="https://faceone.in/vk_contact.php?act=mail" name="contact" method="post" onsubmit="return checkCaptcha()">
                                    <input type="hidden" name="area" value="<?php echo @$vid; ?>" >
                                    
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Name</label>
													<input type="text" name="name" class="form-control" required aria-label="Enter your name">
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Email</label>
													<input type="text" name="email" class="form-control" required aria-label="Enter your email address">
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Phone Number</label>
													<input type="text" class="form-control" name="mobile" required aria-label="Enter your phone number">
												</div>
											</div>
                                            <?php if(@$_REQUEST['test']!="") { ?>
											<div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Choose Your Plan / Test</label>
													<input type="text" class="form-control" name="service" value="<?php echo @$_REQUEST['test']; ?>" aria-label="Enter services you are interested in">
												</div>
											</div>
                                            <?php } ?>
											<div class="col-md-12">
												<div class="mb-3">
													<label class="form-label">Message</label>
													<textarea class="form-control" name="message" required rows="6" aria-label="Enter your message"></textarea>
												</div>
											</div>
                                            
                                            
                                            <div class="col-md-6">
												<div class="mb-3">
													<label class="form-label">Captcha Code</label>
                                            <?php $a = rand(10,20); $b = rand(10,20); $c = $a + $b; ?>
    <label>What is <?php echo $a; ?> + <?php echo $b; ?>?</label>
    <input type="text" id="captcha" name="captcha" class="form-control" required >
                                            </div>
											</div>
                                            
                                            
                                            
											<div class="col-md-12">
												<div class="form-group-btn mb-0">
													<button type="submit" class="btn btn-primary-gradient" aria-label="Send contact message">Send Message</button>
												</div>
											</div>
										</div>
									</form>
                                    <script>
function checkCaptcha() {
    if (document.getElementById("captcha").value != "<?php echo $c; ?>") {
        alert("Wrong Captcha Result.");
        return false;
    }
    return true;
}
</script>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Contact Us -->

			<!-- Contact Map -->
			<div class="contact-map d-flex">
				<?php echo $rsdatac->small; ?>
			</div>
			<!-- /Contact Map -->
   
			<!-- Footer Section -->
			
            
            <?php include('footer.php'); ?>