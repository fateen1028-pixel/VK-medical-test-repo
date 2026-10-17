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
    <td colspan="12" align="center"><h1><b>Agkilam Naturals</b></h1>

   No.66, CTH Road, Thirumullaivayol, Chennai - 600062.

    </td>
  </tr>



  <tr bgcolor="">
    <td colspan="12" align="center"><h2><b>INVOICE</b></h2></td>
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
      <tr><td><B>INVOICE NO : INVSA00S<?php echo @$_REQUEST['cus_id']; ?></B></td></tr>
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
								$query ="select * from `orders` where `session`='$_REQUEST[sess]'";
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
								  
								  
								   $ship = @$rsdataco->scheme;
								
					
								?>
                                    <tr>
                                        <td align="center" style="border:solid 1px;"><?php echo $iCnt; ?></td>
										<td align="center" style="border:solid 1px;"><?php echo @$rsdatac->email; ?></td>
                                        <td align="center" style="border:solid 1px;"><?php echo @$rsdatac->name; ?></td>
										<td align="center" style="border:solid 1px;"><?php echo $rsdatac->brand; ?></td>
										<td align="center" style="border:solid 1px;">
										
										<?php echo $quanx = $rsdata->quantity;  ?>
										
										</td>
										<td align="center" style="border:solid 1px;"><?php echo @$pri = $rsdatac->rate; ?></td>
										<td align="right" style="border:solid 1px;"><?php echo @$price = $quanx * $pri; ?>.00</td>
                                     
                                        
                                        
                                    </tr>
                                    <?php @$price = $rsdatac->rate * $quanx;
							@$pricex = $price + $pricex; } ?>
									
									
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>Total:</b></td><td align="right"><b><?php echo @$pricex; ?>.00</b></td></tr>	
							
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>Shipping:</b></td><td align="right"><b><?php echo $ship; ?>.00</b></td></tr>	
							
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right"><b>Net Amount:</b></td><td align="right"><b><?php echo $net = $pricex + $ship; ?>.00</b></td></tr>
							
							
							<tr><td>&nbsp;</td></tr>
							<tr><td>&nbsp;</td></tr>
							
							<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right">&nbsp;</td><td align="right"><b>For Agkilam Naturals</b></td></tr>
					<tr><td>&nbsp;</td></tr><tr><td>&nbsp;</td></tr>
					<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td align="right">&nbsp;</td><td align="right"><b>Manager</b></td></tr>		
								
               
              </tbody>
            </table>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  </td></tr>



<tr><td colspan="5">&nbsp;<b>Note : </b><font color="#00CC66">Within Tamilnadu Shipping Charge 60 Rs, Out of Tamilnadu Shipping Charge 100 Rs.</font></td></tr>
  



























  <?php /*?><tr>
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
    <td >3. All cheques / DD should be drawn in favour of CHENNAI SOAP COMPANY</td>

  </tr>

 
     </table>
     </td>
  </tr><?php */?>












</table>

</body>
</html>