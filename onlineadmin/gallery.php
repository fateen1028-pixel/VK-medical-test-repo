<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();


 include("editor/FCKEditor/fckeditor.php");
 $sBasePath = "editor/FCKEditor/";

if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }


/*mysqli_query(dbcon(),"CREATE TABLE `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
)");*/



if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `gallery` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);


			header("Location:gallery.php");

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Image</a> </div>
    <h1>Gallery</h1>
    <p style="text-align:right;"><a href="gallery.php?action=add"><button type="button" class="btn btn-success">Add New Image</button></a></p>
  </div>
  


 
      
      <?php if(@$_REQUEST['action']=="") { ?>   
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Image List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
                    <th>Image Title</th>
					<th>Image</th>
                    <th>Edit</th>
                    <th>Remove</th>
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
								$query ="select * from `gallery` order by id desc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								
					
					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }
								?>
                                    <tr class="<?php echo $alagar; ?>">
                                        <td style="text-align:center;"><?php echo $iCnt; ?></td>
                                        <td style="text-align:center;"><?php echo $rsdata->email; ?></td>
										<td style="text-align:center;"><img src="../Products/Large/<?php echo $rsdata->name; ?>" width="60"></td>
                                        <td style="text-align:center;"><a href="gallery.php?action=edit&id=<?php echo $rsdata->id; ?>"><i class="icon-pencil"></i></a></td>
                                        <td style="text-align:center;"><a href="gallery.php?action=del&id=<?php echo $rsdata->id; ?>"><i class="icon-remove"></i></a></td>
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
          
          <script language="javascript" type="text/javascript">

	function validate()

	{


	if(document.thisForm.name.value==""){alert("Please Enter Name");document.thisForm.name.focus();return false;}
	
	
	
	
	


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

		 $register_query="insert into `gallery` (`email`,
		 `name`) values('$_REQUEST[email]','$strFileName')";

		mysqli_query(dbcon(),$register_query);

		header('location:gallery.php');

	} 

	
   
   ?>
          
        
        <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="gallery.php?action=add&Save=1" enctype="multipart/form-data">
              <div id="form-wizard-1" class="step">
                
                
                <div class="control-group">
                  <label class="control-label">Image Title</label>
                  <div class="controls">
                    <input type="text"  style="width:400px;" name="email" />
                  </div>
                </div>
				
				
				 <div class="control-group">

                  <label class="control-label">Upload Picture</label>

                  <div class="controls">

                   <input name="name" type="file" placeholder="Upload Picture" class="normal">
                  </div>

                </div>
                
            
                
              </div>
            
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="gallery.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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
   
           
		   
		    if($_FILES['name']['name']!="")
			{
 			$strFileName = $_FILES['name']['name'];

			$strFileSize = $_FILES['name']['size'];

			$strTempFileName = $_FILES['name']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);
			}
     		if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { $simg = $strFileName; }
			
			
			

	$register_query="update `gallery` set `email`='$_REQUEST[email]',`name`='$simg'  where `id`='$_REQUEST[id]'";

		@mysqli_query(dbcon(),$register_query); 

	 	header('location:gallery.php');

	} 


				$Sql ="select * from `gallery` where id=$_REQUEST[id]";

				$rs=mysqli_query(dbcon(),$Sql);

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
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="gallery.php?action=edit&Save=1" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
              <div id="form-wizard-1" class="step">
			  
                
                <div class="control-group">
                  <label class="control-label">Image Title</label>
                  <div class="controls">
                    <input id="email" type="text"  style="width:400px;" name="email" value="<?php echo $rsdata1->email; ?>" />
                  </div>
                </div>
				
				
				 <div class="control-group">

                  <label class="control-label">Upload Picture</label>

                  <div class="controls">

                   <input name="name" type="file" placeholder="Upload Picture" class="normal">
				   
				   <input type="hidden" name="simg" value="<?php echo $rsdata1->name; ?>" >
				   
				   <img src="../Products/Large/<?php echo $rsdata1->name; ?>" width="300">
				   
                  </div>

                </div>
				
				
              </div>
           
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="gallery.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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



</body>
</html>
