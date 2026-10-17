<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();

mysqli_query(dbcon(),"CREATE TABLE `offer_use` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`code` VARCHAR( 222 ) NOT NULL ,
`amount` VARCHAR( 222 ) NOT NULL ,
`user` VARCHAR( 222 ) NOT NULL ,
`use` VARCHAR( 222 ) NOT NULL ,
`date` DATE NOT NULL
)");


mysqli_query(dbcon(),"ALTER TABLE  `offer_use` ADD  `order` VARCHAR( 222 ) NOT NULL");


if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }






if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `offer_use` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);


			header("Location:offer_use.php");

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Coupon Usage</a> </div>
    <h1>Coupon Usage</h1>
    
  </div>
  


 
      
      <?php if(@$_REQUEST['action']=="") { ?>   
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Coupon Usage List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>User</th>
					<th>Use</th>
					<th>Date</th>
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
								$query ="select * from `offer_use` order by id desc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								
					
								?>
                                    <tr>
                                        <td align="center"><?php echo $iCnt; ?></td>
                                        <td align="center"><?php echo $rsdata->code; ?></td>
										<td align="center"><?php echo $rsdata->amount; ?></td>
										<td align="center"><?php echo $rsdata->user; ?></td>
										<td align="center"><?php echo $rsdata->use; ?></td>
										<td align="center"><?php echo $rsdata->date; ?></td>
                                        
                                        
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
	   
  
	     

		 $register_query="insert into `offer_use` (`name`) values('$_REQUEST[name]')";

		mysqli_query(dbcon(),$register_query);

		echo mysqli_error();

	 	header('location:offer_use.php');

	} 

	
   
   ?>
          
        
        <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="offer_use.php?action=add&Save=1">
              <div id="form-wizard-1" class="step">
			  
			  
			  
			  
			  
			  
                
                
                <div class="control-group">
                  <label class="control-label">Size Name</label>
                  <div class="controls">
                    <input type="text"  style="width:250px;" name="name" />
                  </div>
                </div>
				
				
			
                
              </div>
            
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="offer_use.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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
   
         



	$register_query="update `offer_use` set `name`='$_REQUEST[name]'  where `id`='$_REQUEST[id]'";

		mysqli_query(dbcon(),$register_query); 

	 	header('location:offer_use.php');

	} 


				$Sql ="select * from `offer_use` where id=$_REQUEST[id]";

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
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="offer_use.php?action=edit&Save=1" >
            
            <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
              <div id="form-wizard-1" class="step">
                
				
				
			  
                
                <div class="control-group">
                  <label class="control-label">Size Name</label>
                  <div class="controls">
                    <input id="email" type="text"  style="width:250px;" name="name" value="<?php echo $rsdata1->name; ?>" />
                  </div>
                </div>
				
				
				
				
				
				
         
                
              </div>
           
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="offer_use.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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
