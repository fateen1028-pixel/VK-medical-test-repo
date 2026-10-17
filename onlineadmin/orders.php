<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();









if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }













if(@$_REQUEST['action']=="del")



			{



			 $sql    = "DELETE FROM `orders` WHERE `session`='$_REQUEST[id]'";



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

<div id="content">

  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Orders</a> </div>

    <h1>Orders</h1>

    <?php /*?><p style="text-align:right;"><a href="orders.php?action=add"><button type="button" class="btn btn-success">Add New</button></a></p><?php */?>

  </div>

  





 

      

      <?php if(@$_REQUEST['action']=="") { ?>   

      

      

       <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

       

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

            <h5>Orders List</h5>

          </div>

          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">

              <thead>

                <tr>

                    <th>S.No</th>

					<th>Orderid</th>

					<th>Order Date</th>

                    <th>Name</th>

					<?php /*?><th>Email</th>

					<th>Mobile</th><?php */?>

					

                    <th>Details</th>

                    <th>Remove</th>

                </tr>

              </thead>

              <tbody>

               

                

                <?php

								$iCnt = "0"; 

								$query ="select * from `orders` where `date_sent`!='' group by `session` order by `id` desc"; //  where `mobile`!='' and `bill_id`='' and `session`!=''

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					              $iCnt++;

								  

							    $queryc ="select * from `customer_info` where `cust_mobile`='$rsdata->mobile'";

								$rsqueryc = mysqli_query(dbcon(),$queryc);

								@$rsdatac = mysqli_fetch_object($rsqueryc);

								  

								  

								  

								

					

								?>

                                    <tr>

                                        <td align="center"><?php echo $iCnt; ?></td>

										<td align="center">ORD<?php echo $rsdata->id; ?></td>

										<td align="center"><?php echo $rsdata->date_sent; ?></td>

                                        <td align="center"><?php echo $rsdatac->cust_name; ?></td>

										<?php /*?><td align="center"><?php echo $rsdatac->cust_email; ?></td>

										<td align="center"><?php echo $rsdatac->cust_mobile; ?></td><?php */?>

										

										

                                        <td class="center" ><a href="ordersview.php?action=view&id=<?php echo $rsdata->session; ?>"><button type="button" class="btn btn-success">Details</button></a></td>

                                        <td class="center"  ><a href="orders.php?action=del&id=<?php echo $rsdata->session; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>

                                        

                                    </tr>

                                    <?php } ?>

               

              </tbody>

            </table>

          </div>

        </div>

        

        

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

