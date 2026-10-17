<?php  ob_start();
session_start();
require("connection.php");
//$linkid = db_connect();

 include("editor/FCKEditor/fckeditor.php");
                  $sBasePath = "editor/FCKEditor/";

if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }



mysqli_query(dbcon(),"CREATE TABLE `reply_format` (
`id` INT( 11 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`quote_id` VARCHAR( 222 ) NOT NULL ,
`from_email` VARCHAR( 222 ) NOT NULL ,
`body_content` LONGTEXT NOT NULL ,
`footer_content` LONGTEXT NOT NULL ,
`customer_id` VARCHAR( 222 ) NOT NULL
)");




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
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Quote Format</a> </div>
    <h1>Quote Format</h1>
    

    
  </div>
  


        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
   
        
        
        
        <?php
		
		
		
		

		
		
		
		
		
		
		 if(@$_REQUEST['action']=="edit") { 
   if(@$_REQUEST['Save']=='1') {
	   
	   
	   @$Sql1 ="select * from `reply_format` where `customer_id`='$_SESSION[admin]'";
				$rs1=mysqli_query(dbcon(),$Sql1);
				@$rsdata11 =mysqli_num_rows($rs1);
	   
	if($rsdata11=='0') {   
mysqli_query(dbcon(),"INSERT INTO `reply_format` (
`id` ,
`quote_id` ,
`from_email` ,
`body_content` ,
`footer_content` ,
`customer_id`
)
VALUES (
'0',  '$_REQUEST[quote_id]',  '$_REQUEST[from_email]',  '$_REQUEST[body_content]',  '$_REQUEST[footer_content]',  '$_SESSION[admin]'
);");
	   
	} else {
	   


	$register_query="update `reply_format` set `quote_id`='$_REQUEST[quote_id]',`from_email`='$_REQUEST[from_email]',`body_content`='$_REQUEST[body_content]',`footer_content`='$_REQUEST[footer_content]'  where `customer_id`='$_SESSION[admin]'";

		mysqli_query(dbcon(),$register_query); 
		
	}

	 	header('location:reply_format.php?action=edit');

	} 


				@$Sql ="select * from `reply_format` where `customer_id`='$_SESSION[admin]'";

				$rs=mysqli_query(dbcon(),$Sql);

				//echo mysqli_error();

				@$rsdata1 =mysqli_fetch_object($rs);

				?>
        
         <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Quote Format</h5>
          </div>
        
          <div class="widget-content nopadding">
            <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="reply_format.php?action=edit&Save=1">
            
            <input type="hidden" name="id" value="<? echo @$_REQUEST['id']; ?>">
              <div id="form-wizard-1" class="step">
              
              <?php /*?> <div class="control-group">
                  <label class="control-label">Quote ID</label>
                  <div class="controls">
                    <input  type="text"  style="width:250px;" name="quote_id"  value="<?php echo @$rsdata1->quote_id; ?>"/>
                  </div>
                </div><?php */?>
                
                
               
                <div class="control-group">
                  <label class="control-label">Body content</label>
                  <div class="controls">
                  
                  <?php
				 
									
					    $oFCKeditor = new FCKeditor('body_content');

						$oFCKeditor->BasePath = $sBasePath ;

						$oFCKeditor->Width		= '550' ;

						$oFCKeditor->Height		= '350' ;

						$oFCKeditor->ToolbarSet = "Default";

						@$oFCKeditor->Value = "$rsdata1->body_content";

						$oFCKeditor->Create();
						
						?>
                  
                  
                  </div>
                </div>
                
                  <div class="control-group">
                  <label class="control-label">Footer content</label>
                  <div class="controls">
                  
                  
                  <?php
				 
					    $oFCKeditor = new FCKeditor('footer_content');

						$oFCKeditor->BasePath = $sBasePath ;

						$oFCKeditor->Width		= '550' ;

						$oFCKeditor->Height		= '350' ;

						$oFCKeditor->ToolbarSet = "Default";

						@$oFCKeditor->Value = "$rsdata1->footer_content";

						$oFCKeditor->Create();
						
						?>
                  
                  </div>
                </div>
                
                
                
              
                
                
          
              
                
                
                
              </div>
           
              <div class="form-actions">
                
                <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                <a href="user.php"><input id="back" class="btn btn-primary" type="button" value="Back" /></a>
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
