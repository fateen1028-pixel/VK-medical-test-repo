<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();


 include("editor/FCKEditor/fckeditor.php");
 $sBasePath = "editor/FCKEditor/";

if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }


mysqli_query(dbcon(),"CREATE TABLE `press` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  PRIMARY KEY (`id`)
)");



if(@$_REQUEST['action']=="del")

			{

			 $sql    = "DELETE FROM `press` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);


			header("Location:press.php");

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

<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />

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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Image</a> </div>
    <h1>Footer Menus</h1>
    <p style="text-align:right;"><a href="press.php?action=add"><button type="button" class="btn btn-success">Add New</button></a></p>
  </div>
  


 
      
      <?php if(@$_REQUEST['action']=="") { ?>   
      
      
       <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
       
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Footer Menus List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                    <th>S.No</th>
                    <th>Menu Name</th>
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
								$query ="select * from `press` order by id asc";
								$rsquery = mysqli_query(dbcon(),$query);
								while(@$rsdata = mysqli_fetch_object($rsquery))
				                { 
					              $iCnt++;
								
					
					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }
								?>
                                    <tr class="<?php echo $alagar; ?>">
                                        <td align="center"><?php echo $iCnt; ?></td>
                                        <td align="center"><?php echo $rsdata->email; ?></td>
                                        <td class="center" ><a href="press.php?action=edit&id=<?php echo $rsdata->id; ?>"><button type="button" class="btn btn-success">Edit</button></a></td>
                                        <td class="center"  ><a href="press.php?action=del&id=<?php echo $rsdata->id; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>
                                        
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

		 $register_query="insert into `press` (`email`,`description`,`name`,`date_release`) values('$_REQUEST[email]','$_REQUEST[description]','$strFileName','$_REQUEST[date_release]')";

		mysqli_query(dbcon(),$register_query);

		echo mysqli_error();

	 	header('location:press.php');

	} 

	
   
   ?>
          
        
        <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="press.php?action=add&Save=1" enctype="multipart/form-data">
              <div id="form-wizard-1" class="step">
			  
			  
			 
                
                
                <div class="control-group">
                  <label class="control-label">Menu Name</label>
                  <div class="controls">
                    <input type="text"  style="width:250px;" name="email" />
                  </div>
                </div>
				
				
			
                
             <div class="control-group">
                  <label class="control-label">Description</label>
                  <div class="controls">
                 <?php
				 
									
					   /* $oFCKeditor = new FCKeditor('description');

						$oFCKeditor->BasePath = $sBasePath ;

						$oFCKeditor->Width		= '550' ;

						$oFCKeditor->Height		= '350' ;

						$oFCKeditor->ToolbarSet = "Default";

						@$oFCKeditor->Value = "$rsdata1->description";

						$oFCKeditor->Create();*/
						
						?>
               <textarea class="textarea_editor1 span12" rows="10" style="width:250px;" placeholder="Enter text ..." name="description"></textarea>
                 </div>
                </div>
                
                
              </div>
            
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="press.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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
   
            $strFileName = $_FILES['name']['name'];
			$strFileSize = $_FILES['name']['size'];
			$strTempFileName = $_FILES['name']['tmp_name'];
			$strFilepath = "../Products/Large/";
			copy($strTempFileName,$strFilepath.$strFileName);


     if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { $simg = $strFileName; }

	$register_query="update `press` set `email`='$_REQUEST[email]',`description`='$_REQUEST[description]',`name`='$simg',`date_release`='$_REQUEST[date_release]'  where `id`='$_REQUEST[id]'";

		mysqli_query(dbcon(),$register_query); 

	 	header('location:press.php');

	} 


				$Sql ="select * from `press` where id=$_REQUEST[id]";

				$rs=mysqli_query(dbcon(),$Sql);

				echo @mysqli_error();

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
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="press.php?action=edit&Save=1" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<? echo $_REQUEST['id']; ?>">
              <div id="form-wizard-1" class="step">
                
			
			  
                
                <div class="control-group">
                  <label class="control-label">Menu Name</label>
                  <div class="controls">
                    <input id="email" type="text"  style="width:250px;" name="email" value="<?php echo $rsdata1->email; ?>" />
                  </div>
                </div>
				
				
			
				
				
				
          <div class="control-group">
                  <label class="control-label">Description</label>
                  <div class="controls">
                 <?php
				 
									
					    /*$oFCKeditor = new FCKeditor('description');

						$oFCKeditor->BasePath = $sBasePath ;

						$oFCKeditor->Width		= '550' ;

						$oFCKeditor->Height		= '350' ;

						$oFCKeditor->ToolbarSet = "Default";

						@$oFCKeditor->Value = "$rsdata1->description";

						$oFCKeditor->Create();*/
						
						?>
               <textarea class="textarea_editor1 span12" rows="10" style="width:250px;" placeholder="Enter text ..." name="description"><?php echo $rsdata1->description; ?></textarea>
                 </div>
                </div>
                
              </div>
           
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="press.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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

<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 

<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 

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
