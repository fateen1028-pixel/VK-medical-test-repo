<!DOCTYPE html> 
<html lang="en">
	
<head>
		
		<meta charset="utf-8">
		<title>VK Medical Centre - Chennai</title>
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
		<script src="assets/js/theme-script.js" type="c345b4c5e1a1d1a18abb70ae-text/javascript"></script>
		
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
	<body><a href="https://doccure.dreamstechnologies.com/cdn-cgi/content?id=CDTPbJFRtsd4oBEQmabyyZ.x.4KjSakmgOPEf7MmWbw-1779377818.4503098-1.0.1.1-D4h5FFY3GPIDAPvkwXn4e.rjNYajw6mS_RMkHmF.5Dc" aria-hidden="true" rel="nofollow noopener" style="display: none !important; visibility: hidden !important"></a>

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
									<li class="breadcrumb-item">Blogs</li>
									<li class="breadcrumb-item active">Blogs</li>
								</ol>
								<h2 class="breadcrumb-title">Blogs</h2>
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
			
			<!-- Page Content -->
			<div class="content">
				<div class="container">
				
					<div class="row">
						<div class="col-lg-8 col-md-12">
						
							<div class="row blog-grid-row">
								
                                
                                <?php
								$iCnt = "0"; 
								$query ="select * from `testimonials` order by id asc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								?>
                                
                                <div class="col-md-6 col-sm-12">
								
									<!-- Blog Post -->
									<div class="blog grid-blog">
										<div class="blog-image">
											<a href="blog-details.php?id=<?php echo $rsdata->email; ?>"><img class="img-fluid" src="Products/Large/<?php echo $rsdata->name; ?>" alt="Post Image" style="width:300px; height:250px;"></a>
											<?php /*?><span class="badge badge-cyan category-slug"><?php echo $rsdata->email; ?></span><?php */?>
										</div>
										<div class="blog-content">
											<ul class="entry-meta meta-item">
												<?php /*?><li>
													<div class="post-author">
														<a href="doctor-profile.html"><img src="assets/img/patients/patient21.jpg" alt="Post Author"><span>Arthur Hetzel</span></a>
													</div>
												</li><?php */?>
												<li><i class="isax isax-calendar-1 me-1"></i><?php echo $rsdata->date_release; ?></li>
											</ul>
											<h3 class="blog-title"><a href="blog-details.php?id=<?php echo $rsdata->email; ?>"><?php echo $rsdata->email; ?></a></h3>
											<!--<p class="mb-0">Discover practical, everyday tips to help you stay healthy throughout the year.</p>-->
										</div>
									</div>
									<!-- /Blog Post -->
									
								</div>
							
                            	
                                <?php } ?>
                            
                            
							</div>
							
							
							
						</div>
						
						<!-- Blog Sidebar -->
						<div class="col-lg-4 col-md-12 sidebar-right theiaStickySidebar">

							<!-- Search -->
							<div class="card search-widget">
								<div class="card-body">
									<form class="search-form">
										<div class="input-group">
											<input type="text" placeholder="Search..." class="form-control">
											<button type="submit" class="btn btn-primary"><i class="isax isax-search-normal"></i></button>
										</div>
									</form>
								</div>
							</div>
							<!-- /Search -->

							<!-- Latest Posts -->
							<div class="card post-widget">
								<div class="card-body">
									<h5 class="mb-3">Our Services</h5>
									<ul class="latest-posts">
										
                                        <?php
										$iCnt = "0"; 
										$query ="select * from `email2` order by id asc";
										$rsquery = mysqli_query(dbcon(),$query);
										while(@$rsdata = mysqli_fetch_object($rsquery))
										{ 
										  $iCnt++;
										?>
                                        
                                        
                                        <li>
											<div class="post-thumb">
												<a href="service-details.php?id=<?php echo $rsdata->cat; ?>">
													<img class="img-fluid" src="Products/Large/<?php echo $rsdata->banner_img; ?>" alt="blog-image">
												</a>
											</div>
											<div class="post-info">
												<h4>
													<a href="service-details.php?id=<?php echo $rsdata->cat; ?>" style="line-height:22px;"><?php echo $rsdata->cat; ?> - <?php echo $rsdata->email; ?></a>
												</h4>
											</div>
										</li>
										
                                        <?php } ?>
                                        
                                        
									</ul>
								</div>
							</div>
							<!-- /Latest Posts -->

							
							
						</div>
						<!-- /Blog Sidebar -->
						
					</div>
				</div>
			</div>	
			<!-- /Page Content -->
   
			<!-- Footer Section -->
			
            
            <?php include('footer.php'); ?>