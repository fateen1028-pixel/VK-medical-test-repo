<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();

if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }

/*mysqli_query(dbcon(),"ALTER TABLE  `email1` ADD  `meta_name` LONGTEXT NOT NULL ,

ADD  `meta_des` LONGTEXT NOT NULL");*/

if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `email1` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);

			header("Location:sub_menu.php");

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

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Products</a> </div>

    <h1>ProductsList</h1>

    <p style="text-align:right;"><a href="sub_menu.php?action=add"><button type="button" class="btn btn-success">Add New Product</button></a></p>

  </div>

      

      <?php if(@$_REQUEST['action']=="") { ?>   

       <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

            <h5>Products List</h5>

          </div>

          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">

              <thead>

                <tr>

                    <th>S.No</th>

                    <th>Products</th>

					<th>Main Menu</th>

                    <th>Edit</th>

                    <th>Remove</th>

					<th>Add</th>

                </tr>

              </thead>

              <tbody>

                <!--<tr class="gradeX">

                  <td>Trident</td>

                  <td>Internet

                    Explorer 4.0</td>

                  <td>Win 95+</td>

                  <td class="center">4</td>

                </tr>-->

                <?php

								$iCnt = "0"; 

								$query ="select * from `email1` order by id asc";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					              $iCnt++;
								
					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }

								?>

                                    <tr class="<?php echo $alagar; ?>">

                                        <td style="text-align:center;"><?php echo $iCnt; ?></td>

                                        <td style="text-align:center;"><?php echo $rsdata->email; ?></td>

										<td style="text-align:center;"><?php echo $rsdata->name; ?></td>

                                        <td style="text-align:center;"><a href="sub_menu.php?action=edit&id=<?php echo $rsdata->id; ?>"><i class="icon-pencil"></i></a></td>

                                        <td style="text-align:center;"><a href="sub_menu.php?action=del&id=<?php echo $rsdata->id; ?>"><i class="icon-remove"></i></a></td>

                                        <td style="text-align:center;"><a href="sub_sub_menu.php?action=add&id=<?php echo $rsdata->id; ?>&cat=<?php echo $rsdata->name; ?>&cat2=<?php echo $rsdata->cat1; ?>"><button type="button" class="btn btn-success">Add Details</button></a></td>

                                    </tr>

                                    <?php } ?>

               

              </tbody>

            </table>

          </div>

        </div>
        

    <?php } ?>

        
        

     <?php if(@$_REQUEST['action']=="add") { ?>     

        <div class="container-fluid"><hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>

            <h5>Create New</h5>

          </div>

<?php


  

   if(@$_REQUEST['Save']=='1') {

		    
			
			$strFileName = $_FILES['banner_img']['name'];

			$strFileSize = $_FILES['banner_img']['size'];

			$strTempFileName = $_FILES['banner_img']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);



		$register_query="insert into `email1` (`email`,`cat1`,`name`,`banner_img`) values('$_REQUEST[email]','$_REQUEST[cat1]','$_REQUEST[name]','$strFileName')";

		mysqli_query(dbcon(),$register_query);

	 	header('location:sub_menu.php');

	} 

   ?>

          

        

        <div class="widget-content nopadding">

            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="sub_menu.php?action=add&Save=1" enctype="multipart/form-data">

              <div id="form-wizard-1" class="step">
			  

			  <div class="control-group">

                  <label class="control-label">Category</label>

                  <div class="controls">

                    <select name="cat1" style="width:415px;" required>

                      <option value="">Select Category</option>
    
                      <?php
    
                      $aplcr ="select * from `cat`";
    
                      $apllcr = mysqli_query(dbcon(),$aplcr);
    
                      while($aplllm = mysqli_fetch_object($apllcr))
    
                      {
    
                      ?><option value="<?php echo $aplllm->email; ?>"><?php echo $aplllm->email; ?></option>
    
                      <?php } ?>
    
                      </select>

                  </div>

                </div>

			  

			   <div class="control-group">

                  <label class="control-label">Main Menu</label>

                  <div class="controls">

                    <select name="name" style="width:415px;" required>

                  <option value="">Select Main Menu</option>

                  <?php

				  $aplcr ="select * from `email`";

				  $apllcr = mysqli_query(dbcon(),$aplcr);

				  while($aplllm = mysqli_fetch_object($apllcr))

				  {

				  ?><option value="<?php echo $aplllm->email; ?>"><?php echo $aplllm->email; ?></option>

                  <?php } ?>

                  </select>

                  </div>

                </div>

			  

                <div class="control-group">

                  <label class="control-label">Product Name</label>

                  <div class="controls">

                    <input type="text"  style="width:400px;" name="email" required />

                  </div>

                </div>
                
                
                
                <div class="control-group">

                  <label class="control-label">Product Image</label>

                  <div class="controls">

                   <input name="banner_img" type="file" placeholder="Upload Picture" class="normal" required>

                  </div>

                </div>
                
                
                
               <?php /*?> <div class="control-group">

                  <label class="control-label">Original Price</label>

                  <div class="controls">

				  <input type="number"  style="width:100px;" name="rate" required />&nbsp;₹

                 </div>

                </div>
                

				 <div class="control-group">

                  <label class="control-label">Small Description</label>

                  <div class="controls">

                	<textarea class="form-control" rows="10" style="width:250px;" placeholder="Enter text ..." name="small"></textarea>

                 </div>

                </div><?php */?>

                
              </div>

            

              <div class="form-actions">

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="sub_menu.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

                <div id="status"></div>

              </div>

              <div id="submitted"></div>

            </form>

          </div>
          

        </div>

        </div></div></div>

    <?php } ?>    
        

        

        <?php if(@$_REQUEST['action']=="edit") { 

   if(@$_REQUEST['Save']=='1') {


 			
			$strFileName = $_FILES['banner_img']['name'];

			if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { 

			$strFileSize = $_FILES['banner_img']['size'];

			$strTempFileName = $_FILES['banner_img']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);			

			$simg = $strFileName; }
				 


			$register_query="update `email1` set `email`='$_REQUEST[email]',`cat1`='$_REQUEST[cat1]',`name`='$_REQUEST[name]',`small`='$_REQUEST[small]',`meta_des`='$_REQUEST[meta_des]',`meta_name`='$_REQUEST[meta_name]',`banner_img`='$simg'  where `id`='$_REQUEST[id]'"; 

		mysqli_query(dbcon(),$register_query); 

	 	header('location:sub_menu.php');

	} 

				$Sql ="select * from `email1` where id=$_REQUEST[id]";

				$rs=mysqli_query(dbcon(),$Sql);

				//echo @mysqli_error();

				$rsdata1 =mysqli_fetch_object($rs);

				?>

        

         <div class="container-fluid"><hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>

            <h5>Edit</h5>

          </div>

        

          <div class="widget-content nopadding">

            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="sub_menu.php?action=edit&Save=1" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">

              <div id="form-wizard-1" class="step">

				<div class="control-group">

                  <label class="control-label">Category</label>

                  <div class="controls">

                    <select name="cat1" style="width:415px;" required>

                      <option value="">Select Category</option>
    
                      <?php
    
                      $aplcr ="select * from `cat`";
    
                      $apllcr = mysqli_query(dbcon(),$aplcr);
    
                      while($aplllm = mysqli_fetch_object($apllcr))
    
                      {
    
                      ?><option value="<?php echo $aplllm->email; ?>" <?php if($rsdata1->cat1==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>
    
                      <?php } ?>
    
                      </select>

                  </div>

                </div>


				

				 <div class="control-group">

                  <label class="control-label">Main Menu</label>

                  <div class="controls">

                    <select name="name" style="width:400px;">

                      <option value="">Select Main Menu</option>
    
                      <?php
    
                      $aplcr ="select * from `email`";
    
                      $apllcr = mysqli_query(dbcon(),$aplcr);
    
                      while($aplllm = mysqli_fetch_object($apllcr))
    
                      {
    
                      ?><option value="<?php echo $aplllm->email; ?>" <?php if($rsdata1->name==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>
    
                      <?php } ?>
    
                      </select>

                  </div>

                </div>

                

                <div class="control-group">

                  <label class="control-label">Product Name</label>

                  <div class="controls">

                    <input id="email" type="text"  style="width:400px;" name="email" value="<?php echo $rsdata1->email; ?>" />

                  </div>

                </div>
                
                
                
                <div class="control-group">

                  <label class="control-label">Product Image</label>

                  <div class="controls">

                   <input name="banner_img" type="file" placeholder="Upload Picture" class="normal">

				    <input type="hidden" name="simg" value="<?php echo $rsdata1->banner_img; ?>" >

				   <img src="../Products/Large/<?php echo $rsdata1->banner_img; ?>" width="300">

                  </div>

                </div>
                
                
                
                 <?php /*?><div class="control-group">

                  <label class="control-label">Original Price</label>

                  <div class="controls">

				  <input type="number"  style="width:100px;" name="rate" value="<?php echo $rsdata1->rate; ?>" />&nbsp;₹

                 </div>

                </div>

				
			   <div class="control-group">

                  <label class="control-label">Small Description</label>

                  <div class="controls">

					<textarea class="form-control" rows="10" style="width:250px;" placeholder="Enter text ..." name="small"><?php echo $rsdata1->small; ?></textarea>

                 </div>

                </div><?php */?>

			

              </div>

           

              <div class="form-actions">

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="sub_menu.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

                <div id="status"></div>

              </div>

              <div id="submitted"></div>

            </form>

          </div>

          

        </div>

        </div></div></div>
        

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

