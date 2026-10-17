<?php  ob_start();

session_start();

require("connection.php");

if(@$_SESSION['admin']=="") {  }


/*mysqli_query(dbcon(),"ALTER TABLE  `email2` ADD  `side` VARCHAR( 222 ) NOT NULL");


mysqli_query(dbcon(),"ALTER TABLE  `email2` ADD  `external_link` VARCHAR( 222 ) NOT NULL");*/

if(@$_REQUEST['action']=="del")

			{

			$sql    = "DELETE FROM `email2` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);

			header("Location:sub_sub_menu.php");

            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>
<?php include('title.php'); ?>
</title>
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
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
<!--Header-part-->
<!--close-Header-part-->
<!--top-Header-menu-->
<?php include('top.php'); ?>
<!--start-top-serch-->
<!--close-top-serch-->
<!--sidebar-menu-->
<?php include('left.php'); ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Product</a> </div>
    <h1>Product List</h1>
    <p style="text-align:right;"><a href="sub_menu.php">
      <button type="button" class="btn btn-success">Add Product</button>
      </a></p>
  </div>

		
		
		
		<?php 
		
		mysqli_query(dbcon(),"CREATE TABLE `stock` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`pid` VARCHAR( 222 ) NOT NULL ,
`pname` LONGTEXT NOT NULL ,
`date` VARCHAR( 222 ) NOT NULL ,
`qty` VARCHAR( 222 ) NOT NULL ,
`denomination` VARCHAR( 222 ) NOT NULL
)");


		 if(@$_REQUEST['action']=='up') {




$description = str_replace("'","`",$_REQUEST['description']);

$small = str_replace("'","`",$_REQUEST['small']);	 

	$register_query="insert into `stock` set `pid`='$_REQUEST[pid]',`pname`='$_REQUEST[pname]',`date`='$_REQUEST[date]',`qty`='$_REQUEST[qty]',`denomination`='C'";

		mysqli_query(dbcon(),$register_query); 

	 	header('location:stock.php?act=added');

	} 

	?>
        
		
		<?php	


				$Sql ="select * from `email2` where `id`='$_REQUEST[pid]'";

				$rs=mysqli_query(dbcon(),$Sql);

				$rsdata1 =mysqli_fetch_object($rs);

				?>
                
                
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                  <h5>Edit</h5>
                </div>
                <div class="widget-content nopadding">
                  <form  name="thisForm" class="form-horizontal" method="post" action="add_stock.php?action=up" enctype="multipart/form-data">
                    <input type="hidden" name="pid" value="<?php echo $_REQUEST['pid']; ?>">
                    <div id="form-wizard-1" class="step">
                      <div class="control-group">
                        <label class="control-label">Category</label>
                        <div class="controls">
                          <select name="cat2" style="width:200px;" required readonly>
                            <option value="">Select Category</option>
                            <?php

							  $aplcr ="select * from `cat`";
			
							  $apllcr = mysqli_query(dbcon(),$aplcr);
			
							  while($aplllm = mysqli_fetch_object($apllcr))
			
							  {
			
							  ?>
                            <option value="<?php echo $aplllm->email; ?>" <?php if($rsdata1->cat2==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      
                      <div class="control-group">
                        <label class="control-label">Main Menu</label>
                        <div class="controls">
                          <select name="cat" style="width:200px;" readonly>
                            <option value="">Select Main Menu</option>
                            <?php

							  $aplcr ="select * from `email`";
			
							  $apllcr = mysqli_query(dbcon(),$aplcr);
			
							  while($aplllm = mysqli_fetch_object($apllcr))
			
							  {
			
							  ?>
                            <option value="<?php echo $aplllm->email; ?>" <?php if($rsdata1->cat==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      
                      
                      <div class="control-group">
                        <label class="control-label">Sub Menu</label>
                        <div class="controls">
                          <select name="name" style="width:200px;" readonly>
                            <option value="">Select Sub Menu</option>
                            <?php
							  $aplcr ="select * from `email1`";
			
							  $apllcr = mysqli_query(dbcon(),$aplcr);
			
							  while($aplllm = mysqli_fetch_object($apllcr))
			
							  {
			
							  ?>
                            <option value="<?php echo $aplllm->email; ?>" <?php if($rsdata1->name==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      
                      <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                          <input id="pname" type="text"  style="width:250px;" name="pname" value="<?php echo $rsdata1->name; ?>" readonly />
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Date</label>
                        <div class="controls">
                          <input type="text"  style="width:100px;" name="date" value="<?php echo date('Y-m-d'); ?>" readonly />
                           </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Qty</label>
                        <div class="controls">
                          <input type="number"  style="width:100px;" name="qty" value="" />
                           </div>
                      </div>
                      
                     
                      
                      
                      
                    </div>
                    <div class="form-actions">
                      <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                      <a href="stock.php">
                      <input id="back" class="btn btn-primary" type="button" value="Back" />
                      </a>
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
<script src="js/wysihtml5-0.3.0.js"></script>
<script src="js/jquery.peity.min.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>
<script>







	$('.textarea_editor').wysihtml5();







</script>
<script>







	$('.textarea_editor1').wysihtml5();







</script>
</body>
</html>
