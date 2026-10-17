<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();


 include("editor/FCKEditor/fckeditor.php");
 $sBasePath = "editor/FCKEditor/";

if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }


/*mysqli_query(dbcon(),"CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `date_release` varchar(222) NOT NULL,
  PRIMARY KEY (`id`)
)");*/



if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `testimonials` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);


			header("Location:testimonials.php");

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


</head>
<body>
<!--Header-part-->
<!--close-Header-part-->
<!--top-Header-menu-->
<?php include('top.php'); ?>

<?php include('left.php'); ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Blogs</a> </div>
    <h1>Blogs</h1>
    <p style="text-align:right;"><a href="testimonials.php?action=add">
      <button type="button" class="btn btn-success">Add New</button>
      </a></p>
  </div>
  <?php if(@$_REQUEST['action']=="") { ?>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Blog List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Name</th>
                  <th>Edit</th>
                  <th>Remove</th>
                </tr>
              </thead>
              <tbody>
                <?php
								$iCnt = "0"; 
								$query ="select * from `testimonials` order by id desc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								
					
					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }
								?>
                <tr class="<?php echo $alagar; ?>">
                  <td style="text-align:center;"><?php echo $iCnt; ?></td>
                  <td style="text-align:center;"><?php echo $rsdata->email; ?></td>
                  <td style="text-align:center;"><a href="testimonials.php?action=edit&id=<?php echo $rsdata->id; ?>">
                    <i class="icon-pencil"></i>
                    </a></td>
                  <td style="text-align:center;"><a href="testimonials.php?action=del&id=<?php echo $rsdata->id; ?>">
                   <i class="icon-remove"></i>
                    </a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <?php } ?>
        <?php if(@$_REQUEST['action']=="add") { ?>
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                  <h5>Create New</h5>
                </div>
                <script language="javascript" type="text/javascript">

	function validate()

	{


	if(document.thisForm.date_release.value==""){alert("Please Enter Date");document.thisForm.date_release.focus();return false;}
	
	
	
	
	


	}

	function Numchk(num){var numval = num.value; if(isNaN(numval)) { num.value = ""; }}

	</script>
                <?php

  
   if(@$_REQUEST['Save']=='1') {
	   
  
	        $strFileName = $_FILES['name']['name'];
			$strFileSize = $_FILES['name']['size'];
			$strTempFileName = $_FILES['name']['tmp_name'];
			$strFilepath = "../Products/Large/";
			copy($strTempFileName,$strFilepath.$strFileName);
			
			
			$strFileName1 = $_FILES['banner_img']['name'];
			$strFileSize1 = $_FILES['banner_img']['size'];
			$strTempFileName1 = $_FILES['banner_img']['tmp_name'];
			$strFilepath1 = "../Products/Large/";
			copy($strTempFileName1,$strFilepath1.$strFileName1);
			

		 $register_query="insert into `testimonials` (`email`,`description`,`name`,`banner_img`) values('$_REQUEST[email]','$_REQUEST[description]','$strFileName','$strFileName1')";

		mysqli_query(dbcon(),$register_query);

		header('location:testimonials.php');

	} 

	
   
   ?>
                <div class="widget-content nopadding">
                  <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="testimonials.php?action=add&Save=1" enctype="multipart/form-data">
                    <div id="form-wizard-1" class="step">
                      
                      
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                          <input type="text"  style="width:90%;" name="email" />
                        </div>
                      </div>
                                           
                      
                     <!-- <div class="control-group">
                        <label class="control-label">Release Date</label>
                        <div class="controls">
                          <input type="date"  style="width:250px;" name="date_release" />
                        </div>
                      </div>-->
                      
                      
                      <div class="control-group">
                      	<label class="control-label">Small Image</label>
                      	<div class="controls">
                       		<input name="name" type="file" placeholder="Upload Picture" class="normal">
                      	</div>
                      </div>
                      
                      
                      <div class="control-group">
                      	<label class="control-label">Description</label>
                        <div class="controls">
                        	<textarea name="description" class="form-control mb-2"  style="width:90%" id="div_editor1"></textarea>
                        </div>
                      </div>
                      
                      
                      <div class="control-group">
                      	<label class="control-label">Upload Photo</label>
                      	<div class="controls">
                       		<input name="banner_img" type="file" placeholder="Upload Picture" class="normal">
                      	</div>
                      </div>
                      
                        
                    </div>
                    <div class="form-actions">
                      <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                      <a href="testimonials.php">
                      <input id="back" class="btn btn-primary" type="button" value="Back" />
                      </a>
                      <div id="status"></div>
                    </div>
                    <div id="submitted"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
        
		
		<?php if(@$_REQUEST['action']=="edit") { 
   
   if(@$_REQUEST['Save']=='1') {
   
            
			if($_FILES['name']['name']!="")
			{
 			$strFileName = $_FILES['name']['name'];

			$strFileSize = $_FILES['name']['size'];

			$strTempFileName = $_FILES['name']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);
			}
     		if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { $simg = $strFileName; }
			
			
			
			if($_FILES['banner_img']['name']!="")
			{
 			$strFileName1 = $_FILES['banner_img']['name'];

			$strFileSize1 = $_FILES['banner_img']['size'];

			$strTempFileName1 = $_FILES['banner_img']['tmp_name'];

			$strFilepath1 = "../Products/Large/";

			copy($strTempFileName1,$strFilepath1.$strFileName1);
			}
     		if($strFileName1=="") { $simg1 = $_REQUEST['simg1'];  } else { $simg1 = $strFileName1; }



	$register_query="update `testimonials` set `email`='$_REQUEST[email]',`description`='$_REQUEST[description]',`name`='$simg',`banner_img`='$simg1',`date_release`='$_REQUEST[date_release]'  where `id`='$_REQUEST[id]'";

		@mysqli_query(dbcon(),$register_query); 

	 	header('location:testimonials.php');

	} 


				$Sql ="select * from `testimonials` where id=$_REQUEST[id]";

				$rs=mysqli_query(dbcon(),$Sql);

				$rsdata1 =mysqli_fetch_object($rs);

				?>
        <div class="container-fluid">
          <hr>
          <div class="row-fluid">
            <div class="span12">
              <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
                  <h5>Edit</h5>
                </div>
                <div class="widget-content nopadding">
                  <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="testimonials.php?action=edit&Save=1" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                    <div id="form-wizard-1" class="step">
                      <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                          <input id="email" type="text"  style="width:90%;" name="email" value="<?php echo $rsdata1->email; ?>" />
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Release Date</label>
                        <div class="controls">
                          <input id="date" type="date"  style="width:90%;" name="date_release" value="<?php echo $rsdata1->date_release; ?>" />
                        </div>
                      </div>
                      <div class="control-group">
                      	<label class="control-label">Small Image</label>
                      	<div class="controls">
                       		<input name="name" type="file" placeholder="Upload Picture" class="normal">
                        	<input type="hidden" name="simg" value="<?php echo $rsdata1->name; ?>" >
                       		<img src="../Products/Large/<?php echo $rsdata1->name; ?>" width="300">
                      	</div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Description</label>
                        <div class="controls">
						  <textarea class="form-control" rows="10" style="width:90%;" id="div_editor1" placeholder="Enter text ..." name="description"><?php echo $rsdata1->description; ?></textarea>
                        </div>
                      </div>
                      <div class="control-group">
                      	<label class="control-label">Upload Image</label>
                      	<div class="controls">
                       		<input name="banner_img" type="file" placeholder="Upload Picture" class="normal">
                        	<input type="hidden" name="simg1" value="<?php echo $rsdata1->banner_img; ?>" >
                       		<img src="../Products/Large/<?php echo $rsdata1->banner_img; ?>" width="300">
                      	</div>
                      </div>
                    </div>
                    <div class="form-actions">
                      <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                      <a href="testimonials.php">
                      <input id="back" class="btn btn-primary" type="button" value="Back" />
                      </a>
                      <div id="status"></div>
                    </div>
                    <div id="submitted"></div>
                  </form>
                </div>
              </div>
            </div>
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
