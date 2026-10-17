<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();


mysqli_query(dbcon(),"CREATE TABLE `estimate` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`cus_id` VARCHAR( 222 ) NOT NULL ,
`date` DATE NOT NULL
)");

$date = date('Y-m-d');

if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }
if(@$_REQUEST['action']=="add") {
$register_query="insert into `estimate` (`cus_id`,`date`) values('$_REQUEST[id]','$date')";
mysqli_query(dbcon(),$register_query);

header('Location:estimate_customer.php?id='.$_REQUEST['id']);
}

if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `estimate` WHERE `id`='$_REQUEST[id1]'";

			$result = mysqli_query(dbcon(),$sql);


			header('Location:estimate_customer.php?id='.$_REQUEST['id']);

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
    <h1>Estimate List</h1>
   
  </div>
  


 
      
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Estimate List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
                    <th>Estimate No</th>
					
					<th>Date</th>
					<th>Customer</th>
					<th>Mobile Number</th>
					<th>Remove</th>
                    <th>Add</th>
                </tr>
              </thead>
              <tbody>
                
                
                <?php
								$iCnt = "0"; 
								$query ="select * from `estimate` where `cus_id`='$_REQUEST[id]' order by id desc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								  
								  $cus_id = $rsdata->cus_id;
								  $date = $rsdata->date;
								  $id = $rsdata->id;
								  
								  $queryx ="select * from `customer_info` where `cust_id`='$cus_id'";
								$rsqueryx = mysqli_query(dbcon(),$queryx);
								$rsdatax = mysqli_fetch_object($rsqueryx);
								  
								  
								
					
					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }
								?>
                                    <tr class="<?php echo $alagar; ?>">
                                        <td align="center"><?php echo $iCnt; ?></td>
                                        <td align="center">ESTSA00<?php echo $id; ?></td>
										
										<td align="center"><?php echo $rsdata->date; ?></td>
										<td align="center"><?php echo $rsdatax->cust_name; ?></td>
										<td align="center"><?php echo $rsdatax->cust_mobile; ?></td>
										<td class="center"  ><a href="estimate_customer.php?action=del&id1=<?php echo $rsdata->id; ?>&id=<?php echo $cus_id; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>
                  
                                        <td class="center"  ><a href="estimate.php?estimate_id=<?php echo $rsdata->id; ?>&cus_id=<?php echo $cus_id; ?>"><button type="button" class="btn btn-success">Add / View Items</button></a></td>
                                        
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
