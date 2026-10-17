<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();



?>

<!DOCTYPE html>

<html lang="en">

    

<head>

        <title><?php include('title.php'); ?></title><meta charset="UTF-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="css/bootstrap.min.css" />

		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />

        <link rel="stylesheet" href="css/matrix-login.css" />

        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>



    </head>

	<style type="text/css">

.bodystyle

{

font:Arial, Helvetica, sans-serif;

font-size:9px;

}

</style>

    <body class="bodystyle">

        <div id="loginbox" style="background-color:#FFFFFF;"> 

                                      

            <form id="loginform" name="thisForm" class="form-vertical" action="login.php" onSubmit="return validate();" style="background-color:#FFFFFF;">

				 <div class="control-group normal_text" style="background-color:#fff;"><img src="../logo.webp" style="width:400px;"><h4 style="color:#000000;">Administration</h4></div>

                 <?php if(@$_REQUEST['err']=="1") { ?><p style="text-align:center;"><font color="#FF0000"><b>Invalid Username / Password or Account Suspended</b></font></p><?php } ?>

                <div class="control-group">

                    <div class="controls">

                        <div class="main_input_box">

                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="txtusername" placeholder="Username" required />

                        </div>

                    </div>

                </div>

                <div class="control-group">

                    <div class="controls">

                        <div class="main_input_box">

                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="txtpassword" placeholder="Password" required/>

                        </div>

                    </div>

                </div>

                <div class="form-actions" align="center">

                    <input type="submit" name="submit" value="Login" class="btn btn-success" style="background:#27A9E3;">

                </div>

            </form>

            <form id="recoverform" action="#" class="form-vertical">

				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>

				

                    <div class="controls">

                        <div class="main_input_box">

                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />

                        </div>

                    </div>

               

                <div class="form-actions">

                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>

                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>

                </div>

            </form>

        </div>

        

        <script src="js/jquery.min.js"></script>  

        <script src="js/matrix.login.js"></script> 

    </body>



</html>

