<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();




mysqli_query(dbcon(),"CREATE TABLE IF NOT EXISTS `orders_scheme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lead_id` varchar(222) NOT NULL,
  `customer_id` varchar(222) NOT NULL,
  `quote_id` varchar(222) NOT NULL,
  `from_email` varchar(222) NOT NULL,
  `price` varchar(222) NOT NULL,
  `date_sent` date NOT NULL,
  `quantity` varchar(222) NOT NULL,
  `bill` longtext NOT NULL,
  `ship` longtext NOT NULL,
  `order_status` varchar(222) NOT NULL,
  `name_on_the_card` varchar(222) NOT NULL,
  `card_number` varchar(222) NOT NULL,
  `exp_month` varchar(222) NOT NULL,
  `exp_year` varchar(222) NOT NULL,
  `cvv` varchar(222) NOT NULL,
  `liftgate` varchar(222) NOT NULL,
  `yard` varchar(222) NOT NULL,
  `notes` longtext NOT NULL,
  `subject_order` varchar(222) NOT NULL,
  `inv_id` varchar(222) NOT NULL,
  `inv_order` varchar(222) NOT NULL,
  `session` varchar(222) NOT NULL,
  `mobile` varchar(222) NOT NULL,
  `status` varchar(222) NOT NULL,
  `bill_id` varchar(222) NOT NULL,
  `estimate_id` varchar(222) NOT NULL,
  `scheme` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
)");




if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }

if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `emi` WHERE `order_id`='$_REQUEST[id]'";
			 $result = mysqli_query(dbcon(),$sql);

$sql    = "DELETE FROM `orders_scheme` WHERE `session`='$_REQUEST[id]'";
			 $result = mysqli_query(dbcon(),$sql);
			header("Location:emi.php");

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">EMI</a> </div>
    <h1>Scheme EMI List</h1>
	
	<?php if(@$_REQUEST['action']=="") { ?><p style="text-align:right;"><a href="emi.php?action=add"><button type="button" class="btn btn-success">Add New</button></a></p>
	
	<?php } ?>
	
  </div>
  
  
  <?php if(@$_REQUEST['action']=="") { ?>
  <div class="container-fluid">
	 <div class="row-fluid">
    <div class="span4">
      <div >
	  <div >
	  <form name="scheme" method="post" action="">
                  &nbsp;&nbsp;Select Scheme
                    <select name="scheme" style="width:200px;"  onChange="return submit();">
					<option value="">-select Scheme-</option>
					<?php
					$query ="select * from `scheme`";
								$rsquery = mysqli_query(dbcon(),$query);
								while($rsdata = mysqli_fetch_object($rsquery))
								{
								?>
					<option value="<?php echo $rsdata->id; ?>" <?php if(@$_REQUEST['scheme']==$rsdata->id) { ?> selected <?php } ?>><?php echo $rsdata->name; ?></option>
					<?php } ?>
					</select>
	</form>				
                </div>
				
				
				
				</div>
				</div>
				
				 <div class="span4">
      <div >
	  <div >
                  
				 
				 <form name="paid" method="post" action="">
                    &nbsp;&nbsp;Select Month
                 &nbsp;&nbsp;<input type="number" name="month_paid" value="" style="width:50px;" required>
					
					<input type="submit" class="btn-success" name="submit" value="EMI Paid List" >
					
					</form>
					
                
                </div>
				
				
				
</div>
  
</div>





 <div class="span4">
      <div >
	  <div >
                  
				 
				
				 <form name="pending" method="post" action="">
                   &nbsp;&nbsp;Select Month
                 &nbsp;&nbsp; <input type="number" name="month_pending" value="" style="width:50px;" required>
					
					<input type="submit" class="btn-success" name="submit" value="EMI Pending List" >
                 </form>
                </div>
				
				
				
</div>
  
</div>
























</div>
</div>

 <?php } ?>
      
      <?php if(@$_REQUEST['action']=="") { 
	  
	  
	  
	  $schemeid = @$_REQUEST['scheme'];
	  
	  $querys ="select * from `scheme` where `id`='$schemeid'";
								$rsquerys = mysqli_query(dbcon(),$querys);
								$rsdatas = mysqli_fetch_object($rsquerys);
								 @$emiamount = $rsdatas->minimum_purchase_amount;
								 @$emimonths = $rsdatas->emi_months;
								 
								 
								 $month_paid = @$_REQUEST['month_paid'];
								 
								 $int_paid = "p".$month_paid;
								 
								 $month_pending = @$_REQUEST['month_pending'];
								 
								 $int_pending = "p".$month_pending;
	  
	  ?>   
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>EMI LIST</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
					<th>Mobile</th>
					<th>R Name</th>
					<th>R Mobile</th>
					<th>Group</th>
					<th>Scheme</th>
					<th>Reference No</th>
					<th>EMI Months</th>
					<th>Total Amount</th>
					<th>Paid Amount</th>
					<th>Balance Amount</th>
					
                    <th>Details</th>
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
								
								if(@$_REQUEST['scheme']!="")
								{
								 
								$query ="select * from `emi` where `amount`='$emiamount' and `emi`='$emimonths' order by id desc";
								
								}
								
								if(@$_REQUEST['month_paid']!="")
								{
								 
								$query ="select * from `emi` where `$int_paid`='1' order by id desc";
								
								}
								
								
								if(@$_REQUEST['month_pending']!="")
								{
								 
								$query ="select * from `emi` where `$int_pending`='' order by id desc";
								
								}
								
								if((@$_REQUEST['scheme']=="") and (@$_REQUEST['month_paid']=="") and (@$_REQUEST['month_paid']=="") and (@$_REQUEST['month_pending']==""))
								{
								$query ="select * from `emi` where `order_id`!='' and `emi`!='' order by id desc";
								}
								
								
								
								
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								  
								  $query1 ="select * from `orders_scheme` where `session`='$rsdata->order_id'";
								$rsquery1 = mysqli_query(dbcon(),$query1);
								@$rsdata1 = mysqli_fetch_object($rsquery1);
				                
							    $queryc2 ="select * from `customer_info` where `cust_mobile`='$rsdata->mobile'";
								$rsqueryc2 = mysqli_query(dbcon(),$queryc2);
								@$rsdatac2 = mysqli_fetch_object($rsqueryc2);
								
								
								 $Sqls7 ="select * from `scheme` where `id`='$rsdata1->scheme'";
				$rss7=mysqli_query(dbcon(),$Sqls7);
				$rsdata1s7 =mysqli_fetch_object($rss7);
		  
								
					
								?>
                                    <tr>
                                        <td align="center"><?php echo $iCnt; ?></td>
                                        <td align="center"><?php echo $rsdatac2->cust_name; ?></td>
										<td align="center"><?php echo $rsdatac2->cust_mobile; ?></td>
										<td align="center"><?php echo $rsdatac2->rcust_name; ?></td>
										<td align="center"><?php echo $rsdatac2->rcust_mobile; ?></td>
										
										
										<?php
										$Sqlss ="select * from `group` where `id`='$rsdatac2->group'";

				$rsss=mysqli_query(dbcon(),$Sqlss);


				$rsdata1ss =mysqli_fetch_object($rsss);
				?>
										
										<td align="center"><?php echo @$rsdata1ss->name; ?></td>
										<td align="center"><?php echo $rsdata1s7->name; ?></td>
										<td align="center"><?php echo @$rsdata->order_id; ?></td>
										<td align="center"><?php echo $rsdata->emi; ?></td>
										<td align="center"><?php echo $rsdata->amount; ?></td>
										<td align="center"><?php echo @$rsdata->f51; ?></td>
										<td align="center"><?php echo @$bal = $rsdata->amount - $rsdata->f51; ?></td>
									
										
                                        <td class="center" ><a href="emi_details.php?action=view&id=<?php echo $rsdata->order_id; ?>"><button type="button" class="btn btn-success">Details</button></a></td>
               
			    <td class="center" ><a href="emi.php?action=edit&cust_id=<?php echo $rsdatac2->cust_id; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>
                                        <td class="center"  ><a href="emi.php?action=del&id=<?php echo $rsdata->order_id; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>
                                        
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
	   
  

		 $register_query="insert into `customer_info` (`cust_name`,`cust_email`,`cust_mobile`,`cust_address`,`rcust_name`,`rcust_mobile`,`group`) values('$_REQUEST[cust_name]','$_REQUEST[cust_email]','$_REQUEST[cust_mobile]','$_REQUEST[cust_address]','$_REQUEST[rcust_name]','$_REQUEST[rcust_mobile]','$_REQUEST[group]')";

		mysqli_query(dbcon(),$register_query);

		echo mysqli_error();
		
		$session_id =  $_REQUEST['session'];
$order_date = date('Y-m-d');
		
		
		
		
		$mobile = $_REQUEST['cust_mobile'];
$Sql ="select * from `orders_scheme` where `mobile`='$mobile' and `session`='$session_id'";
$rs=mysqli_query(dbcon(),$Sql);
$rsdata1 =mysqli_num_rows($rs);
if($rsdata1<='0')
{
$insert = "insert into `orders_scheme` set `mobile`='$mobile',`date_sent`='$order_date',`scheme`='$_REQUEST[scheme]',`session`='$session_id'";
mysqli_query(dbcon(),$insert);


$sid = $_REQUEST['scheme'];

@$querycs ="select * from `scheme` where `id`='$sid'";
								$rsquerycs = mysqli_query(dbcon(),$querycs);
								@$rsdatacs = mysqli_fetch_object($rsquerycs);
								
								$amount = $rsdatacs->minimum_purchase_amount;
								$emi_months = $rsdatacs->emi_months;

$date = date('Y-m-d');
$insert1 = "insert into `emi` set `mobile`='$mobile',`order_id`='$session_id',`amount`='$amount',`emi`='$emi_months',`date_up`='$date',`date`='$date'";
mysqli_query(dbcon(),$insert1);
		
	}	
		
		

	 	header('location:emi.php');

	} 

	
   
   ?>
          
        
        <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="emi.php?action=add&Save=1">
              <div id="form-wizard-1" class="step">
			  
			  
			  
			  
			  <div class="control-group">
                  <label class="control-label">Select Scheme</label>
                  <div class="controls">
                    <select name="scheme" style="width:300px;" required>
					<?php
					$query ="select * from `scheme`";
								$rsquery = mysqli_query(dbcon(),$query);
								while($rsdata = mysqli_fetch_object($rsquery))
								{
								?>
					<option value="<?php echo $rsdata->id; ?>"><?php echo $rsdata->name; ?></option>
					<?php } ?>
					</select>
                  </div>
                </div>
			  
                 <div class="control-group">
                  <label class="control-label">Reference Number</label>
                  <div class="controls">
                    <input id="session" type="text"  style="width:250px;" name="session" value="<?php echo @$cap = mt_rand(1000, 99999999); ?>" required />
                  </div>
                </div>
                
                <div class="control-group">
                  <label class="control-label">Name</label>
                  <div class="controls">
                    <input id="cust_name" type="text"  style="width:250px;" name="cust_name" value="" required />
                  </div>
                </div>
				
				<div class="control-group">
                  <label class="control-label">Mobile</label>
                  <div class="controls">
                    <input id="cust_mobile" type="text"  style="width:250px;" name="cust_mobile" value="" required />
                  </div>
                </div>
				
				
				
				
				<div class="control-group">
                                            <label class="control-label">Reference Person name * </label>
                                           <div class="controls"> <input class="billing-address-name form-control" type="text" name="rcust_name"  value="<?php echo @$rsdatac->rcust_name; ?>" placeholder="Reference Person name" required> </div>
                                        </div>
										
                                        
                                               
                                                <div class="control-group">
                                                    <label class="control-label">Reference Person Mobile *</label>
                                                    <div class="controls"><input class="form-control" name="rcust_mobile" type="text"  value="<?php echo @$rsdatac->rcust_mobile; ?>" placeholder="Reference Person Mobile number" required> </div>
                                                </div>
                                           
										   
										   <div class="control-group">
                                            <label class="control-label">Select Group: </label>
											
											<div class="controls"><select name="group"  class="billing-address-name form-control" required style="width:300px;">
											
											
											<?php
											@$scheme_sql ="select * from `group`";
$scheme_query=mysqli_query(dbcon(),$scheme_sql);
$cht = '0';
while($scheme =mysqli_fetch_object($scheme_query))
{ $cht++;
?>
											<option value="<?php echo @$scheme->id; ?>" <?php if(@$scheme->id==@$_REQUEST['group']) { ?> selected <?php } ?>><?php echo @$scheme->name; ?></option>
											<?php } ?>
											</select>
											 </div>
                                            
                                        </div>
									
									
				
				
				
				
				
				<div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input id="cust_email" type="email"  style="width:250px;" name="cust_email" value="" required />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Address</label>
                  <div class="controls">
				  <textarea name="cust_address" style="width:250px;" required></textarea>
                   <!-- <input id="cust_address" type="text"  style="width:250px;" name="cust_address" value="" required />-->
                  </div>
                </div>
				
				
			
                
              </div>
            
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="emi.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
          
          
        </div>
        </div></div></div>
        
        
    <?php } ?>  
	
	 <?php if(@$_REQUEST['action']=="edit") { ?>     
        
        <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Edit</h5>
          </div>
       
<?php

  
   if(@$_REQUEST['Save']=='1') {
	   


		$insertupdate = "update `customer_info` set `rcust_name`='$_REQUEST[rcust_name]',`rcust_mobile`='$_REQUEST[rcust_mobile]',`group`='$_REQUEST[group]',`cust_name`='$_REQUEST[cust_name]',`cust_email`='$_REQUEST[cust_email]',`cust_mobile`='$_REQUEST[cust_mobile]',`cust_address`='$_REQUEST[cust_address]' where `cust_id`='$_REQUEST[cust_id]'";
mysqli_query(dbcon(),$insertupdate);

		echo mysqli_error();
		
		
		

	 	header('location:emi.php');

	} 

	$Sql ="select * from `customer_info` where `cust_id`='$_REQUEST[cust_id]'";

				$rs=mysqli_query(dbcon(),$Sql);

				echo @mysqli_error();

				$rsdata1 =mysqli_fetch_object($rs);
   
   ?>
          
        
        <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="emi.php?action=edit&Save=1">
              <div id="form-wizard-1" class="step">
			  <input type="hidden" name="cust_id" value="<? echo $_REQUEST['cust_id']; ?>">
			  
			  
			  
			
			  
              
                
                <div class="control-group">
                  <label class="control-label">Name</label>
                  <div class="controls">
                    <input id="cust_name" type="text"  style="width:250px;" name="cust_name" value="<?php echo $rsdata1->cust_name; ?>" required />
                  </div>
                </div>
				
				<div class="control-group">
                  <label class="control-label">Mobile</label>
                  <div class="controls">
                    <input id="cust_mobile" type="text"  style="width:250px;" name="cust_mobile" value="<?php echo $rsdata1->cust_mobile; ?>" required />
                  </div>
                </div>
				
				
				
				
				<div class="control-group">
                                            <label class="control-label">Reference Person name * </label>
                                           <div class="controls"> <input class="billing-address-name form-control" type="text" name="rcust_name"  value="<?php echo @$rsdata1->rcust_name; ?>" placeholder="Reference Person name" required> </div>
                                        </div>
										
                                        
                                               
                                                <div class="control-group">
                                                    <label class="control-label">Reference Person Mobile number *</label>
                                                    <div class="controls"><input class="form-control" name="rcust_mobile" type="text"  value="<?php echo @$rsdata1->rcust_mobile; ?>" placeholder="Reference Person Mobile number" required> </div>
                                                </div>
                                           
										   
										   <div class="control-group">
                                            <label class="control-label">Select Group: </label>
											
											<div class="controls"><select name="group"  class="billing-address-name form-control" required style="width:300px;">
											
											<option value="">Select Group</option>
											
											<?php
											@$scheme_sql ="select * from `group`";
$scheme_query=mysqli_query(dbcon(),$scheme_sql);
$cht = '0';
while($scheme =mysqli_fetch_object($scheme_query))
{ $cht++;
?>
											<option value="<?php echo @$scheme->id; ?>" <?php if(@$scheme->id==@$rsdata1->group) { ?> selected <?php } ?>><?php echo @$scheme->name; ?></option>
											<?php } ?>
											</select>
											 </div>
                                            
                                        </div>
									
									
				
				
				
				
				
				<div class="control-group">
                  <label class="control-label">Email</label>
                  <div class="controls">
                    <input id="cust_email" type="email"  style="width:250px;" name="cust_email" value="<?php echo $rsdata1->cust_email; ?>" required />
                  </div>
                </div>
				<div class="control-group">
                  <label class="control-label">Address</label>
                  <div class="controls">
				  <textarea name="cust_address" style="width:250px;" required><?php echo $rsdata1->cust_address; ?></textarea>
                   <!-- <input id="cust_address" type="text"  style="width:250px;" name="cust_address" value="" required />-->
                  </div>
                </div>
				
				
			
                
              </div>
            
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="emi.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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
