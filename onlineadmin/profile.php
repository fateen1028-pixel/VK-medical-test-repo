<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();



?>

<!DOCTYPE html>

<html lang="en">

<head>

<title><?php include('title.php'); ?></title>

<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="css/bootstrap.min.css" />

<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />

<link rel="stylesheet" href="css/matrix-style.css" />

<link rel="stylesheet" href="css/matrix-media.css" />

<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>

<body>



<!--Header-part-->



<!--close-Header-part--> 



<!--top-Header-menu-->



<?php include('top.php'); ?>



<!--start-top-serch-->

<!--<div id="search">

  <input type="text" placeholder="Search here..."/>

  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>

</div>--> 

<!--close-top-serch--> 



<!--sidebar-menu-->



<?php include('left.php'); ?>



<div id="content">

  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Password Change</a></div>

    <h1>Password</h1>

  </div>

  <div class="container-fluid"><hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>

            <h5>Username &amp; Password</h5>

          </div>

          <?php

 $select_qry=mysqli_query(dbcon(),"select * from admin where id='".$_SESSION['admin']."'");

  	

  $fetch_ary=mysqli_fetch_array($select_qry);

  

  $user=$fetch_ary['username'];

   $pass=$fetch_ary['password'];

   $email=$fetch_ary['email'];
   
   $user_limit=$fetch_ary['user_limit'];

   

   

   if(@$_REQUEST['Update']) {

	   

	mysqli_query(dbcon(),"update `admin` set `password`='$_REQUEST[password]' where `id`='".$_SESSION['admin']."'");   

	   

	header('location:profile.php?act=success');   

   }

   

   

   

   

   ?>

          <div class="widget-content nopadding">

            <form id="form-wizard" class="form-horizontal" method="post">

            <?php if(@$_REQUEST['act']=="success") { ?><p style="text-align:center;"><font color="#F00A0E">Form Updated Successfully</font></p><?php } ?>

              <div id="form-wizard-1" class="step">

                <div class="control-group">

                  <label class="control-label">Username</label>

                  <div class="controls">

                    <input id="username" type="text" name="username"  value="<?php echo @$user; ?>" readonly/>

                  </div>

                </div>

                <div class="control-group">

                  <label class="control-label">Password</label>

                  <div class="controls">

                    <input id="password" type="password" name="password"  value="<?php echo $pass; ?>"/>

                  </div>

                </div>

                <div class="control-group">

                  <label class="control-label">Confirm Password</label>

                  <div class="controls">

                    <input id="password2" type="password" name="password2" />

                  </div>

                </div>
                
                
                
                <?php /*?><div class="control-group">

                  <label class="control-label">GST %</label>

                  <div class="controls">

                    <input id="gst" type="number" name="user_limit"  value="<?php echo $user_limit; ?>"/>

                  </div>

                </div><?php */?>
                

              </div>

             <!-- <div id="form-wizard-2" class="step">

                <div class="control-group">

                  <label class="control-label">Email</label>

                  <div class="controls">

                    <input id="email" type="text" name="email" />

                  </div>

                </div>

                <div class="control-group">

                  <label class="control-label">EULA</label>

                  <div class="controls">

                    <input id="eula" type="checkbox" name="eula" />

                  </div>

                </div>

              </div>-->

              <div class="form-actions">

                <!--<input id="back" class="btn btn-primary" type="reset" value="Back" />-->

                <input id="next" class="btn btn-primary" type="submit" name="Update" value="Update" />

                <div id="status"></div>

              </div>

              <div id="submitted"></div>

            </form>

          </div>

        </div>

      </div>

    </div>

  </div>

</div>

<!--Footer-part-->

<?php include('footer.php'); ?>

<!--end-Footer-part-->

<script src="js/jquery.min.js"></script> 

<script src="js/jquery.ui.custom.js"></script> 

<script src="js/bootstrap.min.js"></script> 

<script src="js/jquery.validate.js"></script> 

<script src="js/jquery.wizard.js"></script> 

<script src="js/matrix.js"></script> 

<script src="js/matrix.wizard.js"></script>

</body>

</html>

