<!DOCTYPE html> 
<html lang="en">
<?php $seo_title = "Diagnostic Services in Chennai - Blood Test, X-Ray, ECG, USG & More | VK Medical Centre";
$seo_desc = "Pathology and imaging services in Chennai - blood test laboratory, digital X-ray, ECG, ultrasound (USG), colour Doppler, 2D echo, PFT, audiometry, TMT and uroflowmetry.";
$seo_canon = "https://vkmedicalcentre.com/services/";
?>
	
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		      <meta name="google-site-verification" content="mIIe5_lA0bHp00CTbbBgSpg_x90y3hMtIm9CTxMrnjQ">
<?php include('seo-head.php'); ?>
		
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="favicon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png"/>

		<!-- Theme Settings Js -->
		<script src="assets/js/theme-script.js" type="28b43b02acbcbc646d8450c2-text/javascript"></script>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Iconsax CSS-->
		<link rel="stylesheet" href="assets/css/iconsax.css">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="assets/css/feather.css">
		
		<!-- Datetimepicker CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
		
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
		
		<!-- Fancybox CSS -->
		<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">
		
		<!-- Fancybox CSS -->	
    	<link rel="stylesheet" href="assets/plugins/fancybox/jquery.fancybox.min.css">

		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.min.css">
	
	</head>
	<body><a href="https://doccure.dreamstechnologies.com/cdn-cgi/content?id=Hs0qtclCROI3qAlqi5T1KZigYGX0ApWYm8_wtDKOfQ4-1779377806.389085-1.0.1.1-1SyVLR5t_rIZLbmDdUyj958.B1mRpBAndJmMGot9o8c" aria-hidden="true" rel="nofollow noopener" style="display: none !important; visibility: hidden !important"></a>

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
									<li class="breadcrumb-item active">Services</li>
								</ol>
								<h1 class="breadcrumb-title">Diagnostic Services in Chennai</h1>
							</nav>
						</div>
					</div>
				</div>
				<?php /*?><div class="breadcrumb-bg">
					<img src="assets/img/bg/breadcrumb-bg-01.png" alt="img" class="breadcrumb-bg-01">
					<img src="assets/img/bg/breadcrumb-bg-02.png" alt="img" class="breadcrumb-bg-02">
					<img src="assets/img/bg/breadcrumb-icon.png" alt="img" class="breadcrumb-bg-03">
					<img src="assets/img/bg/breadcrumb-icon.png" alt="img" class="breadcrumb-bg-04">
				</div><?php */?>
			</div>
			<!-- /Breadcrumb -->
			
		  	<!-- Page Content -->
			<div class="content">
				<div class="container">

					<div class="row">
					
						
						<div class="col-md-12 col-lg-12 col-xl-12">

							<?php /*?><div class="row align-items-center pb-3">	
								<div class="col-md-4 col-12 d-md-block d-none custom-short-by">
									<h3 class="title pharmacy-title fs-24 mb-2">Medlife Medical</h3>
									<p class="doc-location mb-2 text-ellipse pharmacy-location"><i class="isax isax-location5 me-1"></i> 96 Red Hawk Road Cyrus, MN 56323 </p>
									<span class="sort-title">Showing 6 of 98 products</span>
								</div>
								<div class="col-md-8 col-12 d-md-block d-none custom-short-by">
									<div class="sort-by pb-3">
										<span class="sort-title">Sort by</span>
										<span class="sortby-fliter">
											<select class="form-select">
												<option>Select</option>
												<option class="sorting">Rating</option>
												<option class="sorting">Popular</option>
												<option class="sorting">Latest</option>
												<option class="sorting">Free</option>
											</select>
										</span>
									</div>
								</div>
							</div><?php */?>

							<div class="row">
								
								
								<?php
								$iCnt = "0"; 
								$query ="select * from `email2` order by id asc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								?>
                                                
                        		<div class="col-md-12 col-lg-4 col-xl-4 product-custom d-flex">
	                                <div class="profile-widget w-100">
										<div class="doc-img">
											<a href="<?php echo preg_replace("/\\s+/","_",trim($rsdata->cat)); ?>/" tabindex="-1">
												<img class="img-fluid" alt="Product image" src="Products/Large/<?php echo $rsdata->banner_img; ?>">
											</a>
											<a href="javascript:void(0)" class="fav-btn" tabindex="-1">
												<i class="far fa-bookmark"></i>
											</a>
										</div>
										<div class="pro-content">
											<h2 class="title">
												<a href="<?php echo preg_replace("/\\s+/","_",trim($rsdata->cat)); ?>/" tabindex="-1"><?php echo $rsdata->cat; ?></a> 
											</h2>
											<div class="row align-items-center">
												<div class="col-lg-12 d-flex">
													<a href="<?php echo preg_replace("/\\s+/","_",trim($rsdata->cat)); ?>/" tabindex="-1" style="color:#0099CC; font-weight:600;">Read More -></a> 
												</div>
											</div>
										</div>
									</div>		
                            	</div>
                            
                            	<?php } ?>
                            
                             </div>
                            
						</div>
					</div>
				</div>
			</div>
		
			
			<!-- Footer Section -->
			
            
            <?php include('footer.php'); ?>