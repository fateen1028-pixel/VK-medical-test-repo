<!DOCTYPE html> 
<html lang="en">
	 <?php
	
	//echo $_SERVER['REQUEST_URI'];
	 $a = explode("/",$_SERVER['REQUEST_URI']); 
	 
	 //echo $a[3];
	 $variable = "Uroflowmetry";
$seo_cat = $variable;
	 ?>
<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		      <meta name="google-site-verification" content="mIIe5_lA0bHp00CTbbBgSpg_x90y3hMtIm9CTxMrnjQ">
<?php include('seo-head.php'); ?>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.png" type="image/x-icon">

		<!-- Apple Touch Icon -->
		<link rel="apple-touch-icon" sizes="180x180" href="favicon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon.png"/>
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png"/>

		<!-- Theme Settings Js -->
		<script src="assets/js/theme-script.js" type="8c637ee144a4f93b0889c541-text/javascript"></script>
		
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
	<body><a href="https://doccure.dreamstechnologies.com/cdn-cgi/content?id=B9moVqAULh02VBCz.Tx7zIVE9fy9wkPkEgt5F7MCnMY-1779377806.6878524-1.0.1.1-AF3jN69tKOtkXRvorJRawxrc0YAIcpKj1drEH1s5Cxg" aria-hidden="true" rel="nofollow noopener" style="display: none !important; visibility: hidden !important"></a>

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<?php include('header.php'); ?>
            
            
			<!-- /Header -->
            
            
            					<?php
								$querys ="select * from `email2` where `cat`='$variable'";
								$rsquerys = mysqli_query(dbcon(),$querys);
								@$rsdatas = mysqli_fetch_object($rsquerys);
								?>

			<!-- Breadcrumb -->
			<div class="breadcrumb-bar">
				<div class="container">
					<div class="row align-items-center inner-banner">
						<div class="col-md-12 col-12 text-center">
							<nav aria-label="breadcrumb" class="page-breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php" aria-label="home"><i class="isax isax-home-15"></i></a></li>
									<li class="breadcrumb-item" aria-current="page"><?php echo $rsdatas->cat2; ?></li>
									<li class="breadcrumb-item active"><?php echo $rsdatas->cat; ?></li>
								</ol>
								<h1 class="breadcrumb-title"><?php echo htmlspecialchars($seo_h1, ENT_QUOTES, "UTF-8"); ?></h1>
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

						<div class="col-md-7 col-lg-8 col-xl-8">
							<!-- Doctor Widget -->
							<div class="card">
								<div class="card-body product-description">
									<div class="doctor-widget" align="center">
										<div class="">
                                        	<div class="doc-info-cont product-cont" style="width:100%;">
												<h2 class="doc-name mb-4" style="font-size:28px; font-weight:600;"><?php echo $rsdatas->email; ?></h2>
											</div>
											<div class="">
													<img src="Products/Large/<?php echo $rsdatas->image1; ?>" class="img-fluid" alt="User Image">
											</div>
											
										</div>
										
									</div>
									
								</div>
							</div>
							<!-- /Doctor Widget -->
							
							<!-- Doctor Details Tab -->
							<div class="card">
								<div class="card-body pt-0">
								
									<!-- Tab Menu -->
										<h3 class="pt-4">Service Details</h3>
											<p class="paragraph">Please contact VK Medical Centre to confirm availability of this service at your preferred branch (<a href="contact.php?id=Anna%20Nagar">Anna Nagar</a> / <a href="contact.php?id=Arumbakkam">Arumbakkam</a>).</p>
										<hr>
									<!-- /Tab Menu -->
									
									<!-- Tab Content -->
									<div class="tab-content pt-3">
									
										<!-- Overview Content -->
										<div role="tabpanel" id="doc_overview" class="tab-pane fade show active">
											<div class="row">
												<div class="col-md-12">
												
													<?php echo $rsdatas->small; ?>
                                                    
                                                     <h6>Highlights</h6>
													  
                                                     <p><?php echo $rsdatas->description; ?></p>
												
												</div>
											</div>
										</div>
										<!-- /Overview Content -->
										
									</div>
								</div>
							</div>
							<!-- /Doctor Details Tab -->

						</div>

						<?php include("right.php"); ?>

					</div>

					

				</div>
			</div>		
			<!-- /Page Content -->
   
			<!-- Footer Section -->
			
            
            <?php include('footer.php'); ?>
			