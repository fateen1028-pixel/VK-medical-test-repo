<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();




if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }


mysqli_query(dbcon(),"CREATE TABLE `payment` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`order_id` VARCHAR( 222 ) NOT NULL ,
`amount` VARCHAR( 222 ) NOT NULL ,
`method` VARCHAR( 222 ) NOT NULL ,
`reference` VARCHAR( 222 ) NOT NULL ,
`email` VARCHAR( 222 ) NOT NULL ,
`mobile` VARCHAR( 222 ) NOT NULL ,
`date` DATE NOT NULL
)");
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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">PAYMENT</a> </div>
    <h1>PAYMENT LIST</h1>
  </div>
  


 
      
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>PAYMENT LIST</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
                    <th>ORDER ID</th>
					<th>Amount</th>
					<th>Method</th>
					<th>Reference</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Date</th>
                </tr>
              </thead>
              <tbody>
               
                <?php
								$iCnt = "0"; 
								$query ="select * from `payment` where `order_id`!='' order by id desc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								  
								  $ord = explode("ORD",$rsdata->order_id);
								    $ord_id = $ord[1];
								   
								   $query1 ="select * from `orders` where `id`='$ord_id'";
								$rsquery1 = mysqli_query(dbcon(),$query1);
								@$rsdata1 = mysqli_fetch_object($rsquery1);
					
								?>
                                    <tr>
                                        <td align="center"><?php echo $iCnt;  ?></td>
                                        <td align="center"><a href="ordersview.php?action=view&id=<?php echo $rsdata1->session; ?>"><?php echo $rsdata->order_id; ?></a></td>
										<td align="center"><?php echo $rsdata->amount; ?></td>
										<td align="center"><?php echo $rsdata->method; ?></td>
										<td align="center"><?php echo $rsdata->reference; ?></td>
										<td align="center"><?php echo $rsdata->email; ?></td>
										<td align="center"><?php echo $rsdata->mobile; ?></td>
										<td align="center"><?php echo $rsdata->date; ?></td>
										
                                        
               
                                        
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



</body>
</html>
