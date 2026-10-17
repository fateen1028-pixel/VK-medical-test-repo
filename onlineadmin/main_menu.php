<?php  ob_start();

session_start();

require("connection.php");

//$linkid = db_connect();









if(@$_SESSION['admin']=="") { header('location:logout.php'); exit; }





/*mysqli_query(dbcon(),"ALTER TABLE  `email` ADD  `meta_name` LONGTEXT NOT NULL ,

ADD  `meta_des` LONGTEXT NOT NULL");

mysqli_query(dbcon(),"ALTER TABLE  `email` ADD  `banner_img` LONGTEXT NOT NULL");*/





if(@$_REQUEST['action']=="del")



			{

			$sql    = "DELETE FROM `email` WHERE `id`='$_REQUEST[id]'";

			$result = mysqli_query(dbcon(),$sql);

			header("Location:main_menu.php");
			
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
<!--top-Header-menu-->
<?php include('top.php'); ?>
<!--start-top-serch-->
<?php include('left.php'); ?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#" class="current">Main Menu</a> </div>
    <h1>Main Menu List</h1>
    <p style="text-align:right;"><a href="main_menu.php?action=add">
      <button type="button" class="btn btn-success">Add New Main Menu</button>
      </a></p>
  </div>
  <?php if(@$_REQUEST['action']=="") { ?>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Main Menu List</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Main Menu Name</th>
                  <!--<th>Icon</th>-->
                  <th>Category</th>
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

								$query ="select * from `email` order by id asc";

								$rsquery = mysqli_query(dbcon(),$query);

								while(@$rsdata = mysqli_fetch_object($rsquery))

				                { 

					              $iCnt++;

								

					

					             if($iCnt%2=="0") { $alagar = "gradeX"; } else { $alagar = "gradeC"; }

								?>
                <tr class="<?php echo $alagar; ?>">
                  <td style="text-align:center;"><?php echo $iCnt; ?></td>
                  <td style="text-align:center;"><?php echo $rsdata->email; ?></td>
                  <?php /*?><td><img src="../Products/Large/<?php echo $rsdata->banner_img; ?>" width="100"> </td><?php */?>
                  <td style="text-align:center;"><?php echo $rsdata->cat; ?></td>
                  <td style="text-align:center;"><a href="main_menu.php?action=edit&id=<?php echo $rsdata->id; ?>"><i class="icon-pencil"></i></a></td>
                  <td style="text-align:center;"><a href="main_menu.php?action=del&id=<?php echo $rsdata->id; ?>"><i class="icon-remove"></i></a></td>
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





	if(document.thisForm.name.value==""){alert("Please Enter Name");document.thisForm.name.focus();return false;}


	}



	function Numchk(num){var numval = num.value; if(isNaN(numval)) { num.value = ""; }}



	</script>
                <?php



  

   if(@$_REQUEST['Save']=='1') {

	   

            /*$strFileName = $_FILES['banner_img']['name'];

			$strFileSize = $_FILES['banner_img']['size'];

			$strTempFileName = $_FILES['banner_img']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);*/




		$register_query="insert into `email` (`email`,`cat`,`description`) values('$_REQUEST[email]','$_REQUEST[cat]','$_REQUEST[description]')";

		mysqli_query(dbcon(),$register_query);

	 	header('location:main_menu.php');

		} 

   		?>
                <div class="widget-content nopadding">
                  <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="main_menu.php?action=add&Save=1" enctype="multipart/form-data">
                    <div id="form-wizard-1" class="step">
                    
                    
                    <div class="control-group">
                      <label class="control-label">Category</label>
                      <div class="controls">
                        <select name="cat" style="width:415px;" required>
                          <option value="">Select Category</option>
                          <?php

						  $aplcr ="select * from `cat`";		
		
						  $apllcr = mysqli_query(dbcon(),$aplcr);		
		
						  while($aplllm = mysqli_fetch_object($apllcr))
				
						  {		
		
						  ?>
                          <option value="<?php echo $aplllm->email; ?>"><?php echo $aplllm->email; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    
                    
                    <div class="control-group">
                      <label class="control-label">Main Menu Name</label>
                      <div class="controls">
                        <input type="text"  style="width:400px;" name="email" required />
                      </div>
                    </div>
                    
					
                    <?php /*?><div class="control-group">
                      <label class="control-label">Icon</label>
                      <div class="controls">
                        <input name="banner_img" type="file" placeholder="Upload Picture" class="normal" required>
                      </div>
                    </div><?php */?>
                    
                    
                    <div class="form-actions">
                      <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                      <a href="main_menu.php">
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

   
			/*$strFileName = $_FILES['banner_img']['name'];

			if($strFileName=="") { $simg = $_REQUEST['simg'];  } else { 

			$strFileSize = $_FILES['banner_img']['size'];

			$strTempFileName = $_FILES['banner_img']['tmp_name'];

			$strFilepath = "../Products/Large/";

			copy($strTempFileName,$strFilepath.$strFileName);			

			$simg = $strFileName; }*/



		$register_query="update `email` set `email`='$_REQUEST[email]',`cat`='$_REQUEST[cat]' where `id`='$_REQUEST[id]'";

		mysqli_query(dbcon(),$register_query); 

	 	header('location:main_menu.php');

	} 


				$Sql ="select * from `email` where `id`='$_REQUEST[id]'";

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
                  <form id="form-wizard" name="thisForm" class="form-horizontal" method="post" action="main_menu.php?action=edit&Save=1" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                    <div id="form-wizard-1" class="step">
                    
                    
                      <div class="control-group">
                        <label class="control-label">Category</label>
                        <div class="controls">
                          <select name="cat" style="width:415px;">
                            <option value="">Select Category</option>
                            <?php

							  $aplcr ="select * from `cat`";
						
							  $apllcr = mysqli_query(dbcon(),$aplcr);
						
							  while($aplllm = mysqli_fetch_object($apllcr))
						
							  {			
			
							  ?>
                            <option value="<?php echo $aplllm->email; ?>" <?php if($rsdata1->cat==$aplllm->email) { ?> selected <?php } ?>><?php echo $aplllm->email; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      
                      <div class="control-group">
                        <label class="control-label">Main Menu Name</label>
                        <div class="controls">
                          <input id="email" type="text"  style="width:400px;" name="email" value="<?php echo $rsdata1->email; ?>" />
                        </div>
                      </div>
                      
					  
                      <?php /*?><div class="control-group">
                        <label class="control-label">Icon</label>
                        <div class="controls">
                          <input name="banner_img" type="file" placeholder="Upload Picture" class="normal">
                          <input type="hidden" name="simg" value="<?php echo $rsdata1->banner_img; ?>" >
                          <img src="../Products/Large/<?php echo $rsdata1->banner_img; ?>" width="100"> </div>
                      </div><?php */?>
                     
                     
                    </div>
                    <div class="form-actions">
                      <input id="next" class="btn btn-primary" type="submit" name="submit" value="Submit" onClick="return validate()" />
                      <a href="main_menu.php">
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
<script>

	$('.textarea_editor').wysihtml5();

</script>
<script>

	$('.textarea_editor1').wysihtml5();

</script>
</body>
</html>
