<?php  ob_start();

session_start();

require("connection.php");

if(@$_SESSION['admin']=="") {  }


mysqli_query(dbcon(),"CREATE TABLE `e_stock` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`model_number` VARCHAR( 222 ) NOT NULL ,
`closing_stock` VARCHAR( 222 ) NOT NULL
)");


/*mysqli_query(dbcon(),"ALTER TABLE  `email2` ADD  `external_link` VARCHAR( 222 ) NOT NULL");*/

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Stock</a> </div>
    <h1>Stock / Inventory List</h1>
    <p style="text-align:right;"><a href="sub_menu.php">
      </a></p>
      
      
      
      <?php /*?><p align="right"><a href="excel_stock.php" target="_blank"><button type="button" class="btn btn-success">Excel Export</button></a></p><?php */?>
      
      
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Stock / Inventory List</h5>
          </div>
          <?php
		  /*if(@$_REQUEST['act']=="insert") {
					
					
					
					$file=$_FILES['excelupload']['name']; 
					
					$filet=$_FILES['excelupload']['type'];
					//exit;
					
					if($filet!="text/csv") { header('location:stock.php?act=errorx'); exit;  }
					
$dir="img/";
if ($file) {
@move_uploaded_file($_FILES['excelupload']['tmp_name'],$dir.$file);
$fcontents = file($dir.$file);  
	for($i=1; $i<sizeof($fcontents); $i++) 
    { 
	   $line = trim($fcontents[$i]); 

		   $arr= explode(",",$line); 
	 

	 
	 $pname = addslashes(str_replace('**',',',$arr[0])); 
     $qty = addslashes(str_replace('**',',',$arr[1]));
  	$date = date('Y-m-d');
	
	$companycheck = "select * from `email2` where `email`='$pname'";
	  $mycompanycheck = mysqli_query(dbcon(),$companycheck);
	  $mynumcheck = mysqli_fetch_object($mycompanycheck);
$pid = $mynumcheck->id;
	 
	 $last= addslashes(str_replace('**',',',$arr[2]));
 	
	 if($last!="") { header('location:import.php?act=error'); exit; }
	 
	  
		
		
		
		$register_query="insert into `stock` set `pid`='$pid',`pname`='$pname',`date`='$date',`qty`='$qty',`denomination`='C'";

		mysqli_query(dbcon(),$register_query);
		
		
		
		
		
		
					
		}
					
					//exit;
					
					header('location:stock.php?act=added'); exit;
					
					}
					
					} */ 
					
					?>
          
          <?php /*?><form  name="wizard" class="form-horizontal" method="post" action="stock.php?act=insert" enctype="multipart/form-data">
          <?php if(@$_REQUEST['act']=="added") { ?><div align="center" class="col-sm-12"><font color="#00CC66"><b>CSV File Imported Successfully</b></font><br></div> <?php } ?>


			<?php if(@$_REQUEST['act']=="error") { ?><div align="center" class="col-sm-12"><font color="#FF0000"><b>Invalid CSV File</b></font><br></div> <?php } ?>
            
            <?php if(@$_REQUEST['act']=="errorx") { ?><div align="center" class="col-sm-12"><font color="#FF0000"><b>Support Only CSV File</b></font><br></div> <?php } ?>
            
             <label class="control-label">Import Excel File</label>
          <div align="center"><a href="stock_excel_import.csv" target="_blank"><img src="excelic.png" style="width:100px;"><br>Download CSV File</a><BR><BR><BR></div>
          
          
           <div class="control-group">

                 

                  <div class="controls">
                                <input type="file" name="excelupload" class="form-control" required>
                                <br /><font color="#FF0000">Important!</font><br /><font color="#FF0000">Excel File Do Not Contain , Character so Replace <font color="#FF0000">,</font> as </font><font color="#FF0000">**</font>
                                </div>
                </div>
                
                
                
                
                
                
                
                <div class="control-group">


                  <div class="controls">

                                <input type="submit" name="save" value="Import" class="btn btn-primary submit-btn">

                            </div>

                </div>
          
          
          
          </form><?php */?>
          
          
          
          
          <?php if(@$_REQUEST['act']=="added") { ?><div align="center"><b>Stock Added Successfully</b></div><?php } ?>
          
          
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Product Name</th>
                  <th>Main Cat</th>
                  <th>Weight</th>
                  <th>Total Qty</th>
                  <th>Sale Qty</th>
                  <th>Available Qty</th>
                  <th>Add</th>
                  <th>History</th>
                </tr>
              </thead>
              <tbody>
                <?php

								$iCnt = "0"; 

								$query ="select * from `email2` order by `id` asc";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					             $iCnt++;

					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }
								 
								 
								 
								 
								 $Sqlc ="select sum(qty) as qtty  from `stock` where `pid`='$rsdata->id'";

				$rsc=mysqli_query(dbcon(),$Sqlc);

				$totalqty =mysqli_fetch_object($rsc);
					$totalqty = $totalqty->qtty;	
					
					
					
					$Sqlcv ="select sum(quantity) as qttty  from `orders` where `lead_id`='$rsdata->id' and `payment_status`='1'";

				$rscv=mysqli_query(dbcon(),$Sqlcv);

				$totalqtyv =mysqli_fetch_object($rscv);
					$saleqty = $totalqtyv->qttty;	
					
					
					
					mysqli_query(dbcon(),"CREATE TABLE `e_stock` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`model_number` VARCHAR( 222 ) NOT NULL ,
`closing_stock` VARCHAR( 222 ) NOT NULL
)");
$availab = $totalqty - $saleqty;
					
					$Sqlcz ="select *  from `e_stock` where `model_number`='$rsdata->email'";
				$rscz=mysqli_query(dbcon(),$Sqlcz);
				$totalqtyz =mysqli_num_rows($rscz);
				if($totalqtyz<='0')
				{
				$register_query="insert into `e_stock` set `model_number`='$rsdata->email',`closing_stock`='$availab'";
		mysqli_query(dbcon(),$register_query); 
				}
				else
				{
				$register_query="update `e_stock` set `closing_stock`='$availab' where `model_number`='$rsdata->email'";
		mysqli_query(dbcon(),$register_query); 
				}
						 
// &nbsp;₹
								?>
                <tr class="<?php echo $alagar; ?>">
                  <td style="text-align:center;"><?php echo $iCnt; ?></td>
                  
                  
                  <td style="text-align:center;"><?php echo $rsdata->name; ?></td>
                  <td style="text-align:center;"><?php echo $rsdata->cat; ?></td>
                  <td style="text-align:center;"><?php echo $rsdata->email; ?></td>
                  <td style="text-align:center;"><?php echo $totalqty; ?></td>
                  <td style="text-align:center;"><?php echo $saleqty; ?></td>
                  <td style="text-align:center;"><?php echo  $availab = $totalqty - $saleqty; ?> </td>
                  
                  <td style="text-align:center;"><a href="add_stock.php?pid=<?php echo $rsdata->id; ?>">
                    <button type="button" class="btn btn-success">Add Stock</button>
                    </a></td>
                    
                    <td style="text-align:center;"><a href="stock_history.php?pid=<?php echo $rsdata->id; ?>">
                    <button type="button" class="btn btn-info">Stock History</button>
                    </a></td>
                    
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
