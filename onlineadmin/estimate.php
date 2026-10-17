<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();



if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }


mysqli_query(dbcon(),"ALTER TABLE  `orders` ADD  `estimate_id` VARCHAR( 222 ) NOT NULL");

if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `orders` WHERE `lead_id`='$_REQUEST[pid]' and `estimate_id`='$_REQUEST[estimate_id]'";

			$result = mysqli_query(dbcon(),$sql);


			header('location:estimate.php?estimate_id='.$_REQUEST['estimate_id'].'&cus_id='.$_REQUEST['cus_id']);

            }
			
			
			
			
			
			
			if(@$_REQUEST['submit2'])
{
$date = date('Y-m-d');

for($i='1';$i<=100;$i++)
{
 $lead_id = @$_REQUEST['lead_id-'.$i];
 $quantity = @$_REQUEST['quantity-'.$i];
 $register_query="update `orders` set `quantity`='$quantity'  where `estimate_id`='$_REQUEST[estimate_id]' and `lead_id`='$lead_id'";
 mysqli_query(dbcon(),$register_query); 
}




$use = @$_REQUEST['use'];
$cus_id = @$_REQUEST['cus_id'];
$date = date('Y-m-d');
$estimate_id = $_REQUEST['estimate_id'];


$amount = $_REQUEST['amount'];

$disc = ($use/100) * $amount;



if($use!="") {
	$register_querycc="insert into `offer_useb` (`code`,`amount`,`user`,`use`,`date`,`order1`) values('$use','$disc','$cus_id','Discount','$date','$estimate_id')";

		mysqli_query(dbcon(),$register_querycc);
		}






header('location:estimate.php?estimate_id='.$_REQUEST['estimate_id'].'&cus_id='.$_REQUEST['cus_id']);
exit;

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
<!--<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>-->
<!--close-top-serch--> 

<!--sidebar-menu-->

<?php include('left.php'); ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Estimate</a> </div>
    <h1>Estimate Details</h1>
   
  </div>
  
<?php

				                
							    $queryc2 ="select * from `customer_info` where `cust_id`='$_REQUEST[cus_id]'";
								$rsqueryc2 = mysqli_query(dbcon(),$queryc2);
								@$rsdatac2 = mysqli_fetch_object($rsqueryc2);
								
								
								?>


 <div class="container-fluid"><b>Customer ID :</b> CUS00<?php echo $rsdatac2->cust_id; ?></div>
 <div class="container-fluid"><b>ESTIMATE ID :</b> ESTSA00<?php echo $_REQUEST['estimate_id']; ?></div>
 <div class="container-fluid"> <b>Name :</b> <?php echo $rsdatac2->cust_name; ?></div>
 <div class="container-fluid"> <b>Email :</b> <?php echo $rsdatac2->cust_email; ?></div>
 <div class="container-fluid"> <b>Mobile :</b> <?php echo $rsdatac2->cust_mobile; ?></div>
 <div class="container-fluid"> <b>Address :</b> <?php echo $rsdatac2->cust_address; ?></div>

 
      
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Estimate Product List</h5>
			<div align="right"><a href="invoice_estimate.php?estimate_id=<?php echo $_REQUEST['estimate_id']; ?>&cus_id=<?php echo $_REQUEST['cus_id']; ?>&act=add" target="_blank"><button type="button" class="btn btn-success">Print Estimate</button></a></div>
          </div>
          <div class="widget-content nopadding">
		  <form name="checkout-frm" action="estimate.php" method="post" class="creditly-card-form shopf-sear-headinfo_form">
		  <input type="hidden" name="estimate_id" value="<?php echo @$_REQUEST['estimate_id']; ?>">
		  <input type="hidden" name="cus_id" value="<?php echo @$_REQUEST['cus_id']; ?>">
            <table  width="100%">
              <thead>
                <tr>
                    <th>S.No</th>
					<th>Product</th>
					<th>Category</th>
                    <th>Sub Category</th>
					<?php /*?><th>Brand</th>
					<th>Size</th>
					<th>Color</th><?php */?>
					<th>Quantity</th>
                    <th>Unit Price</th>
					<th>Price</th>
                    <th>Remove</th>
                </tr>
              </thead>
              <tbody>
               
                
                <?php
								$iCnt = "0"; 
								$query ="select * from `orders` where `estimate_id`='$_REQUEST[estimate_id]' and `estimate_id`!=''";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								  
							    $queryc ="select * from `email2` where `id`='$rsdata->lead_id'";
								$rsqueryc = mysqli_query(dbcon(),$queryc);
								@$rsdatac = mysqli_fetch_object($rsqueryc);
								
								@$queryco ="select * from `orders` where `lead_id`='$rsdatac->id'";
								$rsqueryco = mysqli_query(dbcon(),$queryco);
								@$rsdataco = mysqli_fetch_object($rsqueryco);
								  
								  
								  
								
					
								?>
                                    <tr>
                                        <td align="center"><?php echo $iCnt; ?></td>
										<td align="center"><?php echo @$rsdatac->email; ?></td>
										<td align="center"><?php echo @$rsdatac->cat; ?></td>
                                        <td align="center"><?php echo @$rsdatac->name; ?></td>
										<?php /*?><td align="center"><?php echo $rsdatac->brand; ?></td>
										<td align="center"><?php echo $rsdatac->size; ?></td>
										<td align="center"><?php echo $rsdatac->color; ?></td><?php */?>
										<td align="center">
										
										<input type="number" name="quantity-<?php echo $iCnt; ?>" value="<?php if($rsdata->quantity!="") { echo $quanx = $rsdata->quantity; } else { echo $quanx = "1"; } ?>" style="width:50px;">
											<input type="hidden" name="lead_id-<?php echo $iCnt; ?>" value="<?php echo $rsdata->lead_id; ?>" style="width:50px;">
										
										</td>
										<td align="center"><?php echo @$pri = $rsdatac->meta_name; ?></td>
										<td align="center"><?php echo @$price = $quanx * $pri; ?></td>
                                     
                                        <td class="center"  ><a href="estimate.php?action=del&pid=<?php echo $rsdata->lead_id; ?>&estimate_id=<?php echo $_REQUEST['estimate_id']; ?>&cus_id=<?php echo $_REQUEST['cus_id']; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>
                                        
                                    </tr>
                                    <?php @$price = $rsdatac->meta_name * $quanx;
							@$pricex = $price + $pricex; } ?>
									
									
								
               
              </tbody>
            </table>
			
			
			<div>&nbsp;</div>
			<div align="center">Total Amount Rs. <b><?php echo @$pricex; ?><?php  //$gst = (18/100) * @$pricex; ?><input type="hidden" name="amount" value="<?php echo $ggstnet = @$pricex; ?>"></b></div>
			
			<?php /*?><div align="center">GST 18% Rs. <b><?php echo $gst; ?></b></div><?php */?>
			<?php /*?><div align="center">Gross Amount Rs. <b><?php  echo $ggstnet; ?></b></div><?php */?>
			<?php
		
		@$Sqlx1 ="select * from `offer_useb` where `user`='$_REQUEST[cus_id]' and `order1`='$_REQUEST[estimate_id]' order by `id` desc";
$rsx1=mysqli_query(dbcon(),$Sqlx1);
$rowsx1 =mysqli_fetch_object($rsx1);
$num2 =mysqli_num_rows($rsx1);
if($num2) { 
?><div align="center"><b><?php echo @$rowsx1->use; ?> <?php echo @$rowsx1->code; ?>&nbsp;% : Rs.<?php echo  @$offer1 = $rowsx1->amount; ?></b></div>

<?php } ?>
<div align="center"><b>Net Amount : Rs.<?php echo @$netammount = $pricex - $offer1; ?></b></div>
			
			
			
			<div>&nbsp;</div>
					
					<div align="center" >Discount&nbsp;&nbsp;&nbsp;<input type="text" name="use"  value="" placeholder="Discount %">&nbsp;%&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="btn-success" name="submit2" value="Update Cart" style="width:200px; height:50px;"></div>
			
			<div>&nbsp;</div>
			</form>
          </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      </div>
    </div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?php
	$date = date('Y-m-d');
	
	if(@$_REQUEST['act']=="add") { 
	




 @$register_query="insert into `orders` set `lead_id`='$_REQUEST[pid]',`mobile`='$rsdatac2->cust_mobile',`date_sent`='$date',`estimate_id`='$_REQUEST[estimate_id]'";

		mysqli_query(dbcon(),$register_query); 

header('location:estimate.php?estimate_id='.$_REQUEST['estimate_id'].'&cus_id='.$_REQUEST['cus_id']);
exit;


}



if(@$_REQUEST['submit7'])
{
$date = date('Y-m-d');

for($i='1';$i<=100;$i++)
{
 $lead_id = @$_REQUEST['c-'.$i];
 $quantity = @$_REQUEST['q-'.$i];
 
 if($lead_id!=""){
   $register_query="insert into `orders` set `lead_id`='$lead_id',`mobile`='$rsdatac2->cust_mobile',`date_sent`='$date',`estimate_id`='$_REQUEST[estimate_id]',`quantity`='$quantity'";

		mysqli_query(dbcon(),$register_query); 
		
		
 
 }
 
 
}

header('location:estimate.php?estimate_id='.$_REQUEST['estimate_id'].'&cus_id='.$_REQUEST['cus_id']);
exit;

}

?>
	
	
	
	
	
	<form name="frm-ctrl" method="post" action="estimate.php?submit7=1">
	
	<input type="hidden" name="estimate_id" value="<?php echo @$_REQUEST['estimate_id']; ?>">
		  <input type="hidden" name="cus_id" value="<?php echo @$_REQUEST['cus_id']; ?>">
	
	
	<div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Product List</h5>
          </div>
		  <div  align="center"><br><input type="submit" class="btn-success" name="submit7" value="Update Cart" style="width:200px; height:50px;"></div>
          <div class="widget-content nopadding">
		  
		  
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
					<th>Select</th>
					<th>Quantity</th>
                    <th>Product Name</th>
					
					<th>Sub Category</th>
					<th>Product Code</th>
					<th>Serial Number</th>
					<th>Price</th>
					<th>Brand</th>
                    <th>Add Item</th>
                </tr>
              </thead>
              <tbody>
                
                
                <?php
								$iCnt = "0"; 
								$query ="select * from `email2` order by id asc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								
					
					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }
								?>
                                    <tr class="<?php echo $alagar; ?>">
                                       <td align="center"><?php echo $iCnt; ?></td>
									   <td align="center"><input type="checkbox" name="c-<?php echo $iCnt; ?>" value="<?php echo $rsdata->id; ?>"></td>
									   <td align="center"><input type="number" value="" name="q-<?php echo $iCnt; ?>" style="width:50px;"></td>
                                        <td align="center"><?php echo $rsdata->email; ?></td>
										
										<td align="center"><?php echo $rsdata->name; ?></td>
										<td align="center"><?php echo $rsdata->product_code; ?></td>
										<td align="center"><?php echo $rsdata->serial_number; ?></td>
										<td align="center"><?php echo $rsdata->meta_name; ?></td>
										<td align="center"><?php echo $rsdata->brand; ?>
										<?php
										$aplcrb ="select * from `brand` where `name`='$rsdata->brand'";
				  $apllcrb = mysqli_query(dbcon(),$aplcrb);
				  @$aplllmb = mysqli_fetch_object($apllcrb);
				  
				  ?><?php if(@$aplllmb->logo!="") { ?><img src="../Products/Large/<?php echo @$aplllmb->logo; ?>" width="50"> <?php } ?>
										
										</td>
										
                  
                                        <td class="center"  >
										
										<a href="estimate.php?pid=<?php echo $rsdata->id; ?>&estimate_id=<?php echo $_REQUEST['estimate_id']; ?>&cus_id=<?php echo $_REQUEST['cus_id']; ?>&act=add"><button type="button" class="btn btn-success">Add Item</button></a>
										
										</td>
                                        
                                    </tr>
                                    <?php } ?>
               
              </tbody>
            </table>
			
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
