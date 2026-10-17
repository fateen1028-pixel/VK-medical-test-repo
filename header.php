<?php  ob_start();
session_start(); 
require("onlineadmin/connection.php");
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

<?php /*?><div class="header-theme header-theme-two">
				<button type="button" id="dark-mode-toggle" class="theme-toggle moon" aria-label="dark mode">
					<i class="isax isax-moon5"></i>
				</button>
				<button type="button" id="light-mode-toggle" class="theme-toggle sun" aria-label="light mode">
					<i class="isax isax-sun-15"></i>
				</button>
			</div><?php */?>

			<div class="header-topbar">
				<div class="container">
					<div class="topbar-info">
						<div class="header-info">
							<p><i class="isax isax-message-text5 me-1"></i>vkmedicalcentre@gmail.com</p>
							<p><b><i class="isax isax-call5 me-1"></i>+91 7299991586</b></p>
						</div>
						<ul>
							<?php /*?><li class="drop-header">
								<div class="dropdown dropdown-country">
									<a href="#" data-bs-toggle="dropdown" aria-expanded="false" role="button">
										<img src="assets/img/flags/us-flag.svg" alt="flag"> ENG
									</a>
									<ul class="dropdown-menu p-2 mt-2">
										<li>
											<a class="dropdown-item rounded d-flex align-items-center" href="#" role="button">
												<img src="assets/img/flags/us-flag.svg" class="me-2" alt="flag">ENG
											</a>
										</li>
										<li>
											<a class="dropdown-item rounded d-flex align-items-center" href="#" role="button">
												<img src="assets/img/flags/arab-flag.svg" class="me-2" alt="flag">ARA
											</a>
										</li>
										<li>
											<a class="dropdown-item rounded d-flex align-items-center" href="#" role="button">
												<img src="assets/img/flags/france-flag.svg" class="me-2" alt="flag">FRA
											</a>
										</li>
									</ul>
								</div>
							</li><?php */?>
							<li class="social-header">
								<div class="social-icon">
									<a href="https://www.facebook.com/profile.php?id=61574931488016" role="button" aria-label="facebook" rel="nofollow" target="_blank"><i class="fa-brands fa-facebook"></i></a>
									<a href="https://www.youtube.com/@vkmedicalcentre" role="button" aria-label="youtube" rel="nofollow" target="_blank"><i class="fa-brands fa-youtube"></i></a>
									<a href="https://www.instagram.com/vkmedicalcentre/" role="button" aria-label="instagram" rel="nofollow" target="_blank"><i class="fa-brands fa-instagram"></i></a>

								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<!-- Header -->
			<header class="header header-default">
				<div class="container">
					<nav class="navbar navbar-expand-lg header-nav">
						<div class="navbar-header">
							<a id="mobile_btn" href="#" role="button" aria-label="Open menu">
								<i class="fa-solid fa-bars"></i>
							</a>
							<a href="index.php" class=""> <!--navbar-brand logo-->
								<img src="logo.png" class="img-fluid" alt="Logo" style="width:300px;">
							</a>
						</div>
						<div class="header-menu">
							<div class="main-menu-wrapper">
								<div class="menu-header">
									<a href="index.php" class=""> <!--menu-logo-->
										<img src="logo.png" class="img-fluid" alt="Logo" style="width:300px;">
									</a>
									<a id="menu_close" class="menu-close" href="#" role="button" aria-label="Close menu">
										<i class="fas fa-times"></i>
									</a>
								</div>
								<ul class="main-nav">
									<li class=""><a href="index.php" class="main-menu">Home</a></li>
                                    <li class=""><a href="about.php" class="main-menu">About Us</a></li>
									<li class=""><a href="services.php" class="main-menu">Services</a></li>
                                    <li class=""><a href="book-test.php" class="main-menu">Book Test</a></li>
									<li class=""><a href="blogs.php" class="main-menu">Blog</a></li>
									<li class="has-submenu">
										<a href="#" role="button" class="main-menu">Contact Us<span><i class="fa-solid fa-chevron-down"></i></span></a>
										<ul class="submenu sub-menu-one sub-menu-default">
                                        	<?php
											$iCnt = "0"; 
											$query ="select * from `contact` order by id asc";
											$rsquery = mysqli_query(dbcon(),$query);
											while(@$rsdata = mysqli_fetch_object($rsquery))
											{ 
											  $iCnt++;
											?>
											<li><a href="contact.php?id=<?php echo $rsdata->name; ?>"><?php echo $rsdata->name; ?></a></li>
											<?php } ?>
										</ul>
									</li>
								</ul>
								<div class="header-items">
									<!-- Item 1 -->
									<div class="about-popup-item border-0 pb-0">
										<h3 class="title">Contact Information</h3>
										<div class="support-item mb-3">
											<div class="avatar avatar-lg bg-primary rounded-circle">
												<i class="isax isax-messages-3"></i>
											</div>
											<div>
												<p class="title">General Inquiries</p>
												<h5 class="link">vkmedicalcentre@gmail.com</h5>
											</div>
										</div>
										<div class="support-item">
											<div class="avatar avatar-lg bg-primary rounded-circle">
												<i class="isax isax-call-calling"></i>
											</div>
											<div>
												<p class="title">Emergency Cases</p>
												<h5 class="link">+91 7299991586</h5>
											</div>
										</div>
									</div>
									<!-- Item 2 -->
									<div class="about-popup-item border-0 pb-0">
										<h3 class="title">Follow Us</h3>
										<ul class="d-flex align-items-center gap-2 social-iyem">
											<li>
												<a href="https://www.facebook.com/people/V-K-Medical-Centre-Diagnostic-Centre/61574931488016/" role="button" class="social-icon" aria-label="facebook" rel="nofollow"><i class="fa-brands fa-facebook"></i></a>
											</li>
											<li>
												<a href="https://www.youtube.com/@vkmedicalcentre" role="button" class="social-icon" aria-label="twitter" rel="nofollow">
                                                
                                                <i class="fa-brands fa-youtube"></i></a>
											</li>
											<li>
												<a href="https://www.instagram.com/vkmedicalcentre/" role="button" class="social-icon" aria-label="instagram" rel="nofollow"><i class="fa-brands fa-instagram"></i></a>
											</li>
											<?php /*?><li>
												<a href="#" role="button" class="social-icon" aria-label="linkedin" rel="nofollow"><i class="fa-brands fa-linkedin"></i></a>
											</li><?php */?>
										</ul>
									</div>

									<?php /*?><div class="header-items-button">
										<a href="login.html" class="btn btn-primary btn-primary-gradient"><i class="isax isax-lock-1 me-2"></i>Sign In</a>
										<a href="register.html" class="btn btn-dark"><i class="isax isax-user-tick4 me-2"></i>Sign Up</a>
									</div><?php */?>
                                    
								</div>
							</div>
						</div>

						<ul class="nav header-navbar-rht">
							<?php /*?><li>
								<a href="login.html" class="btn btn-md btn-primary-gradient">
									<i class="isax isax-lock-1 me-2"></i><span>Sign Up</span> 
								</a>
							</li>
							<li>
								<a href="register.html" class="btn btn-md btn-dark">
									<i class="isax isax-user-tick me-2"></i><span>Register</span> 
								</a>
							</li><?php */?>
							<li>
								<a href="#" role="button" class="details-btn" data-bs-toggle="offcanvas" data-bs-target="#support_item" aria-label="about">
									<i class="isax isax-menu5"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</header>