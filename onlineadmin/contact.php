<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();

if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }

/*mysqli_query(dbcon(),"ALTER TABLE  `contact` ADD  `side` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `contact` ADD  `external_link` VARCHAR( 222 ) NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `contact` ADD  `savings` VARCHAR( 222 ) NOT NULL");*/

if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `contact` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);

			header("Location:contact.php");

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

<link rel="stylesheet" href="rich/richtexteditor/rte_theme_default.css" />
<script type="text/javascript" src="rich/richtexteditor/rte.js"></script>
<script type="text/javascript" src='rich/richtexteditor/plugins/all_plugins.js'></script>
</head>

<body>


<?php include('top.php'); ?>


<?php include('left.php'); ?>


<div id="content">

  <div id="content-header">

    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Contact Info</a> </div>

    <h1>Contact Info</h1>

    <p style="text-align:right;"><a href="contact.php?action=add"><button type="button" class="btn btn-success">Add Details</button></a></p>

  </div>

      <?php if(@$_REQUEST['action']=="") { ?>   

  <div class="container-fluid">

    <hr>

    <div class="row-fluid">

      <div class="span12">

        <div class="widget-box">

          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>

            <h5>Contact Info</h5>

          </div>

          <div class="widget-content nopadding">

            <table class="table table-bordered data-table">

              <thead>

                <tr>

                    <th>S.No</th>

					<th>Branch</th>

                    
					
                    <th>Edit</th>

                    <th>Remove</th>

                    <!--<th>Add</th>-->

                </tr>

              </thead>

              <tbody>

                <?php

								$iCnt = "0"; 

								$query ="select * from `contact` order by `id` asc";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					            $iCnt++;

					            if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }

								?>

                                    <tr class="<?php echo $alagar; ?>">

                                        <td style="text-align:center;"><?php echo $iCnt; ?></td>

										<td style="text-align:center;"><?php echo $rsdata->name; ?></td>

                                        
                                        
                                        <td style="text-align:center;"><a href="contact.php?action=edit&id=<?php echo $rsdata->id; ?>"><i class="icon-pencil"></i></a></td>
                                       
                                        <td style="text-align:center;"><a href="contact.php?action=del&id=<?php echo $rsdata->id; ?>"><i class="icon-remove"></i></a></td>

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




$description = str_replace("'","`",$_REQUEST['description']);
$small = str_replace("'","`",$_REQUEST['small']);

		 $register_query="insert into `contact` (`cat2`,`email`,`name`,`description`,`phone`,`small`) values('$_REQUEST[cat2]','$_REQUEST[email]','$_REQUEST[name]','$description','$_REQUEST[phone]','$small')";

		mysqli_query(dbcon(),$register_query);

	 	header('location:contact.php');

	} 

   ?>



        <div class="widget-content nopadding">

            <form id="form-wizard" name="form-wizard" class="form-horizontal" method="post" action="contact.php?action=add&Save=1" enctype="multipart/form-data">

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

                  <label class="control-label">Branch Name</label>

                  <div class="controls">

                    <input type="text"  style="width:90%;" name="name" required />

                  </div>

                </div>
                
                
                <div class="control-group">

                  <label class="control-label">Phone Number</label>

                  <div class="controls">

                    <input type="text"  style="width:90%;" name="phone" required />

                  </div>

                </div>
                
                
                
                <div class="control-group">

                  <label class="control-label">Email ID</label>

                  <div class="controls">

                    <input type="email"  style="width:90%;" name="email" required />

                  </div>

                </div>
                
				
				
 				<div class="control-group">

                  <label class="control-label">Address</label>

                  <div class="controls">

             		 <textarea name="description" class="form-control mb-2" rows="10"  style="width:90%" ></textarea>

                 </div>

                </div>
                
                
                <div class="control-group">

                  <label class="control-label">Map</label>

                  <div class="controls">

             		 <textarea name="small" class="form-control mb-2" rows="10"  style="width:90%" ></textarea>

                 </div>

                </div>



              </div>


              <div class="form-actions">

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="contact.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

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

 
$description = str_replace("'","`",$_REQUEST['description']);
$small = str_replace("'","`",$_REQUEST['small']);	 

	$register_query="update `contact` set `cat2`='$_REQUEST[cat2]',`email`='$_REQUEST[email]',`description`='$description',`name`='$_REQUEST[name]',`phone`='$_REQUEST[phone]',`small`='$small' where `id`='$_REQUEST[id]'";

		mysqli_query(dbcon(),$register_query); 

	 	header('location:contact.php');

	} 

	?>

	<?php	

		if(@$_REQUEST['action']=="edit") { 

				$Sql ="select * from `contact` where `id`='$_REQUEST[id]'";

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

            <form  name="thisForm" class="form-horizontal" method="post" action="contact.php?action=up" enctype="multipart/form-data">

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

                  <label class="control-label">Branch Name</label>

                  <div class="controls">

                    <input id="name" type="text"  style="width:90%;" name="name" value="<?php echo $rsdata1->name; ?>" />

                  </div>

                </div>
                
                
                <div class="control-group">

                  <label class="control-label">Phone Number</label>

                  <div class="controls">

                    <input id="phone" type="text"  style="width:90%;" name="phone" value="<?php echo $rsdata1->phone; ?>" />

                  </div>

                </div>
                
                
                
                <div class="control-group">

                  <label class="control-label">Email ID</label>

                  <div class="controls">
                    <input id="email" type="email"  style="width:90%;" name="email" value="<?php echo $rsdata1->email; ?>" />

                  </div>

                </div>
                
                
              
				<div class="control-group">

                  <label class="control-label">Address</label>

                  <div class="controls">

              		<textarea class="form-control" rows="10" style="width:90%;" name="description"><?php echo $rsdata1->description; ?></textarea>

                 </div>

                </div>
                
                
                
                <div class="control-group">

                  <label class="control-label">Map</label>

                  <div class="controls">

              		<textarea class="form-control" rows="10" style="width:90%;" name="small"><?php echo $rsdata1->small; ?></textarea>

                 </div>

                </div>
                
                


              </div>



              <div class="form-actions">

                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />

                <a href="contact.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>

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

<script>
			var editor1 = new RichTextEditor("#div_editor1");
			var editor2 = new RichTextEditor("#div_editor2");
			//editor1.setHTMLCode("Use inline HTML or setHTMLCode to init the default content.");
		</script>


<script src="https://htmleditor.online/common/editors/ckeditor_4.9.2_standard/ckeditor.js"></script>

</body>

</html>
