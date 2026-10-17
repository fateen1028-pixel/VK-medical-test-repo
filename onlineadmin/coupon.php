<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();




if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }


mysqli_query(dbcon(),"ALTER TABLE  `coupon` ADD  `alert` LONGTEXT NOT NULL");



if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `coupon` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);


			header("Location:coupon.php");

            }

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Coupon</a> </div>
    <h1>Coupon</h1>
    <p style="text-align:right;"><a href="coupon.php?action=add"><button type="button" class="btn btn-success">Add New</button></a></p>
  </div>
  


 
      
      <?php if(@$_REQUEST['action']=="") { ?>   
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Coupon List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
                    <th>Code</th>
					<th>Amount</th>
					<th>Use</th>
                    <th>Edit</th>
                    <th>Remove</th>
                </tr>
              </thead>
              <tbody>
                <!--<tr class="gradeX">
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0</td>
                  <td>Win 95+</td>
                  <td class="center">4</td>
                </tr>-->
                
                <?php
								$iCnt = "0"; 
								$query ="select * from `coupon` order by id desc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								
					
								?>
                                    <tr>
                                        <td align="center"><?php echo $iCnt; ?></td>
                                        <td align="center"><?php echo $rsdata->code; ?></td>
										<td align="center"><?php echo $rsdata->amount; ?></td>
										<td align="center"> <?php if($rsdata->use=="1") { ?> New Registration <?php } ?>
					<?php if($rsdata->use=="2") { ?> 1000 - 2000 Crossing <?php } ?>
					<?php if($rsdata->use=="3") { ?> 2000 - 3000 Crossing <?php } ?>
					<?php if($rsdata->use=="4") { ?> 3000 - 4000 Crossing <?php } ?>
					<?php if($rsdata->use=="5") { ?> 4000 - 5000 Crossing <?php } ?>
					<?php if($rsdata->use=="6") { ?> 5000 - 10000 Crossing <?php } ?>
					<?php if($rsdata->use=="7") { ?> 10000 Above Crossing <?php } ?></td>
                                        <td class="center" ><a href="coupon.php?action=edit&id=<?php echo $rsdata->id; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>
                                        <td class="center"  ><a href="coupon.php?action=del&id=<?php echo $rsdata->id; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>
                                        
                                    </tr>
                                    <?php } ?>
               
              </tbody>
            </table>
          </div>
        </div>
        
        
        <?php } ?>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     <?php if(@$_REQUEST['action']=="add") { ?>     
        
        <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Create New</h5>
          </div>
       
<?php

  
   if(@$_REQUEST['Save']=='1') {
	   
  
	     

		 $register_query="insert into `coupon` (`code`,`amount`,`use`,`alert`) values('$_REQUEST[code]','$_REQUEST[amount]','$_REQUEST[use]','$_REQUEST[alert]')";

		mysqli_query(dbcon(),$register_query);

		echo mysqli_error();

	 	header('location:coupon.php');

	} 

	
   
   ?>
          
        
        <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="coupon.php?action=add&Save=1">
              <div id="form-wizard-1" class="step">
			  
			  
			  
			  
			  
			  
                
                
                <div class="control-group">
                  <label class="control-label">Coupon Code</label>
                  <div class="controls">
                    <input type="text"  style="width:250px;" name="code" value="<?php echo mt_rand(1000,9999); ?>" />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Coupon Amount</label>
                  <div class="controls">
                    <input type="text"  style="width:250px;" name="amount" />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Coupon Use</label>
                  <div class="controls">
                    <select name="use" style="width:300px;" >
					<option value="">-select use-</option>
					<option value="1">New Registration</option>
					<option value="2">1000 - 2000 Crossing</option>
					<option value="3">2000 - 3000 Crossing</option>
					<option value="4">3000 - 4000 Crossing</option>
					<option value="5">4000 - 5000 Crossing</option>
					<option value="6">5000 - 10000 Crossing</option>
					<option value="7">10000 Above Crossing</option>
					</select>
                  </div>
                </div>
				
				 <div class="control-group">
                  <label class="control-label">Alert Message</label>
                  <div class="controls">
                    <input type="text"  style="width:250px;" name="alert" value="" />
                  </div>
                </div>
				
				
			
                
              </div>
            
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="coupon.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
          
          
        </div>
        </div></div></div>
        
        
    <?php } ?>    
        
        
        
        <?php if(@$_REQUEST['action']=="edit") { 
   if(@$_REQUEST['Save']=='1') {
   
         



	$register_query="update `coupon` set `code`='$_REQUEST[code]',`amount`='$_REQUEST[amount]',`use`='$_REQUEST[use]',`alert`='$_REQUEST[alert]' where `id`='$_REQUEST[id]'";

		mysqli_query(dbcon(),$register_query); 

	 	header('location:coupon.php');

	} 


				$Sql ="select * from `coupon` where id=$_REQUEST[id]";

				$rs=mysqli_query(dbcon(),$Sql);

				echo @mysqli_error();

				$rsdata1 =mysqli_fetch_object($rs);

				?>
        
         <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Edit</h5>
          </div>
        
          <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="coupon.php?action=edit&Save=1" >
            
            <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
              <div id="form-wizard-1" class="step">
                
				
				
			  
                
                <div class="control-group">
                  <label class="control-label">Coupon Code</label>
                  <div class="controls">
                    <input id="code" type="text"  style="width:250px;" name="code" value="<?php echo $rsdata1->code; ?>" />
                  </div>
                </div>
				
				 <div class="control-group">
                  <label class="control-label">Coupon Amount</label>
                  <div class="controls">
                    <input id="amount" type="text"  style="width:250px;" name="amount" value="<?php echo $rsdata1->amount; ?>" />
                  </div>
                </div>
				
				
				
				<div class="control-group">
                  <label class="control-label">Coupon Use</label>
                  <div class="controls">
                    <select name="use" style="width:300px;" >
					<option value="">-select use-</option>
					<option value="1" <?php if($rsdata1->use=="1") { ?> selected <?php } ?>>New Registration</option>
					<option value="2" <?php if($rsdata1->use=="2") { ?> selected <?php } ?>>1000 - 2000 Crossing</option>
					<option value="3" <?php if($rsdata1->use=="3") { ?> selected <?php } ?>>2000 - 3000 Crossing</option>
					<option value="4" <?php if($rsdata1->use=="4") { ?> selected <?php } ?>>3000 - 4000 Crossing</option>
					<option value="5" <?php if($rsdata1->use=="5") { ?> selected <?php } ?>>4000 - 5000 Crossing</option>
					<option value="6" <?php if($rsdata1->use=="6") { ?> selected <?php } ?>>5000 - 10000 Crossing</option>
					<option value="7" <?php if($rsdata1->use=="7") { ?> selected <?php } ?>>10000 Above Crossing</option>
					</select>
                  </div>
                </div>
				
				 <div class="control-group">
                  <label class="control-label">Alert Message</label>
                  <div class="controls">
                    <input type="text"  style="width:250px;" name="alert" value="<?php echo $rsdata1->alert; ?>" />
                  </div>
                </div>
         
                
              </div>
           
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="coupon.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
          
          
        </div>
        </div></div></div>
        
        <?php } ?>
        
        
        
        
        
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
