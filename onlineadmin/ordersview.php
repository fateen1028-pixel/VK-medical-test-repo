<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();



mysqli_query(dbcon(),"ALTER TABLE  `orders` ADD  `card_number` VARCHAR( 222 ) NOT NULL");





if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }













if(@$_REQUEST['action']=="del")



			{



			 $sql    = "DELETE FROM `orders` WHERE `session`='$_REQUEST[leadid]'";



			$result = mysqli_query(dbcon(),$sql);





			header("Location:orders.php");



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



  <?php

  

  $query1 ="select * from `orders` where `session`='$_REQUEST[id]'";

								$rsquery1 = mysqli_query(dbcon(),$query1);

								@$rsdata1 = mysqli_fetch_object($rsquery1);

				                

							    $queryc2 ="select * from `customer_info` where `cust_mobile`='$rsdata1->mobile'";

								$rsqueryc2 = mysqli_query(dbcon(),$queryc2);

								@$rsdatac2 = mysqli_fetch_object($rsqueryc2);

								

								

								?>

<div id="content">

  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Order Details</a> </div>

    <h1>Order Details</h1>

	

	

	<div align="right"><a href="invoice_online.php?sess=<?php echo $_REQUEST['id']; ?>&cus_id=<?php echo $rsdatac2->cust_id; ?>&act=add" target="_blank"><button type="button" class="btn btn-success">Print Invoice</button></a></div>

	

	

    <?php /*?><p style="text-align:right;"><a href="orders.php?action=add"><button type="button" class="btn btn-success">Add New</button></a></p><?php */?>

  </div>







 <div class="container-fluid"><b>Customer ID :</b> CUS00<?php echo $rsdatac2->cust_id; ?></div>

 <div class="container-fluid"> <b>Name :</b> <?php echo $rsdatac2->cust_name; ?></div>

 <div class="container-fluid"> <b>Email :</b> <?php echo $rsdatac2->cust_email; ?></div>

 <div class="container-fluid"> <b>Mobile :</b> <?php echo $rsdatac2->cust_mobile; ?></div>

 <div class="container-fluid"> <b>Address :</b> <?php echo $rsdatac2->cust_address; ?></div>

 <div class="container-fluid"> <b>City :</b> <?php echo $rsdatac2->cust_city; ?></div>

 <div class="container-fluid"> <b>State :</b> <?php echo $rsdatac2->cust_state; ?></div>

 <div class="container-fluid"> <b>Zip :</b> <?php echo $rsdatac2->cust_postalcode; ?></div>

      

      

      

       <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

       

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

            <h5>Orders Details</h5>

          </div>

		  

		  

		  

		  

		  

		  

		  

		  

          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">

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

								$query ="select * from `orders` where `session`='$_REQUEST[id]'";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					              $iCnt++;

								  

							    $queryc ="select * from `email2` where `id`='$rsdata->lead_id'";

								$rsqueryc = mysqli_query(dbcon(),$queryc);

								@$rsdatac = mysqli_fetch_object($rsqueryc);

								

								$queryco ="select * from `orders` where `lead_id`='$rsdatac->id' and `session`='$_REQUEST[id]'";

								$rsqueryco = mysqli_query(dbcon(),$queryco);

								@$rsdataco = mysqli_fetch_object($rsqueryco);

								  

								  $ship = @$rsdataco->scheme;

								  

								

					

								?>

                                    <tr>

                                        <td align="center"><?php echo $iCnt; ?></td>

										<td align="center"><?php echo $rsdatac->email; ?></td>

										<td align="center"><?php echo $rsdatac->cat; ?></td>

                                        <td align="center"><?php echo $rsdatac->name; ?></td>

										<?php /*?><td align="center"><?php echo $rsdatac->brand; ?></td>

										<td align="center"><?php echo $rsdatac->size; ?></td>

										<td align="center"><?php echo $rsdatac->color; ?></td><?php */?>

										<td align="center"><?php echo $quan = $rsdataco->quantity; ?></td>

										<td align="center"><?php echo $pri = $rsdatac->rate; ?></td>

										<td align="center"><?php echo $price = $quan * $pri; ?></td>

                                     

                                        <td class="center"  ><a href="orders.php?action=del&leadid=<?php echo $rsdata->id; ?>&id=<?php echo @$_REQUEST['id']; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>

                                        

                                    </tr>

                                    <?php @$net = $price +  $net; } ?>

									

									

									

               

              </tbody>

            </table>

          </div>

        </div>

        

        

        

        

        

        <table width="100%" align="right"><tr><td align="right"><b>Total Amount : Rs.<?php echo $net; ?></b></td></tr>

		

<tr><td align="right"><b>Shipping : Rs.<?php echo @$offer =   $ship; ?></b></td></tr>




<tr><td align="right"><b>Net Amount : Rs.<?php echo @$netammount = $net + $offer; ?></b></td></tr>

		

		</table>

        

        

        

        

        

        

        

        

        

        

        

        <?php  

   if(@$_REQUEST['Save']=='1') {

   

         







	$register_query="update `orders` set `order_status`='$_REQUEST[order_status]',`status`='$_REQUEST[status]',`notes`='$_REQUEST[notes]',`card_number`='$_REQUEST[card_number]',`payment_status`='$_REQUEST[payment_status]'  where `session`='$_REQUEST[id]'";



		mysqli_query(dbcon(),$register_query); 



	 	header('location:ordersview.php?id='.$_REQUEST['id']);



	} 





				$Sql ="select * from `orders` where `session`='$_REQUEST[id]'";

				$rs=mysqli_query(dbcon(),$Sql);

				@$rsdata1 =mysqli_fetch_object($rs);



				?>

        

         <div class="container-fluid"><hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>

            <h5>Payment & Delivery Details</h5>

          </div>

        

          <div class="widget-content nopadding">

            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="ordersview.php?Save=1" >

            

            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">

              <div id="form-wizard-1" class="step">

                

				

				<?php /*?><div class="control-group">

                  <label class="control-label">Total Amount</label>

                  <div class="controls">

                    Rs.<?php echo $netammount; ?>

                  </div>

                </div><?php */?>

                

                <div class="control-group">

                  <label class="control-label">Total Amount</label>

                  <div class="controls">

                    Rs.<?php echo @$gst = $netammount; ?>

                  </div>

                </div>

                

                <div class="control-group">

                  <label class="control-label">Total Amount</label>

                  <div class="controls">

                    Rs.<?php echo @$total = $netammount; ?>

                  </div>

                </div>

			  

                

                <div class="control-group">

                  <label class="control-label">Payment Type</label>

                  <div class="controls">

                    <input id="status" type="text"  style="width:250px;" name="status" value="<?php echo $rsdata1->status; ?>" required />

                  </div>

                </div>

                

                

                <div class="control-group">

                  <label class="control-label">Paid Status</label>

                  <div class="controls">

                    <input id="name_on_the_card" type="text"  style="width:250px;" name="name_on_the_card" value="<?php echo $rsdata1->name_on_the_card; ?>" />

                  </div>

                </div>

                

                

                <div class="control-group">

                  <label class="control-label">Reference Number</label>

                  <div class="controls">

                    <input id="card_number" type="text"  style="width:250px;" name="card_number" value="<?php echo $rsdata1->card_number; ?>" />

                  </div>

                </div>

                
<div class="control-group">

                  <label class="control-label">Payment Status</label> 

                  <div class="controls">
                  
                  <select name="payment_status" class="form-control" style="width:200px;" <?php if($_SESSION['status']!="2") { if((($rsdata1->payment_status=="1") and ($rsdata1->notes=="")) or ($_SESSION['status']=="3") ) { ?> disabled <?php }  } ?>>
                  <option value="1" <?php if($rsdata1->payment_status=="1") { ?> selected <?php } ?>>Amount Received</option>
                  <option value="2" <?php if($rsdata1->payment_status!="1") { ?> selected <?php } ?>>Pending</option>
                  </select>
                  
<font color="#FF0000">If You Update Paid , Stock Qty will be Reduced from Available Qty</font>

                  </div>

                </div>
                

				<div class="control-group">

                  <label class="control-label">Delivery Status</label>

                  <div class="controls">

                    <input id="order_status" type="text"  style="width:250px;" name="order_status" value="<?php echo $rsdata1->order_status; ?>" />

                  </div>

                </div>

                

                

                

                 

				

				<div class="control-group">

                  <label class="control-label">Notes</label>

                  <div class="controls">

                    <textarea name="notes"><?php echo $rsdata1->notes; ?></textarea>

                  </div>

                </div>

				

				

				

				

				

				

         

                

              </div>

           

              <div class="form-actions">

                

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Update Status"  />

                <div id="status"></div>

              </div>

              <div id="submitted"></div>

            </form>

          </div>

          

          

        </div>

        </div></div></div>

        

        

        

        

        

        

        

		

		

		

		

		

		

		

		

		

		

		

		

		<?php /*?><?php

		

		mysqli_query(dbcon(),"CREATE TABLE `emi` (

`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,

`mobile` VARCHAR( 222 ) NOT NULL ,

`order_id` VARCHAR( 222 ) NOT NULL ,

`amount` VARCHAR( 222 ) NOT NULL ,

`f1` VARCHAR( 222 ) NOT NULL ,

`f2` VARCHAR( 222 ) NOT NULL ,

`f3` VARCHAR( 222 ) NOT NULL ,

`f4` VARCHAR( 222 ) NOT NULL ,

`f5` VARCHAR( 222 ) NOT NULL ,

`f6` VARCHAR( 222 ) NOT NULL ,

`f7` VARCHAR( 222 ) NOT NULL ,

`f8` VARCHAR( 222 ) NOT NULL ,

`f9` VARCHAR( 222 ) NOT NULL ,

`f10` VARCHAR( 222 ) NOT NULL ,

`d1` DATE NOT NULL ,

`d2` DATE NOT NULL ,

`d3` DATE NOT NULL ,

`d4` DATE NOT NULL ,

`d5` DATE NOT NULL ,

`d6` DATE NOT NULL ,

`d7` DATE NOT NULL ,

`d8` DATE NOT NULL ,

`d9` DATE NOT NULL ,

`d10` DATE NOT NULL ,

`p1` VARCHAR( 222 ) NOT NULL ,

`p2` VARCHAR( 222 ) NOT NULL ,

`p3` VARCHAR( 222 ) NOT NULL ,

`p4` VARCHAR( 222 ) NOT NULL ,

`p5` VARCHAR( 222 ) NOT NULL ,

`p6` VARCHAR( 222 ) NOT NULL ,

`p7` VARCHAR( 222 ) NOT NULL ,

`p8` VARCHAR( 222 ) NOT NULL ,

`p9` VARCHAR( 222 ) NOT NULL ,

`p10` VARCHAR( 222 ) NOT NULL ,

`emi` VARCHAR( 222 ) NOT NULL

)");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `addbyy` VARCHAR( 222 ) NOT NULL");



mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `date_up` DATE NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `date` DATE NOT NULL");



mysqli_query(dbcon(),"ALTER TABLE  `emi` ADD  `f11` VARCHAR( 222 ) NOT NULL");





?>

		

		

		

		

		

		

		

		 <? 



	  

	  



	   



	    ?>

		

		<div class="row-fluid">

      <div class="span12">

       

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

            <h5>Emi Details</h5>

          </div>

		  

		  

		  <?php

		  

		  $Sqls ="select * from `scheme` where `id`='$rsdata1->scheme'";

				$rss=mysqli_query(dbcon(),$Sqls);

				$rsdata1s =mysqli_fetch_object($rss);

		  

		  

		  

		  $date = date('Y-m-d');

		  $date_up = date('Y-m-d');

		  

		  

		  

		  

		  

		  

		  

		   

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  

		  $Sqlsx ="select * from `emi` where `mobile`='$rsdatac2->cust_mobile' and `order_id`='$_REQUEST[id]'";

				$rssx=mysqli_query(dbcon(),$Sqlsx);

				$rsdata1sx =mysqli_num_rows($rssx);

		  if($rsdata1sx<='0')

		  {

@$tamil = "insert into `emi` set  `mobile`='$rsdatac2->cust_mobile',`date`='$date',`emi`='$rsdata1s->emi_months',`amount`='$netammount',`date_up`='$date_up',`addbyy`='$_SESSION[admin]',`order_id`='$_REQUEST[id]'";

mysqli_query(dbcon(),$tamil);









$j=$rsdata1s->emi_months; 

	

	$split = ($netammount/$j);

for($i=1;$i<=$j;$i++)

{



 $reqdates= date('Y-m-d');

	   

	   $explodedeta1s=explode('-',$reqdates);

$actualdate1s=$explodedeta1s[0]."-".$explodedeta1s[1]."-".$explodedeta1s[2];

$d1s=$explodedeta1s[2];

$y1s=$explodedeta1s[0];

$m1s=$explodedeta1s[1];

$maketimes=mktime(0,0,0,$m1s-1,$d1s,$y1s);

$datemks=date('Y-m-d',$maketimes);

	   

	   $reqdate= $datemks;





$explodedeta1=explode('-',$reqdate);

$actualdate1=$explodedeta1[0]."-".$explodedeta1[1]."-".$explodedeta1[2];

$d1=$explodedeta1[2];

$y1=$explodedeta1[0];

$m1=$explodedeta1[1];

$maketime=mktime(0,0,0,$m1+$i,$d1+28,$y1);

$datemk=date('Y-m-d',$maketime);







$tamilu = "update `emi` set  `f".$i."`='$split',`d".$i."`='$datemk' where `mobile`='$rsdatac2->cust_mobile' and `order_id`='$_REQUEST[id]'";

mysqli_query(dbcon(),$tamilu);



}

	





		  

	}

	

	

	

	

	

	

	

	

	

	

	

	

	

	

	

	

	

		  

		  

		  if(@$_REQUEST['act']=='update')



{





if($_REQUEST['p1']=='1') { $a1 =  $_REQUEST['f1']; }

if($_REQUEST['p2']=='1') { $a2 =  $_REQUEST['f2']; }

if($_REQUEST['p3']=='1') { $a3 =  $_REQUEST['f3']; }

if($_REQUEST['p4']=='1') { $a4 =  $_REQUEST['f4']; }

if($_REQUEST['p5']=='1') { $a5 =  $_REQUEST['f5']; }

if($_REQUEST['p6']=='1') { $a6 =  $_REQUEST['f6']; }

if($_REQUEST['p7']=='1') { $a7 =  $_REQUEST['f7']; }

if($_REQUEST['p8']=='1') { $a8 =  $_REQUEST['f8']; }

if($_REQUEST['p9']=='1') { $a9 =  $_REQUEST['f9']; }

if($_REQUEST['p10']=='1') { $a10 =  $_REQUEST['f10']; }





$a = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 + $a9 + $a10;



$date_up = date('Y-m-d');



mysqli_query(dbcon(),"update emi set  f1='$_REQUEST[f1]',f2='$_REQUEST[f2]',f3='$_REQUEST[f3]',f4='$_REQUEST[f4]',f5='$_REQUEST[f5]',f6='$_REQUEST[f6]',f7='$_REQUEST[f7]',f8='$_REQUEST[f8]',f9='$_REQUEST[f9]',f10='$_REQUEST[f10]',d1='$_REQUEST[d1]',d2='$_REQUEST[d2]',d3='$_REQUEST[d3]',d4='$_REQUEST[d4]',d5='$_REQUEST[d5]',d6='$_REQUEST[d6]',d7='$_REQUEST[d7]',d8='$_REQUEST[d8]',d9='$_REQUEST[d9]',d10='$_REQUEST[d10]',p1='$_REQUEST[p1]',p2='$_REQUEST[p2]',p3='$_REQUEST[p3]',p4='$_REQUEST[p4]',p5='$_REQUEST[p5]',p6='$_REQUEST[p6]',p7='$_REQUEST[p7]',p8='$_REQUEST[p8]',p9='$_REQUEST[p9]',p10='$_REQUEST[p10]',date_up='$date_up',addbyy='$_SESSION[admin]',`f11`='$a' where `mobile`='$rsdatac2->cust_mobile' and `order_id`='$_REQUEST[id]'");







header('location:ordersview.php?action=view&id='.$_REQUEST['id']);



}



$recx = "select * from emi where `mobile`='$rsdatac2->cust_mobile' and `order_id`='$_REQUEST[id]'";

$rssxx=mysqli_query(dbcon(),$recx);

				$rec =mysqli_fetch_array($rssxx);



?>

		  

		  

		  

		  

		  

          <div class="widget-content nopadding">



	   <form name="form1" method="post" action="ordersview.php?action=view&act=update&id=<?php echo $_REQUEST['id']; ?>" enctype="multipart/form-data">



	     <table width="80%"  border="0" align="center" cellpadding="5" cellspacing="2" bgcolor="#CCCCCC">



           



<tr><td>&nbsp;</td></tr>

		   



		   <tr>



             <td align="right" class="smalltxt">Mobile : </td>



             <td><? echo $rsdatac2->cust_mobile; ?></td>



           </tr>

		   

		   

		   

		   

		   

		   

		   

		   

		   

		   

		   

		   

		   

		   

		    <tr>



             <td align="right" class="smalltxt">Date : </td>



             <td><input name="date" type="text" id="date" value="<? echo $rec['date']; ?>"></td>



           </tr>



		   



		   <?      date_default_timezone_set('Asia/Calcutta');



		    $time1 = date('g:i a');



	   



	  



		?>



		  

		    

		   

		   

		   

		   

		   

		   



		  

		   <tr>



             <td align="right" class="smalltxt">Scheme : </td>



             <td>

			 

			 

			 

			 <b><?php echo $rsdata1s->name; ?></b>

			 

			 

			 

			 </td>



           </tr>

		   

		    <tr>

			 

			 <td align="right" class="smalltxt">EMI Option : </td>

			 

			 <td class="smalltxt"><b><?php echo $rsdata1s->emi_months; ?>&nbsp;Months</b></td></tr>

	  



		   

		   

		   

		    

		   <tr>



             <td align="right" class="smalltxt">Order Amount: </td>



             <td class="smalltxt">Rs<input name="amount" type="text"  value="<? echo $rec['amount']; ?>"></td>



           </tr>

		   

		   <tr>



             <td align="right" class="smalltxt">Paid Amount: </td>



             <td class="smalltxt">Rs&nbsp;&nbsp;<b><? echo $rec['f11']; ?></b></td>



           </tr>

		   

		    <tr>



             <td align="right" class="smalltxt">Balance Amount: </td>



             <td class="smalltxt">Rs&nbsp;&nbsp;<b><? echo $bal = $rec['amount'] - $rec['f11']; ?></b></td>



           </tr>

		   

		   

		   

<tr><td colspan="10"><hr></td></tr>

		  



		  



		   <tr><td colspan="10"><table width="100%">	   

		   

		   

		   

		   

		   <? 

	

	 $j=$rec['emi']; 

	

	$split = ($rec['amount']/$j);

for($i=1;$i<=$j;$i++)

{?>

	<tr <?php if($rec['p'.$i]>'0') { ?> style="background-color:#009900; color:#FFFFFF;" <?php } else {  ?> style="background-color:#FF0000; color:#FFFFFF;" <?php }?>>

      <td width="24%" height="27" class="smalltxt"><? echo $i; ?>st Month Amount</td>

     <td width="27%" class="smalltxt">

       Rs<input type="text" name="f<? echo $i; ?>" value="<? echo $rec['f'.$i]; ?>" />

	   <?

	   $reqdate= $rec['date'];





$explodedeta1=explode('-',$reqdate);

$actualdate1=$explodedeta1[0]."-".$explodedeta1[1]."-".$explodedeta1[2];

$d1=$explodedeta1[2];

$y1=$explodedeta1[0];

$m1=$explodedeta1[1];

$maketime=mktime(0,0,0,$m1+$i,$d1,$y1);

$datemk=date('Y-m-d',$maketime);



?>

	   

	  <br />Due Date &nbsp;<? //echo $datemk; ?> <input type="text" name="d<? echo $i; ?>" value="<? echo $rec['d'.$i]; ?>" />

     </td>

       <td width="23%" class="smalltxt">Paid Status</td>

      <td width="26%" class="smalltxt">

	  

	  <?



?>

	  

	  

        <label><input type="radio" name="p<? echo $i; ?>" value="1" <? if($rec['p'.$i]>'0') { ?> checked <? } ?>/>Yes&nbsp;&nbsp;</label><label><input type="radio" name="p<? echo $i; ?>" value="" <? if($rec['p'.$i]<='0') { ?> checked <? } ?> />No</label>

      </td>

    </tr>

	

	<tr><td colspan="10"><hr></td></tr>

<? 



} ?>	





</table></td></tr>



		  



		   



          



           <tr>



             <td>&nbsp;</td>



             <td><input type="submit" name="Submit"  class="button" value="Update">



             <input type="button" name="Submit2"  class="button" value="Back" onClick="window.location.href='emi.php'"></td>



           </tr>



		    <tr>



             <td>&nbsp;</td>



             <td>&nbsp;</td>



           </tr>



		    <tr>



             <td>&nbsp;</td>



             <td>&nbsp;</td>



           </tr>



         </table>



        </form>



	  

		

		

		

		

		</div></div></div></div>

		<?php */?>

		

		

		

		

		

		

		

		

		

		

        

        

        

        

        

        

        

        

    

        

        

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

