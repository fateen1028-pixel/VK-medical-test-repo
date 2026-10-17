<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();

if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }

/*mysqli_query(dbcon(),"ALTER TABLE  `email2` ADD  `side` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `email2` ADD  `external_link` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `email2` ADD  `savings` VARCHAR( 222 ) NOT NULL");*/

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


<?php include('top.php'); ?>


<?php include('left.php'); ?>


<div id="content">

  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Services List</a> </div>

    <h1>Services List</h1>

    <p style="text-align:right;"><a href="sub_sub_menu.php?action=add"><button type="button" class="btn btn-success">Add Details</button></a></p>

  </div>

      <?php if(@$_REQUEST['action']=="") { ?>   

  <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

            <h5>Services List</h5>

          </div>

          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">

              <thead>

                <tr>

                    <th>S.No</th>

                    
                    <th>Service Name</th>

                    <th>Title</th>
					
                    <th>Edit</th>

                    <th>Remove</th>

                    <!--<th>Add</th>-->

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

								?>

                                    <tr class="<?php echo $alagar; ?>">

                                        <td style="text-align:center;"><?php echo $iCnt; ?></td>

                                        
                                        <td style="text-align:center;"><?php echo $rsdata->cat; ?></td>

                                        <td style="text-align:center;"><?php echo $rsdata->email; ?></td>
                                        
                                        <td style="text-align:center;"><a href="sub_sub_menu.php?action=edit&id=<?php echo $rsdata->id; ?>"><i class="icon-pencil"></i></a></td>
                                       
                                        <td style="text-align:center;"><a href="sub_sub_menu.php?action=del&id=<?php echo $rsdata->id; ?>"><i class="icon-remove"></i></a></td>

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

//echo "test";

 			$strFileName = $_FILES['banner_img']['name'];

			$strFileSize = $_FILES['banner_img']['size'];

			$strTempFileName = $_FILES['banner_img']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);

	       
		   
		    $strFileName1 = $_FILES['image1']['name'];

			$strFileSize1 = $_FILES['image1']['size'];

			$strTempFileName1 = $_FILES['image1']['tmp_name'];

			$strFilepath1 = "../Products/Large/";

			copy($strTempFileName1,$strFilepath1.$strFileName1);

			
			
			/*$strFileName2 = $_FILES['image2']['name'];

			$strFileSize2 = $_FILES['image2']['size'];

			$strTempFileName2 = $_FILES['image2']['tmp_name'];

			$strFilepath2 = "../Products/Large/";

			copy($strTempFileName2,$strFilepath2.$strFileName2);




			$strFileName3 = $_FILES['image3']['name'];

			$strFileSize3 = $_FILES['image3']['size'];

			$strTempFileName3 = $_FILES['image3']['tmp_name'];

			$strFilepath3 = "../Products/Large/";

			copy($strTempFileName3,$strFilepath3.$strFileName3);




			$strFileName4 = $_FILES['image4']['name'];

			$strFileSize4 = $_FILES['image4']['size'];

			$strTempFileName4 = $_FILES['image4']['tmp_name'];

			$strFilepath4 = "../Products/Large/";

			copy($strTempFileName4,$strFilepath4.$strFileName4);*/



$description = str_replace("'","`",$_REQUEST['description']);
$small = str_replace("'","`",$_REQUEST['small']);

		 $register_query="insert into `email2` (`cat2`,`cat`,`email`,`small`,`description`,`banner_img`,`image1`) values('$_REQUEST[cat2]','$_REQUEST[cat]','$_REQUEST[email]','$small','$description','$strFileName','$strFileName1')";

		mysqli_query(dbcon(),$register_query);

	 	header('location:sub_sub_menu.php');

	} 

   ?>



        <div class="widget-content nopadding">

            <form id="form-wizard" name="form-wizard" class="form-horizontal" method="post" action="sub_sub_menu.php?action=add&Save=1" enctype="multipart/form-data">

              <div id="form-wizard-1" class="step">



			  <div class="control-group">

                  <label class="control-label">Category</label>

                  <div class="controls">

                    <select name="cat2" style="width:90%;" required>

                      <option value="">Select Category</option>
    
                      <?php
    
                      $aplcr ="select * from `cat`";
    
                      $apllcr = mysqli_query(dbcon(),$aplcr);
    
                      while($aplllm = mysqli_fetch_object($apllcr))
    
                      {
    
                      ?><option value="<?php echo $aplllm->email; ?>" <?php if(@$_REQUEST['cat2']==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>
    
                      <?php } ?>
    
                      </select>

                  </div>

                </div>
                
                
                
                <div class="control-group">

                  <label class="control-label">Service Name</label>

                  <div class="controls">

                    <input type="text"  style="width:90%;" name="cat" required />

                  </div>

                </div>


                <div class="control-group">

                  <label class="control-label">Title</label>

                  <div class="controls">

                    <input type="text"  style="width:90%;" name="email" required />

                  </div>

                </div>
                
               
                
                <div class="control-group">

                  <label class="control-label">Description</label>

                   <div class="controls">

              		<textarea name="small" class="form-control mb-2"  style="width:90%" id="div_editor1"></textarea>

                   </div>

                </div>				



 				<div class="control-group">

                  <label class="control-label">Highlights</label>

                  <div class="controls">

             		 <textarea name="description" class="form-control mb-2"  style="width:90%" id="div_editor2"></textarea>

                 </div>

                </div>



				<div class="control-group">

                  <label class="control-label">Upload Image</label>

                  <div class="controls">

                   <input name="banner_img" type="file" placeholder="Upload Picture" class="normal">

                  </div>

                </div>

				



				<div class="control-group">

                  <label class="control-label">Upload Image</label>

                  <div class="controls">

                   <input name="image1" type="file" placeholder="Upload Picture" class="normal">

                  </div>

                </div>
				

<script>
			var editor1 = new RichTextEditor("#div_editor1");
			var editor2 = new RichTextEditor("#div_editor2");
			
			//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
		</script>

              </div>


              <div class="form-actions">

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="sub_sub_menu.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

                <div id="status"></div>

              </div>

              <div id="submitted"></div>

            </form>

          </div>


        </div>


        </div></div></div>

    <?php } ?>    




        <?php 

		 if(@$_REQUEST['action']=='up') {

 //  echo $_REQUEST['id'];

			if($_FILES['banner_img']['name']!="")
			{
 			$strFileName = $_FILES['banner_img']['name'];

			$strFileSize = $_FILES['banner_img']['size'];

			$strTempFileName = $_FILES['banner_img']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);
			}
     		if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { $simg = $strFileName; }
			
			

			if($_FILES['image1']['name']!="")
			{
			$strFileName1 = $_FILES['image1']['name'];

			$strFileSize1 = $_FILES['image1']['size'];

			$strTempFileName1 = $_FILES['image1']['tmp_name'];

			$strFilepath1 = "../Products/Large/";

			copy($strTempFileName1,$strFilepath1.$strFileName1);
			}
     		if($strFileName1=="") { $simg1 = $_REQUEST['simg1'];  } else { $simg1 = $strFileName1; }
			


			

$description = str_replace("'","`",$_REQUEST['description']);

$small = str_replace("'","`",$_REQUEST['small']);	 

	$register_query="update `email2` set `cat2`='$_REQUEST[cat2]',`cat`='$_REQUEST[cat]',`email`='$_REQUEST[email]',`description`='$description',`small`='$small',`banner_img`='$simg',`image1`='$simg1' where `id`='$_REQUEST[id]'";

		mysqli_query(dbcon(),$register_query); 

	 	header('location:sub_sub_menu.php');

	} 

	?>

	<?php	

		if(@$_REQUEST['action']=="edit") { 

				$Sql ="select * from `email2` where `id`='$_REQUEST[id]'";

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

            <form  name="thisForm" class="form-horizontal" method="post" action="sub_sub_menu.php?action=up" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">

              <div id="form-wizard-1" class="step">

			  <div class="control-group">

                  <label class="control-label">Category</label>

                  <div class="controls">

                    <select name="cat2" style="width:90%;" required>

                      <option value="">Select Category</option>
    
                      <?php
    
                      $aplcr ="select * from `cat`";
    
                      $apllcr = mysqli_query(dbcon(),$aplcr);
    
                      while($aplllm = mysqli_fetch_object($apllcr))
    
                      {
    
                      ?><option value="<?php echo $aplllm->email; ?>" <?php if($rsdata1->cat2==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>
    
                      <?php } ?>
    
                      </select>

                  </div>

                </div>





                <div class="control-group">

                  <label class="control-label">Service Name</label>

                  <div class="controls">

                    <input id="cat" type="text"  style="width:90%;" name="cat" value="<?php echo $rsdata1->cat; ?>" />

                  </div>

                </div>
                
                
                <div class="control-group">

                  <label class="control-label">Title</label>

                  <div class="controls">

                    <input id="email" type="text"  style="width:90%;" name="email" value="<?php echo $rsdata1->email; ?>" />

                  </div>

                </div>
                              			

				<div class="control-group">

                  <label class="control-label">Description</label>

                  <div class="controls">

              		<textarea class="form-control" style="width:90%;"  id="div_editor1" name="small"><?php echo $rsdata1->small; ?></textarea>

                 </div>

                </div>
                
                

				<div class="control-group">

                  <label class="control-label">Highlights</label>

                  <div class="controls">

              		<textarea class="form-control" style="width:90%;" id="div_editor2" name="description"><?php echo $rsdata1->description; ?></textarea>

                 </div>

                </div>



				 <div class="control-group">

                  <label class="control-label">Upload Image</label>

                  <div class="controls">

                   <input name="banner_img" type="file" placeholder="Upload Picture" class="normal">

				    <input type="hidden" name="simg" value="<?php echo $rsdata1->banner_img; ?>" >

				   <img src="../Products/Large/<?php echo $rsdata1->banner_img; ?>" width="300">

                  </div>

                </div>
			



				<div class="control-group">

                  <label class="control-label">Upload Image</label>

                  <div class="controls">

                   <input name="image1" type="file" placeholder="Upload Picture" class="normal">

				    <input type="hidden" name="simg1" value="<?php echo $rsdata1->image1; ?>" >

				   <img src="../Products/Large/<?php echo $rsdata1->image1; ?>" width="300">

                  </div>

                </div>


              </div>



              <div class="form-actions">

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="sub_sub_menu.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

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



<script 
      src="https://cdn.ckeditor.com/ckeditor5/36.0.0/classic/ckeditor.js">
    </script>
    
    <script>
        ClassicEditor
            .create( document.querySelector( '#div_editor1' ) )
            .catch( error => {
                console.error( error );
            } );
			
			ClassicEditor
            .create( document.querySelector( '#div_editor2' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>

</body>

</html>
