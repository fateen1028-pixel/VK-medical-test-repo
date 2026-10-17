<?php  ob_start();

session_start();

require("connection.php");

if(@$_SESSION['admin']=="") {  }


/*mysqli_query(dbcon(),"ALTER TABLE  `email2` ADD  `side` VARCHAR( 222 ) NOT NULL");


mysqli_query(dbcon(),"ALTER TABLE  `email2` ADD  `external_link` VARCHAR( 222 ) NOT NULL");*/

if(@$_REQUEST['action']=="del")

			{

			$sql    = "DELETE FROM `email2` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);

			header("Location:sub_sub_menu.php");

            }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>
<?php include('title.php'); ?>
</title>
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
<!--close-top-serch-->
<!--sidebar-menu-->
<?php include('left.php'); ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Stock History</a> </div>
    <h1>Stock History</h1>
    <p style="text-align:right;"><a href="sub_menu.php">
      </a></p>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Stock Purchase History</h5>
          </div>
          
          
          
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Qty</th>
                  <th>Denomination</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php

								$iCnt = "0"; 

								$query ="select * from `stock` where `pid`='$_REQUEST[pid]' order by `id` desc";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					             $iCnt++;

					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }
								 
								 
								
					
						 
// &nbsp;₹
								?>
                <tr class="<?php echo $alagar; ?>">
                  <td style="text-align:center;"><?php echo $iCnt; ?></td>
                  
                  
                  <td style="text-align:center;"><?php echo $rsdata->pname; ?></td>
                  <td style="text-align:center;"><?php echo $rsdata->date; ?></td>
                  <td style="text-align:center;"><?php echo $rsdata->qty; ?></td>
                  
                  <td style="text-align:center;"><?php echo $rsdata->denomination; ?></td>
                  
                    
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        
      </div>
    </div>
    
    
    
    
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Stock Sale History</h5>
          </div>
          
          
          
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  <th>Date</th>
                  <th>Qty</th>
                  <th>Denomination</th>
                 
                </tr>
              </thead>
              <tbody>
                <?php

								$iCnt = "0"; 

								$query ="select * from `orders` where `lead_id`='$_REQUEST[pid]' and `payment_status`='1' order by `id` desc";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					             $iCnt++;

					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }
								 
								 
								$Sql ="select * from `email2` where `id`='$_REQUEST[pid]'";

				$rs=mysqli_query(dbcon(),$Sql);

				$rsdata1 =mysqli_fetch_object($rs);
					
						 
// &nbsp;₹
								?>
                <tr class="<?php echo $alagar; ?>">
                  <td style="text-align:center;"><?php echo $iCnt; ?></td>
                  
                  
                  <td style="text-align:center;"><?php echo $rsdata1->email; ?></td>
                  <td style="text-align:center;"><?php echo $rsdata->date_sent; ?></td>
                  <td style="text-align:center;"><?php echo $rsdata->quantity; ?></td>
                  
                  <td style="text-align:center;"><?php echo "D"; ?></td>
                  
                    
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
