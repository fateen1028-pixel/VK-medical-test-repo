<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();









if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }







?>



<!DOCTYPE html>

<html lang="en">

<head>

<title><?php include('title.php'); ?></title>

<meta charset="UTF-8" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<link rel="stylesheet" href="css/bootstrap.min.css" />

<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />

<link rel="stylesheet" href="css/uniform.css" />

<link rel="stylesheet" href="css/select2.css" />

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

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Excel Export</a> </div>

    <h1>Product Excel Export</h1>


  </div>

  





 

       <div class="container-fluid"><hr>







    <div class="row-fluid">







      <div class="span12">







        <div class="widget-box">







          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>







            <h5>Create New</h5>



	<?php
					
mysqli_query(dbcon(),"ALTER TABLE `email7` ADD `category` VARCHAR( 222 ) NOT NULL AFTER `id` ,
ADD `main_menu` VARCHAR( 222 ) NOT NULL AFTER `category` ,
ADD `sub_menu` VARCHAR( 222 ) NOT NULL AFTER `main_menu` ,
ADD `product_name` VARCHAR( 222 ) NOT NULL AFTER `sub_menu` ,
ADD `original_price` VARCHAR( 222 ) NOT NULL AFTER `product_name` ,
ADD `offer_price` VARCHAR( 222 ) NOT NULL AFTER `original_price` ,
ADD `small_description` LONGTEXT NOT NULL AFTER `offer_price` ,
ADD `large_description` LONGTEXT NOT NULL AFTER `small_description` ,
ADD `top_10` VARCHAR( 222 ) NOT NULL AFTER `large_description`");


					if(@$_REQUEST['act']=="export") {
					
					
					$catx = $_REQUEST['cat'];
					
					
					if($catx!="Mobile") { header('location:excel_other.php?cat='.$catx); exit; }
					
					
					
					$queryv ="select * from `email2` where `cat`='$catx'";
								$rsqueryv = mysqli_query(dbcon(),$queryv);
								while(@$rsdatav = mysqli_fetch_object($rsqueryv))
								{
								
								$pid = $rsdatav->id;
								
								
								$cat2 = $rsdatav->cat2;
								$cat = $rsdatav->cat;
								$name = $rsdatav->name;
								$email = $rsdatav->email;
								$rate = $rsdatav->rate;
								$meta_name = $rsdatav->meta_name;
								$description = $rsdatav->description;
								$small = $rsdatav->small;
								$style = $rsdatav->style;
								
								
									$register_query="update `email7` set `category`='$cat2',`main_menu`='$cat',`sub_menu`='$name',`product_name`='$email',`original_price`='$rate',`offer_price`='$meta_name',`small_description`='$description',`large_description`='$small',`top_10`='$style'  where `pid`='$pid'";



		mysqli_query(dbcon(),$register_query);
								
								
								
								}
								
								//exit;
				
					
					header('location:excel_colleges.php?cat='.$catx); exit;
					
				
					
					}

					?>



          </div>
<script language="javascript">

function sumb()
{
document.wizard.method="post";
document.wizard.action="";
document.wizard.submit();
}

</script>


        <div class="widget-content nopadding">



            <form  name="wizard" class="form-horizontal" method="post" action="export.php?act=export" enctype="multipart/form-data">
            
            
            <input type="hidden" name="cat2" value="Products" >



              <div id="form-wizard-1" class="step">

		
            
            
            
            
            
			

			   <div class="control-group">

                  <label class="control-label">Main Category</label>

                  <div class="controls">

                    <select name="cat" style="width:200px;" required>

                  <option value="">Select Main Category</option>

                  <?php

				  $aplcr ="select * from `email`";

				  $apllcr = mysqli_query(dbcon(),$aplcr);


				  while($aplllm = mysqli_fetch_object($apllcr))


				  {


				  ?><option value="<?php echo $aplllm->email; ?>" <?php if(@$aplllm->email==$_REQUEST['cat']) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>

                  <?php } ?>


                  </select>
                  


                  </div>

                </div>

                
                
                
                
                
                
                <div class="control-group">


                  <div class="controls">

                                <input type="submit" name="save" value="Export" class="btn btn-primary submit-btn">

                            </div>

                </div>

 </div>
 </form>
       


        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        
</div>
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

<script src="js/jquery.uniform.js"></script> 

<script src="js/select2.min.js"></script> 

<script src="js/jquery.dataTables.min.js"></script> 

<script src="js/matrix.js"></script> 

<script src="js/matrix.tables.js"></script>







</body>

</html>

