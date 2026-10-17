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

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Excel Import</a> </div>

    <h1>Product Excel Import</h1>


  </div>

  





 

       <div class="container-fluid"><hr>







    <div class="row-fluid">







      <div class="span12">







        <div class="widget-box">







          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>







            <h5>Create New</h5>



	<?php
					



					if(@$_REQUEST['act']=="insert") {
					
					
					
					$file=$_FILES['excelupload']['name']; 
					
					$filet=$_FILES['excelupload']['type'];
					//exit;
					
					if($filet!="text/csv") { header('location:import.php?act=errorx'); exit;  }
					
$dir="img/";
if ($file) {
@move_uploaded_file($_FILES['excelupload']['tmp_name'],$dir.$file);
$fcontents = file($dir.$file);  
	for($i=1; $i<sizeof($fcontents); $i++) 
    { 
	   $line = trim($fcontents[$i]); 

		   $arr= explode(",",$line); 
	 
	 
	 
	 
	 $cat2 = "Products";
	 $cat = $_REQUEST['cat'];
	  $name = $_REQUEST['name'];
	 
	 
	 
	 
	 $email = addslashes(str_replace('**',',',$arr[0])); 
     $rate = addslashes(str_replace('**',',',$arr[1]));
  	 $meta_name = addslashes(str_replace('**',',',$arr[2]));
   	 $description =addslashes(str_replace('**',',',$arr[3]));
	 $small =addslashes(str_replace('**',',',$arr[4]));
	 
	 $a5 = addslashes(str_replace('**',',',$arr[5]));
	 $a6 = addslashes(str_replace('**',',',$arr[6]));
	 $a7 = addslashes(str_replace('**',',',$arr[7]));
	 $a8 = addslashes(str_replace('**',',',$arr[8]));
	 $a9 = addslashes(str_replace('**',',',$arr[9]));
	 $a10 = addslashes(str_replace('**',',',$arr[10]));
	 
	 
	 $a11 = addslashes(str_replace('**',',',$arr[11]));
	 $a12 = addslashes(str_replace('**',',',$arr[12]));
	 $a13 = addslashes(str_replace('**',',',$arr[13]));
	 $a14 = addslashes(str_replace('**',',',$arr[14]));
	 $a15 = addslashes(str_replace('**',',',$arr[15]));
	 $a16 = addslashes(str_replace('**',',',$arr[16]));
	 $a17 = addslashes(str_replace('**',',',$arr[17]));
	 $a18 = addslashes(str_replace('**',',',$arr[18]));
	 $a19 = addslashes(str_replace('**',',',$arr[19]));
	 $a20 = addslashes(str_replace('**',',',$arr[20]));
	 
	 $a21 = addslashes(str_replace('**',',',$arr[21]));
	 $a22 = addslashes(str_replace('**',',',$arr[22]));
	 $a23 = addslashes(str_replace('**',',',$arr[23]));
	 $a24 = addslashes(str_replace('**',',',$arr[24]));
	 $a25 = addslashes(str_replace('**',',',$arr[25]));
	 $a26 = addslashes(str_replace('**',',',$arr[26]));
	 $a27 = addslashes(str_replace('**',',',$arr[27]));
	 $a28 = addslashes(str_replace('**',',',$arr[28]));
	 $a29 = addslashes(str_replace('**',',',$arr[29]));
	 $a30 = addslashes(str_replace('**',',',$arr[30]));
	 
	 $a31 = addslashes(str_replace('**',',',$arr[31]));
	 $a32 = addslashes(str_replace('**',',',$arr[32]));
	 $a33 = addslashes(str_replace('**',',',$arr[33]));
	 $a34 = addslashes(str_replace('**',',',$arr[34]));
	 $a35 = addslashes(str_replace('**',',',$arr[35]));
	 $a36 = addslashes(str_replace('**',',',$arr[36]));
	 $a37 = addslashes(str_replace('**',',',$arr[37]));
	 $a38 = addslashes(str_replace('**',',',$arr[38]));
	 $a39 = addslashes(str_replace('**',',',$arr[39]));
	 $a40 = addslashes(str_replace('**',',',$arr[40]));
	 
	 
	 $a41 = addslashes(str_replace('**',',',$arr[41]));
	 $a42 = addslashes(str_replace('**',',',$arr[42]));
	 $a43 = addslashes(str_replace('**',',',$arr[43]));
	 $a44 = addslashes(str_replace('**',',',$arr[44]));
	 $a45 = addslashes(str_replace('**',',',$arr[45]));
	 $a46 = addslashes(str_replace('**',',',$arr[46]));
	 $a47 = addslashes(str_replace('**',',',$arr[47]));
	 $a48 = addslashes(str_replace('**',',',$arr[48]));
	 $a49 = addslashes(str_replace('**',',',$arr[49]));
	 $a50 = addslashes(str_replace('**',',',$arr[50]));
	 
	 
	 $a51 = addslashes(str_replace('**',',',$arr[51]));
	 $a52 = addslashes(str_replace('**',',',$arr[52]));
	 $a53 = addslashes(str_replace('**',',',$arr[53]));
	 $a54 = addslashes(str_replace('**',',',$arr[54]));
	 $a55 = addslashes(str_replace('**',',',$arr[55]));
	 $a56 = addslashes(str_replace('**',',',$arr[56]));
	 $a57 = addslashes(str_replace('**',',',$arr[57]));
	 $a58 = addslashes(str_replace('**',',',$arr[58]));
	 $a59 = addslashes(str_replace('**',',',$arr[59]));
	 $a60 = addslashes(str_replace('**',',',$arr[60]));
	 
	 $a61 = addslashes(str_replace('**',',',$arr[61]));
	 $a62 = addslashes(str_replace('**',',',$arr[62]));
	 $a63 = addslashes(str_replace('**',',',$arr[63]));
	 $a64 = addslashes(str_replace('**',',',$arr[64]));
	 $a65 = addslashes(str_replace('**',',',$arr[65]));
	 $a66 = addslashes(str_replace('**',',',$arr[66]));
	 $a67 = addslashes(str_replace('**',',',$arr[67]));
	 $a68 = addslashes(str_replace('**',',',$arr[68]));
	 $a69 = addslashes(str_replace('**',',',$arr[69]));
	 $a70 = addslashes(str_replace('**',',',$arr[70]));
	
	 
	 $last= addslashes(str_replace('**',',',$arr[71]));
 	
	 if($last!="") { header('location:import.php?act=error'); exit; }
	 
	  $companycheck = "select * from `email2` where `cat2`='$cat2' and `cat`='$cat' and `name`='$name' and `email`='$email'";
	  $mycompanycheck = mysqli_query(dbcon(),$companycheck);
	  $mynumcheck = mysqli_num_rows($mycompanycheck);
	 
	  if($mynumcheck<="0") {
					
					

					
					
					
					 $register_query="insert into `email2` (`cat2`,`cat`,`name`,`email`,`rate`,`meta_name`,`description`,`small`) values('$cat2','$cat','$name','$email','$rate','$meta_name','$description','$small')";
		mysqli_query(dbcon(),$register_query);
		
		
		$queryv ="select * from `email2` order by `id` desc";
								$rsqueryv = mysqli_query(dbcon(),$queryv);
								@$rsdatav = mysqli_fetch_object($rsqueryv);
		
		
		
		
	  $companycheck1 = "select * from `email7` where `pid`='$rsdatav->id'";
	  $mycompanycheck1 = mysqli_query(dbcon(),$companycheck1);
	  $mynumcheck1 = mysqli_num_rows($mycompanycheck1);
	 
	  if($mynumcheck1<="0") {
		
		
		
		$register_query1="insert into `email7` (`chipset`,`cores`,`cpu`,`architec`,`fabric`,`ram`,`ram_type`,`graphics`,`build`,`height`,`width`,`thick`,`weight`,`color`,`water`,`resolution`,`display_type`,`size`,`bezel`,`pixel`,`c_setup`,`c_secondary`,`c_tertiary`,`fc_setup`,`fc_primary`,`sensor`,`flash`,`vr_rear`,`vr_front`,`eis`,`c_feature`,`shoot`,`bright`,`protection`,`color_re`,`screen`,`b_type`,`capacity`,`removable`,`fast_charge`,`charge_speed`,`os`,`ui`,`internal`,`memory_type`,`storage`,`expand`,`sim`,`network`,`fiveg`,`lte`,`wifi`,`wifi_f`,`bluetooth`,`usb`,`otg`,`gps`,`nfc`,`infrared`,`speaker`,`audio`,`video`,`speaker_f`,`finger_print`,`face`,`other`,`pid`) values('$a5','$a6','$a7','$a8','$a9','$a10','$a11','$a12','$a13','$a14','$a15','$a16','$a17','$a18','$a19','$a20','$a21','$a22','$a23','$a24','$a29','$a30','$a31','$a32','$a33','$a34','$a35','$a36','$a37','$a38','$a39','$a40','$a25','$a26','$a27','$a28','$a41','$a42','$a43','$a44','$a45','$a46','$a47','$a48','$a49','$a50','$a51','$a52','$a53','$a54','$a55','$a56','$a57','$a58','$a59','$a60','$a61','$a62','$a63','$a64','$a65','$a66','$a67','$a68','$a69','$a70','$rsdatav->id')";





		mysqli_query(dbcon(),$register_query1);
		
		
		}
		
		
		
					
					
					
			//echo mysqli_error();		

					

					

					}
					
					}
					
					
					//exit;
					
					header('location:import.php?act=added'); exit;
					
					}
					
					}

					?>



          </div>
<script language="javascript">

function sumb()
{
document.wizard.method="post";
document.wizard.action="";
document.wizard.submit();
}

</script>


        <div class="widget-content nopadding">



            <form  name="wizard" class="form-horizontal" method="post" action="import.php?act=insert" enctype="multipart/form-data">
            
            
            <input type="hidden" name="cat2" value="Products" >



              <div id="form-wizard-1" class="step">

		
            
            
            
            <div align="center"><a href="product_excel.csv" target="_blank"><img src="excelic.png" style="width:100px;"><br>Download CSV File</a><BR><BR><BR></div>
            
            
			<?php if(@$_REQUEST['act']=="added") { ?><div align="center" class="col-sm-12"><font color="#00CC66"><b>CSV File Imported Successfully</b></font><br></div> <?php } ?>


			<?php if(@$_REQUEST['act']=="error") { ?><div align="center" class="col-sm-12"><font color="#FF0000"><b>Invalid CSV File</b></font><br></div> <?php } ?>
            
            <?php if(@$_REQUEST['act']=="errorx") { ?><div align="center" class="col-sm-12"><font color="#FF0000"><b>Support Only CSV File</b></font><br></div> <?php } ?>

			   <div class="control-group">

                  <label class="control-label">Main Category</label>

                  <div class="controls">

                    <select name="cat" style="width:200px;" onChange="return sumb();" required>

                  <option value="">Select Main Category</option>

                  <?php

				  $aplcr ="select * from `email`";

				  $apllcr = mysqli_query(dbcon(),$aplcr);


				  while($aplllm = mysqli_fetch_object($apllcr))


				  {


				  ?><option value="<?php echo $aplllm->email; ?>" <?php if(@$_REQUEST['cat']==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>

                  <?php } ?>


                  </select>


                  </div>

                </div>






			   <div class="control-group">

                  <label class="control-label">Sub Category</label>

                  <div class="controls">


                    <select name="name" style="width:200px;" required>

                  <option value="">Select Sub Category</option>



                  <?php

				  $aplcr ="select * from `email1` where `name`='$_REQUEST[cat]'";

				  $apllcr = mysqli_query(dbcon(),$aplcr);

				  while($aplllm = mysqli_fetch_object($apllcr))


				  {



				  ?><option value="<?php echo $aplllm->email; ?>" <?php if(@$_REQUEST['id']==$aplllm->id) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>


                  <?php } ?>

 </select>
</div>
                </div>


       <div class="control-group">

                  <label class="control-label">Import Excel File</label>

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

 </div>
 </form>
       


        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        

        
</div>
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

