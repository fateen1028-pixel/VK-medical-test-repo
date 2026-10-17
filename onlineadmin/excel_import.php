<?php ob_start();

session_start();

require("connection.php");

// $link_id=db_connect();
 $select_qry=mysqli_query(dbcon(),"select * from admin where id='".$_SESSION['admin']."'");
   $fetch_ary=mysqli_fetch_array($select_qry);
   $color=$fetch_ary['color'];

?>

<!DOCTYPE html>

<html>



<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <title>Tick Kilonaa Admin Panel</title>

    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/tagsinput.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!--[if lt IE 9]>

		<script src="assets/js/html5shiv.min.js"></script>

		<script src="assets/js/respond.min.js"></script>

	<![endif]-->
    
    <script type="text/javascript" src="jquery.min7.js"></script>

</head>



<body style="background-color:<?php echo $color; ?>; color:#FFFFFF; font-family:Cambria;">

    <div class="main-wrapper">

        

        <?php include('header.php'); ?>

		<?php include('sidebar.php'); ?>

        <div class="page-wrapper">

            <div class="content">

                <div class="row">

                    <div class="col-md-8 offset-md-2">

                        <h4 class="page-title" style="color:#FFFFFF;">Excel Import</h4>

                    </div>

                </div>


                <div class="row">

                    <div class="col-md-8 offset-md-2">

					<?php
					



					if(@$_REQUEST['act']=="insert") {
					
					
					
					
					$file=$_FILES['excelupload']['name']; 
$dir="pdf/";
if ($file) {
@move_uploaded_file($_FILES['excelupload']['tmp_name'],$dir.$file);
$fcontents = file($dir.$file);  
	for($i=1; $i<sizeof($fcontents); $i++) 
    { 
	   $line = trim($fcontents[$i]); 

		   $arr= explode(",",$line); 
	 
	 
	 
	 
	 
	 
	 
	 
	 $question = addslashes(str_replace('**',',',$arr[0])); 
     $optiona = addslashes(str_replace('**',',',$arr[1]));
  	 $optionb = addslashes(str_replace('**',',',$arr[2]));
   	 $optionc =addslashes(str_replace('**',',',$arr[3]));
	 $optiond =addslashes(str_replace('**',',',$arr[4]));
	 $optione =addslashes(str_replace('**',',',$arr[5]));
	 $answer=addslashes(str_replace('**',',',$arr[6]));
	 
	 $last=addslashes(str_replace('**',',',$arr[7]));
 	
	 if($last!="") { header('location:excel_import.php?act=error'); exit; }
	 
	   $companycheck = "select * from `expense` where `item_name`='$_REQUEST[item_name]' and `purchase_from`='$_REQUEST[purchase_from]' and `purchase_by`='$_REQUEST[purchase_by]' and `question`='$question'";
	  $mycompanycheck = mysqli_query(dbcon(),$companycheck);
	  $mynumcheck = mysqli_num_rows($mycompanycheck);
	 
	  if($mynumcheck<="0") {
					
					
					
	

					 $date = date('Y-m-d');


					
			

					

					$query = "INSERT INTO `expense` (`id`, `item_name`, `purchase_from`, `date`, `purchase_by`,`question`,`optiona`,`optionb`,`optionc`,`optiond`,`optione`,`category`,`delete`) VALUES (NULL, '$_REQUEST[item_name]', '$_REQUEST[purchase_from]', '$date', '$_REQUEST[purchase_by]', '$question', '$optiona', '$optionb', '$optionc', '$optiond','$optione','$answer','2')";

					mysqli_query(dbcon(),$query);

					

					

					}
					
					}
					
					header('location:excel_import.php?act=added'); exit;
					
					}
					
					}

					?>

					

					



                        <form name="expense" method="post" action="excel_import.php?act=insert" enctype="multipart/form-data">

                            <div class="row">

                                

								<?php if(@$_REQUEST['act']=="added") { ?><div align="center" class="col-sm-12"><font color="#00CC66"><b>Excel File Imported Successfully</b></font><br></div> <?php } ?>


			<?php if(@$_REQUEST['act']=="error") { ?><div align="center" class="col-sm-12"><font color="#FF0000"><b>Invalid Excel File</b></font><br></div> <?php } ?>
								
                                
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Main Category</label>
                                <select id="category-dropdown" name="purchase_from" class="form-control" placeholder="Pick a Main Category..." required>
                                
                                <option value="">-- Select Main Category --</option>
    
                                <?php 
													$maincatc ="select `company_name` from `customer1` where `delete`!='1'";
								$catisc = mysqli_query(dbcon(),$maincatc);
								$maincatcountc = mysqli_num_rows($catisc);
								if($maincatcountc > 0)
								{
								while($rsdatac = mysqli_fetch_object($catisc))
				                { 
													?>
													
													<option value="<?php echo @$rsdatac->company_name; ?>" <?php if($rsdatac->company_name==@$_REQUEST['purchase_from']) { ?> selected <?php } ?>> <?php echo @$rsdatac->company_name; ?></option>
								<?php } } ?>
                                </select>
                               
                                    </div>
                                </div>
                                
                                
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       
                                        <label for="SUBCATEGORY">Select Sub Category</label>
                                        
                                        
                                        
                                        <select class="form-control" name="purchase_by" id="sub-category-dropdown" required>
                                    <option value="">Select Sub Category</option>
                                    <option value="<?php echo @$_REQUEST['purchase_by']; ?>" selected><?php echo @$_REQUEST['purchase_by']; ?></option>
                                </select>
                                       
                                     
                               
                                    </div>
                                </div>
                                
                                
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Select Episode</label>
                                <select id="item_name" name="item_name" class="form-control" placeholder="Pick a Batch..." required>
                                
                                <option value="">-- Select Episode --</option>
    
                                <?php 
													$maincatc ="select `name` from `supplier1` where `delete`!='1'";
								$catisc = mysqli_query(dbcon(),$maincatc);
								$maincatcountc = mysqli_num_rows($catisc);
								if($maincatcountc > 0)
								{
								while($rsdatac = mysqli_fetch_object($catisc))
				                { 
													?>
													
													<option value="<?php echo @$rsdatac->name; ?>" <?php if($rsdatac->name==@$_REQUEST['item_name']) { ?> selected <?php } ?>> <?php echo @$rsdatac->name; ?></option>
								<?php } } ?>
                                </select>
                               
                                    </div>
                                </div>
                                
                              
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Import Excel File</label>
                                <input type="file" name="excelupload" class="form-control" required>
                                <br /><font color="#FF0000">Important!</font><br /><font color="#ffffff">Excel File Do Not Contain , Character so Replace <font color="#33FFFF">,</font> as </font><font color="#33FFFF">**</font>
                                </div>
                                </div>
                                

								

                            <div class="m-t-20 text-center">

                                <input type="submit" name="save" value="Import" class="btn btn-primary submit-btn">

                            </div>
                                
                                
                                
                                

                        </form>

                    </div>

                </div>

            </div>

			

        </div>

    </div>

    <div class="sidebar-overlay" data-reff=""></div>

    <script type="text/javascript" src="assets/js/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="assets/js/popper.min.js"></script>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="assets/js/jquery.slimscroll.js"></script>

    <script type="text/javascript" src="assets/js/select2.min.js"></script>

	<script type="text/javascript" src="assets/js/moment.min.js"></script>

	<script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>

    <script type="text/javascript" src="assets/js/app.js"></script>
    
    <script>
    $(document).ready(function() {
        $('#category-dropdown').on('change', function() {
            var category_id = this.value;
            $.ajax({
                url: "get-subcat.php",
                type: "POST",
                data: {
                    category_id: category_id
                },
                cache: false,
                success: function(result){
                    $("#sub-category-dropdown").html(result);
                }
            });
        });
    });
    </script>

</body>



</html>

