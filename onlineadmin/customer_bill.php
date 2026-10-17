<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();




if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }



mysqli_query(dbcon(),"ALTER TABLE  `customer_info` ADD  `bill` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `customer_info` ADD  `date` DATE NOT NULL");


if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `customer_info` WHERE `cust_id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);


			header("Location:customer_bill.php");

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Customer</a> </div>
    <h1>Customer Bill</h1>
    <p style="text-align:right;"><a href="customer_bill.php?action=add"><button type="button" class="btn btn-success">Add New Customer</button></a></p>
  </div>
  


 
      
      <?php if(@$_REQUEST['action']=="") { ?>   
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Customer List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
					<th>Date</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Address</th>
                    <th>Edit</th>
                    <th>Remove</th>
					
					<th>Create</th>
					<th>Invoice</th>
					<th>Create</th>
					<th>Estimate</th>
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
								$query ="select * from `customer_info` where `bill`='1' order by cust_id desc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								
					
								?>
                                    <tr>
                                        <td align="center"><?php echo $iCnt; ?></td>
                                        <td align="center"><?php echo $rsdata->cust_name; ?></td>
										<td align="center"><?php echo $rsdata->date; ?></td>
										<td align="center"><?php echo $rsdata->cust_email; ?></td>
										<td align="center"><?php echo $rsdata->cust_mobile; ?></td>
										<td align="center"><?php echo $rsdata->cust_address; ?></td>
										
                                        <td class="center" ><a href="customer_bill.php?action=edit&id=<?php echo $rsdata->cust_id; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>
                                        <td class="center"  ><a href="customer_bill.php?action=del&id=<?php echo $rsdata->cust_id; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>
										
										
										
										
										
										<td class="center"  ><a href="billing_customer.php?action=add&id=<?php echo $rsdata->cust_id; ?>"><button type="button" class="btn btn-success">Invoice</button></a></td>
										
										<td class="center"  ><a href="billing_customer.php?id=<?php echo $rsdata->cust_id; ?>"><button type="button" class="btn btn-success">List</button></a></td>
										
										
										<td class="center"  ><a href="estimate_customer.php?action=add&id=<?php echo $rsdata->cust_id; ?>"><button type="button" class="btn btn-success">Estimate</button></a></td>
										
										<td class="center"  ><a href="estimate_customer.php?id=<?php echo $rsdata->cust_id; ?>"><button type="button" class="btn btn-success">List</button></a></td>
										
										
                                        
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
	   
  
	     

		 $register_query="insert into `customer_info` (`cust_name`,`cust_email`,`cust_mobile`,`cust_address`,`bill`,`date`) values('$_REQUEST[cust_name]','$_REQUEST[cust_email]','$_REQUEST[cust_mobile]','$_REQUEST[cust_address]','1','$_REQUEST[date]')";

		mysqli_query(dbcon(),$register_query);

		echo mysqli_error();

	 	header('location:customer_bill.php');

	} 

	
   
   ?>
          
        
        <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="customer_bill.php?action=add&Save=1">
              <div id="form-wizard-1" class="step">
			  
			  
			  
			  
			  
			  
                
                
                <div class="control-group">
                  <label class="control-label">Name</label>
                  <div class="controls">
                    <input id="cust_name" type="text"  style="width:250px;" name="cust_name" value="" required />
                  </div>
                </div>
				 <div class="control-group">
                  <label class="control-label">Date</label>
                  <div class="controls">
                    <input id="date" type="date"  style="width:200px;" name="date" value="<?php echo date('Y-m-d'); ?>" required  />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input id="cust_email" type="email"  style="width:250px;" name="cust_email" value=""  />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Mobile</label>
                  <div class="controls">
                    <input id="cust_mobile" type="text"  style="width:250px;" name="cust_mobile" value="" required />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Address</label>
                  <div class="controls">
                    <input id="cust_address" type="text"  style="width:250px;" name="cust_address" value="" required />
                  </div>
                </div>
				
				
			
                
              </div>
            
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="customer_bill.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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
   
         



	$register_query="update `customer_info` set `cust_name`='$_REQUEST[cust_name]',`cust_email`='$_REQUEST[cust_email]',`cust_mobile`='$_REQUEST[cust_mobile]',`cust_address`='$_REQUEST[cust_address]',`date`='$_REQUEST[date]'  where `cust_id`='$_REQUEST[id]'";

		mysqli_query(dbcon(),$register_query); 

	 	header('location:customer_bill.php');

	} 


				$Sql ="select * from `customer_info` where `cust_id`=$_REQUEST[id]";

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
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="customer_bill.php?action=edit&Save=1" >
            
            <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
              <div id="form-wizard-1" class="step">
                
				
				
			  
                
                <div class="control-group">
                  <label class="control-label">Name</label>
                  <div class="controls">
                    <input id="cust_name" type="text"  style="width:250px;" name="cust_name" value="<?php echo $rsdata1->cust_name; ?>" />
                  </div>
                </div>
				
				 <div class="control-group">
                  <label class="control-label">Date</label>
                  <div class="controls">
                    <input id="date" type="date"  style="width:200px;" name="date" value="<?php echo $rsdata1->date; ?>"  />
                  </div>
                </div>
				
				<div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input id="cust_email" type="email"  style="width:250px;" name="cust_email" value="<?php echo $rsdata1->cust_email; ?>" />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Mobile</label>
                  <div class="controls">
                    <input id="cust_mobile" type="text"  style="width:250px;" name="cust_mobile" value="<?php echo $rsdata1->cust_mobile; ?>" />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Address</label>
                  <div class="controls">
                    <input id="cust_address" type="text"  style="width:250px;" name="cust_address" value="<?php echo $rsdata1->cust_address; ?>" />
                  </div>
                </div>
				
				
				
				
				
				
         
                
              </div>
           
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="customer_bill.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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
