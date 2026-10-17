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

<style type="text/css">
.cstyle
{
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
}
</style>

</head>
<body onLoad="print();">

<table cellspacing="0" cellpadding="5" border="0"   class="cstyle" width="100%" align="center" style="border:solid 1px;" >


  

  <tr bgcolor="">
    <td colspan="12" align="center"><h1><b>SARAVEDI</b></h1>

   No 36/16, South Sivan Kovil Street,<BR> Near : Krishna Kalyanamandapam,<BR> Power House Bus Stop.<BR> Kodambakkam. Chennai - 600024.

    </td>
  </tr>



  <tr bgcolor="">
    <td colspan="12" align="center"><h2><b>ESTIMATE</b></h2></td>
  </tr>
 <?php
    $queryf ="select * from `customer_info` where `cust_id`='$_REQUEST[cus_id]'";
								$rsqueryf =  mysqli_query(dbcon(),$queryf);
								@$rsdataf = mysqli_fetch_object($rsqueryf);
								?>



     <tr>
     <td colspan="12">
     <table border="0" cellpadding="0" cellspacing="0" width="100%" class="cstyle"><tr>


     <td width="50%">
     <table width="100%" class="cstyle" border="0" cellpadding="5" cellspacing="0" style="border:solid 1px;">
     <tr><td><B>To,</B></td></tr>
     <tr><td><B><?php echo @$rsdataf->cust_name; ?></B></td></tr>
     <tr><td><B><?php echo @$rsdataf->cust_address; ?></B></td></tr>
	 <tr><td><B>Email : <?php echo @$rsdataf->cust_email; ?></B></td></tr>
     <tr><td><B>Mobile : <?php echo @$rsdataf->cust_mobile; ?></B></td></tr>
     </table>
     </td>


     <td width="50%">
     <table width="100%" class="cstyle" border="0" cellpadding="5" cellspacing="0" style="border:solid 1px;">
      <tr><td><B>ESTIMATE NO : ESTSA00<?php echo @$_REQUEST['estimate_id']; ?></B></td></tr>
     <tr><td><B>DATE : <?php echo @date('Y-m-d'); ?></B></td></tr>
	 <tr><td><B>Place : </B></td></tr>
     <tr><td><B>Mobile : </B></td></tr>
     <tr><td>&nbsp;</td></tr>
     </table>
     </td>

     </tr>
     </table>
     </td>

     </tr>










  <tr bgcolor="">

  <td colspan="12">
  
  
  
  
  
  
  
  
  
  
  <table  width="100%" >
              <thead>
                <tr >
                    <th style="border:solid 1px;">S.No</th>
					<th style="border:solid 1px;">Product</th>
                    <th style="border:solid 1px;">Category</th>
					<th style="border:solid 1px;">Brand</th>
					<th style="border:solid 1px;">Quantity</th>
                    <th style="border:solid 1px;">Unit Price</th>
					<th style="border:solid 1px;">Price</th>
                </tr>
              </thead>
              <tbody>
               
                
                <?php
								$iCnt = "0"; 
								$query ="select * from `orders` where `estimate_id`='$_REQUEST[estimate_id]'";
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
                                        <td align="center" style="border:solid 1px;"><?php echo $iCnt; ?></td>
										<td align="center" style="border:solid 1px;"><?php echo @$rsdatac->email; ?></td>
                                        <td align="center" style="border:solid 1px;"><?php echo @$rsdatac->name; ?></td>
										<td align="center" style="border:solid 1px;"><?php echo $rsdatac->brand; ?></td>
										<td align="center" style="border:solid 1px;">
										
										<?php
										
										if($rsdata->quantity!="") { echo $quanx = $rsdata->quantity; } else { echo $quanx = "1"; }
										
										 //echo $quanx = $rsdata->quantity;  ?>
										
										</td>
										<td align="center" style="border:solid 1px;"><?php echo @$pri = $rsdatac->meta_name; ?></td>
										<td align="right" style="border:solid 1px;"><?php echo @$price = $quanx * $pri; ?>.00</td>
                                     
                                        
                                        
                                    </tr>
                                    <?php @$price = $rsdatac->meta_name * $quanx;
							@$pricex = $price + $pricex; } ?>
									
									
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>Total:</b></td><td align="right"><b><?php echo @$pricex; ?></b></td></tr>
							
							<?php  //$gst = (18/100) * @$pricex; ?>
							
							<?php /*?><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>Gst 18%:</b></td><td align="right"><b><?php echo @$gst; ?></b></td></tr>	<?php */?>
							
							<?php /*?><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>Gross:</b></td><td align="right"><b><?php echo @$gst + $pricex; ?></b></td></tr><?php */?>
							
							
							<?php
		
		@$Sqlx1 ="select * from `offer_useb` where `user`='$_REQUEST[cus_id]' and `order1`='$_REQUEST[estimate_id]' order by `id` desc";
$rsx1=mysqli_query(dbcon(),$Sqlx1);
$rowsx1 =mysqli_fetch_object($rsx1);
$num2 =mysqli_num_rows($rsx1);
if($num2) { 
?>
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b><?php echo @$rowsx1->use; ?> <?php echo @$rowsx1->code; ?>&nbsp;%</b></td><td align="right"><b><?php echo   @$disc = $rowsx1->amount; ?></b></td></tr> <?php } ?>	
							
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>Net Amount:</b></td><td align="right"><b><?php echo $net = $pricex - $disc; ?></b></td></tr>
							
							
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right">&nbsp;</td><td align="right"><b>For Saravedi</b></td></tr>
					<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right">&nbsp;</td><td align="right"><b>Manager</b></td></tr>		
								
               
              </tbody>
            </table>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  </td></tr>




  



























  <tr>
     <td colspan="12">
     <table border="0" cellpadding="0" cellspacing="5" width="100%" class="cstyle">
      <tr>
    <td colspan="12"><b>Payments</b></td>

  </tr>

  <tr>
    <td >1. In case of any discrepancies in the invoice, should be intimated within 3 days from the date of receipt of this invoice.</td>

  </tr>
  <tr>
    <td >2. 18% interest will be charged per annum on all amounts not paid before seven days of the date of the invoice.</td>
     <!--<td></td>-->

  </tr>
  <tr>
    <td >3. All cheques / DD should be drawn in favour of SARAVEDI</td>

  </tr>

 
     </table>
     </td>
  </tr>












</table>

</body>
</html>