<footer class="footer inner-footer footer-info">
				<div class="footer-top">
					<div class="container">
						<div class="row">
                        	<div class="col-xl-3">
								<div class="footer-widget">
									<h3 class="footer-title">VK Medical Centre</h3>
									<p class="mb-2 text-dark" align="justify" style="margin-right:20px;">Established in 1990, V K Medical Centre offers high-quality diagnostic services in Chennai, delivering trusted lab tests with decades of experience and advanced facilities.</p>
									
									<?php /*?><div class="social-icon">
										<h3 class="mb-3 footer-title">Connect With Us</h3>
										<ul>
											<li>
                                                <a href="https://www.facebook.com/profile.php?id=61574931488016" class="social-icon" aria-label="facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.youtube.com/@vkmedicalcentre" class="social-icon" aria-label="youtube" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/vkmedicalcentre/" class="social-icon" aria-label="instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                            </li>
										</ul>
									</div><?php */?>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="row">
									<?php /*?><div class="col-lg-2">
										<div class="footer-widget footer-menu">
											<h3 class="footer-title">Menu</h3>
											<ul>
												<li style="margin-bottom:5px;"><a href="index.php">Home</a></li>
												<li style="margin-bottom:5px;"><a href="about.php">About Us</a></li>
                                                <li style="margin-bottom:5px;"><a href="#">Services</a></li>
												<li style="margin-bottom:5px;"><a href="book-a-test.php">Book A Test</a></li>
												<li style="margin-bottom:5px;"><a href="blogs.php">Blogs</a></li>
												<li style="margin-bottom:5px;"><a href="#">Contact Us</a></li>
											</ul>
										</div>
									</div><?php */?>
                                    <?php
											$iCnt = "0"; 
											$query ="select * from `contact` order by id asc";
											$rsquery = mysqli_query(dbcon(),$query);
											while(@$rsdata = mysqli_fetch_object($rsquery))
											{ 
											  $iCnt++;
											?>
                                    <div class="col-lg-6">
										<div class="footer-widget footer-menu">
											<h3 class="footer-title"><?php echo $rsdata->name; ?></h3>
											<ul>
												<li><a href="#"><i class="isax isax-location5"></i> <?php echo $rsdata->description; ?></a></li>
                                                <li><a href="#"><i class="isax isax-call5"></i> <?php echo $rsdata->phone; ?></a></li>
											</ul>
										</div>
									</div>
                                    <?php } ?>
									<?php /*?><div class="col-lg-3 col-md-4 col-sm-6">
										<div class="footer-widget footer-menu">
											<h3 class="footer-title">Our Services</h3>
											<ul>
												<?php
												$iCnts = "0"; 
												$querys ="select * from `email2` limit 0,7";
												$rsquerys = mysqli_query(dbcon(),$querys);
												while(@$rsdatas = mysqli_fetch_object($rsquerys))
												{ 
												  $iCnts++;
												?>
                                                <li><a href="service-details.php?id=<?php echo $rsdatas->cat; ?>"><?php echo $rsdatas->cat; ?></a></li>
												<?php } ?>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6">
										<div class="footer-widget footer-menu">
											<!--<h3 class="footer-title">Specialities</h3>-->
											<ul>
												<?php
												$iCnts1 = "0"; 
												$querys1 ="select * from `email2` limit 8,7";
												$rsquerys1 = mysqli_query(dbcon(),$querys1);
												while(@$rsdatas1 = mysqli_fetch_object($rsquerys1))
												{ 
												  $iCnts++;
												?>
                                                <li><a href="service-details.php?id=<?php echo $rsdatas1->cat; ?>"><?php echo $rsdatas1->cat; ?></a></li>
												<?php } ?>
											</ul>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-sm-6">
										<div class="footer-widget footer-menu">
											<!--<h3 class="footer-title">Specialities</h3>-->
											<ul>
												<?php
												$iCnts3 = "0"; 
												$querys3 ="select * from `email2` limit 15,7";
												$rsquerys3 = mysqli_query(dbcon(),$querys3);
												while(@$rsdatas3 = mysqli_fetch_object($rsquerys3))
												{ 
												  $iCnts++;
												?>
                                                <li><a href="service-details.php?id=<?php echo $rsdatas3->cat; ?>"><?php echo $rsdatas3->cat; ?></a></li>
												<?php } ?>
											</ul>
										</div>
									</div><?php */?>
								</div>
							</div>
                            <div class="col-xl-3">
								<div class="footer-widget">
									<h3 class="footer-title">Contact Info</h3>
									<p><i class="isax isax-message-text5 me-1"></i>vkmedicalcentre@gmail.com</p>
									<p><i class="isax isax-call5 me-1"></i>+91 7299991586</p>
									
									<div class="social-icon">
										<h3 class="mb-3 footer-title">Connect With Us</h3>
										<ul>
											<li>
                                                <a href="https://www.facebook.com/profile.php?id=61574931488016" class="social-icon" aria-label="facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.youtube.com/@vkmedicalcentre" class="social-icon" aria-label="youtube" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/vkmedicalcentre/" class="social-icon" aria-label="instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                            </li>
										</ul>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="footer-bottom">
					<div class="container">
						<!-- Copyright -->
						<div class="copyright">
							<div class="copyright-text mb-0">
								<p class="mb-0">Copyright &copy; 2026 VK Medical Center. Developed By <a href="https://www.webindiainfotech.in/" target="_blank">WebIndia Infotech</a> </p>
							</div>
							<!-- Copyright Menu -->
							<div class="copyright-menu">
								<ul class="policy-menu mb-0">
									<li><a href="legal_notice.php">Legal Notice</a></li>
                                    <li><a href="terms_and_conditions.php">Terms</a></li>
									<li><a href="privacy_policy.php">Privacy Policy</a></li>
									<li><a href="refund_policy.php">Refund Policy</a></li>
								</ul>
							</div>
							
						</div>
						<!-- /Copyright -->					
					</div>
				</div>
			</footer>
			<!-- /Footer Section -->

			<!-- Cursor -->
			<div class="mouse-cursor cursor-outer"></div>
			<div class="mouse-cursor cursor-inner"></div>
			<!-- /Cursor -->
		
		</div>		
		<!-- /Main Wrapper -->

		<!-- start offcanvas -->
		<div class="offcanvas offcanvas-offset offcanvas-end support_popup" tabindex="-1"  id="support_item">
			<div class="offcanvas-header">
				<a href="index.php"><img src="logo.png" alt="logo" class="img-fluid logo" style="width:300px;"></a>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"><i class="isax isax-close-circle"></i></button>
			</div>
			
			<div class="offcanvas-body">

				<!-- Item 1 -->
				<div class="about-popup-item">
					<h3 class="title">About VK Medical Centre</h3>
					<p>Established in 1990, V K Medical Centre offers high-quality diagnostic services in Chennai, delivering trusted lab tests with decades of experience and advanced facilities.</p>
				</div>
				<!-- Item 2 -->
				<div class="about-popup-item">
					<h3 class="title">Our Locations</h3>
					
                    						<?php
											$iCnt = "0"; 
											$query ="select * from `contact` order by id asc";
											$rsquery = mysqli_query(dbcon(),$query);
											while(@$rsdata = mysqli_fetch_object($rsquery))
											{ 
											  $iCnt++;
											?>
                    <div class="loction-item mb-3">
						<h4 class="title"><?php echo $rsdata->name; ?></h4>
						<p class="location"><?php echo $rsdata->description; ?></p>
					</div>
                    
                    <?php } ?>
					
				</div>

				<!-- Item 3 -->
				<div class="about-popup-item">
					<h3 class="title">Contact Information</h3>
					<div class="support-item mb-3">
						<div class="avatar avatar-lg bg-primary rounded-circle">
							<i class="isax isax-messages-3"></i>
						</div>
						<div>
							<p class="title">General Inquiries</p>
							<h5 class="link"><a href="#">vkmedicalcentre@gmail.com</a></h5>
						</div>
					</div>
					<div class="support-item">
						<div class="avatar avatar-lg bg-primary rounded-circle">
							<i class="isax isax-call-calling"></i>
						</div>
						<div>
							<p class="title">Emergency Cases</p>
							<h5 class="link"><a href="#">+91 7299991586</a></h5>
						</div>
					</div>
				</div>

				<!-- Item 3 -->
				<div class="about-popup-item border-0">
					<h3 class="title">Follow Us</h3>
					<ul class="d-flex align-items-center gap-2 social-iyem">
						<li>
							<a href="https://www.facebook.com/profile.php?id=61574931488016" class="social-icon" aria-label="facebook" target="_blank"><i class="fa-brands fa-facebook"></i></a>
						</li>
						<li>
							<a href="https://www.youtube.com/@vkmedicalcentre" class="social-icon" aria-label="youtube" target="_blank"><i class="fa-brands fa-youtube"></i></a>
						</li>
						<li>
							<a href="https://www.instagram.com/vkmedicalcentre/" class="social-icon" aria-label="instagram" target="_blank"><i class="fa-brands fa-instagram"></i></a>
						</li>
					</ul>
				</div>
			</div>
			<img src="assets/img/bg/offcanvas-bg.png" alt="element" class="element-01">
		</div>
		<!-- end offcanvas -->
	

		<!-- ScrollToTop -->
		<div class="progress-wrap active-progress" aria-label="Scroll to top">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
				<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
					style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919px, 307.919px; stroke-dashoffset: 228.265px;">
				</path>
			</svg>
		</div>
		<!-- /ScrollToTop -->

		<!-- jQuery -->
		<script src="assets/js/jquery-3.7.1.min.js" type="9e85b770e011447b909125e9-text/javascript"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="assets/js/bootstrap.bundle.min.js" type="9e85b770e011447b909125e9-text/javascript"></script>
		
		<!-- Feather Icon JS -->
		<script src="assets/js/feather.min.js" type="9e85b770e011447b909125e9-text/javascript"></script>
	
		<!-- BacktoTop JS -->
		<script src="assets/js/backToTop.js" type="9e85b770e011447b909125e9-text/javascript"></script>

		<!-- select JS -->
		<script src="assets/plugins/select2/js/select2.min.js" type="9e85b770e011447b909125e9-text/javascript"></script>

		<!-- Slick Slider -->
		<script src="assets/plugins/slick/slick.min.js" type="9e85b770e011447b909125e9-text/javascript"></script>
		
		<!-- Fancybox JS -->
		<script src="assets/plugins/fancybox/jquery.fancybox.min.js" type="9e85b770e011447b909125e9-text/javascript"></script>

		<!-- Counter JS -->
		<script src="assets/js/counter.js" type="9e85b770e011447b909125e9-text/javascript"></script>

		<!-- Wow JS -->
		<script src="assets/plugins/wow/js/wow.min.js" type="9e85b770e011447b909125e9-text/javascript"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.min.js" type="9e85b770e011447b909125e9-text/javascript"></script>
	
	<script src="cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="9e85b770e011447b909125e9-|49" defer></script></body>

</html>
















<?php /*?><link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"><?php */?>

<a href="https://wa.me/917299991586" target="_blank" class="floating1 whatsapp">
    <i class="fab fa-whatsapp"></i>
</a>

<a href="tel:+917299991586" class="floating1 call">
    <i class="fas fa-phone"></i>
</a>

<style>
.floating1{
    position:fixed;
    right:20px;
    width:55px;
    height:55px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:28px;
    text-decoration:none;
    z-index:9999;
    box-shadow:0 4px 10px rgba(0,0,0,.3);
}
.whatsapp{
    bottom:190px;
    background:#25D366;
}
.call{
    bottom:120px;
    background:#007BFF;
}
</style>