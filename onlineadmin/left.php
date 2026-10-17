<br /><div id="sidebar"> <a href="#" class="visible-phone"><i class="icon icon-list"></i> MENU</a>


  <ul>


  


    


   <?php /*?> <li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'profile') {?> class="active"<?php }?>><a href="profile.php"><i class="icon icon-th"></i> <span>Profile Settings</span></a></li><?php */?>


    <?php



								/*$queryk ="select * from `admin`";


								$rsqueryk = mysqli_query(dbcon(),$queryk);


								@$rsdata_admin = mysqli_num_rows($rsqueryk);



	                            $query ="select * from `email`";


								$rsquery = mysqli_query(dbcon(),$query);


								@$rsdata_main = mysqli_num_rows($rsquery);


								


								$queryx ="select * from `email1`";


								$rsqueryx = mysqli_query(dbcon(),$queryx);


								@$rsdata_mainx = mysqli_num_rows($rsqueryx);


								


								$queryy ="select * from `email2`";


								$rsqueryy = mysqli_query(dbcon(),$queryy);


								@$rsdata_mainy = mysqli_num_rows($rsqueryy);



								
								$query1 ="select * from `gallery`";


								$rsquery1 = mysqli_query(dbcon(),$query1);


								@$rsdata_gallery = mysqli_num_rows($rsquery1);




								$query2 ="select * from `slide`";


								$rsquery2 = mysqli_query(dbcon(),$query2);


								@$rsdata_slide = mysqli_num_rows($rsquery2);




								$query3 ="select * from `testimonials`";


								$rsquery3 = mysqli_query(dbcon(),$query3);


								@$rsdata_testimonials = mysqli_num_rows($rsquery3);


								


								$query3b ="select * from `brand`";


								$rsquery3b = mysqli_query(dbcon(),$query3b);


								@$rsdata_brandx = mysqli_num_rows($rsquery3b);


	


	                            $query3s ="select * from `size`";


								$rsquery3s = mysqli_query(dbcon(),$query3s);


								@$rsdata_sizex = mysqli_num_rows($rsquery3s);


								


								$query3sc ="select * from `color`";


								$rsquery3sc = mysqli_query(dbcon(),$query3sc);


								@$rsdata_colorx = mysqli_num_rows($rsquery3sc);


								


								$query3sc ="select * from `rate`";


								$rsquery3sc = mysqli_query(dbcon(),$query3sc);


								@$rsdata_ratex = mysqli_num_rows($rsquery3sc);


								


								$query3sc ="select * from `cat`";


								$rsquery3sc = mysqli_query(dbcon(),$query3sc);


								@$rsdata_catx = mysqli_num_rows($rsquery3sc);


								


								$query3sc ="select * from `coupon`";


								$rsquery3sc = mysqli_query(dbcon(),$query3sc);


								@$rsdata_stylex = mysqli_num_rows($rsquery3sc);


								


								$query3sc1 ="select * from `customer_info`";


								$rsquery3sc1 = mysqli_query(dbcon(),$query3sc1);


								@$customern = mysqli_num_rows($rsquery3sc1);


								


								$query3sc1o ="select * from `orders` group by `session`";


								$rsquery3sc1o = mysqli_query(dbcon(),$query3sc1o);


								@$ordersn = mysqli_num_rows($rsquery3sc1o);


								


								$query3sc1os ="select * from `scheme`";


								$rsquery3sc1os = mysqli_query(dbcon(),$query3sc1os);


								@$ordersns = mysqli_num_rows($rsquery3sc1os);


								


								$numgroupq ="select * from `group`";


								$numgroupmq = mysqli_query(dbcon(),$numgroupq);


								@$numgroup = mysqli_num_rows($numgroupmq);*/

	?>


	


	   <li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'admin') {?> class="active"<?php }?>><a href="admin.php"><i class="icon icon-inbox"></i> <span>Admin List</span></a>  </li>

	   <li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'cat') {?> class="active"<?php }?>><a href="category.php"><i class="icon icon-inbox"></i> <span>Category List</span></a>  </li>

	   <li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'sub_sub_menu') {?> class="active"<?php }?>><a href="sub_sub_menu.php"><i class="icon icon-inbox"></i> <span>Services List</span></a> </li>
       
        <li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'plan') {?> class="active"<?php }?>><a href="plan.php"><i class="icon icon-inbox"></i> <span>Book a Test</span></a> </li>   
	        
       <li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'testimonials') {?> class="active"<?php }?>><a href="testimonials.php"><i class="icon icon-inbox"></i> <span>Blogs</span></a> </li> 
       
       
       <li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'contact') {?> class="active"<?php }?>><a href="contact.php"><i class="icon icon-inbox"></i> <span>Contact Info</span></a> </li>      

	   <?php /*?><li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'slide') {?> class="active"<?php }?>><a href="slide.php"><i class="icon icon-inbox"></i> <span>Home Banner</span></a> </li><?php */?>

       <li <?php if (basename($_SERVER['PHP_SELF'],'.php') == 'profile') {?> class="active"<?php }?>><a href="profile.php"><i class="icon icon-inbox"></i> <span>Settings</span></a> </li>

       <li><a href="logout.php"><i class="icon icon-inbox"></i> <span>Logout</span></a></li>

  </ul>

</div>